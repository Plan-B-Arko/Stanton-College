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
                                <h3 class="box-title">Assignments List</h3>
                                <a href="{{ route('assignment.add') }}" style="float: right;"
                                    class="btn btn-rounded btn-dark mb-5">Add Assignment</a>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="table-responsive">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th width="5%">SL</th>
                                                <th>Title</th>
                                                <th>Marks</th>
                                                <th>Class</th>
                                                <th>Subject</th>
                                                <th>Year</th>
                                                <th>Month</th>
                                                <th>Semester</th>
                                                <th>Batch</th>
                                                <th>Group</th>
                                                <th>Start Date</th>
                                                <th>End Date</th>
                                                <th width="25%">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($assignments->assignments as $key => $assignment)

                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td> {{ $assignment->assignment_title }}</td>
                                                <td> {{ $assignment->assignment_marks }}</td>
                                                <td> {{ $assignment['student_class']['name'] }}</td>
                                                <td> {{ $assignment['student_subject']['name'] }}</td>
                                                <td> {{ $assignment['student_year']['name'] }}</td>
                                                <td> {{ $assignment['student_month']['month_name'] }}</td>
                                                <td> {{ $assignment['student_semester']['semester_name'] }}</td>
                                                <td> {{ $assignment['student_batch']['batch_name'] }}</td>
                                                <td> {{ $assignment['group']['name'] }}</td>
                                                <td> {{ $assignment->assignment_start_date }}</td>
                                                <td> {{ $assignment->assignment_end_date }}</td>
                                                <td>
                                                    <a title="Edit" href="{{ route('assignment.edit', $assignment->id) }}"
                                                        class = "btn btn-info"><i class="fa fa-edit"></i></a>
                                                    <a  title="Delete"
                                                        href="{{ route('assignment.delete', $assignment->id) }}"
                                                        class="btn btn-danger" ><i class="fa fa-trash"></i></a>

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
