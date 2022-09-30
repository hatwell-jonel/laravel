<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ChartController extends Controller
{
    public function pieChartGender(){
        $data = DB::table('students')
        ->select(
            DB::raw('gender as gender'),
            DB::raw('count(*) as number'))
        ->groupBy('gender')
        ->get();

        $array[] = ['Gender', 'Number']; 

        foreach($data as $key => $value){
            $array[++$key] = [$value->gender, $value->number];
        }

        
        return view('charts.gender')->with('gender', json_encode($array));
    }
}
