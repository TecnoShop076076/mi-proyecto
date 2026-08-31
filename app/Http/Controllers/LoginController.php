<?php


namespace App\Http\Controllers;


use Illuminate\Http\Request;


use Illuminate\Support\Facades\Auth;



class LoginController extends Controller
{
    
    public function showLoginForm()
    {
        
        return view('FormularioIngreso');
    }


    
    public function login(Request $request)
    {
    
        $datos = $request->validate([
            
            
            'email' => [
                'required',
                'email'
            ],

            'password' => [
                'required',
                'string'
            ],
        ]);


       
        if (Auth::attempt([
            
           
            'email' => $datos['email'],

            
            'password' => $datos['password'],

        ])) {

            
            $request->session()->regenerate();

           
            return redirect('/inicio');
        }



        return back()->withErrors([
            'email' => 'El email o la contraseña son incorrectos.'
        ])->withInput();
    }
}