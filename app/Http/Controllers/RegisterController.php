<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;



use Illuminate\Support\Facades\Hash;



use App\Models\User;



class RegisterController extends Controller
{

    
    public function register(Request $request)
    {


        $datos = $request->validate([


            
            'name' => [

                
                'required',

                
                'string',

                
                'max:255'
            ],


            
            'email' => [

                'required',

                
                'email',

                
                'max:255',

                
                'unique:users,email'
            ],


            
            'password' => [

                
                'required',

                'string',

                
                'min:6',

                
                'confirmed'
            ],
        ]);


        
        $usuario = User::create([

            
            'name' => $datos['name'],


            
            'email' => $datos['email'],


            
            'password' => Hash::make($datos['password']),
        ]);


        
        return redirect('/login')


            
            ->with(
                'success',
                '¡Cuenta creada correctamente! Ahora podés iniciar sesión.'
            );
    }
}