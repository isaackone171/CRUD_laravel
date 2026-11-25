<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AgentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $agents = Agent::orderBy('nom')->paginate(5);
        return view('agents.index', compact('agents'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('agents.create');
    }

    /**
     * Store a newly created resource in storage.
     */
        public function store(Request $request)
        {
            
        $data = $request->validate([
                'nom'           => 'required|string|max:100',
                'prenom'        => 'required|string|max:100',
                'departement' =>'required|string|max:20',
                'telephone'   => 'required|string|max:20',
                'email'         => 'required|email|unique:agents,email',
                
            ]);

            Agent::create($data);
            
            return redirect()->route('agents.index')
                            ->with('success','Agent ajouté avec succès');
        }

    public function edit(Agent $agent)
    {
        return view('agents.edit', compact('agent'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Agent $agent)
    {
       $data = $request->validate([
            'nom'           => 'required|string|max:100',
            'prenom'        => 'required|string|max:100',
            'departement' =>'required|string|max:20',
            'telephone'     => 'nullable|string|max:20',
            'email'         => ['required', 'email', Rule::unique('agents', 'email')->ignore($agent->id)],
        ]);

        $agent->update($data);

        return redirect()->route('agents.index')
                         ->with( 'success','Agent modifié avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Agent $agent)
    {
          $agent->delete();

        return redirect()->route('agents.index')
                         ->with('success', 'Agent supprimé avec succès.');
    }
}
