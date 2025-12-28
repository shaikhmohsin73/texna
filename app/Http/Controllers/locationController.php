<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LocationController extends Controller
{
    public function admin()
    {
        $employees = Location::with('employee')->orderBy('created_at', 'desc')->get();
        return view('admin', compact('employees'));
    }

    public function index()
    {
        $locations = Location::with('employee')->paginate(10);

        return response()->json($locations);
        // return view('locations.index', compact('locations'));
    }

    public function employee()
    {
        $employees = Employee::with('locations')->paginate(10);

        return response()->json($employees);
        // return view('employees.index', compact('employees'));
    }

    public function employeestore(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required|string|max:255',
            'mobile_no' => 'required|digits_between:10,15|unique:employees,mobile_no',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'role' => 'required|string|max:100',
            'status' => 'required|integer',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors(),
            ], 422);
        }
        $photoPath = null;
        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('employees', 'public');
        }
        $employee = Employee::create([
            'username' => $request->username,
            'mobile_no' => $request->mobile_no,
            'photo' => $photoPath,
            'role' => $request->role,
            'status' => $request->status,
        ]);

        return response()->json([
            'status' => true,
            'message' => 'Employee added successfully',
            'data' => $employee,
        ], 201);
    }

    public function employeelocation(Request $request)
    {
        // $employee = Auth::user();
        $employee = Employee::where('id', 1)->first();
        if (! $employee) {
            return response()->json([
                'status' => false,
                'message' => 'Unauthenticated',
            ], 401);
        }
        if ($employee->status != 1) {
            return response()->json([
                'status' => false,
                'message' => 'Inactive employee cannot save location',
            ], 403);
        }
        $request->validate([
            'lang' => 'required|numeric',
            'long' => 'required|numeric',
        ]);
        $location = Location::create([
            'e_id' => $employee->id,
            'lang' => $request->lang,
            'long' => $request->long,
        ]);

        return response()->json([
            'status' => true,
            'message' => 'Location saved successfully',
            'data' => $location,
        ], 201);
    }
}
