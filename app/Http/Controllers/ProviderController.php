<?php

namespace App\Http\Controllers;

use App\Company;
use App\Provider;
use App\Rules\TelNumber;
use Illuminate\Http\Request;

class ProviderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Provider::with("drugs")->get();
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
            "name" => ["required", "string", "min:10", "max:50"],
            "phone_number" => ["required", "string", "min:12", "max:13", "unique:providers" , new TelNumber],
            "id_company" => ["required", "integer", "min:1"]
        ]);
        $provider = Provider::create($fields);
        return response()->json("Successfully added", 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Provider  $provider
     * @return \Illuminate\Http\Response
     */
    public function show(Provider $provider)
    {
        return ["provider" => $provider, "company" => Company::find($provider->id_company)];
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Provider  $provider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Provider $provider)
    {
        $fields = $request->validate([
            "name" => ["required", "string", "min:10", "max:50"],
            "phone_number" => ["required", "string", "min:12", "max:13", "unique:providers" , new TelNumber],
            "id_company" => ["required", "integer", "min:1"]
        ]);
        $provider -> update($fields);
        return response()->json("Successfully modified", 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Provider  $provider
     * @return \Illuminate\Http\Response
     */
    public function destroy(Provider $provider)
    {
        $provider->delete();
        return response()->json("Successfully deleted", 200);
    }
}
