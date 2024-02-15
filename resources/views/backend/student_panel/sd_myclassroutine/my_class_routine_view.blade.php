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
                                <h3 class="box-title">My Class Routine </h3>

                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="table-responsive">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th width="5%">SL</th>
                                                <th>Class</th>
                                                <th>Batch</th>
                                                <th width="25%">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($myClassRoutines as $key => $myClassRoutine)

                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td> {{ $myClassRoutine['student_class']['name'] }}</td>
                                                <td> {{ $myClassRoutine['student_batch']['batch_name'] }}</td>
                                                <td>

                                                    <a title="Class Routine Show" href="{{ route('my.class.routine.file.show',$myClassRoutine->id) }}" class="btn btn-circle btn-info"><i class="fa fa-eye"></i></a>
                                                    <a  title="Class Routine Dwonload" href="{{ route('my.class.routine.file.download',$myClassRoutine->routine_file) }}" class="btn btn-circle btn-success"><i class="fa fa-download"></i></a>


                                                </td>
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
