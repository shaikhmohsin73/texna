<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\PartyDetailsImport;
use App\Models\PartyDetail;
use Maatwebsite\Excel\Facades\Excel;

class PartyImportController extends Controller
{
    public function party_name()
    {
        return view('party_list');
    }

    public function create()
    {
        return view('party_create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'party_name' => 'required|string|max:255',
            'mobile_no'  => 'required|digits:10',
            'address'    => 'nullable|string',
        ]);
        PartyDetail::create([
            'party_name' => $request->party_name,
            'mobile_no'  => $request->mobile_no,
            'address'    => $request->address,
        ]);
        return redirect()->route('party_name')
            ->with('success', 'Party added successfully!');
    }

    public function edit($id)
    {
        $party = PartyDetail::findOrFail($id);
        return view('party_edit', compact('party'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'party_name' => 'required|string|max:255',
            'mobile_no'  => 'required|digits:10',
            'address'    => 'nullable|string',
        ]);
        $party = PartyDetail::findOrFail($id);
        $party->update([
            'party_name' => $request->party_name,
            'mobile_no'  => $request->mobile_no,
            'address'    => $request->address,
        ]);
        return redirect()->route('party_name')
            ->with('success', 'Party updated successfully!');
    }

    public function destroy($id)
    {
        $party = PartyDetail::findOrFail($id);
        $party->delete();
        return response()->json([
            'success' => true,
            'message' => 'Party deleted successfully!'
        ]);
    }


    public function getPartyList(Request $request)
    {
        $search = $request->search;
        $data = PartyDetail::query()
            ->when($search, function ($query, $search) {
                $query->where('party_name', 'like', "%$search%")
                    ->orWhere('sr_no', 'like', "%$search%");
            })
            ->orderBy('id', 'desc')
            ->paginate(10);
        return response()->json($data);
    }

    public function importget()
    {
        return view('importget');
    }
    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls'
        ]);

        Excel::import(new PartyDetailsImport, $request->file('file'));

        return back()->with('success', 'Excel data successfully imported (duplicates skipped)');
    }
}
