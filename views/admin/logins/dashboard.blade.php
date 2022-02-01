@extends('admin.layouts.master')
@section('title')
    <button class="button-menu-mobile open-left">
        <i class="fa fa-bars"></i>
    </button> <h1 class="title">Dashboard</h1>
@endsection
@section('content')
    <div class="content-wrapper">
        <section class="content">
            <div class="row">
                <div class="col-md-8">
                    <div class=" panel-widget widget Nexus-stats clearfix" style="height:435px;">
                        <div class="col-sm-12" style="height:435px;">
                            <h4 class="title">Sales Report</h4>
                            <div id="rickshaw-timescale" class="bigchart"></div>
                            <div id="slider"></div>
                        </div>
                        <div class="right">
                            <!-- start stats -->
                            <ul class="widget-block-list clearfix">
                                <li class="col-4"><div class="block"><span>10547</span>Coreldraw</div><//li>
                                <li class="col-4"><div class="block"><span>8795</span>Photoshop</i></div></li>
                                <li class="col-4"><div class="block"><span>656</span>Illustrator</i></div></li>
                            </ul>
                            <!-- end stats -->
                        </div>


                    </div>
                </div>

                <div class="col-md-4">

                    <!-- solid sales graph -->
                    <div class="box box-solid bg-teal-gradient">
                        <div class="box-header">
                            <h3 class="box-title">Order Graph</h3>
                            <div class="box-tools pull-right">
                                <button class="btn bg-teal btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                <button class="btn bg-teal btn-sm" data-widget="remove"><i class="fa fa-times"></i></button>
                            </div>
                        </div>
                        <div class="box-body border-radius-none">
                            <div class="chart" id="line-chart1" style="height: 250px;"></div>
                        </div><!-- /.box-body -->
                        <div class="box-footer no-border">
                            <div class="row">
                                <div class="col-xs-4 text-center" style="border-right: 1px solid #333333">
                                    <input type="text" class="knob" data-readonly="true" value="20" data-width="60" data-height="60" data-fgColor="#1ab394">
                                    <div class="knob-label">Mail-Orders</div>
                                </div><!-- ./col -->
                                <div class="col-xs-4 text-center" style="border-right: 1px solid #333333">
                                    <input type="text" class="knob" data-readonly="true" value="50" data-width="60" data-height="60" data-fgColor="#1ab394">
                                    <div class="knob-label">Online</div>
                                </div><!-- ./col -->
                                <div class="col-xs-4 text-center">
                                    <input type="text" class="knob" data-readonly="true" value="30" data-width="60" data-height="60" data-fgColor="#1ab394">
                                    <div class="knob-label">In-Store</div>
                                </div><!-- ./col -->
                            </div><!-- /.row -->
                        </div><!-- /.box-footer -->
                    </div><!-- /.box -->
                </div>
            </div><!-- /.row -->

            <!-- Start Top Stats -->


            <div class="row1">
                <div class="col-md-12 block-space1">
                    <div id="sum_box" class="mbl">
                        <div class="col-sm-6 col-md-3 block-space">
                            <div class="panel profit db mbm gray-back">
                                <div class="panel-body">
                                    <p class="description">Profit description</p>
                                    <h4 class="value"><span>
                                            </span><span>$</span></h4>

                                    <div class="progress progress-striped active mbn">
                                        <div role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"
                                             style="width: 60%;" class="progress-bar progress-bar-success">
                                            <span class="sr-only">60% Complete (success)</span></div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-3 block-space">
                            <div class="panel income db mbm">
                                <div class="panel-body">
                                    <p class="description">Todays Income</p>
                                    <h4 class="value"><span>815</span><span>$</span></h4>
                                    <div class="progress progress-striped active mbn">
                                        <div role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"
                                             style="width: 40%;" class="progress-bar progress-bar-info">
                                            <span class="sr-only">40% Complete (success)</span></div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-3 block-space gray-back">
                            <div class="panel task db mbm">
                                <div class="panel-body">
                                    <p class="description">Task completed</p>
                                    <h4 class="value"><span>215</span></h4>
                                    <div class="progress  progress-striped active mbn">
                                        <div role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"
                                             style="width: 50%;" class="progress-bar progress-bar-danger">
                                            <span class="sr-only">50% Complete (success)</span></div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-3 block-space">
                            <div class="panel visit db mbm">
                                <div class="panel-body">
                                    <p class="description">Total Visitors</p>
                                    <h4 class="value"><span>128</span></h4>
                                    <div class="progress  progress-striped active mbn">
                                        <div role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"
                                             style="width: 70%;" class="progress-bar progress-bar-warning">
                                            <span class="sr-only">70% Complete (success)</span></div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>





                </div>
            </div>
            <!-- End Top Stats -->

            <!-- Main content -->
            <section class="content">

                <div class="row">
                    <div class="col-md-9">
                        <!-- LINE CHART -->
                        <div class="box box-info">
                            <div class="box-header with-border">
                                <h3 class="box-title">Order History</h3>
                                <div class="box-tools pull-right">
                                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                                </div>
                            </div>
                            <div class="box-body chart-responsive">
                                <div class="chart" id="line-chart" style="height: 300px;"></div>
                            </div><!-- /.box-body -->
                        </div><!-- /.box -->

                        <div class="row">
                            <div class="col-xs-12">
                                <div class="box">
                                    <div class="box-header">
                                        <h3 class="box-title">Top User List</h3>
                                        <div class="box-tools">
                                            <div class="input-group" style="width: 150px;">
                                                <input type="text" name="table_search" class="form-control input-sm pull-right" placeholder="Search">
                                                <div class="input-group-btn">
                                                    <button class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- /.box-header -->
                                    <div class="box-body table-responsive no-padding">
                                        <table class="table table-hover">
                                            <tbody><tr>
                                                <th>ID</th>
                                                <th>User</th>
                                                <th>Date</th>
                                                <th>Status</th>
                                                <th>Reason</th>
                                            </tr>
                                            <tr>
                                                <td>183</td>
                                                <td>John Doe</td>
                                                <td>11-7-2014</td>
                                                <td><span class="label label-success">Approved</span></td>
                                                <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                                            </tr>
                                            <tr>
                                                <td>219</td>
                                                <td>Saraha Smith</td>
                                                <td>11-7-2014</td>
                                                <td><span class="label label-warning">Pending</span></td>
                                                <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                                            </tr>
                                            <tr>
                                                <td>657</td>
                                                <td>Mark Doe</td>
                                                <td>11-7-2014</td>
                                                <td><span class="label label-primary">Approved</span></td>
                                                <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                                            </tr>
                                            <tr>
                                                <td>175</td>
                                                <td>Mike Smith</td>
                                                <td>11-7-2014</td>
                                                <td><span class="label label-danger">Denied</span></td>
                                                <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                                            </tr>
                                            <tr>
                                                <td>175</td>
                                                <td>Kendra Hall</td>
                                                <td>11-7-2016</td>
                                                <td><span class="label label-success">Approved</span></td>
                                                <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                                            </tr>
                                            </tbody></table>
                                    </div><!-- /.box-body -->
                                </div><!-- /.box -->
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="box box-widget">
                            <div class="box-header with-border">
                                <div class="user-block">
                                    <img class="img-circle" src="images/users/user1-128x128.jpg" alt="user image">
                                    <span class="username"><a href="#">Mark Smith</a></span>
                                    <span class="description">Shared publicly - 10:30 PM Today</span>
                                </div><!-- /.users-block -->
                                <!-- /.box-tools -->
                            </div><!-- /.box-header -->
                            <div class="box-body pad_none" style="display: block;">
                                <img class="img-responsive pad_minus" src="assets/img/blog-img.jpg" alt="Photo">
                                <div style="padding:15px; overflow:hidden">
                                    <p>Bacon ipsum dolor sit amet salami venison chicken.</p>

                                    <span class="pull-left text-muted">127 likes - 3 comments</span>
                                </div>
                            </div><!-- /.box-body -->
                            <div class="box-footer box-comments" style="display: block;">
                                <div class="box-comment">
                                    <!-- User image -->
                                    <img class="img-circle img-sm" src="images/users/user3-128x128.jpg" alt="user image">
                                    <div class="comment-text">
                      <span class="username">
                        Kendra Hall
                        <span class="text-muted">8:03 PM Today</span>
                      </span><!-- /.username -->
                                        Aeneam eu leo quam. Cras mattis consecterur purus
                                    </div><!-- /.comment-text -->
                                </div><!-- /.box-comment -->
                                <div class="box-comment">
                                    <!-- User image -->
                                    <img class="img-circle img-sm" src="images/users/user4-128x128.jpg" alt="user image">
                                    <div class="comment-text">
                      <span class="username">
                        Mark Doe
                        <span class="text-muted">8:03 PM Today</span>
                      </span><!-- /.username -->
                                        Donec sed odio dui. Aeneam eu leo quam. Cras mattis
                                    </div><!-- /.comment-text -->
                                </div><!-- /.box-comment -->
                                <!-- /.box-comment -->
                                <!-- /.box-comment -->
                                <!-- /.box-comment -->
                                <!-- /.box-comment -->
                            </div><!-- /.box-footer -->
                            <div class="box-footer" style="display: block;">
                                <form action="#" method="post">
                                    <img class="img-responsive img-circle img-sm" src="images/users/user4-128x128.jpg" alt="alt text">
                                    <!-- .img-push is used to add margin to elements next to floating images -->
                                    <div class="img-push">
                                        <input type="text" class="form-control input-sm" placeholder="Enter your comment here">
                                    </div>
                                </form>
                            </div><!-- /.box-footer -->
                        </div>






                    </div><!-- /.col (RIGHT) -->
                </div><!-- /.row -->

            </section><!-- /.content -->
            <!-- right col (We are only adding the ID to make the widgets sortable)-->
            <section class="content">
                <div class="row">
                    <div class="col-md-4">
                        <!-- Map box -->
                        <div class="box box-solid bg-light-blue-gradient">
                            <div class="box-header">
                                <!-- tools box -->
                                <div class="pull-right box-tools">
                                    <button class="btn btn-yellow btn-sm daterange pull-right" data-toggle="tooltip" title="Date range"><i class="fa fa-calendar"></i></button>
                                    <button class="btn btn-yellow btn-sm pull-right" data-widget="collapse" data-toggle="tooltip" title="Collapse" style="margin-right: 5px;"><i class="fa fa-minus"></i></button>
                                </div><!-- /. tools -->

                                <h3 class="box-title">
                                    Our Visitors
                                </h3>
                            </div>
                            <div class="box-body">
                                <div id="world-map" style="height: 250px; width: 100%;"></div>
                            </div><!-- /.box-body-->

                        </div>
                        <!-- /.box -->
                    </div>

                    <div class="col-md-4">
                        <!-- DONUT CHART -->
                        <div class="box box-danger">
                            <div class="box-header with-border">
                                <h3 class="box-title">SALES ANALYTICS</h3>
                                <div class="box-tools pull-right">
                                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                                </div>
                            </div>
                            <div class="box-body chart-responsive">
                                <div class="chart" id="sales-chart" style="height: 280px; position: relative; font-family: 'Montserrat', sans-serif!important;"></div>
                            </div><!-- /.box-body -->
                        </div><!-- /.box -->
                    </div>



                    <div class="col-md-4 calendar">
                        <!-- Calendar -->
                        <div class="box box-solid bg-green-gradient">
                            <div class="box-header">
                                <h3 class="box-title">Calendar</h3>
                                <!-- tools box -->
                                <div class="pull-right box-tools">
                                    <!-- button with a dropdown -->
                                    <div class="btn-group">
                                        <button class="btn calender_btn btn-sm dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bars"></i></button>
                                        <ul class="dropdown-menu pull-right" role="menu">
                                            <li><a href="#">Add new event</a></li>
                                            <li><a href="#">Clear events</a></li>
                                            <li class="divider"></li>
                                            <li><a href="#">View calendar</a></li>
                                        </ul>
                                    </div>
                                    <button class="btn calender_btn btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                    <button class="btn calender_btn btn-sm" data-widget="remove"><i class="fa fa-times"></i></button>
                                </div><!-- /. tools -->
                            </div><!-- /.box-header -->
                            <div class="box-body no-padding">
                                <!--The calendar -->
                                <div id="calendar" style="width: 100%"></div>
                            </div><!-- /.box-body -->

                        </div><!-- /.box -->
                    </div>
                </div>

            </section><!-- right col -->

            <!-- right col (We are only adding the ID to make the widgets sortable)-->
            <section class="content">
                <div class="row">
                    <div class="col-md-8">
                        <div class="box">
                            <div class="box-header">
                                <h3 class="box-title">Todays task</h3>
                                <div class="box-tools">
                                    <ul class="pagination pagination-sm no-margin pull-right">
                                        <li><a href="#">&laquo;</a></li>
                                        <li><a href="#">1</a></li>
                                        <li><a href="#">2</a></li>
                                        <li><a href="#">3</a></li>
                                        <li><a href="#">&raquo;</a></li>
                                    </ul>
                                </div>
                            </div><!-- /.box-header -->
                            <div class="box-body table-responsive no-padding">
                                <table class="table">
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>Task</th>
                                        <th>Progress</th>
                                        <th style="width: 40px">Label</th>
                                    </tr>
                                    <tr>
                                        <td>1.</td>
                                        <td>Update software</td>
                                        <td>
                                            <div class="progress progress-xs">
                                                <div class="progress-bar progress-bar-danger" style="width: 55%"></div>
                                            </div>
                                        </td>
                                        <td><span class="badge bg-red">55%</span></td>
                                    </tr>
                                    <tr>
                                        <td>2.</td>
                                        <td>Clean database</td>
                                        <td>
                                            <div class="progress progress-xs">
                                                <div class="progress-bar progress-bar-yellow" style="width: 70%"></div>
                                            </div>
                                        </td>
                                        <td><span class="badge bg-yellow">70%</span></td>
                                    </tr>
                                    <tr>
                                        <td>3.</td>
                                        <td>Nexus Admin Template</td>
                                        <td>
                                            <div class="progress progress-xs progress-striped active">
                                                <div class="progress-bar progress-bar-primary" style="width: 30%"></div>
                                            </div>
                                        </td>
                                        <td><span class="badge bg-light-blue">30%</span></td>
                                    </tr>
                                    <tr>
                                        <td>4.</td>
                                        <td>Fix all bugs</td>
                                        <td>
                                            <div class="progress progress-xs progress-striped active">
                                                <div class="progress-bar progress-bar-success" style="width: 90%"></div>
                                            </div>
                                        </td>
                                        <td><span class="badge bg-green">90%</span></td>
                                    </tr>
                                    <tr>
                                        <td>5.</td>
                                        <td>Themesground Web Design</td>
                                        <td>
                                            <div class="progress progress-xs">
                                                <div class="progress-bar progress-bar-danger" style="width: 55%"></div>
                                            </div>
                                        </td>
                                        <td><span class="badge bg-red">55%</span></td>
                                    </tr>
                                    <tr>
                                        <td>6.</td>
                                        <td>iphone Design</td>
                                        <td>
                                            <div class="progress progress-xs">
                                                <div class="progress-bar progress-bar-yellow" style="width: 70%"></div>
                                            </div>
                                        </td>
                                        <td><span class="badge bg-yellow">70%</span></td>
                                    </tr>
                                    <tr>
                                        <td>7.</td>
                                        <td>Development</td>
                                        <td>
                                            <div class="progress progress-xs progress-striped active">
                                                <div class="progress-bar progress-bar-primary" style="width: 30%"></div>
                                            </div>
                                        </td>
                                        <td><span class="badge bg-light-blue">30%</span></td>
                                    </tr>

                                </table>
                            </div><!-- /.box-body -->
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="box box-primary">
                            <div class="box-header">
                                <h3 class="box-title">To Do List</h3>
                                <div class="box-tools pull-right">
                                    <ul class="pagination pagination-sm inline">
                                        <li><a href="#">&laquo;</a></li>
                                        <li><a href="#">1</a></li>
                                        <li><a href="#">2</a></li>
                                        <li><a href="#">3</a></li>
                                        <li><a href="#">&raquo;</a></li>
                                    </ul>
                                </div>
                            </div><!-- /.box-header -->
                            <div class="box-body">
                                <ul class="todo-list">
                                    <li>
                                        <!-- drag handle -->
                                        <span class="handle">
                        <i class="fa fa-ellipsis-v"></i>
                        <i class="fa fa-ellipsis-v"></i>
                      </span>
                                        <!-- checkbox -->
                                        <input type="checkbox" value="" name="">
                                        <!-- todo text -->
                                        <span class="text">Design a nice theme</span>
                                        <!-- Emphasis label -->
                                        <small class="label label-danger"><i class="fa fa-clock-o"></i> 2 mins</small>
                                        <!-- General tools such as edit or delete-->
                                        <div class="tools">
                                            <i class="fa fa-edit"></i>
                                            <i class="fa fa-trash-o"></i>
                                        </div>
                                    </li>
                                    <li>
                      <span class="handle">
                        <i class="fa fa-ellipsis-v"></i>
                        <i class="fa fa-ellipsis-v"></i>
                      </span>
                                        <input type="checkbox" value="" name="">
                                        <span class="text">Make the theme responsive</span>
                                        <small class="label label-info"><i class="fa fa-clock-o"></i> 4 hours</small>
                                        <div class="tools">
                                            <i class="fa fa-edit"></i>
                                            <i class="fa fa-trash-o"></i>
                                        </div>
                                    </li>
                                    <li>
                      <span class="handle">
                        <i class="fa fa-ellipsis-v"></i>
                        <i class="fa fa-ellipsis-v"></i>
                      </span>
                                        <input type="checkbox" value="" name="">
                                        <span class="text">Let theme shine like a star</span>
                                        <small class="label label-warning"><i class="fa fa-clock-o"></i> 1 day</small>
                                        <div class="tools">
                                            <i class="fa fa-edit"></i>
                                            <i class="fa fa-trash-o"></i>
                                        </div>
                                    </li>
                                    <li>
                      <span class="handle">
                        <i class="fa fa-ellipsis-v"></i>
                        <i class="fa fa-ellipsis-v"></i>
                      </span>
                                        <input type="checkbox" value="" name="">
                                        <span class="text">Let theme shine like a star</span>
                                        <small class="label label-success"><i class="fa fa-clock-o"></i> 3 days</small>
                                        <div class="tools">
                                            <i class="fa fa-edit"></i>
                                            <i class="fa fa-trash-o"></i>
                                        </div>
                                    </li>
                                    <li>
                      <span class="handle">
                        <i class="fa fa-ellipsis-v"></i>
                        <i class="fa fa-ellipsis-v"></i>
                      </span>
                                        <input type="checkbox" value="" name="">
                                        <span class="text">Check your messages and notifications</span>
                                        <small class="label label-primary"><i class="fa fa-clock-o"></i> 1 week</small>
                                        <div class="tools">
                                            <i class="fa fa-edit"></i>
                                            <i class="fa fa-trash-o"></i>
                                        </div>
                                    </li>

                                </ul>
                            </div><!-- /.box-body -->
                            <div class="box-footer clearfix no-border">
                                <button class="btn btn-default pull-right"><i class="fa fa-plus"></i> Add item</button>
                            </div>
                        </div>
                    </div>
                </div>


            </section>



        </section><!-- /.content -->
    </div>
    <div id="contextMenu" class="dropdown clearfix">
        <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu" style="display:block;position:static;margin-bottom:5px;">
            <li><a tabindex="-1" href="javascript:;" data-priority="high"><i class="fa fa-circle-o text-red-1"></i> High Priority</a></li>
            <li><a tabindex="-1" href="javascript:;" data-priority="medium"><i class="fa fa-circle-o text-orange-3"></i> Medium Priority</a></li>
            <li><a tabindex="-1" href="javascript:;" data-priority="low"><i class="fa fa-circle-o text-yellow-1"></i> Low Priority</a></li>
            <li><a tabindex="-1" href="javascript:;" data-priority="none"><i class="fa fa-circle-o text-lightblue-1"></i> None</a></li>
        </ul>
    </div>
