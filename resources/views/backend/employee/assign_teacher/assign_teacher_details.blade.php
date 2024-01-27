@extends('admin.admin_master')
@section('admin')
    <div class="content-wrapper">
        <div class="container-full">
            <!-- Content Header (Page header) -->
            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-12">
                        <div class="box">
                            <div class="box-header with-border">
                                <h3 class="box-title"> Assign Teacher Details</h3>
                                <a href="{{ route('teacher.assign.add') }}" style="float: right;"
                                    class="btn btn-rounded btn-success mb-5"> Add Assign Subject</a>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <h4><strong>Assign Teacher of Class : </strong>{{ $detailsData['0']['student_class']['name'] }} </h4>
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped">
                                        <thead class="thead-light">
                                            <tr>
                                                <th width="5%">SL</th>
                                                <th width="20%">Teacher</th>
                                                <th width="20%">Year</th>
                                                <th width="20%">Group</th>
                                                <th width="20%">Shift</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($detailsData as $key => $detail)
                                                <tr>
                                                    <td>{{ $key + 1 }}</td>
                                                    <td> {{ $detail['teacher']['name'] }}</td>
                                                    <td> {{ $detail['student_year']['name'] }}</td>
                                                    <td> {{ $detail['group']['name'] }}</td>
                                                    <td> {{ $detail['shift']['name'] }}</td>

                                                </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                        </tfoot>
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
@endsection
