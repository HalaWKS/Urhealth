@extends('web.model')
@section('register')
    <div class="transparent-container">
        {{--注册导航栏--}}
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

                        <form class="navbar-form navbar-left" role="search">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="搜索">
                            </div>
                        </form>

                        <ul class="nav navbar-nav navbar-right">
                            <li><a href="#">关于我们</a></li>
                        </ul>

                    </div><!-- /.navbar-collapse -->
                </nav>
            </div>
        </div>


        @for($i = 0; $i < 5; $i++)
            <br>
        @endfor

        {{--注册框--}}
        <div class="container">
            {!! Form::open(['url'=>'/register']) !!}

            <div class="col-md-6 col-lg-offset-0">
                <div class="panel panel-default">
                    <div class="panel-heading" style="font-family: 微软雅黑; font-size: large">注册属于您的账号</div>
                    <div class="panel-body">
                        <form class="form-horizontal" action="{{url('#')}}">
                            <div class="form-group">
                                {!! Form::label('name', 'Name:') !!}
                                {!! Form::text('name', null, ['class'=>'form-control']) !!}
                                {{--<label class="col-lg-2 control-label">用户名</label>--}}
                                {{--<div class="col-lg-10">--}}
                                    {{--<input type="text" id="username" name="username" placeholder="用户名" class="form-control">--}}
                                {{--</div>--}}
                            </div>
                            <div class="form-group">
                                {!! Form::label('email', 'Email:') !!}
                                {!! Form::email('email', null, ['class'=>'form-control']) !!}
                                {{--<label class="col-lg-2 control-label">邮箱</label>--}}
                                {{--<div class="col-lg-10">--}}
                                    {{--<input type="email" id="email" name="email" placeholder="邮箱" class="form-control">--}}
                                {{--</div>--}}
                            </div>
                            <div class="form-group">
                                {!! Form::label('password', 'Password:') !!}
                                {!! Form::password('password', ['class'=>'form-control']) !!}
                                {{--<label class="col-lg-2 control-label">密码</label>--}}
                                {{--<div class="col-lg-10">--}}
                                    {{--<input type="password" id="password" name="password" placeholder="密码" class="form-control">--}}
                                {{--</div>--}}
                            </div>
                            <div class="form-group">
                                {!! Form::label('password_confirmation', 'Password_confirmation:') !!}
                                {!! Form::password('password_confirmation', ['class'=>'form-control']) !!}
                                {{--<label class="col-lg-2 control-label">确认密码</label>--}}
                                {{--<div class="col-lg-10">--}}
                                    {{--<input type="password" id="confirm_password" name="confirm_password" placeholder="确认密码" class="form-control">--}}
                                {{--</div>--}}
                            </div>
                            <div class="form-group">
                                <div class="col-lg-offset-2 col-lg-10">
                                    <div class="checkbox c-checkbox">
                                        <label>
                                            <input type="checkbox" checked="">
                                            <span class="fa fa-check"></span>同意本平台所有条款</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                {!! Form::submit('加入我们!', ['class'=>'btn btn-primary form-control']) !!}
                                {{--<div class="col-lg-offset-2 col-lg-10">--}}
                                    {{--<button type="submit" class="btn btn-sm btn-default">加入我们！</button>--}}
                                {{--</div>--}}
                                <div class = "col-md-10 col-lg-offset-2">
                                    <br>
                                    <a href="{{url('/login')}}">已有账号？点击登录</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            {!! Form::close() !!}

            {{--平台简介--}}
            <div class="col-md-5 col-lg-offset-1">
                <div class="smart-body">
                    <p class="text-left" style="font-family: 'Open Sans'; font-size: 24px; font-weight: bold;">
                        UrHealth Manager简介
                    </p>
                    <ul class="nav nav-tabs default bordered">
                        <li class="active">
                            <a href="#home" data-toggle="tab">
                                <span class="visible-xs"><i class="icon-home"></i></span>
                                <span class="hidden-xs">Activities</span>
                            </a>
                        </li>
                        <li>
                            <a href="#profile" data-toggle="tab">
                                <span class="visible-xs"><i class="icon-man"></i></span>
                                <span class="hidden-xs">Profile</span>
                            </a>
                        </li>
                        <li>
                            <a href="#messages" data-toggle="tab">
                                <span class="visible-xs"><i class="icon-email"></i></span>
                                <span class="hidden-xs">Messages</span>
                            </a>
                        </li>
                        <li>
                            <a href="#settings" data-toggle="tab">
                                <span class="visible-xs"><i class="icon-settings2"></i></span>
                                <span class="hidden-xs">Settings</span>
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane fade active in" id="home">
                            <div class="slimScrollBar" style="position: relative; overflow: hidden; width: auto; height: 120px;">
                                <div class="scrollable" data-height="120" style="overflow: hidden; width: auto; height: 120px;">
                                    <p>
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est
                                        laborum.
                                    </p>

                                    <p>
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est
                                        laborum.
                                    </p>

                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade in" id="profile">
                            <p>
                                incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                            </p>
                        </div>
                        <div class="tab-pane fade in" id="messages">
                            <p>
                                incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                            </p>
                        </div>
                        <div class="tab-pane fade in" id="settings">
                            <p>
                                incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
