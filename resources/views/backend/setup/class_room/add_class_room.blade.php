@extends('admin.admin_master')
@section('admin')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <div class="container-full">
            <!-- Content Header (Page header) -->
            <section class="content">
                <!-- Basic Forms -->
                <div class="box">
                    <div class="box-header with-border">
                        <h4 class="box-title">Add Class Room</h4>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <div class="col">
                                <form method="post" action="{{ route('store.class.room') }}">
                                    @csrf
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="row">


                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Building Name<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="building_name" class="form-control">
                                                        @error('building_name')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Floor Name<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="floor_name" class="form-control">
                                                        @error('floor_name')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Room Number<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="room_no" class="form-control">
                                                        @error('room_no')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Room Capacity<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="capacity" class="form-control">
                                                        @error('capacity')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <h5>Room Type<span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <input type="text" name="type" class="form-control">
                                                            @error('type')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-xs-right">
                                        <input href="" type="submit" class="btn btn-rounded btn-info"
                                            value="submit">
                                    </div>
                                </form>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </section>
        </div>
    </div>
    <!-- /.content-wrapper -->
@endsection
