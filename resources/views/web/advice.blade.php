@extends('web.model')
@section('advice')
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

        @for($i = 0; $i < 3; $i++)
            <br>
        @endfor

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


            {{--建议请求框--}}
            <div class="col-sm-7 col-lg-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading" style="font-family: 微软雅黑; font-size: large">请求建议</div>
                    <div class="panel-body">
                        {!! Form::open(['url'=>'/advice']) !!}
                        <div class = "form-group">
                            {!! Form::textarea('request', '有什么疑问？', ['class'=>'form-control', 'style'=>'margin: 0 0 auto 0px; width: 600px; height: 100px; vertical-align:top; font-family: 微软雅黑;']) !!}
                        </div>
                        <label style="font-family: 微软雅黑;">选择向谁求助</label>
                        <select name = "receiver_type" class = "form-control" style="width: 100px; font-family: 微软雅黑;">
                            <option name = "receiver_type" value="doctor">医生</option>
                            <option name = "receiver_type" value="coach">教练</option>
                        </select>
                        <div class = "form-group">
                            {!! Form::submit('发 布', ['class'=>'btn btn-primary form-control', 'style'=>'width: 120px; height: 40px; margin-left: 480px; font-size: 16px; font-weight: bold; font-family: 楷体; font-size: 16px;']) !!}
                        </div>
                        {!! Form::close() !!}
                    </div>

                </div>
            </div>

            {{--显示建议--}}
            <div class="col-lg-7 col-lg-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading" style="font-family: 微软雅黑; font-size: medium;">我的询问</div>
                    <div class="panel-body">
                        @foreach($myRequest as $request)
                        <div class="alert alert-info" style="font-family: 微软雅黑; font-size: medium;">
                            <label>{{ $request->created_at }}</label>
                            <label style="font-size: smaller;">ask {{ $request->receiver_type }} for help</label>
                            <label style="font-size: smaller;">——————————————————————————————————————</label>
                            <label style="font-size: larger;">{{ $request->request }}</label>
                            <label style="font-size: smaller;">——————————————————————————————————————</label>
                            <br><br>
                            @if( $request->is_replied == 'y' )
                                <label style="font-size: larger;">Re:</label>
                                <br>
                                <label style="font-size: medium;">{{ $request->reply }}</label>
                                <br>
                                <a href="#" style="font-size: medium;">@ {{ $request->receiver_name }}</a>
                            @else
                                <label style="font-size: medium; font-family: 微软雅黑;">暂无回复</label>
                            @endif
                            <br><br>
                            <a href="{{ url("/deleteAdvice/".$request->id) }}" class="alert-link" style="font-family: 微软雅黑; font-size: small;">删除</a>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>


        </div>

    </div>
@stop