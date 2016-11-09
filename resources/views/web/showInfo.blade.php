@extends('web.model')
@section('showInfo')

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
                            <a href="#" style="font-family: 微软雅黑; font-size: xx-large; margin-left: 110px">{{ Auth::user()->name }}</a>
                        </div>
                        <br>
                        <div class="col-xs-offset-4">
                            <label style="font-family: 微软雅黑; font-size: large;">
                                性别：{{ Auth::user()->gender }}
                            </label>
                        </div>
                        <br>
                        <div class="col-xs-offset-4">
                            <label style="font-family: 微软雅黑; font-size: large;">
                                血型：{{ Auth::user()->bloodgroup }}
                            </label>
                        </div>
                        <br>
                        <div class="col-xs-offset-4">
                            <label style="font-family: 微软雅黑; font-size: large;">
                                生日：{{ Auth::user()->birthday }}
                            </label>
                        </div>
                        <br>
                        <div class="col-xs-offset-5">
                            <a href="{{url("/setInfo")}}" class="btn btn-primary" style="font-family: 微软雅黑">修改个人信息</a>
                        </div>

                    </div>
                </div>
            </div>
        </div>




    </div>

@stop