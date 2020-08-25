<?php

namespace App\Http\Controllers;

use App\Client;
use App\Rules\TelNumber;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Client::with("sales")->get();
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
            "id_person" => ["required", "integer", "min:100000000", "min:999999999", "unique:providers"],
            "tel_number" => ["required", "string", "min:12", "max:13", "unique:providers" , new TelNumber],
        ]);
        $client = Client::create($fields);
        return response()->json("Successfully added", 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        return $client;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client $client)
    {
        $fields = $request->validate([
            "name" => ["required", "string", "min:10", "max:50"],
            "id_person" => ["required", "integer", "min:100000000", "min:999999999", "unique:providers"],
            "tel_number" => ["required", "string", "min:12", "max:13", "unique:providers" , new TelNumber],
        ]);
        $client->update($fields);
        return response()->json("Successfully added", 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        $client->delete();
        return response()->json("Succesfully deleted", 200);
    }
}
