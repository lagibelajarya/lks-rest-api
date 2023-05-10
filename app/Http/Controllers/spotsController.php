<?php

namespace App\Http\Controllers;

use App\Http\Resources\spotsDetailResource;
use App\Http\Resources\spotsResource;
use App\Models\spots;
use App\Models\vaccinations;
use App\Models\vaccines;
use Illuminate\Http\Request;

class spotsController extends Controller
{
    public function getAllSpots()
    {
        $spots = spots::with(['vaccines'])->get();
        return response()->json([
            'spots' => spotsResource::collection($spots),
        ], 200);
    }

    public function getDetailSpots($id, Request $request)
    {

        if (empty($request->date) && !$request->has('date')) {
            $date = date('Y-m-d');
        } else {
            $date = $request->date;
        }

        $spots = spots::withCount(['vaccinations' => function ($query) use ($date, $id) {
            return $query->whereDate('date', $date);
        }])
            ->where('id', $id)
            ->first();

        return response()->json([
            'data' => (object) array(
                'date' => $date,
                'spot' => new spotsDetailResource($spots),
                'vaccionantion_count' => $spots->vaccinations_count
            )
        ], 200);
    }
}
