<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Impot;
use App\Models\societe;
class ImpotController extends Controller
{
    public function index()
    {
        
        $impots =Impot::paginate(5);

        return view('impots.index', compact('impots'));
    }

    // public function show($id)
    // {
    //     $impot = Impot::find($id);
    
    //     if (!$impot) {
    //         abort(404); 
    //     }
    
    //     return view('impots.show', compact('impot'));
    // }

    public function create()
    {
        $societes = societe::All(); 

        return view('impots.create', compact('societes'));
    }

    public function store(Request $request)
    {
        $request->validate([
          
            'login' => 'required',
            'password' => 'required',
            'societe_id' => 'required',
        ]);

        $newImpot = new Impot();

        $newImpot->login = $request->input('login');
        $newImpot->password = $request->input('password');
        $newImpot->societe_id =$request->input('societe_id');

        $newImpot->save();
        toastrNotification('success', 'Impot created successfully');


        return redirect()->route('impots.index')->with('success', 'Impot created successfully.');
    }
 
    public function edit($id)
    {
        $societes = societe::All(); 

        $impot =Impot::findOrFail($id);
        return view('impots.edit', compact('impot','societes'));
    }

    public function update(Request $request, $id)
    {
        $impot = Impot::findOrFail($id);

        $request->validate([
            'login' => 'required',
            'password' => 'required',
            'societe_Id' => 'required',
        ]);

        $impot->update($request->all());
        toastrNotification('success', 'Impot updated successfully');

        return redirect()->route('impots.index')->with('success', 'Impot updated successfully');
    }

    public function destroy($id)
    {
        $impot = Impot::findOrFail($id);
        $impot->delete();
        toastrNotification('warning', 'Impot deleted successfully');

        return redirect()->route('impots.index')->with('success', 'Impot deleted successfully');
    }

    
    public function search(Request $request)
    {
        $search = $request->search;
    
        $impots = Impot::with('societe')
            ->where(function ($query) use ($search) {
                $query->where('login', 'like', "%$search%")
                    ->orWhere('password', 'like', "%$search%");
            
                $query->orWhereHas('societe', function ($subquery) use ($search) {
                    $subquery->where('name', 'like', "%$search%");
                });
            })
            ->get();
    
        return view('impots.index', compact('impots', 'search'));
    }
   
}
