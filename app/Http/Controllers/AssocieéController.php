<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Associé;
use App\Models\societe;

class AssocieéController extends Controller
{


    public function index()
    {
           $associés = Associé::join('societes', 'associés.societe_id', '=', 'societes.id')
                        ->where('associés.role', 'associé')
                        ->select('associés.*', 'societes.name as societe_name')
                        ->get();
        return view('associes.index', compact('associés'));
    }

    public function create()
    {
        $societes=societe::all();
        return view('associes.create', compact("societes"));
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:associés',
            'cin' => 'required',
            'role' => 'required',
            'societe' => 'required|string|exists:societes,name', 
        ]);
    
        $societe = Societe::where('name', $request->input('societe'))->first();
    
        if ($societe) {
            $newAssocié = new Associé([
                'fullName' => $request->input('name'),
                'email' => $request->input('email'),
                'cin' => $request->input('cin'),
                'role' => $request->input('role'),
                'societe_id' => $societe->id,
            ]);
    
            $newAssocié->save();
            
            return redirect()->route('associes.index');
        }
    
        return redirect()->back()->with('error', 'Societe not found.');
    }
    
    
    public function show($id)
    {
        $associe = Associé::with('societe')->findOrFail($id);
        return view('associes.show', compact('associe'));
    }

    public function cc($id)
    {

        return view('associes.cc');
    }

    public function edit($id)
    {
        $societes=societe::all();

        $associé = Associé::findOrFail($id);
        return view('associes.edit', compact('associé','societes'));
    }

    public function update(Request $request, $id)
    {
        $associé = Associé::findOrFail($id);
    
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:associés,email,' . $id,
            'cin' => 'required',
            'role' => 'required',
            'societe' => 'required|string|exists:societes,name',
        ]);
    
        $societe = Societe::where('name', $request->input('societe'))->first();
    
        if ($societe) {
            $associé->fullName = $request->input('name');
            $associé->email = $request->input('email');
            $associé->cin = $request->input('cin');
            $associé->role = $request->input('role');
            $associé->societe_id = $societe->id;
    
            $associé->save();
    
            return redirect()->route('associes.index');
        }
    
        return redirect()->back()->with('error', 'Societe not found.');
    }
    
    

    public function destroy($id)
    {
        $associé = Associé::findOrFail($id);
        $associé->delete();

        return redirect()->route('associes.index')->with('success', 'Associé deleted successfully');
    }
 
}
