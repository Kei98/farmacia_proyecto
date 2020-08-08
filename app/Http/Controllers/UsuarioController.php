<?php

namespace App\Http\Controllers;

use App\Usuario;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Relacionado venta
        return Usuario::with("ventas")->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $fields = $request->validate([
        "tipo" => "required",
        "nombreusuario" => "required",
        "contrasena" => "required",
        "email" => "required",
        "telefono" => "required",
        "cedula" => "required"
        ]);

        $usuario = Usuario::created($fields);
        return response()->json("Se insertó correctamente", 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function show(Usuario $usuario)
    {
        return $usuario;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Usuario $usuario)
    {
        $fields = $request->validate([
            "tipo" => "required",
            "nombreusuario" => "required",
            "contrasena" => "required",
            "email" => "required",
            "telefono" => "required",
            "cedula" => "required"
        ]);

        $usuario -> update($fields);
        return response()->json("Se modificó correctamente", 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function destroy(Usuario $usuario)
    {
        $usuario -> delete();
        return response()->json("Se eliminó correctamente", 200);
    }
}
