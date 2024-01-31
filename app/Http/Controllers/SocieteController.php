<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Societe;
use App\Models\Damancom;

class SocieteController extends Controller
{
    public function index()
    {
        $societes = Societe::with('associés', 'gerants')->paginate(5);

        $societes->each(function ($societe) {
        $societe->nbrAss = optional($societe->associés)->count() ?? 0;
        $societe->nbrGer = optional($societe->gerants)->count() ?? 0;

        $societe->associesInfo = $societe->associés;
        $societe->gerantsInfo = $societe->gerants;

    });
        return view('societes.index', compact('societes'));
    }

    public function create()
    {
        return view('societes.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'formeJuri' => 'required',
            'siegeSocial' => 'required',
            'capital' => 'required',
            'activiteprincipal' => 'required',
            'RC' => 'required',
            'patente' => 'required',
            'IF' => 'required',
            'CNSS' => 'required',
            'ICE' => 'required',
            'RIB' => 'required',
            'dateexploitation' => 'required|date',
            'dateDbDexploitatiion' => 'required|date',
         ]);

         $newsociete = new Societe();
    
         $newsociete->name = $request->input('name');
         $newsociete->formeJuri = $request->input('formeJuri');
         $newsociete->siegeSocial = $request->input('siegeSocial');
         $newsociete->capital = $request->input('capital');
         $newsociete->activiteprincipal = $request->input('activiteprincipal');
         $newsociete->RC = $request->input('RC');
         $newsociete->patente = $request->input('patente');
         $newsociete->IF = $request->input('IF');
         $newsociete->CNSS = $request->input('CNSS');
         $newsociete->ICE = $request->input('ICE');
         $newsociete->RIB = $request->input('RIB');
         $newsociete->dateexploitation = $request->input('dateexploitation');
         $newsociete->dateDbDexploitatiion = $request->input('dateDbDexploitatiion');

        $newsociete->save();

        toastrNotification('success', 'Societe created successfully');

        return redirect()->route('societes.index');
    }
    
    public function edit($id)
{
    $societe = Societe::findOrFail($id);
    return view('societes.edit', compact('societe'));
}

public function update(Request $request, $id)
{
    $societes = Societe::findOrFail($id);
    
    $request->validate([
        'name' => 'required',
        'formeJuri' => 'required|unique:societes,formeJuri,' . $id,
        'siegeSocial' => 'required',
        'capital' => 'required',
        'activiteprincipal' => 'required',
        'RC' => 'required',
        'patente' => 'required',
        'IF' => 'required',
        'CNSS' => 'required',
        'ICE' => 'required',
        'RIB' => 'required',
        'dateexploitation' => 'required|date',
        'dateDbDexploitatiion' => 'required|date',
     ]);

    $societes->name = $request->input('name');
    $societes->formeJuri = $request->input('formeJuri');
    $societes->siegeSocial = $request->input('siegeSocial');
    $societes->capital = $request->input('capital');
    $societes->activiteprincipal = $request->input('activiteprincipal');
    $societes->RC = $request->input('RC');
    $societes->patente = $request->input('patente');
    $societes->IF = $request->input('IF');
    $societes->CNSS = $request->input('CNSS');
    $societes->ICE = $request->input('ICE');
    $societes->RIB = $request->input('RIB');
    $societes->dateexploitation = $request->input('dateexploitation');
    $societes->dateDbDexploitatiion = $request->input('dateDbDexploitatiion');

    $societes->save();
    toastrNotification('success', 'Societe updated successfully');

    return redirect()->route('societes.index');
}

public function show($id)
{
    $societe = Societe::find($id);

    $damancomInfo=Societe::join('damancoms', 'damancoms.societe_id', '=', 'societes.id')
    ->select('damancoms.*', 'societes.name as societe_name')
    ->first();


    $impotInfo=Societe::join('impots', 'impots.societe_id', '=', 'societes.id')
    ->select('impots.*', 'societes.name as societe_name')
    ->first();


    $regusInfo=Societe::join('reguses', 'reguses.societe_id', '=', 'societes.id')
    ->select('reguses.*', 'societes.name as societe_name')
    ->first();

    $cimrInfo=Societe::join('c_i_m_r_s', 'c_i_m_r_s.societe_id', '=', 'societes.id')
    ->select('c_i_m_r_s.*', 'societes.name as societe_name')
    ->first();

    if (!$societe) {
        abort(404); 
    }

    return view('societes.show', compact('societe','damancomInfo','impotInfo','regusInfo','cimrInfo'));
}
// -----------------------------------------------


public function showAss($id)
{
        $societe=Societe::FindOrfail($id);
        $S=Societe::FindOrfail($id);
        $societe->associesInfo = $societe->associés;
        return view('societes.showAss', compact('societe','S'));

}
// --------------------------

public function showGer($id)
{        
    $societe=Societe::FindOrfail($id);
    $S=Societe::FindOrfail($id);
    $societe->gerantsInfo = $societe->gerants;
    return view('societes.showGer', compact('societe','S'));

}


public function destroy($id)
{
    $societe = Societe::findOrFail($id);
    $societe->delete();

    return redirect()->route('societes.index')->with('success', 'societe deleted successfully');
}
public function search(Request $request)
{
    $search = $request->search;
    
    $societes = Societe::where(function ($query) use ($search) {
        $query->where('name', 'like', "%$search%")
            ->orWhere('formeJuri', 'like', "%$search%")
            ->orWhere('siegeSocial', 'like', "%$search%")
            ->orWhere('capital', 'like', "%$search%")
            ->orWhere('activiteprincipal', 'like', "%$search%")
            ->orWhere('RC', 'like', "%$search%")
            ->orWhere('patente', 'like', "%$search%")
            ->orWhere('IF', 'like', "%$search%")
            ->orWhere('CNSS', 'like', "%$search%")
            ->orWhere('ICE', 'like', "%$search%")
            ->orWhere('RIB', 'like', "%$search%");
    })->get();
    toastrNotification('warning', 'Societe deleted successfully');
    return view('societes.index', compact('societes', 'search'));
}

}
