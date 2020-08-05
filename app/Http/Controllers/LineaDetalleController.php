<?php

namespace App\Http\Controllers;

use App\Linea_detalle;
use Illuminate\Http\Request;

class LineaDetalleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Linea_detalle::with("ventas")->get();
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
            "nombre_med" => "required",
            "precio_u_med" => "required",
            "cantidad" => "required",
            "subtotal" => "required",
            "venta_id" => "required",
            "medicamento_id" => "required"
        ]);

        $linea_detalle = Linea_detalle::create($fields);
        return response()->json("Se insertó correctamente", 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Linea_detalle  $linea_detalle
     * @return \Illuminate\Http\Response
     */
    public function show(Linea_detalle $linea_detalle)
    {
        return $linea_detalle;
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Linea_detalle  $linea_detalle
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Linea_detalle $linea_detalle)
    {
        $fields = $request->validate([
            "nombre_med" => "required",
            "precio_u_med" => "required",
            "cantidad" => "required",
            "subtotal" => "required",
            "venta_id" => "required",
            "medicamento_id" => "required"
        ]);

        $linea_detalle ->update($fields);
        return response()->json("Se modificó correctamente", 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Linea_detalle  $linea_detalle
     * @return \Illuminate\Http\Response
     */
    public function destroy(Linea_detalle $linea_detalle)
    {
        $linea_detalle->delete();
        return response()->json("Se eliminó correctamente", 200);
    }
}
