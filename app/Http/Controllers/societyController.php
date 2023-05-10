<?php

namespace App\Http\Controllers;

use App\Http\Resources\societyResource;
use App\Models\societies;
use Illuminate\Http\Request;

class societyController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function login(Request $request)
    {
        $society = societies::where('id_card_number', $request->id_card_number)->first();

        if (!$society) {
            return response()->json([
                "message" => "ID Card Number or Password incorrect"
            ], 401);
        }
        if ($society->password == $request->password) {
            $token = md5($request->id_card_number);
            $society->login_tokens = $token;
            $society->save();
            $society = societies::where('id_card_number', $request->id_card_number)->first();
            return response()->json([
                'data' => new societyResource($society)
            ], 200);
        }
        return response()->json([
            "message" => "ID Card Number or Password incorrect"
        ], 401);
    }


    public function logout(Request $request)
    {
        $society = societies::where('login_tokens', $request->token)->first();
        if ($society) {
            $society->login_tokens = null;
            $society->save();
            return response()->json([
                "message" => "Logout Success"
            ], 200);
        }
        return response()->json([
            "message" => "Token Invalid"
        ], 401);
    }
    public function index()
    {
        //
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
