<?php

namespace Modules\Serviceused\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\marketing\ServiceusedModel;
use App\Models\marketing\ProposalModel;

class ServiceusedController extends Controller
{

    public function index()
    {
        $serviceuseds = ServiceusedModel::with('proposal', 'timesheets')->get();
        return view('serviceused::index', compact('serviceuseds'));
    }

    public function create()
    {
        $proposal = ProposalModel::all();
        return view('serviceused::create', compact('proposal'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'proposal_id' => 'required|exists:mysql_marketing.proposal,id',
            'service_name' => 'required|string|max:255',
            'status' => 'required|in:pending,ongoing,done',
        ]);

        ServiceusedModel::create($request->all());

        return redirect()->route('serviceused.index')->with('success', 'Serviceused created successfully.');
    }

    public function show($id)
    {
        return view('serviceused::show');
    }

    public function edit($id)
    {
        $serviceused = ServiceusedModel::findOrFail($id);
        $proposal = ProposalModel::all();
        return view('serviceused::edit', compact('serviceused', 'proposal'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'proposal_id' => 'required|exists:mysql_marketing.proposal,id',
            'service_name' => 'required|string|max:255',
            'status' => 'required|in:pending,ongoing,done',
        ]);

        $serviceused = ServiceusedModel::findOrFail($id);
        $serviceused->update($request->all());

        return redirect()->route('serviceused.index')->with('success', 'Serviceused updated successfully.');
    }

    public function destroy($id)
    {
        $serviceused = ServiceusedModel::findOrFail($id);
        $serviceused->delete();

        return redirect()->route('serviceused.index')->with('success', 'Serviceused deleted successfully.');
    }
}
