@extends('web.model')
@section('setInfo')

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

            <div class="col-sm-8 col-xs-offset-2">
                <div class="panel panel-success">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-12 text-left">
                                <h6 class="smart-margin-off" style="font-family: 微软雅黑; font-size: small;">个人信息</h6>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <!--头像和用户名-->
                        <div class="col-xs-offset-3">
                            <img src="{{url("img/portrait/cr.jpg")}}" style="height: 200px; width: 200px; margin-left: 60px;">
                            {{--<a href="#" style="font-family: 微软雅黑; font-size: xx-large; margin-left: 110px">{!! Auth::user()->name !!}</a>--}}
                        </div>
                        <br>
                        <div class="col-xs-offset-3">
                            <a href="#" style="font-family: 微软雅黑; font-size: xx-large; margin-left: 110px">{!! Auth::user()->name !!}</a>
                        </div>
                        <br>

                        <div class="col-xs-offset-4">
                            {!! Form::open(['url'=>'/setInfo']) !!}
                            <!--修改性别-->
                            <div class="form-group">
                                {!! Form::label('gender', '性别:') !!}
                                <br>
                                <input type="radio" name="gender" value="male" checked="checked" />男
                                <input type="radio" name="gender" value="female" />女
                            </div>
                            <!--修改血型-->
                            <div class="form-group">
                                {!! Form::label('bloodgroup', '血型:') !!}
                                <br>
                                <input type="radio" name="bloodgroup" value="A" checked="checked"/>A型
                                <input type="radio" name="bloodgroup" value="B" />B型
                                <input type="radio" name="bloodgroup" value="AB" />AB型
                                <input type="radio" name="bloodgroup" value="O" />O型
                            </div>
                            <!--修改生日-->
                            <div class="form-group">
                                {!! Form::label('birthday', '生日:') !!}
                                <br>
                                {!! Form::input('date', 'birthday', date('Y-m-d'), ['class'=>'form-control', 'style'=>'width: 180px; height: 40px; margin-left: 0px;']) !!}
                            </div>
                            <!--提交-->
                            <div class="form-group">
                                <br>
                                {!! Form::submit('保存修改', ['class'=>'btn btn-primary form-control', 'style'=>'width: 150px; height: 40px; margin-left: 20px;']) !!}
                            </div>
                            {!! Form::close() !!}
                        </div>

                    </div>
                </div>
            </div>
        </div>




    </div>

@stop