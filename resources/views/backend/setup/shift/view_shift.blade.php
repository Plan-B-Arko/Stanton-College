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
                                <h3 class="box-title">Student Sfhit List</h3>
                                <a href="{{ route('student.shift.add') }}" style="float: right;"
                                    class="btn btn-rounded btn-dark mb-5">Add Student Shift</a>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="table-responsive">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>SL</th>
                                                <th>Name</th>
                                                <th>Action </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($allData as $key => $shift)
                                                <tr>
                                                    <td>{{ $key + 1 }}</td>
                                                    <td>{{ $shift->name }}</td>
                                                    <td>
                                                        <a href="{{ route('student.shift.edit', $shift->id) }}"
                                                            class="btn btn-success">Edit</a>
                                                        <a href="{{ route('student.shift.delete', $shift->id) }}"
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
