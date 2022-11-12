<?php

namespace App\Http\Controllers;

use App\Models\Contacto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

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
            'name' => 'required|max:255|min:3',
            'email' => 'required|email',
            'comentario' => 'required|min:3'
        ]);

        //Insertar a BD
        $contactoCreado = Contacto::create([
            'nombre' => $req->name,
            'email' => $req->email,
            'comentario' => $req->comentario,
        ]);

        //Redirigir
        return redirect('/contacto');
        /* CON ESTO ENVIAS LA INFO DE VUELTA AL FORMULARIO 
        $nombre = $contactoCreado->nombre;
        $email = $contactoCreado->email;
        return view('contacto',compact('nombre','email')); */
    }
}
