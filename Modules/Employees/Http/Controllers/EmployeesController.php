<?php

namespace Modules\Employees\Http\Controllers;

use App\Models\hrd\EmployeesModel;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class EmployeesController extends Controller
{
    public function index()
    {
        $employees = EmployeesModel::get();
        return view('employees::index', compact('employees'));
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:active,inactive',
        ]);

        $employee = EmployeesModel::findOrFail($id);
        $employee->update(['status' => $request->status]);

        return redirect()
            ->route('employees.index')
            ->with('success', 'Employee status updated successfully.');
    }
}
