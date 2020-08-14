<?php

namespace App\Http\Controllers;

use App\Drug;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DrugController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){

//      It could be providers, inventories or detail_line
        return Drug::with("providers")->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        $user = Auth::user();
//        if($user->getUtype() === "admin"){
//            return $user;
//        }else {
////
//        }
        $fields = $request->validate([
            "name" => "required",
            "description" => "required",
            "administration" => "required",
            "price" => "required",
            "id_provider" => "required"
        ]);

        $drug = Drug::created($fields);
        return response()->json("Successfully added", 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Drug  $drug
     * @return \Illuminate\Http\Response
     */
    public function show(Drug $drug)
    {
        return  $drug;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Drug  $drug
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Drug $drug)
    {
        $fields = $request->validate([
            "name" => "required",
            "description" => "required",
            "administration" => "required",
            "price" => "required",
            "id_provider" => "required"
        ]);

        $drug->update($fields);
        return response()->json("Successfully modified", 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Drug  $drug
     * @return \Illuminate\Http\Response
     */
    public function destroy(Drug $drug)
    {
        $drug->delete();
        return response()->json("Successfully deleted", 200);
    }
}
