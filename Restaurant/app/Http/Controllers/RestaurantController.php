<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Platillo; 
use App\Models\Usuario;
use App\Models\Notis;

class RestaurantController extends Controller
{
    function platillos() 
    { 

        return Platillo::all(); 

    }
    function platillo($id) 
    { 

        return Platillo::find($id); 

    }  
    function Notificacion()
    {
        return Notis::all();
    }

    function Usuario()
    {
        return Usuario::all();
    }

    function categoria($categoria)
    {
        // Realiza la consulta para obtener los platillos de la categoría especificada
        $platillos = Platillo::where('categoria', $categoria)->get();
        return $platillos;
    }

    //funciones de usuarios
    function iniciarSesion(Request $request) {
        $usuario = Usuario::where('correo', $request->correo)->first();
    
        if ($usuario) {
            // Verifica la contraseña solo si se encontró un usuario
            if ($usuario->password == $request->password) {
                return $usuario;
            } else {
                return null;
            }
        } else {
            return null;
        }
    }
    
    
    function insertarUsuario(Request $request)
    {
        $usuario = new Usuario();
        $usuario->nombre = $request -> nombre;
        $usuario->apellido=$request->apellido;
        $usuario->correo=$request->correo;
        $usuario->numero=$request->numero;
        $usuario->password=$request->password;
        $usuario->save();
        return $request;
    }

    //NOTIFICACIONES
    function obtenerEstadoNotificacion($idUsuario)
    {
        $notificacion = Notis::where('id_usuario', $idUsuario)->first();
    
        if ($notificacion) {
            echo "1";
        } else {
            echo "0";
        }
    }
    
    function enviarNotificacion(Request $request)
    {

        $Notificacion = new Notis();
        $Notificacion->id_usuario=$request->id_usuario;
        $Notificacion->notificacion_enviada=$request->notificacion_enviada;
        $Notificacion->save();
        return $request;
    }

    //PARA SUBIR FOTO
    function subirFoto(Request $request) {
        $id = $request->input['id'];
        $foto = $request->file('foto');
        $foto->storeAs('',$id.'.jpg','public');
        return "Ok";
    }
    
}
