@extends('web.model')
@section('reply')

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

        {{--健康选项--}}
        <div class="container">

            <div class="col-sm-4">
                <div class="panel panel-success">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-12 text-left">
                                <h6 class="smart-margin-off" style="font-family: 微软雅黑; font-size: small;">健康管理</h6>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div>
                            <img src="{{url("img/portrait/cr.jpg")}}" style="height: 200px; width: 200px; margin-left: 60px;">
                            <a href="#" style="font-family: 微软雅黑; font-size: medium; margin-left: 110px">@ {{ Auth::user()->name }}</a>
                        </div>

                        <div class="col-lg-offset-4">
                            <div style="margin-top: 50px;">
                                <a href="{{url("/health")}}" style="font-family: 微软雅黑; font-size: large;">我的活动</a>
                            </div>
                            <div style="margin-top: 30px;">
                                <a href="{{url("/health")}}" style="font-family: 微软雅黑; font-size: large;">参加的活动</a>
                            </div>
                            <div style="margin-top: 30px;">
                                <a href="{{url("/advice")}}" style="font-family: 微软雅黑; font-size: large;">请求建议</a>
                            </div>
                            @if( (Auth::user()->type == 'doctor') or (Auth::user()->type == 'coach') )
                                <div style="margin-top: 30px;">
                                    <a href="{{url("/reply")}}" style="font-family: 微软雅黑; font-size: large;">回复建议</a>
                                </div>
                            @endif
                            <div style="margin-top: 30px;">
                                <a href="{{url("/statistic")}}" style="font-family: 微软雅黑; font-size: large;">统计分析</a>
                            </div>
                            {{--<div style="margin-top: 30px;">--}}
                            {{--<a href="{{url("/health")}}" style="font-family: 微软雅黑; font-size: large;">我的活动</a>--}}
                            {{--</div>--}}
                        </div>

                        @for($i = 0; $i < 3; $i++)
                            <br>
                        @endfor

                    </div>
                </div>
            </div>


            <!--回复建议-->
            <div class="col-lg-7 col-lg-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading" style="font-family: 微软雅黑; font-size: medium;">待回复的建议</div>
                    <div class="panel-body">
                        @foreach($requests as $request)

                            {!! Form::open(['url'=>'/reply/'.$request->id]) !!}

                            <div class="alert alert-info" style="font-family: 微软雅黑; font-size: medium;">
                                <label style="font-size: medium;">{{ $request->created_at }}</label>
                                <br>
                                <a href="#" style="font-family: 微软雅黑; font-size: medium;">@ {{ $request->creator_name }}</a>
                                <br>
                                <label style="font-size: larger;">{{ $request->request }}</label>
                                <br><br>
                                <div class = "form-group">
                                    {!! Form::textarea('reply', '', ['class'=>'form-control', 'style'=>'height: 70px']) !!}
                                </div>
                                {!! Form::submit('回复', ['class'=>'btn btn-primary form-control', 'style'=>'width: 70px; height: 30px; margin-left: 480px; font-size: 10px; font-weight: normal; font-family: 微软雅黑;']) !!}
                                <br>
                            </div>

                            {!! Form::close() !!}

                        @endforeach
                    </div>
                </div>
            </div>
        </div>

    </div>

@stop
