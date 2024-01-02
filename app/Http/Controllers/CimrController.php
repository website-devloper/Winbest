<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cimr;
use App\Models\societe;
class CimrController extends Controller
{
    public function index()
    {
        
        $cimrs =Cimr::All();

        return view('cimrs.index', compact('cimrs'));
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

        return view('cimrs.create', compact('societes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'login' => 'required',
            'password' => 'required',
            'N_Adherant'=>'required',
            'societe_id' => 'required',
        ]);
    
            $newCimr = new Cimr();

            $newCimr->login = $request->input('login');
            $newCimr->password = $request->input('password');
            $newCimr->N_Adherant = $request->input('N_Adherant');
            $newCimr->societe_id =$request->input('societe_id');
    
            $newCimr->save();
        return redirect()->route('cimr.index');
    }
    
 
    public function edit($id)
    {
        $societes = societe::All(); 

        $cimr = Cimr::findOrFail($id);
        return view('cimrs.edit', compact('cimr','societes'));
    }

    public function update(Request $request, $id)
    {
        $Cimr = Cimr::findOrFail($id);

        $request->validate([
            'login' => 'required',
            'password' => 'required',
            'N_Adherant'=>'required',
            'societe_id' => 'required',
        ]);
    
        $Cimr->update($request->all());

        return redirect()->route('cimr.index');
    }

    public function destroy($id)
    {
        $cimr = Cimr::findOrFail($id);
        $cimr->delete();

        return redirect()->route('cimr.index')->with('success', 'Associé deleted successfully');
    }

    public function search(Request $request)
    {
        $search = $request->search;
    
        $cimrs = Cimr::with('societe')
            ->where(function ($query) use ($search) {
                $query->where('login', 'like', "%$search%")
                    ->orWhere('password', 'like', "%$search%")
                    ->orWhere('N_Adherant', 'like', "%$search%");

                $query->orWhereHas('societe', function ($subquery) use ($search) {
                    $subquery->where('name', 'like', "%$search%");
                });
            })
            ->get();
    
        return view('cimrs.index', compact('cimrs', 'search'));
    }
}
