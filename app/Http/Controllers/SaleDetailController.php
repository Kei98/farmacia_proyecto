<?php

namespace App\Http\Controllers;

use App\Detail_line;
use App\SaleDetail;
use Illuminate\Http\Request;

class SaleDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return SaleDetail::with("detail_lines")->get();
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
            "id_sale" => ["required", "integer", "min:1"],
            "id_detail_line" => ["required", "integer", "min:1"]
        ]);

        $saleDetail = SaleDetail::create($fields);
        return response()->json("Successfully added", 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SaleDetail  $saleDetail
     * @return \Illuminate\Http\Response
     */
    public function show(SaleDetail $saleDetail)
    {
        return ["saleDetail" => $saleDetail, "id_detail_line" => Detail_line::find($saleDetail->id_detail_line),
            "id_sale" => Sale::find($saleDetail->id_sale)];
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SaleDetail  $saleDetail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SaleDetail $saleDetail)
    {
        $fields = $request->validate([
            "id_sale" => ["required", "integer", "min:1"],
            "id_detail_line" => ["required", "integer", "min:1"]
        ]);

        $saleDetail->update($fields);
        return response()->json("Successfully modified", 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SaleDetail  $saleDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy(SaleDetail $saleDetail)
    {
        $saleDetail->delete();
        return response()->json("Succesfully deleted", 200);
    }
}
