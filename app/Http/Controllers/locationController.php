<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Location;
use App\Models\ProductionCard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

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
        $totalEmployees = Employee::count();
        $activeEmployees = Employee::where('status', 1)->count();
        return view('employee', [
            'totalEmployees'  => $totalEmployees,
            'activeEmployees' => $activeEmployees,
        ]);
    }

    public function employeeAjax(Request $request)
    {
        $query = Employee::query();
        if ($request->search) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('username', 'like', "%$search%")
                    ->orWhere('mobile_no', 'like', "%$search%");
                if (strtolower($search) === 'active') {
                    $q->orWhere('status', 1);
                } elseif (strtolower($search) === 'inactive') {
                    $q->orWhere('status', 0);
                }
            });
        }
        $employees = $query->paginate(10);
        return response()->json([
            'employees' => $employees
        ]);
    }

    public function updateApprovalStatus(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:employees,id',
            'approval_status' => 'required|in:pending,approved,cancelled',
        ]);
        $admin = Auth::guard('admin')->user();
        $adminName = $admin->name ?? 'Admin';
        $employee = Employee::findOrFail($request->id);
        $oldStatus = $employee->approval_status;
        $employee->approval_status = $request->approval_status;
        $employee->save();
        sendTelegramMessage(
            "📝 <b>Employee Approval Status Changed</b>\n\n" .
                "👤 <b>Admin:</b> $adminName\n" .
                "🧑‍💼 <b>Employee:</b> {$employee->username}\n" .
                "🔄 <b>Old Status:</b> $oldStatus\n" .
                "✅ <b>New Status:</b> {$request->approval_status}\n" .
                "⏰ <b>Time:</b> " . now()->format('d-m-Y H:i:s')
        );
        return response()->json([
            'status' => true,
            'message' => 'Approval status updated successfully'
        ]);
    }

    public function employeeregister(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username'   => 'required|string|max:255',
            'email'      => 'required|string|email|unique:employees,email',
            'mobile_no'  => 'required|digits_between:10,15|unique:employees,mobile_no',
            'photo'      => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'role'       => 'required|string|max:100',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors(),
            ], 422);
        }

        // 📸 Upload photo
        $photoPath = null;
        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('employees', 'public');
        }

        // 🧑‍💼 Create employee
        $employee = Employee::create([
            'username'        => $request->username,
            'email'           => $request->email,
            'mobile_no'       => $request->mobile_no,
            'photo'           => $photoPath,
            'role'            => $request->role,
            'status'          => 0,
            'approval_status' => 'pending',
        ]);

        // 🔔 Telegram Notification (NO ADMIN)
        sendTelegramMessage(
            "🆕 <b>New Employee Registered</b>\n\n" .
                "🧑‍💼 <b>Username:</b> {$employee->username}\n" .
                "📧 <b>Email:</b> {$employee->email}\n" .
                "📱 <b>Mobile:</b> {$employee->mobile_no}\n" .
                "🎭 <b>Role:</b> {$employee->role}\n" .
                "🟡 <b>Status:</b> Pending Approval\n" .
                "⏰ <b>Time:</b> " . now()->format('d-m-Y H:i:s')
        );

        return response()->json([
            'status'  => true,
            'message' => 'Employee registered successfully, waiting for approval',
            'employee_id' => $employee->id,
            'data' => $employee,
        ], 201);
    }

    public function employeelocation(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'e_id' => 'required|exists:employees,id',
                'lang' => 'required|numeric',
                'long' => 'required|numeric',
            ]);
            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'Validation Error',
                    'errors' => $validator->errors()
                ], 422);
            }
            $employee = Employee::find($request->e_id);
            if (!$employee) {
                return response()->json([
                    'status' => false,
                    'message' => 'Employee not found'
                ], 404);
            }
            if ($employee->approval_status === 'pending') {
                return response()->json([
                    'status' => false,
                    'message' => 'Admin ne abhi aapka account approve nahi kiya hai',
                ], 403);
            }
            if ($employee->approval_status === 'cancelled') {
                return response()->json([
                    'status' => false,
                    'message' => 'Aap hamari company ke employee nahi ho',
                ], 403);
            }
            if ($employee->status != 1) {
                return response()->json([
                    'status' => false,
                    'message' => 'Inactive employee location save nahi kar sakta',
                ], 403);
            }
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
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Something went wrong',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

   
}
