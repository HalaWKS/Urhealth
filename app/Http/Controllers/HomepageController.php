<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Activity;
use DB;
use App\Participate;

class HomepageController extends Controller
{

    public function setInfo()
    {
        return view('web.setInfo');
    }

    public function showInfo()
    {
        return view('web.showInfo');
    }

    public function homePage()
    {
        return view('web.homePage');
    }

    public function saveInfo(Request $request)
    {
        $input = $request->all();
        $updInfo = 'update users set gender = "'.$input['gender'].'", bloodgroup = "'.$input['bloodgroup'].'", birthday = "'.$input['birthday'].'" where id = '.Auth::user()->id;
        DB::update($updInfo);
        return redirect('/showInfo');
    }

    public function showActs()
    {
        $my_id = Auth::user()->id;
        $selectLatest = 'select * from activities a where a.creator = '.$my_id.' order by activitydate limit 0,3';
        $activities = DB::select($selectLatest);

//        $selectOthers = 'select * from activities a where a.creator <> '.$my_id.' order by activitydate';
        $selectCanJoin = 'select * from (select * from activities a where a.creator <> '.$my_id.') a where a.id not in (select p.activityID as id from participates p where p.userID = '.$my_id.') order by activitydate';
        $all = DB::select($selectCanJoin);
        return view('web.homePage', compact('activities', 'all'));
    }

    public function join($id)
    {
        $input = [];
        $input['userID'] = Auth::user()->id;
        $input['activityID'] = $id;

        Participate::create($input);
        return redirect('/home');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $activities = Activity::latest('activitydate')->get();
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
        $input = $request->all();
        $input['creator'] = Auth::user()->id;
        $input['creator_name'] = Auth::user()->name;
        //存入数据库
        Activity::create($input);
        //重定向
        return redirect('/home');

    }

    public function store1(Request $request)
    {
        $input = $request->all();
        $input['creator'] = Auth::user()->id;
        $input['creator_name'] = Auth::user()->name;
        //存入数据库
        Activity::create($input);
        //重定向
        return redirect('/health');

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