@endsection
@section('js')
    <script>
        var resizefunc = [];
    </script>
    <script>
        $.widget.bridge('uibutton', $.ui.button);
    </script>
    <script>
        // set up our data series with 50 random data points
        var seriesData = [ [], [], [] ];
        var random = new Rickshaw.Fixtures.RandomData(20);
        for (var i = 0; i < 110; i++) {
            random.addData(seriesData);
        }
        // instantiate our graph!
        /* ======================================================================
        TIME SCALE
        ====================================================================== */
        var seriesData = [ [], [], []];
        var random = new Rickshaw.Fixtures.RandomData(1540000);

        for (var i = 0; i < 100; i++) {
            random.addData(seriesData);
        }

        var graph = new Rickshaw.Graph( {
            element: document.getElementById("rickshaw-timescale"),
            renderer: 'bar',
            series: [
                {
                    color: "#1ab394",
                    data: seriesData[0],
                    name: 'Photodune'
                },

                {
                    color: "#8bc34a",
                    data: seriesData[1],
                    name: 'Codecanyon'
                },

                {
                    color: "#fad771",
                    data: seriesData[2],
                    name: 'Themeforest'
                }
            ]
        } );

        graph.render();

        var hoverDetail = new Rickshaw.Graph.HoverDetail( {
            graph: graph,
            formatter: function(series, x, y) {
                var date = '<span class="date">' + new Date(x * 1000).toUTCString() + '</span>';
                var swatch = '<span class="detail_swatch" style="background-color: ' + series.color + '"></span>';
                var content = swatch + series.name + ": " + parseInt(y) + '<br>' + date;
                return content;
            }
        } );
    </script>
@endsection
