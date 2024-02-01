@extends('admin.admin_master')
@section('admin')
    <div class="content-wrapper">
        <div class="container-full">
            <!-- Main content -->
            {{-- student profile start --}}
            <section class="content">
                <div class="row">
                    <div class="col-12">
                        <div class="box box-widget widget-user">
                            <!-- Add the bg color to the header using any of the bg-* classes -->
                            <div class="widget-user-header bg-black">
                                <h3 class="widget-user-username"> Welcome, {{ $user['student']['name'] }} ! Keep Going.</h3>
                            </div>
                            <div class="widget-user-image">

                                    <img class="rounded-circle"
                                        src="{{ !empty( $user['student']['image']) ? url('upload/user_images/' . $user['student']['image']) : url('upload/no_image.jpg') }}"
                                        alt="User Avatar">

                            </div>
                            <div class="box-footer">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <h5  class="description-header">ACADEMIC INFO : </h5>
                                        <div class="description-block">
                                            <h6 class="widget-user-desc">Student ID NO </h6>
                                            <span class="description-text">{{ $user['student']['id_no'] }}</span>
                                        </div>
                                        <div class="description-block">
                                            <h6 class="widget-user-desc">Student Class </h6>
                                            <span class="description-text">{{ $user['student_class']['name'] }}</span>
                                        </div>
                                        <div class="description-block">
                                            <h6 class="widget-user-desc">Student Group </h6>
                                            <span class="description-text">{{ $user['group']['name'] }}</span>
                                        </div>
                                        <div class="description-block">
                                            <h6 class="widget-user-desc">Student Year </h6>
                                            <span class="description-text">{{ $user['student_year']['name'] }}</span>
                                        </div>
                                        <div class="description-block">
                                            <h6 class="widget-user-desc">Student Shift </h6>
                                            <span class="description-text">{{ $user['shift']['name'] }}</span>
                                        </div>

                                        <!-- /.description-block -->
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-sm-4 br-1 bl-1">
                                        <h5  class="description-header">PROFILE INFO : </h5>
                                        <div class="description-block">
                                            <h5 class="description-header">Student Name</h5>
                                            <span class="description-text">{{ $user['student']['name'] }}</span>
                                        </div>
                                        <div class="description-block">
                                            <h5 class="description-header">Fathers Name</h5>
                                            <span class="description-text">{{ $user['student']['fname'] }}</span>
                                        </div>
                                        <div class="description-block">
                                            <h5 class="description-header">Mothers Name</h5>
                                            <span class="description-text">{{ $user['student']['mname'] }}</span>
                                        </div>


                                        <div class="description-block">
                                            <h5 class="description-header">Moblie Number</h5>
                                            <span class="description-text">{{ $user['student']['mobile'] }}</span>
                                            <div class="description-block">
                                                <h5 class="description-header">Email</h5>
                                                <span >{{ $user['student']['email'] }}</span>
                                            </div>

                                        </div>

                                        <!-- /.description-block -->
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-sm-4">
                                        <h5  class="description-header">IDENTITY : </h5>
                                        <div class="description-block">
                                            <h5 class="description-header">Date Of Birth</h5>
                                            <span class="description-text">{{ $user['student']['dob']}}</span>
                                        </div>
                                        <div class="description-block">
                                            <h5 class="description-header">Blood Group</h5>
                                            <span class="description-text">{{ $user['student']['blood_group']}}</span>
                                        </div>
                                        <div class="description-block">
                                            <h5 class="description-header">Religion</h5>
                                            <span class="description-text">{{ $user['student']['religion'] }}</span>
                                        </div>
                                        <div class="description-block">
                                            <h5 class="description-header">Address</h5>
                                            <span class="description-text">{{  $user['student']['address']  }}</span>
                                        </div>
                                            <div class="description-block">
                                                <h5 class="description-header">Gender</h5>
                                                <span class="description-text">{{ $user['student']['gender'] }}</span>
                                            </div>
                                        <!-- /.description-block -->
                                    </div>
                                    <!-- /.col -->
                                </div>
                                <!-- /.row -->
                            </div>
                        </div>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </section>
            <!-- /.content -->
            {{-- student profile end --}}
            <section class="content">
                <div class="row">
                    <div class="col-xl-3 col-6">
                        <div class="box overflow-hidden pull-up">
                            <div class="box-body">
                                <div class="icon bg-primary-light rounded w-60 h-60">
                                    <i class="text-primary mr-0 font-size-24 mdi mdi-account-multiple"></i>
                                </div>
                                <div>
                                    <p class="text-mute mt-20 mb-0 font-size-16">Upcoming Payable Amount</p>
                                    <h3 class="text-white mb-0 font-weight-500">3400 <small class="text-success"><i
                                                class="fa fa-caret-up"></i> +2.5%</small></h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-6">
                        <div class="box overflow-hidden pull-up">
                            <div class="box-body">
                                <div class="icon bg-warning-light rounded w-60 h-60">
                                    <i class="text-warning mr-0 font-size-24 mdi mdi-car"></i>
                                </div>
                                <div>
                                    <p class="text-mute mt-20 mb-0 font-size-16">Total Payable Amount</p>
                                    <h3 class="text-white mb-0 font-weight-500">3400 <small class="text-success"><i
                                                class="fa fa-caret-up"></i> +2.5%</small></h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-6">
                        <div class="box overflow-hidden pull-up">
                            <div class="box-body">
                                <div class="icon bg-info-light rounded w-60 h-60">
                                    <i class="text-info mr-0 font-size-24 mdi mdi-sale"></i>
                                </div>
                                <div>
                                    <p class="text-mute mt-20 mb-0 font-size-16">Total Paid Amount</p>
                                    <h3 class="text-white mb-0 font-weight-500">$1,250 <small class="text-danger"><i
                                                class="fa fa-caret-down"></i> -0.5%</small></h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-6">
                        <div class="box overflow-hidden pull-up">
                            <div class="box-body">
                                <div class="icon bg-danger-light rounded w-60 h-60">
                                    <i class="text-danger mr-0 font-size-24 mdi mdi-phone-incoming"></i>
                                </div>
                                <div>
                                    <p class="text-mute mt-20 mb-0 font-size-16">Total Course Free</p>
                                    <h3 class="text-white mb-0 font-weight-500">1,460 <small class="text-danger"><i
                                                class="fa fa-caret-up"></i> -1.5%</small></h3>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <!-- interactive chart -->
                        <div class="box">
                            <div class="box-header with-border">
                                <h4 class="box-title">University Progress</h4>

                                <div class="box-tools pull-right">
                                    Real time
                                    <div class="btn-group" id="realtime" data-toggle="btn-toggle">
                                        <button type="button" class="btn btn-default bg-success btn-sm active"
                                            data-toggle="on">On</button>
                                        <button type="button" class="btn btn-default bg-danger btn-sm"
                                            data-toggle="off">Off</button>
                                    </div>
                                </div>
                            </div>
                            <div class="box-body">
                                <div id="interactive" style="height: 300px;"></div>
                            </div>
                            <!-- /.box-body-->
                        </div>
                        <!-- /.box -->
                    </div>
                    <!-- /.col -->
                    <div class="col-lg-6">
                        <!-- Line chart -->
                        <div class="box">
                            <div class="box-header with-border">
                                <h4 class="box-title">Student Performance</h4>
                            </div>
                            <div class="box-body">
                                <div id="line-chart" style="height: 300px;"></div>
                            </div>
                            <!-- /.box-body-->
                        </div>
                        <!-- /.box -->
                    </div>
                    <!-- /.col -->
                    <div class="col-lg-6">

                        <!-- Area chart -->
                        <div class="box">
                            <div class="box-header with-border">
                                <h4 class="box-title">Assignment Activities</h4>
                            </div>
                            <div class="box-body">
                                <div id="area-chart" style="height: 338px;" class="full-width-chart"></div>
                            </div>
                            <!-- /.box-body-->
                        </div>
                        <!-- /.box -->

                    </div>
                    <!-- /.col -->

                    <div class="col-lg-6">
                        <!-- Bar chart -->
                        <div class="box">
                            <div class="box-header with-border">
                                <h4 class="box-title">Event Activities</h4>
                            </div>
                            <div class="box-body">
                                <div id="bar-chart" style="height: 300px;"></div>
                            </div>
                            <!-- /.box-body-->
                        </div>
                        <!-- /.box -->
                    </div>
                    <!-- /.col -->
                    <div class="col-lg-6">

                        <!-- Donut chart -->
                        <div class="box">
                            <div class="box-header with-border">
                                <h4 class="box-title">Donut Chart</h4>
                            </div>
                            <div class="box-body">
                                <div id="donut-chart" style="height: 300px;"></div>
                            </div>
                            <!-- /.box-body-->
                        </div>
                        <!-- /.box -->
                    </div>
                    <!-- /.col -->
                </div>
            </section>

            <!-- /.content -->
        </div>

    </div>
@endsection
