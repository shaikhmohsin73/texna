<?php

namespace App\Http\Controllers;

use App\Models\Pattern;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PatternController extends Controller
{
    public function index()
    {
        $patterns = Pattern::latest()->get();
        return view('patterns.index', compact('patterns'));
    }

    public function create()
    {
        return view('patterns.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'pattern_no'   => 'required',
            'pattern_file' => 'required|mimes:pdf|max:2048',
        ]);

        $filePath = $request->file('pattern_file')
            ->store('patterns', 'public');

        Pattern::create([
            'pattern_no'   => $request->pattern_no,
            'pattern_file' => $filePath,
        ]);

        return redirect('/patterns')->with('success', 'Pattern added');
    }

    // EDIT FORM
    public function edit($id)
    {
        $pattern = Pattern::findOrFail($id);
        return view('patterns.edit', compact('pattern'));
    }

    // UPDATE
    public function update(Request $request, $id)
    {
        $pattern = Pattern::findOrFail($id);

        $request->validate([
            'pattern_no'   => 'required',
            'pattern_file' => 'nullable|mimes:pdf|max:2048',
        ]);

        if ($request->hasFile('pattern_file')) {
            Storage::disk('public')->delete($pattern->pattern_file);

            $pattern->pattern_file = $request->file('pattern_file')
                ->store('patterns', 'public');
        }

        $pattern->pattern_no = $request->pattern_no;
        $pattern->save();

        return redirect('/patterns')->with('success', 'Pattern updated');
    }

    // DELETE
    public function destroy($id)
    {
        $pattern = Pattern::findOrFail($id);
        Storage::disk('public')->delete($pattern->pattern_file);
        $pattern->delete();

        return redirect('/patterns')->with('success', 'Pattern deleted');
    }
}
