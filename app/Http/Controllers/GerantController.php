<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gerant;
use App\Models\societe;

class GerantController extends Controller
{
    public function index()
    {
        $gerants = Gerant::with('societe')->get();
        
        return view('gerants.index', compact('gerants'));
    }


    public function create()
    {
        $societes=societe::all();
        return view('gerants.create',compact('societes'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:gerants',
            'cin' => 'required',
            'role' => 'required',
            'societe' => 'required|string|exists:societes,name', 
        ]);
    
        $societe = Societe::where('name', $request->input('societe'))->first();
    
        if ($societe) {
            $newGerant = new Gerant();
    
    $newGerant->fullName = $request->input('name');
    $newGerant->email = $request->input('email');
    $newGerant->cin = $request->input('cin');
    $newGerant->role = $request->input('role');

    $newGerant->societe_id = $societe->id;

    $newGerant->save();

    return redirect()->route('gerants.index');
            
        }
        return redirect()->back()->with('error', 'Societe not found.');
    }
    

    // public function store1(Request $request)
    // {

    //     $attributes = request()->validate([
    //         'name' => 'required',
    //         'email' =>'required',
    //         'cin'=>'required',
    //         'role' => 'required',
    //     ]);
    //     if($request->get('email') != Auth::gerant()->email)
    //     {
    //         if(env('IS_DEMO') && Auth::gerant()->id == 1)
    //         {
    //             return redirect()->back()->withErrors(['msg2' => 'You are in a demo version, you can\'t change the email address.']);
                
    //         }
            
    //     }
    //     else{
    //         $attribute = request()->validate([
    //             'email' => ['required', 'email', 'max:50', Rule::unique('gerants')->ignore(Auth::gerant()->id)],
    //         ]);
    //     }
        
        
    //     User::where('id',Auth::user()->id)
    //     ->update([
    //         'name' => 'required',
    //         'email' => 'required|email',
    //         'cin'=>'required',
    //         'role' => 'required',
    //     ]);
    //     return view('gerants.edit');
    // }

    public function show($id)
    {
        $gerant = Gerant::with('societe')->findOrFail($id);
        return view('gerants.show', compact('gerant'));
    }

    public function edit($id)
    {
        $gerant = Gerant::findOrFail($id);
        $societes=societe::all();

        return view('gerants.edit', compact('gerant','societes'));
    }



    public function update(Request $request, $id)
    {
        $gerant = Gerant::findOrFail($id);
    
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:associés,email,' . $id,
            'cin' => 'required',
            'role' => 'required',
            'societe' => 'required|string|exists:societes,name',
        ]);
    
        $societe = Societe::where('name', $request->input('societe'))->first();
    
        if ($societe) {
            $gerant->fullName = $request->input('name');
            $gerant->email = $request->input('email');
            $gerant->cin = $request->input('cin');
            $gerant->role = $request->input('role');
            $gerant->societe_id = $societe->id;
    
            $gerant->save();
    
            return redirect()->route('gerants.index');
        }
    
        return redirect()->back()->with('error', 'Societe not found.');
    }
    


    public function destroy($id)
    {
        $gerants = Gerant::findOrFail($id);
        $gerants->delete();

        return redirect()->route('gerants.index')->with('success', 'Associé deleted successfully');
    }
}
