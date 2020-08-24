<?php

namespace App\Http\Controllers;

use App\Client;
use App\Rules\Date;
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
            "date" => ["required", "string", "min:16", "max:16", new Date],
            "discount" => ["required", "numeric", "min:0"],
            "tax" => ["required", "numeric", "min:0"],
            "final_amount" => ["required", "numeric"],
            "id_client" => ["required", "integer", "min:1"],
            "id_staff" => ["required", "integer", "min:1"]
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
        return ["sale" => $sale, "client" => Client::find($sale->id_client)];
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
            "date" => ["required", "string", "min:16", "max:16", new Date],
            "discount" => ["required", "numeric", "min:0"],
            "tax" => ["required", "numeric", "min:0"],
            "final_amount" => ["required", "numeric"],
            "id_client" => ["required", "integer", "min:1"],
            "id_staff" => ["required", "integer", "min:1"]
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
