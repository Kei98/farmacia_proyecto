<?php

namespace App\Http\Controllers;

use App\Detail_line;
use App\Sale;
use Illuminate\Http\Request;

class DetailLineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Detail_line::with("sale_details")->get();
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
            "id_drug" => ["required", "integer", "min:1"],
            "amount" => ["required", "integer", "min:1"],
            "subtotal" => ["required", "numeric"],
        ]);

        $detail_line = Detail_line::create($fields);
        return response()->json("Successfully added", 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Detail_line  $detail_line
     * @return \Illuminate\Http\Response
     */
    public function show(Detail_line $detail_line)
    {
        return $detail_line;
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Detail_line  $detail_line
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Detail_line $detail_line)
    {
        $fields = $request->validate([
            "id_drug" => ["required", "integer", "min:1"],
            "amount" => ["required", "integer", "min:1"],
            "subtotal" => ["required", "numeric"],
        ]);


        $detail_line ->update($fields);
        return response()->json("Successfully modified", 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Detail_line  $detail_line
     * @return \Illuminate\Http\Response
     */
    public function destroy(Detail_line $detail_line)
    {
        $detail_line->delete();
        return response()->json("Successfully deleted", 200);
    }
}
