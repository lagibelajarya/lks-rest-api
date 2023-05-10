<?php

namespace App\Http\Controllers;

use App\Models\regionals;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class userController extends Controller
{

    public function doLogin(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Login Failed'
            ]);
        }
        $user = User::where('email', $request->email)->first();
        if (!$user || Hash::check($user->password, $request->password)) {
            return response()->json([
                'status' => false,
                'message' => 'Password Atau Email Salah'
            ]);
        }
        $regional  = regionals::find($user->regional_id);
        return response()->json([
            'status' => true,
            'data' => $user,
            'regional' => $regional,
            'token' => $user->createToken('authToken')->accessToken
        ]);
    }

    public function doRegister(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|unique:users',
            'name' => 'required',
            'password' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => $validator->fails(), 400
            ]);
        }
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        return response()->json([
            'status' => true,
            'status-code' => 200,
            'message' => 'berhasil registrasi',
            'regional_id' => 1
        ]);
    }


    public function doLogout(Request $request)
    {
        $removeToken = $request->user()->tokens()->delete();
        if ($removeToken) {
            return response()->json([
                'status' => true,
                'message' => 'Berhasil Logout'
            ]);
        }
    }
    /**
     * Display a listing of the resource.
     */
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
