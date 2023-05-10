<?php

namespace App\Http\Controllers;

use App\Http\Resources\consultationsResource;
use App\Models\consultations;
use App\Models\societies;
use Illuminate\Http\Request;

class consultationsController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function requestConsultation(Request $request)
    {
        //return $request->all();
        $society = societies::where('login_tokens', $request->login_tokens)->first();
        $consultations = new consultations();
        $consultations->society_id = $society->id;
        $consultations->status = 'pending';
        $consultations->disease_history = $request->disease_history;
        $consultations->current_symptoms =  $request->current_symptoms;
        $consultations->save();
        return response()->json([
            'message' => "Request consultation sent successful"
        ], 200);
    }
    public function getConsultation(Request $request)
    {
        $society = societies::where('login_tokens', $request->login_tokens)->first();
        $consultations = consultations::where('society_id', $society->id)->get();
        return response()->json([
            'data' =>  consultationsResource::collection($consultations)
        ], 200);
    }
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
