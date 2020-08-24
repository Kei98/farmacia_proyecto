<?php

namespace App\Http\Controllers;

use App\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Company::with("providers")->get();
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
            "name" => ["required", "max:30", "string"],
            "phone_number" => ["required", "string", "min:8", "max:13"],
            "legal_id" => ["required", "integer", "min:1"],
            "address" => ["required", "min:10", "max:225"]
        ]);
        $company = Company::create($fields);
        return response()->json("Successfully added", 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        return $company;
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Company $company)
    {
        $fields = $request->validate([
            "name" => ["required", "max:30", "string"],
            "phone_number" => ["required", "string", "min:8", "max:13"],
            "legal_id" => ["required", "integer", "min:1"],
            "address" => ["required", "min:10", "max:225"]
        ]);
        $company -> update($fields);
        return response()->json("Successfully modified", 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        $company->delete();
        return response()->json("Successfully deleted", 200);
    }
}
