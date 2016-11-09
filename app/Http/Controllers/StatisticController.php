<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Illuminate\Support\Facades\Auth;

class StatisticController extends Controller
{

    public function showCharts()
    {

        $my_id = Auth::user()->id;
        $selectHealthData = 'select * from healthdata where user_id = '.$my_id.' order by date desc limit 0,1';
        $healthData = DB::select($selectHealthData);

        $selectLatestData = 'select steps, heart_rate, blood_pressure, sleep_time, date from healthdata where user_id = '.$my_id.' order by date desc limit 0,30';
//        $selectLatestData = 'select steps, heart_rate, blood_pressure, sleep_time, date from healthdata order by date desc limit 0,30';
        $latestData = DB::select($selectLatestData);
//        $steps = [];
//        $bloodPressure = [];
//        $heartRate = [];
//        $sleepTime = [];
//        $highPressure = [];
//        $lowPressure = [];
        $chartData = [];
        $steps = [];
        $i = 0;
        $k = 30;

        foreach($latestData as $data){
//            $steps[$i] = [$k, (int)$data->steps];

//            $highPressure[$i] = [$k, (int)$high_low[0]];
//            $lowPressure[$i] = [$high_low[1], $data->date];
//            $heartRate[$i] = [$k, (int)$data->heart_rate];
//            $sleepTime[$i] = [$data->sleep_time, $data->date];
            $high_low = explode('/', $data->blood_pressure);
            $sleepData = explode(' ', $data->sleep_time);
            $h = (double)str_replace('h', '', $sleepData[0]);
            $m = (double)str_replace('min', '', $sleepData[1]);
            $sleepTime = round( ($h + $m / 60), 2 );
            $chartData[$i] = [$k, (int)$high_low[0], (int)$high_low[1], (int)$data->heart_rate, $sleepTime];
            $steps[$i] = [$k, (int)$data->steps];
            $i++;
            $k--;
        }

        return view('web.statistic', compact('healthData', 'chartData', 'steps'));
//        return view('web.statistic', compact('healthData', 'steps', 'heartRate', 'highPressure', 'lowPressure', 'sleepTime'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
