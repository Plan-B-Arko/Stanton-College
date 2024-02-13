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
                                <h3 class="box-title">Third Semester Assignment List</h3>
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
                                            @foreach ($thirdSemesterAssignments as $key => $thirdSemesterAssignment)
                                                <tr>
                                                    <td>{{ $key + 1 }}</td>
                                                    <td>{{ $thirdSemesterAssignment->assignment_title }}</td>
                                                    <td> {{ $thirdSemesterAssignment['student_subject']['name']}}</td>
                                                    <td> {{ $thirdSemesterAssignment->assignment_marks }}</td>
                                                    <td> {{ $thirdSemesterAssignment->assignment_start_date }}</td>
                                                    <td> {{ $thirdSemesterAssignment->assignment_end_date }}</td>
                                                    <td>
                                                        <a title="Edit" href="{{ route('assignment.details.view', $thirdSemesterAssignment->id) }}"
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

