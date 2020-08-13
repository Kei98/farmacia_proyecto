<?php

namespace App\Http\Controllers;

use App\Sale;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Sale::with("detail_lines")->get();
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
            "date" => "required",
            "discount" => "required",
            "tax" => "required",
            "final_amount" => "required",
            "id_client" => "required",
            "id_staff" => "required"
        ]);

        $sale = Sale::create($fields);
        return  response()->json("Successfully added", 201);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function show(Sale $sale)
    {
        return $sale;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sale $sale)
    {
        $fields = $request->validate([
            "date" => "required",
            "discount" => "required",
            "tax" => "required",
            "final_amount" => "required",
            "id_client" => "required",
            "id_staff" => "required"
        ]);

        $sale->update($fields);
        return  response()->json("Successfully modified", 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sale $sale)
    {
        $sale->delete();
        return response()->json("Successfully deleted",200);
    }
}
