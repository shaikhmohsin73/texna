<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\MarketingImport;
use App\Models\Marketing;
use Maatwebsite\Excel\Facades\Excel;

class MarketingController extends Controller
{
    public function marketing()
    {
        return view('marketing.index');
    }

    public function getMarketingData(Request $request)
    {
        $search = $request->get('search', '');
        $perPage = $request->get('per_page', 10);
        $query = Marketing::select(
            'id',
            'date',
            'naam',
            'company_name',
            'number',
            'address',
            'current_machine',
            'new_machine',
            'jala_type',
            'image_name'
        );
        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('naam', 'like', "%{$search}%")
                    ->orWhere('company_name', 'like', "%{$search}%")
                    ->orWhere('number', 'like', "%{$search}%")
                    ->orWhere('jala_type', 'like', "%{$search}%");
            });
        }
        $data = $query->orderBy('id', 'desc')->paginate($perPage);
        // dd($data);
        return response()->json($data);
    }

    public function marketing_create()
    {
        return view('marketing.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'date' => 'required|date',
            'naam' => 'nullable|string|max:255',
            'company_name' => 'nullable|string|max:255',
            'number' => 'nullable|string|max:20',
            'address' => 'nullable|string',
            'current_machine' => 'nullable|string|max:255',
            'new_machine' => 'nullable|string|max:255',
            'jala_type' => 'nullable|string|max:255',
            'image_name' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);
        if ($request->hasFile('image_name')) {
            $image = $request->file('image_name');
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/marketing'), $imageName);
            $validated['image_name'] = 'uploads/marketing/' . $imageName;
        }
        Marketing::create($validated);
        return redirect()->route('marketing')->with('success', 'Marketing data added successfully!');
    }

    public function edit($id)
    {
        $marketing = Marketing::find($id);
        if (!$marketing) {
            return redirect()
                ->route('marketing')
                ->with('error', 'Record not found!');
        }
        return view('marketing.edit', compact('marketing'));
    }


    public function update(Request $request, $id)
    {
        $marketing = Marketing::findOrFail($id);

        $validated = $request->validate([
            'date' => 'required|date',
            'naam' => 'nullable|string|max:255',
            'company_name' => 'nullable|string|max:255',
            'number' => 'nullable|string|max:20',
            'address' => 'nullable|string',
            'current_machine' => 'nullable|string|max:255',
            'new_machine' => 'nullable|string|max:255',
            'jala_type' => 'nullable|string|max:255',
            'image_name' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        if ($request->hasFile('image_name')) {
            if ($marketing->image_name && file_exists(public_path($marketing->image_name))) {
                unlink(public_path($marketing->image_name));
            }

            $image = $request->file('image_name');
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/marketing'), $imageName);

            $validated['image_name'] = 'uploads/marketing/' . $imageName;
        }

        $marketing->update($validated);

        return redirect()->route('marketing')
            ->with('success', 'Marketing data updated successfully!');
    }


    public function destroy($id)
    {
        $marketing = Marketing::findOrFail($id);
        $marketing->delete();
        return redirect()->route('marketing')->with('success', 'Marketing data deleted successfully!');
    }
}
