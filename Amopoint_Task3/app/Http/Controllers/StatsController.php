<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserStatistic as Stat;
use Illuminate\Support\Facades\Validator;

class StatsController extends Controller
{
    /**
     * Сохраняет статистику посещения страниц
     * 
     * @param Request $request
     * 
     * @return response
     * 
     */
    public function storeUserStats(Request $request)
    {

        $validator = Validator::make($request->all(),[
            'ip' =>'required|string',
            'city' =>'required|string',
            'device' =>'required|string',
        ]);

        if($validator->fails()){
            return response()->json([
                "status" => "error"
            ], 500);
        }

        Stat::create([
            "ip" => $request->ip,
            "city" => $request->city,
            "device" => $request->device
        ]);

        return response()->json([
            "status" => "success",
        ]);
    }
}
