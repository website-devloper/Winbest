<?php

namespace App\Http\Controllers;
use App\Models\Regus;
use App\Models\societe;

use Illuminate\Http\Request;

class RegusController extends Controller
{
    public function index()
    {
        
        $reguses =Regus::All();

        return view('regus.index', compact('reguses'));
    }

    // public function show($id)
    // {
    //     $impot = regus::find($id);
    
    //     if (!$impot) {
    //         abort(404); 
    //     }
    
    //     return view('impots.show', compact('impot'));
    // }

    public function create()
    {
        $societes = societe::All(); 

        return view('regus.create', compact('societes'));
    }

    public function store(Request $request)
    {
        $request->validate([
          
            'login' => 'required',
            'password' => 'required',
            'societe_id' => 'required',
        ]);

        Regus::create($request->all());

        return redirect()->route('regus.index')->with('success', 'regus created successfully.');
    }
 
    public function edit($id)
    {
        $societes = societe::All(); 

        $regus =Regus::findOrFail($id);
        return view('regus.edit', compact('regus','societes'));
    }

    public function update(Request $request, $id)
    {
        $Regus = Regus::findOrFail($id);

        $request->validate([
            'email' => 'required',
            'password'=>'required',
            'societe_id' => 'required',
        ]);

        $Regus->update($request->all());

        return redirect()->route('regus.index')->with('success', 'regus updated successfully');
    }

    public function destroy($id)
    {
        $impot = Regus::findOrFail($id);
        $impot->delete();

        return redirect()->route('regus.index')->with('success', 'regus deleted successfully');
    }

    public function search(Request $request)
    {
        $search = $request->search;
    
        $reguses = Regus::with('societe')
            ->where(function ($query) use ($search) {
                $query->where('login', 'like', "%$search%")
                    ->orWhere('password', 'like', "%$search%");
                
                $query->orWhereHas('societe', function ($subquery) use ($search) {
                    $subquery->where('name', 'like', "%$search%");
                });
            })
            ->get();
    
        return view('regus.index', compact('reguses', 'search'));
    }
    
}
