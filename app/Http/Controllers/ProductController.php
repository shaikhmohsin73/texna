<?php

namespace App\Http\Controllers;

use App\Models\ProductionCard;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function form()
    {
        return view('formlist');
    }

    public function formData()
    {
        $data = ProductionCard::select(
            'id',
            'bill_no',
            'jala_no',
            'firm_name',
            'mo_no',
            'address',
            'f_reed',
            't_tar',
            'jala_no',
            'del_date',
            'status'
        )
            ->latest()
            ->get();

        return response()->json($data);
    }
    public function form_create()
    {
        return view('form');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
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
            'bharai' => 'nullable|string|max:255',
            'pana' => 'nullable|string|max:255',
            't_tar' => 'nullable|string|max:255',

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

            // Textareas
            'button_texna' => 'nullable|string',
            'guide_board_texna' => 'nullable|string',
            'remark' => 'nullable|string',

            // Checklist
            'checklist' => 'nullable|array',

            // Grand Total
            'grand_total' => 'nullable|numeric',

            // Gathi Items
            'gathi_items' => 'nullable|array',
            'gathi_items.*.border_tar' => 'nullable|string|max:255',
            'gathi_items.*.to_tar' => 'nullable|string|max:255',
            'gathi_items.*.height_a' => 'nullable|string|max:255',
            'gathi_items.*.height_b' => 'nullable|string|max:255',
            'gathi_items.*.tar_qty_a' => 'nullable|string|max:255',
            'gathi_items.*.tar_qty_b' => 'nullable|string|max:255',
        ]);
        DB::beginTransaction();
        try {
            $projectData = $validatedData;
            unset($projectData['gathi_items']);
            if (isset($projectData['checklist'])) {
                $projectData['checklist'] = $projectData['checklist'];
            }
            $project = ProductionCard::create($projectData);
            if ($request->has('gathi_items')) {
                foreach ($request->gathi_items as $item) {
                    if (! empty($item['border_tar']) || ! empty($item['to_tar'])) {
                        $project->items()->create($item);
                    }
                }
            }
            DB::commit();

            return redirect()->back()->with('success', 'Data successfully saved!');
        } catch (\Exception $e) {
            DB::rollback();
            dd($e->getMessage());

            return redirect()->back()->with('error', 'Something went wrong: ' . $e->getMessage());
        }
    }

    public function edit($id)
    {
        $data = ProductionCard::with('items')->findOrFail($id);
        return view('formedit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
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
            'bharai' => 'nullable|string|max:255',
            'pana' => 'nullable|string|max:255',
            't_tar' => 'nullable|string|max:255',

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

            // Teams
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

            // Textareas
            'button_texna' => 'nullable|string',
            'guide_board_texna' => 'nullable|string',
            'remark' => 'nullable|string',

            // Checklist
            'checklist' => 'nullable|array',

            // Total
            'grand_total' => 'nullable|numeric',

            // Gathi Items
            'gathi_items' => 'nullable|array',
            'gathi_items.*.border_tar' => 'nullable|string|max:255',
            'gathi_items.*.to_tar' => 'nullable|string|max:255',
            'gathi_items.*.height_a' => 'nullable|string|max:255',
            'gathi_items.*.height_b' => 'nullable|string|max:255',
            'gathi_items.*.tar_qty_a' => 'nullable|string|max:255',
            'gathi_items.*.tar_qty_b' => 'nullable|string|max:255',
        ]);
        DB::beginTransaction();
        try {
            $project = ProductionCard::findOrFail($id);
            $projectData = $validatedData;
            unset($projectData['gathi_items']);
            $project->update($projectData);
            $project->items()->delete();
            if (!empty($validatedData['gathi_items'])) {
                foreach ($validatedData['gathi_items'] as $item) {
                    if (!empty($item['border_tar']) || !empty($item['to_tar'])) {
                        $project->items()->create($item);
                    }
                }
            }

            DB::commit();
            return redirect()->back()->with('success', 'Production Card Updated Successfully!');
        } catch (\Exception $e) {
            DB::rollback();
            dd($e->getMessage());
        }
    }

    public function print($id)
    {
       $data = ProductionCard::with('items')->findOrFail($id);
        return view('print', compact('data'));
    }

    public function pdf($id)
    {
         $data = ProductionCard::with('items')->findOrFail($id);
        $pdf = PDF::loadView('print', compact('data'));
        return $pdf->download('production_card_' . $data->id . '.pdf');
    }
}
