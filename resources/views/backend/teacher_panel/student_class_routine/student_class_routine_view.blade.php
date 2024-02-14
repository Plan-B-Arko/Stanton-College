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
                                <h3 class="box-title">Class Routine List</h3>
                                <a href="{{ route('student.class.routine.add') }}" style="float: right;"
                                    class="btn btn-rounded btn-dark mb-5">Add Student Class Routine</a>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="table-responsive">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th width="5%">SL</th>
                                                <th>Class</th>
                                                <th>Year</th>
                                                <th>Month</th>
                                                <th>Semester</th>
                                                <th>Batch</th>
                                                <th>Group</th>
                                                <th width="25%">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($studentclassroutines->studentClassRoutines as $key => $studentClassRoutine)

                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td> {{ $studentClassRoutine['student_class']['name'] }}</td>
                                                <td> {{ $studentClassRoutine['student_year']['name'] }}</td>
                                                <td> {{ $studentClassRoutine['student_month']['month_name'] }}</td>
                                                <td> {{ $studentClassRoutine['student_semester']['semester_name'] }}</td>
                                                <td> {{ $studentClassRoutine['student_batch']['batch_name'] }}</td>
                                                <td> {{ $studentClassRoutine['group']['name'] }}</td>
                                                <td>

                                                    <a title="Class Routine Show" href="{{ route('student.class.routine.file.show',$studentClassRoutine->id) }}" class="btn btn-circle btn-info"><i class="fa fa-eye"></i></a>
                                                    <a  title="Class Routine Dwonload" href="{{ route('student.class.routine.file.download',$studentClassRoutine->routine_file) }}" class="btn btn-circle btn-success"><i class="fa fa-download"></i></a>
                                                    <a title="Edit" href="{{ route('student.class.routine.edit', $studentClassRoutine->id) }}"
                                                        class = "btn btn-circle  btn-primary"><i class="fa fa-edit"></i></a>
                                                        <a  title="Delete" id="delete"
                                                            href="{{ route('student.class.routine.delete', $studentClassRoutine->id) }}"
                                                            class="btn btn-danger btn-circle" ><i class="fa fa-trash"></i></a>

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
