@extends('web.model')
@section('admin')

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

        <!--用户管理-->
        <div class="col-sm-8 col-xs-offset-2">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-12 text-left">
                            <h6 class="smart-margin-off" style="font-family: 微软雅黑; font-size: medium;">用户管理</h6>
                        </div>
                    </div>
                </div>

                <div class="panel-body">
                    <div class="panel panel-default">
                        <!-- Table -->
                        <table class="table">
                            <tr>
                                <th>用户名</th>
                                <th>性别</th>
                                <th>邮箱</th>
                                <th>用户权限</th>
                                <th>修改权限</th>
                                <th>操作</th>
                            </tr>
                            @foreach($users as $user)
                                {!! Form::open(['url'=>'/modifyUser/'.$user->id])!!}
                                <tr>
                                    <th>{{ $user->name }}</th>  <!--姓名-->
                                    <th>{{ $user->gender }}</th>    <!--性别-->
                                    <th>{{ $user->email }}</th> <!--邮箱-->
                                    <th>{{ $user->type }}</th> <!--类型-->
                                    <th>    <!--用户类型设置-->
                                        <select name = "type" class = "form-control" style="width: 150px;">
                                            <option name = "type" value="general">一般用户</option>
                                            <option name = "type" value="doctor">医生</option>
                                            <option name = "type" value="coach">教练</option>
                                        </select>
                                    </th>
                                    <th>
                                        {!! Form::submit("提交",['class'=>'btn btn-primary form-comtrol', 'style'=>'width: 100px; height: 30px; font-size: 16px; font-weight: bold; font-family: 微软雅黑; font-size: 16px;']) !!}
                                        {!! Form::close() !!}
                                    </th>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>

            </div>
        </div>

    </div>

@stop