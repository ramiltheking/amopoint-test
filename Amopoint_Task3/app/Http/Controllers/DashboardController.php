<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserStatistic;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{

    public function showDashboard()
    {

        $visitsByHour = UserStatistic::select(DB::raw('HOUR(created_at) as hour'), DB::raw('count(*) as count'))
        ->groupBy('hour')
        ->get();

        $visitsByCity = UserStatistic::select('city', DB::raw('count(*) as count'))
            ->groupBy('city')
            ->get();
       
        return view("dashboard", [
            "visitsByHour" => $visitsByHour,
            "visitsByCity" => $visitsByCity,
        ]);
    }

}
