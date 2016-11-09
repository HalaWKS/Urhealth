@extends('web.model')
@section('statistic')

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
                        <br>

                        <!--健康数据显示-->
                        @if( count($healthData) != 0 )
                        <div class="col-lg-offset-3">
                            <div>
                                <label>今天走了：{{ $healthData[0]->steps }} 步</label>
                            </div>
                            <br>
                            <div>
                                <label>心率：{{ $healthData[0]->heart_rate }} 次/分</label>
                            </div>
                            <br>
                            <div>
                                <label>血压(高/低)：{{ $healthData[0]->blood_pressure }}</label>
                            </div>
                            <br>
                            <div>
                                <label>昨日睡眠时间：{{ $healthData[0]->sleep_time }}</label>
                            </div>
                        </div>
                        @endif


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


            {{--健康数据统计--}}
            <div class="col-sm-7 col-lg-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading" style="font-family: 微软雅黑; font-size: large">健康数据统计(最近30天)</div>
                    <div class="panel-body">
                        <script type="text/javascript" src="https://www.google.com/jsapi"></script>
                        <script type="text/javascript">
                            google.load('visualization', '1.1', {packages: ['line']});
                            google.setOnLoadCallback(drawChart);

                            function drawChart() {

                                var data = new google.visualization.DataTable();
                                data.addColumn('number', 'days ago');
//                                data.addColumn('number', '步数');
                                data.addColumn('number', '扩张压');
                                data.addColumn('number', '收缩压');
                                data.addColumn('number', '心率');
                                data.addColumn('number', '睡眠时间');

                                data.addRows(<?php echo json_encode($chartData); ?>);
                                var options = {
                                    chart: {
//                                        title: 'Your Health Condition',
//                                        subtitle: 'in proper measure'
                                    },
                                    width: 600,
                                    height: 700
                                };

                                var chart = new google.charts.Line(document.getElementById('linechart_material1'));

                                chart.draw(data, options);
                            }
                        </script>

                        <div id="linechart_material1"></div>
                    </div>
                </div>
            </div>


        </div>


    </div>

@stop
