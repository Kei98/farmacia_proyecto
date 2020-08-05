<?php

namespace App\Http\Controllers;

use App\Medicamento;
use Illuminate\Http\Request;

class MedicamentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        Puede ser proveedors, inventarios o linea_detalles
        return Medicamento::with("proveedors")->get();
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
            "nombre" => "required",
            "descripcion" => "required",
            "tipo_admin" => "required",
            "precio" => "required",
            "proveedor_id" => "required"
        ]);

        $medicamento = Medicamento::create($fields);
        return response()->json("Se insertó correctamente", 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Medicamento  $medicamento
     * @return \Illuminate\Http\Response
     */
    public function show(Medicamento $medicamento)
    {
        return $medicamento;
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Medicamento  $medicamento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Medicamento $medicamento)
    {
        $fields = $request->validate([
            "nombre" => "required",
            "descripcion" => "required",
            "tipo_admin" => "required",
            "precio" => "required",
            "proveedor_id" => "required"
        ]);

        $medicamento -> update($fields);
        return response()->json("Se modificó correctamente", 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Medicamento  $medicamento
     * @return \Illuminate\Http\Response
     */
    public function destroy(Medicamento $medicamento)
    {
        $medicamento->delete();
        return response()->json("Se eliminó correctamente", 200);
    }
}
