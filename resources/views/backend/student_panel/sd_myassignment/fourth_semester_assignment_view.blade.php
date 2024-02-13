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
                                <h3 class="box-title">Fourth Semester Assignment List</h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="table-responsive">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th width="5%">SL</th>
                                                <th>Title</th>
                                                <th>Subject Name</th>
                                                <th>Mark</th>
                                                <th>Start Date</th>
                                                <th>End Date</th>
                                                <th>Details View</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($fourthSemesterAssignments as $key => $fourthSemesterAssignment)
                                                <tr>
                                                    <td>{{ $key + 1 }}</td>
                                                    <td>{{ $fourthSemesterAssignment->assignment_title }}</td>
                                                    <td> {{ $fourthSemesterAssignment['student_subject']['name']}}</td>
                                                    <td> {{ $fourthSemesterAssignment->assignment_marks }}</td>
                                                    <td> {{ $fourthSemesterAssignment->assignment_start_date }}</td>
                                                    <td> {{ $fourthSemesterAssignment->assignment_end_date }}</td>
                                                    <td>
                                                        <a title="Edit" href="{{ route('assignment.details.view', $fourthSemesterAssignment->id) }}"
                                                            class = "btn btn-info"><i class="fa fa-eye"></i></a>


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

