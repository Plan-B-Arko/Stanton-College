@extends('admin.admin_master')
@section('admin')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <div class="container-full">
            <!-- Content Header (Page header) -->
            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-12">
                        <div class="box">
                            <div class="box-header with-border">
                                <h3 class="box-title">Class Room List</h3>
                                <a href="{{ route('class.room.add') }}" style="float: right;"
                                    class="btn btn-rounded btn-dark mb-5">Add Class Room</a>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="table-responsive">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>SL</th>
                                                <th>Building Name</th>
                                                <th>Floor Name</th>
                                                <th>Room Number</th>
                                                <th>Room Capacity</th>
                                                <th>Room Type</th>
                                                <th>Action </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($allData as $key => $value)
                                                <tr>
                                                    <td>{{ $key + 1 }}</td>
                                                    <td>{{ $value->building_name }}</td>
                                                    <td>{{ $value->floor_name }}</td>
                                                    <td>{{ $value->room_no }}</td>
                                                    <td>{{ $value->capacity }}</td>
                                                    <td>{{ $value->type }}</td>
                                                    <td>
                                                        <a href="{{ route('class.room.edit', $value->id) }}"
                                                            class="btn btn-success">Edit</a>
                                                        <a href="{{ route('class.room.delete', $value->id) }}"
                                                            id="delete" class="btn btn-danger">Delete</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- /.box-body -->
                        </div>
                        <!-- /.box -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </section>
            <!-- /.content -->
        </div>
    </div>
    <!-- /.content-wrapper -->
@endsection
