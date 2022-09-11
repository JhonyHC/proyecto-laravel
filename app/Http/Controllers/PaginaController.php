<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaginaController extends Controller
{
    public function actualizacionesContacto($codigo=null){
        $nombre = "";
        $email = "";
        if(!empty($codigo)){
            if($codigo == "1234"){
                $nombre = "pepe";
                $email = "pepe@gmail.com";
            }
        }

        return view('contacto',compact('nombre','email'));
    }

    public function landingPage(){
        return view('landingpage');
    }

    public function recibeFormContacto(Request $req){
        //Recibir info

        //Validar
        /* Validate aplica reglas de validacion */
        $req->validate([
            'nombre' => 'required|max:255|min:3',
            'email' => ['required','email']
        ]);

        //Insertar a BD

        //Redirigir
    }
}
