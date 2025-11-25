<?php

namespace Modules\Timesheet\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class TimesheetController extends Controller
{
    public function index()
    {
        $timesheets = \App\Models\activity\TimesheetModel::with(['serviceused.proposal', 'employee'])->get();
        return view('timesheet::index', compact('timesheets'));
    }
}
