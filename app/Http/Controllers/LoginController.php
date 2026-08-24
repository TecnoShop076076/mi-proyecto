<?php

class LoginController extends Controller
{
    public function showLoginForm()
    {
        $datosValidados = $request->validate(
            [
                    'nombre' => [
                    'required',
                    'string',
                    'max:150'
                ],

                'contraseña' => [
                    'required',
                    'string',
                    'max:50',
                    'unique:productos,codigo'
                ],

                'id_categoria' => [
                    'required',
                    'integer',
                    'exists:categorias,id_categoria'
                ]
            ],
        );
     }


 }

  
?>