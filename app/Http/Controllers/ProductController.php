<?php

namespace App\Http\Controllers;

use App\Exports\FormExport;
use App\Models\ProductionCard;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class ProductController extends Controller
{
    public function form()
    {
        return view('formlist');
    }

    public function formData(Request $request)
    {
        $search = $request->query('search');
        $data = ProductionCard::select(
            'id',
            'bill_no',
            'jala_no',
            'firm_name',
            'mo_no',
            'address',
            'f_reed',
            't_tar',
            'del_date',
            'status'
        )
            ->when($search, function ($query, $search) {
                $query->where(function ($q) use ($search) {
                    $q->where('bill_no', 'like', "%{$search}%")
                        ->orWhere('jala_no', 'like', "%{$search}%")
                        ->orWhere('firm_name', 'like', "%{$search}%")
                        ->orWhere('mo_no', 'like', "%{$search}%")
                        ->orWhere('address', 'like', "%{$search}%")
                        ->orWhere('status', 'like', "%{$search}%");
                });
            })
            ->latest()
            ->get();
        return response()->json($data);
    }

    public function form_create()
    {
        return view('form');
    }

    public function edit($id)
    {
        $data = ProductionCard::with(['items', 'gathis'])->findOrFail($id);
        return view('formedit', compact('data'));
    }

    public function print($id)
    {
         $data = ProductionCard::with(['items', 'gathis'])->findOrFail($id);

        return view('print', compact('data'));
    }

    public function pdf($id)
    {
        $data = ProductionCard::with('items')->findOrFail($id);
        $pdf = PDF::loadView('print', compact('data'));

        return $pdf->download('production_card_' . $data->id . '.pdf');
    }

    public function export(Request $request)
    {
        $ids = array_filter(array_map('trim', explode(',', $request->ids)));
        if (empty($ids)) {
            return back()->with('error', 'No IDs selected for export.');
        }

        return Excel::download(new FormExport($ids), 'forms.xlsx');
    }

    public function show($id)
    {
        $project = ProductionCard::find($id);
        if (! $project) {
            abort(404, 'Project not found.');
        }
        $filePathFromDb = $project->pattern_File;
        $fullPath = public_path("storage/{$filePathFromDb}");
        if (! File::exists($fullPath)) {
            abort(404, 'Pattern file not found.');
        }

        return Response::file($fullPath);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            // Basic fields
            'firm_name' => 'nullable|string|max:255',
            'or_date' => 'nullable|date',
            'own_name' => 'nullable|string|max:255',
            'mo_no' => 'nullable|string|max:255',
            'address' => 'nullable|string',
            'bill_no' => 'nullable|string|max:255',
            'loom_no' => 'nullable|string|max:255',
            'chalan_no' => 'nullable|string|max:255',
            'del_date' => 'nullable|date',

            // Technical Specs
            'jala_no' => 'nullable|string|max:255',
            'f_reed' => 'nullable|string|max:255',
            'line' => 'nullable|string|max:255',
            'pcs' => 'nullable|string|max:255',
            'pattern_no' => 'nullable|string|max:255',
            'pattern_File' => 'nullable|mimes:pdf|max:5120',
            'bharai' => 'nullable|string|max:255',
            'pana' => 'nullable|string|max:255',
            't_tar' => 'nullable|string|max:255',
            'number_1' => 'nullable|string|max:255',
            'number_2' => 'nullable|string|max:255',

            // Frame & Belt Specs
            'u_frame' => 'nullable|string|max:255',
            'size' => 'nullable|string|max:255',
            'l_frame' => 'nullable|string|max:255',
            'kaski' => 'nullable|string|max:255',
            'u_belt' => 'nullable|string|max:255',
            'l_belt' => 'nullable|string|max:255',
            'labour' => 'nullable|string|max:255',
            'mc_name' => 'nullable|string|max:255',

            // Hardware & Dori
            'spring' => 'nullable|string|max:255',
            'raj' => 'nullable|string|max:255',
            'patti' => 'nullable|string|max:255',
            'legpin' => 'nullable|string|max:255',
            'tube' => 'nullable|string|max:255',
            'total_pcs' => 'nullable|string|max:255',
            'dori_type' => 'nullable|string|max:255',
            'dori_cut_person' => 'nullable|string|max:255',
            'dori_kg' => 'nullable|string|max:255',

            // Personnel / Teams
            'jala_bharai_team' => 'nullable|string|max:255',
            'g_button_team' => 'nullable|string|max:255',
            'gathi_person' => 'nullable|string|max:255',
            'old_jala_khola_team' => 'nullable|string|max:255',
            'rs_set' => 'nullable|string|max:255',
            'raj_inner' => 'nullable|string|max:255',
            'springInner' => 'nullable|string|max:255',
            'tubeInner' => 'nullable|string|max:255',
            'kaccha_pakka_team' => 'nullable|string|max:255',
            'kaccha_pakka_date' => 'nullable|date',

            'dori_type_dropdown' => 'nullable|in:jaadi,patli',

            'meter' => 'nullable|numeric|min:0',
            'br_tar' => 'nullable|numeric|min:0',
            'new_tar' => 'nullable|numeric|min:0',
            'total_tar_new' => 'nullable|numeric|min:0',
            'kg_1' => 'nullable|numeric|min:0',
            'kg_2' => 'nullable|numeric|min:0',
            'total_kg' => 'nullable|numeric|min:0',

            // Textareas
            'button_texna' => 'nullable|string',
            'guide_board_texna' => 'nullable|string',
            'remark' => 'nullable|string',

            // Checklist
            'checklist' => 'nullable|array',

            // Grand Total
            'grand_total' => 'nullable|numeric',

            // Gathi Items (simple table)
            'gathi_items' => 'nullable|array',
            'gathi_items.*.gathi_person' => 'nullable|string|max:255',
            'gathi_items.*.no' => 'nullable|integer|min:0',
            'gathi_items.*.no_of_gat' => 'nullable|integer|min:0',

            // Detailed Gathi Items
            'production_gathi_items' => 'nullable|array',
            'production_gathi_items.*.border_tar' => 'nullable|string|max:255',
            'production_gathi_items.*.to_tar' => 'nullable|string|max:255',
            'production_gathi_items.*.gathi_types_a' => 'nullable|string|max:255',
            'production_gathi_items.*.gathi_types_b' => 'nullable|string|max:255',
            'production_gathi_items.*.height_a' => 'nullable|string|max:255',
            'production_gathi_items.*.height_b' => 'nullable|string|max:255',
            'production_gathi_items.*.tar_qty_a' => 'nullable|string|max:255',
            'production_gathi_items.*.tar_qty_b' => 'nullable|string|max:255',
        ]);
        DB::beginTransaction();
        try {
            $projectData = $validatedData;
            $projectData['auth_create'] = auth()->user()->name;
            unset($projectData['gathi_items'], $projectData['production_gathi_items']);
            if ($request->hasFile('pattern_File')) {
                $file = $request->file('pattern_File');
                $path = $file->store('pattern_files', 'public');
                $projectData['pattern_File'] = $path;
            }
            $project = ProductionCard::create($projectData);
            if (! empty($validatedData['gathi_items'])) {
                foreach ($validatedData['gathi_items'] as $item) {
                    if (! empty($item['gathi_person']) || ! empty($item['no']) || ! empty($item['no_of_gat'])) {
                        $project->gathis()->create([
                            'gathi_person' => $item['gathi_person'] ?? null,
                            'no' => $item['no'] ?? null,
                            'no_of_gat' => $item['no_of_gat'] ?? null,
                        ]);
                    }
                }
            }
            try {
                foreach ($validatedData['production_gathi_items'] as $item) {
                    $project->items()->create([
                        'border_tar' => $item['border_tar'] ?? null,
                        'to_tar' => $item['to_tar'] ?? null,
                        'gathi_types_a' => $item['gathi_types_a'] ?? null,
                        'gathi_types_b' => $item['gathi_types_b'] ?? null,
                        'height_a' => $item['height_a'] ?? null,
                        'height_b' => $item['height_b'] ?? null,
                        'tar_qty_a' => $item['tar_qty_a'] ?? null,
                        'tar_qty_b' => $item['tar_qty_b'] ?? null,
                    ]);
                }
            } catch (\Exception $e) {
                Log::error('Detailed Gathi save failed: ' . $e->getMessage());
                throw $e;
            }
            DB::commit();
            return redirect()->back()->with('success', 'Data successfully saved!');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', 'Something went wrong: ' . $e->getMessage());
        }
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            // Basic fields
            'firm_name' => 'nullable|string|max:255',
            'or_date' => 'nullable|date',
            'own_name' => 'nullable|string|max:255',
            'mo_no' => 'nullable|string|max:255',
            'address' => 'nullable|string|max:1000',
            'bill_no' => 'nullable|string|max:255',
            'loom_no' => 'nullable|string|max:255',
            'chalan_no' => 'nullable|string|max:255',
            'del_date' => 'nullable|date',

            // Technical Specs
            'jala_no' => 'nullable|string|max:255',
            'f_reed' => 'nullable|string|max:255',
            'line' => 'nullable|string|max:255',
            'pcs' => 'nullable|string|max:255',
            'pattern_no' => 'nullable|string|max:255',
            'pattern_File' => 'nullable|mimes:pdf,jpg,jpeg,png|max:5120',
            'bharai' => 'nullable|string|max:255',
            'pana' => 'nullable|string|max:255',
            't_tar' => 'nullable|string|max:255',
            'number_1' => 'nullable|integer',
            'number_2' => 'nullable|integer',

            // Frame & Belt Specs
            'u_frame' => 'nullable|string|max:255',
            'size' => 'nullable|string|max:255',
            'l_frame' => 'nullable|string|max:255',
            'kaski' => 'nullable|string|max:255',
            'u_belt' => 'nullable|string|max:255',
            'l_belt' => 'nullable|string|max:255',
            'labour' => 'nullable|string|max:255',
            'mc_name' => 'nullable|string|max:255',

            // Hardware & Dori
            'spring' => 'nullable|string|max:255',
            'raj' => 'nullable|string|max:255',
            'patti' => 'nullable|string|max:255',
            'legpin' => 'nullable|string|max:255',
            'tube' => 'nullable|string|max:255',
            'total_pcs' => 'nullable|string|max:255',
            'dori_type' => 'nullable|string|max:255',
            'dori_cut_person' => 'nullable|string|max:255',
            'dori_kg' => 'nullable|numeric|min:0',

            // Personnel / Teams
            'jala_bharai_team' => 'nullable|string|max:255',
            'g_button_team' => 'nullable|string|max:255',
            'gathi_person' => 'nullable|string|max:255',
            'old_jala_khola_team' => 'nullable|string|max:255',
            'rs_set' => 'nullable|string|max:255',
            'raj_inner' => 'nullable|string|max:255',
            'springInner' => 'nullable|string|max:255',
            'tubeInner' => 'nullable|string|max:255',
            'kaccha_pakka_team' => 'nullable|string|max:255',
            'kaccha_pakka_date' => 'nullable|date',

            // Dori Calculation
            'dori_type_dropdown' => 'nullable|in:jaadi,patli',
            'meter' => 'nullable|numeric|min:0',
            'br_tar' => 'nullable|numeric|min:0',
            'new_tar' => 'nullable|numeric|min:0',
            'total_tar_new' => 'nullable|numeric|min:0',
            'kg_1' => 'nullable|numeric|min:0',
            'kg_2' => 'nullable|numeric|min:0',
            'total_kg' => 'nullable|numeric|min:0',
            'hidden_total_kg' => 'nullable|numeric|min:0',
            'jalabarai_value' => 'nullable|string|max:255',

            // Textareas
            'button_texna' => 'nullable|string|max:1000',
            'guide_board_texna' => 'nullable|string|max:2000',
            'remark' => 'nullable|string|max:2000',

            // Checklist
            'checklist' => 'nullable|array',
            'checklist.*' => 'nullable|string|in:FIBER,DORI CUT,GATHI,JALA BHARAI,RSS,GB & BTN,FRAME SET + ACCESSORIES',

            // Grand Total
            'grand_total' => 'nullable|numeric|min:0',

            // Gathi Items (simple table) - Array validation
            'gathi_items' => 'nullable|array|max:4',
            'gathi_items.*.gathi_person' => 'nullable|string|max:255',
            'gathi_items.*.no' => 'nullable|integer|min:0',
            'gathi_items.*.no_of_gat' => 'nullable|integer|min:0',

            // Detailed Gathi Items - Array validation
            'production_gathi_items' => 'nullable|array|max:5',
            'production_gathi_items.*.border_tar' => 'nullable|string|max:255',
            'production_gathi_items.*.to_tar' => 'nullable|string|max:255',
            'production_gathi_items.*.gathi_types_a' => 'nullable|string|max:255',
            'production_gathi_items.*.gathi_types_b' => 'nullable|string|max:255',
            'production_gathi_items.*.height_a' => 'nullable|string|max:255',
            'production_gathi_items.*.height_b' => 'nullable|string|max:255',
            'production_gathi_items.*.tar_qty_a' => 'nullable|string|max:255',
            'production_gathi_items.*.tar_qty_b' => 'nullable|string|max:255',
            'production_gathi_items.*.colour1' => 'nullable|string|max:255',
            'production_gathi_items.*.colour2' => 'nullable|string|max:255',
        ], [
            // Custom error messages
            'pattern_File.mimes' => 'Pattern file must be a PDF, JPG, JPEG, or PNG file.',
            'pattern_File.max' => 'Pattern file size must not exceed 5MB.',
            'checklist.*.in' => 'Invalid checklist item selected.',
            'gathi_items.max' => 'Maximum 4 gathi items allowed.',
            'production_gathi_items.max' => 'Maximum 5 production gathi items allowed.',
        ]);

        DB::beginTransaction();

        try {
            $projectData = $validatedData;
            unset($projectData['gathi_items'], $projectData['production_gathi_items']);
            $project = ProductionCard::findOrFail($id);
            if ($request->hasFile('pattern_File')) {
                if ($project->pattern_File && Storage::disk('public')->exists($project->pattern_File)) {
                    Storage::disk('public')->delete($project->pattern_File);
                }
                $file = $request->file('pattern_File');
                $filename = time() . '_' . $file->getClientOriginalName();
                $path = $file->storeAs('pattern_files', $filename, 'public');
                $projectData['pattern_File'] = $path;
            } else {
                $projectData['pattern_File'] = $project->pattern_File;
            }
            if (!empty($validatedData['del_date'])) {
                $projectData['status'] = 'complate';
            } else {
                $projectData['status'] = 'side file';
            }
            if (isset($projectData['checklist']) && is_array($projectData['checklist'])) {
                $projectData['checklist'] = array_values(array_filter($projectData['checklist']));
            }
            $updated = $project->update($projectData);
            if (!$updated) {
                throw new \Exception('Failed to update main project record');
            }
            $project->gathis()->delete();
            if (!empty($validatedData['gathi_items'])) {
                foreach ($validatedData['gathi_items'] as $item) {
                    if (!empty(array_filter($item))) {
                        $project->gathis()->create([
                            'gathi_person' => $item['gathi_person'] ?? null,
                            'no' => $item['no'] ?? null,
                            'no_of_gat' => $item['no_of_gat'] ?? null,
                        ]);
                    }
                }
            }
            $project->items()->delete();
            if (!empty($validatedData['production_gathi_items'])) {
                foreach ($validatedData['production_gathi_items'] as $index => $item) {
                    $hasData = false;
                    foreach ($item as $value) {
                        if (!empty($value) && trim($value) !== '') {
                            $hasData = true;
                            break;
                        }
                    }
                    if ($hasData) {
                        $project->items()->create([
                            'border_tar' => $item['border_tar'] ?? null,
                            'to_tar' => $item['to_tar'] ?? null,
                            'gathi_types_a' => $item['gathi_types_a'] ?? null,
                            'gathi_types_b' => $item['gathi_types_b'] ?? null,
                            'height_a' => $item['height_a'] ?? null,
                            'height_b' => $item['height_b'] ?? null,
                            'tar_qty_a' => $item['tar_qty_a'] ?? null,
                            'tar_qty_b' => $item['tar_qty_b'] ?? null,
                            'colour1' => $item['colour1'] ?? null,
                            'colour2' => $item['colour2'] ?? null,
                            'order_index' => $index,
                        ]);
                    }
                }
            }
            DB::commit();
            return redirect()->back()->with([
                'success' => 'Data successfully updated!',
                'updated_id' => $project->id
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            DB::rollback();
            throw $e;
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            DB::rollback();
            return redirect()->back()->with('error', 'Project not found!');
        } catch (\Exception $e) {
            DB::rollback();
            Log::error('Project update failed: ' . $e->getMessage());
            Log::error('Stack trace: ' . $e->getTraceAsString());
            return redirect()->back()
                ->withInput()
                ->with('error', 'Something went wrong. Please try again. Error: ' . $e->getMessage());
        }
    }
}
