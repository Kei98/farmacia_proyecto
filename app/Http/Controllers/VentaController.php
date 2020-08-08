<?php

namespace App\Http\Controllers;

use App\Venta;
use Illuminate\Http\Request;

class VentaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Relacionado con linea detalle
        return Venta::with("lineadetalls")->get();
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
            "fecha" => "required",
            "descuento" => "required",
            "impuesto" => "required",
            "montofinal" => "required",
            "id_cliente" => "required",
            "id_personal" => "required"
        ]);

        $venta = Venta::created($fields);
        return response()->json("Se insertó correctamente",201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Venta  $venta
     * @return \Illuminate\Http\Response
     */
    public function show(Venta $venta)
    {
        return $venta;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Venta  $venta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Venta $venta)
    {
        $fields = $request->validate([
            "fecha" => "required",
            "descuento" => "required",
            "impuesto" => "required",
            "montofinal" => "required",
            "id_cliente" => "required",
            "id_personal" => "required"
        ]);

        $venta -> update($fields);
        return response()->json("Se modificó correctamente",200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Venta  $venta
     * @return \Illuminate\Http\Response
     */
    public function destroy(Venta $venta)
    {
        $venta -> delete();
        return response()->json("Se eliminó correctamente",200);
    }
}
