<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gerant;

class GerantController extends Controller
{
    public function index()
    {
        $gerants =Gerant::All();

        return view('gerants.index', compact('gerants'));
    }
    public function create()
    {
        return view('gerants.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:associés',
            'cin' => 'required',
            'role' => 'required',
        ]);

        Gerant::create($request->all());

        return redirect()->route('gerants.index')->with('success', 'gerant created successfully.');
    }
    public function store1(Request $request)
    {

        $attributes = request()->validate([
            'name' => 'required',
            'email' =>'required',
            'cin'=>'required',
            'role' => 'required',
        ]);
        if($request->get('email') != Auth::gerant()->email)
        {
            if(env('IS_DEMO') && Auth::gerant()->id == 1)
            {
                return redirect()->back()->withErrors(['msg2' => 'You are in a demo version, you can\'t change the email address.']);
                
            }
            
        }
        else{
            $attribute = request()->validate([
                'email' => ['required', 'email', 'max:50', Rule::unique('gerants')->ignore(Auth::gerant()->id)],
            ]);
        }
        
        
        User::where('id',Auth::user()->id)
        ->update([
            'name' => 'required',
            'email' => 'required|email',
            'cin'=>'required',
            'role' => 'required',
        ]);


        return view('gerants.edit');
    }

    public function edit($id)
    {
        $gerants = Gerant::findOrFail($id);
        return view('gerants.edit', compact('gerants'));
    }

    public function update(Request $request, $id)
    {
        $gerants = Gerant::findOrFail($id);

        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'cin'=>'required',
            'role' => 'required',
        ]);

        $gerants->update($request->all());

        return redirect()->route('Gerants.index')->with('success', 'Gerant updated successfully');
    }

    public function destroy($id)
    {
        $gerants = Gerant::findOrFail($id);
        $gerants->delete();

        return redirect()->route('Gerants.index')->with('success', 'Associé deleted successfully');
    }
}
