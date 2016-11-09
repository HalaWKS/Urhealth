<?php

namespace App\Http\Controllers;

use App\Advice;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Illuminate\Support\Facades\Auth;
use DOMDocument;
use App\HealthyData;

class HealthController extends Controller
{

    public function import()
    {
        return view('web.import');
    }

    public function importHealthData(Request $request)
    {
        $xmlDoc = new DOMDocument();
        if($request->hasFile('file')){
            $file=$request->file('file');
            $path=$file->getRealPath();
            $xmlDoc->load($path);
            $allHealthData = $xmlDoc->getElementsByTagName('healthyData');//多个healthydata对象

            DB::beginTransaction(); //开始事务
            foreach ($allHealthData AS $healthData)
            {
                $height = $healthData->getElementsByTagName('height')->item(0)->nodeValue;
                $weight = $healthData->getElementsByTagName('weight')->item(0)->nodeValue;
                $heart_rate = $healthData->getElementsByTagName('heart_rate')->item(0)->nodeValue;
                $blood_pressure = $healthData->getElementsByTagName('blood_pressure')->item(0)->nodeValue;
                $sleep_time = $healthData->getElementsByTagName('sleep_time')->item(0)->nodeValue;
                $steps = $healthData->getElementsByTagName('steps')->item(0)->nodeValue;
                $date = $healthData->getElementsByTagName('date')->item(0)->nodeValue;

                $input=[];
                $input['user_id'] = Auth::user()->id;
                $input['user_name'] = Auth::user()->name;
                $input['height'] = $height;
                $input['weight'] = $weight;
                $input['heart_rate'] = $heart_rate;
                $input['blood_pressure'] = $blood_pressure;
                $input['sleep_time'] = $sleep_time;
                $input['steps'] = $steps;
                $input['date'] = $date;

                HealthyData::create($input);
            }
            DB::commit();   //提交事务
            return redirect('/home');
        }
    }

    public function reply($id, Request $request)
    {
        $input = $request->all();
        $advice_id = $id;
        $receiver_id = Auth::user()->id;
        $receiver_name = Auth::user()->name;
        $reply = $input['reply'];
        $updateAdvice = 'update advices set receiver_id = '.$receiver_id.', receiver_name = "'.$receiver_name.'", reply = "'.$reply.'", is_replied = "y" where id = '.$advice_id;
        DB::update($updateAdvice);

        return redirect('/reply');
    }

    public function showReply()
    {
        $my_id = Auth::user()->id;
        $my_type = Auth::user()->type;
        $selectRequest = 'select * from advices a where a.receiver_type = "'.$my_type.'" and a.creator_id <> '.$my_id.' and a.is_replied = "n" order by a.created_at';
        $requests = DB::select($selectRequest);
        return view('web.reply', compact('requests'));
    }

    public function updateAct($id, Request $request)
    {
        $input = $request->all();
        $content = $input['content'];
        $updAct = 'update activities set content = "'.$content.'" where id = '.$id;
        DB::update($updAct);

        return redirect('/health');
    }
    
    public function health()
    {
        return view('web.health');
    }

    public function showJoinActs()
    {
        return view('web.join');
    }

    public function showAllActivities()
    {
        $my_id = Auth::user()->id;
        $sql = 'select * from activities a where a.creator = '.$my_id.' order by activitydate';
        $activities = DB::select($sql);
        return view('web.health', compact('activities'));
    }

    public function showAllJoinActivities()
    {
        $my_id = Auth::user()->id;
        $selectJoin = 'select * from activities a, participates p where p.userID ='.$my_id.' and p.activityID = a.id order by a.activitydate';
        $activities = DB::select($selectJoin);
        return view('web.join', compact('activities'));
    }

    public function quitActivities($id)
    {
        $activity_id = $id;
        $my_id = Auth::user()->id;
        $quitAct = 'delete from participates where userID = '.$my_id.' and activityID = '.$activity_id;
        DB::delete($quitAct);
        return redirect('/joinActs');
    }

    public function deleteAdvice($id)
    {
        $advice_id = $id;
        $my_id = Auth::user()->id;
        $deleteAdvice = 'delete from advices where creator_id = '.$my_id.' and id = '.$advice_id;
        DB::delete($deleteAdvice);
        return redirect('/advice');
    }

    public function showAdvice()
    {
        $my_id = Auth::user()->id;
        //我的询问
        $selectMyRequest = 'select * from advices a where a.creator_id = '.$my_id.' order by a.created_at desc';
        $myRequest = DB::select($selectMyRequest);
        return view('web.advice', compact('myRequest'));
    }

    public function postAdvice(Request $request)
    {
        $input = $request->all();
        $input['creator_id'] = Auth::user()->id;
        $input['creator_name'] = Auth::user()->name;
        $input['is_replied'] = 'n';
        Advice::create($input);
        return redirect('/advice');
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
