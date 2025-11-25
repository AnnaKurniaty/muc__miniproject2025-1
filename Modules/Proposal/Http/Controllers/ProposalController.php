<?php

namespace Modules\Proposal\Http\Controllers;

use App\Models\marketing\ProposalModel;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class ProposalController extends Controller
{
    public function index()
    {
        $proposal = ProposalModel::get();
        return view('proposal::index', compact('proposal'));
    }

    public function create()
    {
        return view('proposal::create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'number' => 'required|string|max:255|unique:mysql_marketing.proposal,number',
            'description' => 'required|string',
            'year' => 'required|integer|min:1900|max:' . (date('Y') + 10),
            'status' => 'required|in:pending,agreed,rejected',
        ]);

        ProposalModel::create([
            'number' => $request->number,
            'description' => $request->description,
            'year' => $request->year,
            'status' => $request->status,
        ]);

        return redirect()->route('proposal.index')->with('success', 'Proposal created successfully.');
    }
}
