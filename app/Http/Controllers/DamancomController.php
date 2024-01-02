<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Damancom;
use App\Models\societe;

class DamancomController extends Controller
{
    public function index()
    {
        
        $damancoms =Damancom::All();

        return view('damancoms.index', compact('damancoms'));
    }

    // public function show($id)
    // {
    //     $damancom = Damancom::find($id);
    
    //     if (!$damancom) {
    //         abort(404); 
    //     }
    
    //     return view('damancoms.show', compact('damancom'));
    // }

    public function create()
    {
        $societes = societe::All(); 

        return view('damancoms.create', compact('societes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'login' => 'required',
            'password' => 'required',
            'societe_id' => 'required',
        ]);
    
            $newDamanCom = new Damancom();

            $newDamanCom->login = $request->input('login');
            $newDamanCom->password = $request->input('password');
            $newDamanCom->societe_id =$request->input('societe_id');
    
            $newDamanCom->save();
        return redirect()->route('damancoms.index');
    }
    
 
    public function edit($id)
    {
        $societes = societe::All(); 

        $damancom = Damancom::findOrFail($id);
        return view('damancoms.edit', compact('damancom','societes'));
    }

    public function update(Request $request, $id)
    {
        $damancom = Damancom::findOrFail($id);

        $request->validate([
            'login' => 'required',
            'password' => 'required',
            'societe_id' => 'required',
        ]);
    
        $damancom->update($request->all());

        return redirect()->route('damancoms.index');
    }

    public function destroy($id)
    {
        $damancom = Damancom::findOrFail($id);
        $damancom->delete();

        return redirect()->route('damancoms.index')->with('success', 'Associé deleted successfully');
    }

    public function search(Request $request)
    {
        $search = $request->search;
    
        $damancoms = Damancom::with('societe')
            ->where(function ($query) use ($search) {
                $query->where('login', 'like', "%$search%")
                    ->orWhere('password', 'like', "%$search%");
            
                $query->orWhereHas('societe', function ($subquery) use ($search) {
                    $subquery->where('name', 'like', "%$search%");
                });
            })
            ->get();
    
        return view('damancoms.index', compact('damancoms', 'search'));
    }
 
        } 
    