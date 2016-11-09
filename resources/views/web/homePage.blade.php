@extends('web.model')
@section('home')
    <div class="transparent-container">
        {{--主页导航栏--}}
        <div class="row">
            <div class="col-sm-12">
                <nav class="navbar navbar-inverse open-hover" role="navigation">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex2-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a href="#" class="navbar-brand" style="font-family: 'Open Sans'; font-style: italic;">
                            UrHealth Manager
                        </a>
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse navbar-ex2-collapse">
                        <ul class="nav navbar-nav">
                            <li class="active" style="font-family: 微软雅黑; font-size: small;"><a href="{{url("/home")}}">个人中心</a></li>
                            <li style="font-family: 微软雅黑; font-size: small;"><a href="{{url("/health")}}">健康中心</a></li>
                            <li class="active" style="font-family: 微软雅黑; font-size: small;"><a href="#">商城</a></li>
                            <li class="dropdown" style="font-family: 微软雅黑; font-size: small;">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">关于我们<b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">信息</a></li>
                                    <li><a href="#">帮助</a></li>
                                </ul>
                            </li>
                        </ul>
                        <form class="navbar-form navbar-left" role="search">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="搜索">
                            </div>
                        </form>
                        <ul class="nav navbar-nav navbar-right">
                            <li style="font-family: 微软雅黑; font-size: small;">
                                <a href="{{url('/logout')}}">注销</a>
                            </li>
                            <li style="font-family: 微软雅黑; font-size: small;">
                                <a href="#">{{ Auth::user()->type }}</a>
                            </li>
                            <li class="dropdown" style="font-family: 微软雅黑; font-size: small;">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">{{ Auth::user()->name }}<b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li style="font-family: 微软雅黑; font-size: small;"><a href="{{url('/import')}}">导入数据</a></li>
                                    <li style="font-family: 微软雅黑; font-size: small;"><a href="{{url('/showInfo')}}">个人信息</a></li>
                                    @if( Auth::user()->type == 'admin' )
                                        <li style="font-family: 微软雅黑; font-size: small;"><a href="{{url('/userManage')}}">用户管理</a></li>
                                    @endif
                                </ul>
                            </li>
                        </ul>
                    </div><!-- /.navbar-collapse -->
                </nav>
            </div>
        </div>


        @for($i = 0; $i < 2; $i++)
            <br>
        @endfor
        <div class="container">

            {!! Form::open(['url'=>'/activity']) !!}

            {{--活动发布框--}}
            <div class="col-sm-7">
                <div class="panel panel-default">
                    <div class="panel-heading" style="font-family: 微软雅黑; font-size: large">发布活动</div>
                    <div class="panel-body">
                        <div class="container col-sm-12">
                            <img src="{{url("img/portrait/cr.jpg")}}" style="height: 50px; width: 50px;">
                            <a href="#" style="font-family: 微软雅黑; font-size: medium;">@ {{ Auth::user()->name }}</a>
                            <br>
                        </div>
                        {{--<input type="text" contenteditable="true" style="margin: 30px 0 auto 10px; width: 500px; height: 100px;" placeholder="说说您打算做什么吧">--}}
                        {{--<textarea style="margin: 0 0 auto 50px; width: 500px; height: 100px; vertical-align:top;">说说您打算做什么吧</textarea>--}}
                        <div class = "form-group">
                            {!! Form::textarea('content', '说说您打算做什么吧', ['class'=>'form-control']) !!}
                        </div>

                        {{--日期选择--}}
                        {{--<input type="date" style="margin-left: 50px">--}}
                        {!! Form::input('date', 'activitydate', date('Y-m-d'), ['class'=>'form-control', 'style'=>'width: 180px; height: 40px; margin-left: 0px;']) !!}
                        {{--<button style="width: 90px; height: 40px; margin-left: 240px; font-size: 16px; font-weight: bold; font-family: 微软雅黑; font-size: 16px;">发 布</button>--}}
                        {!! Form::submit('发布', ['class'=>'btn btn-primary form-control', 'style'=>'width: 120px; height: 40px; margin-left: 480px; font-size: 16px; font-weight: bold; font-family: 微软雅黑; font-size: 16px;']) !!}

                    </div>

                </div>
                {!! Form::close() !!}

            </div>


            {{--最近的3个我发起的活动--}}
            <div class="col-md-5 col-lg-offset-0">
                <!-- START panel-->
                <div class="panel panel-default">
                    <div class="panel-heading" style="font-family: 微软雅黑; font-size: large;">最近3个我发起的活动</div>
                    <div class="panel-body">

                        <div id="accordion" class="panel-group">
                            @foreach($activities as $activity)
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                                            {{ $activity->activitydate }}
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseOne" class="panel-collapse collapse in">
                                    <div class="panel-body">
                                        {{ $activity->content }}
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>

                    </div>
                </div>
            </div>{{--最近的三个活动--}}

        </div>

        <div class="container">

            {{--其他人的活动--}}
            <div class="col-lg-6 col-lg-offset-0">
                <div class="panel panel-default">
                    <div class="panel-heading" style="font-family:楷体; font-size: 24px; font-weight: bold;">
                        我可以加入的活动
                    </div>
                    <div class="slimScrollBar" style="position: relative; overflow: hidden; width: auto; height: 340px;">
                        <div class="pre-scrollable">
                            <div class="panel-body">
                                @foreach($all as $act)
                                <div class="alert alert-success">
                                    <a href="javascript:void(0);" class="alert-link">
                                        <img src="{{url("img/portrait/portrait1.png")}}" style="height: 50px; width: 50px;">
                                        @ {{ $act->creator_name }}
                                    </a>
                                    {{--<button style="margin-left: 260px; font-family:楷体; font-size: 16px; font-weight: bold">参与</button>--}}
                                    {!! Form::open(['url'=>'/join/'.$act->id]) !!}
                                    {!! Form::submit('参与', ['class'=>'btn btn-primary form-control', 'style'=>'width: 60px; height: 25px; margin-left: 400px; font-size: 12px;']) !!}
                                    {!! Form::close() !!}

                                    {{ $act->activitydate }}
                                    <br>
                                    {{ $act->content }}
                                    <br>
                                    {{--<a href="#" style="font-family: 微软雅黑; font-size: 16px;">参与</a>--}}
                                </div>
                                @endforeach

                                {{--<div class="alert alert-info">Lorem ipsum dolor sit amet, consectetur adipisicing elit. <a href="javascript:void(0);" class="alert-link">Alert Link</a>.</div>--}}
                                {{--<div class="alert alert-warning">Lorem ipsum dolor sit amet, consectetur adipisicing elit. <a href="javascript:void(0);" class="alert-link">Alert Link</a>.</div>--}}
                                {{--<div class="alert alert-danger">Lorem ipsum dolor sit amet, consectetur adipisicing elit. <a href="javascript:void(0);" class="alert-link">Alert Link</a>.</div>--}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{--医生--}}
            <div class="col-md-3 col-lg-offset-0 ">
                <div class="thumbnail">
                    <img src="{{url("img/doctor.jpg")}}" alt="">
                    <div class="caption">
                        <h3 style="font-family:微软雅黑;">我的医生</h3>
                        <p style="font-family:微软雅黑;">
                            身体有恙找医生
                        </p>
                        <p>
                            <a href="#" class="btn btn-primary">联系医生</a>
                        </p>
                    </div>
                </div>
            </div>

            {{--教练--}}
            <div class="col-md-3 col-lg-offset-0 ">
                <div class="thumbnail">
                    <img src="{{url("img/coach.jpg")}}" alt="">
                    <div class="caption">
                        <h3 style="font-family:微软雅黑;">我的教练</h3>
                        <p style="font-family:微软雅黑;">
                            找教练获得正确有效的健身建议吧！
                        </p>
                        <p>
                            <a href="#" class="btn btn-primary">联系教练</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop