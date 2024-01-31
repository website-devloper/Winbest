<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Gerant;
use App\Models\Associé;
use App\Models\societe;
// use App\Events\UserConnected;
// use App\Events\UserDisconnected;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Cache;


use App\Models\User;
use Illuminate\Support\Facades\Hash;


class HomeController extends Controller
{
    public function Home(){
        return view('home');
    }

    public function Login(){
        return view('login');
    }
    public function About(){
        return view('about');
    }
    public function Contactus(){
        return view('contactus');
    }


    // ------------------------------------------------------


    // $admin = Admin::where('email', $request->input('email'))->first();

    // if ($admin && Hash::check($request->input('your_pass'), $admin->password)) {
    //     Session::put('nom', $admin->nom);
    //     return redirect('/admin-dashboard');
    // }
    
    
    
    public function loginRequest(Request $request)
    {
        $credentials = $request->only('email', 'password');
    
        if (auth()->attempt($credentials)) {
            $user = auth()->user();
            session()->regenerate();

            $request->session()->put('user_name', $user->fullName);
            $request->session()->put('role', $user->role);
    
          
    
            return redirect()->route('dashboard');
        }
    
        return redirect('/login')->with('error', 'Invalid credentials');
    }
    

    public function logout()

    {
        $user = auth()->user();

        $onlineUsers = Cache::get('online-users', []);
        unset($onlineUsers[$user->id]);
        Cache::forever('online-users', $onlineUsers);
        auth()->logout();

        return redirect('/');
    }

    public function SignUp(){
        return view('SignUp');
    }

    public function SignUpRequest(Request $request)
{
    $request->validate([
        'fullName' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:8',
        're_pass' => 'required|string|min:8|same:password',
        'type' => 'required|string|max:255',
    ]);

    $user = new User([
        'fullName' => $request->input('fullName'),
        'email' => $request->input('email'),
        'password' => Hash::make($request->input('password')),
        'role' => $request->input('type'),
    ]);

    $user->save();

    return redirect('/Login')->with('success', 'Registration successful. Please log in.');
}

        // $admin = Admin::where('email', $request->input('email'))->first();

        // if (!$admin) {
        //     if ($request->input('password') === $request->input('re_pass') && $request->input('type') === "admin") {
        //         $admin = new Admin([
        //             'nom' => $request->input('nom'),
        //             'email' => $request->input('email'),
        //             'password' => Hash::make($request->input('password')),
        //         ]);
            
        //         $admin->save();
                
        //         if ($admin->save()) {
        //             return redirect('/Login')->with('success', 'Registration successful. Please log in.');
        //         }
        //     }
        // }
    }



