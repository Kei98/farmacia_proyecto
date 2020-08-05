<?php

namespace App\Http\Controllers;

use App\Inventario;
use Illuminate\Http\Request;

class InventarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Inventario::with("medicamentos")->get();
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
            "cantidad" => "required",
            "medicamento_id" => "required"
        ]);

        $inventario = Inventario::create($fields);
        return response()->json("Se insertó correctamente", 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Inventario  $inventario
     * @return \Illuminate\Http\Response
     */
    public function show(Inventario $inventario)
    {
        return $inventario;
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Inventario  $inventario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Inventario $inventario)
    {
        $fields = $request->validate([
            "cantidad" => "required",
            "medicamento_id" => "required"
        ]);

        $inventario ->update($fields);
        return response()->json("Se modificó correctamente", 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Inventario  $inventario
     * @return \Illuminate\Http\Response
     */
    public function destroy(Inventario $inventario)
    {
        $inventario->delete();
        return response()->json("Se eliminó correctamente", 200);
    }
}
