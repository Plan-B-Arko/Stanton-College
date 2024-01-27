@extends('admin.admin_master')
@section('admin')
    <div class="content-wrapper">
        <div class="container-full">
            <!-- Content Header (Page header) -->
            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-12">
                        @foreach ( $allData as $assignStudent)
                        <div class="box">
                            <div class="box-header with-border">
                                <h3 class="box-title">My Class Name: {{ $assignStudent['student_class']['name'] }}</h3>
                                <p class="subtitle" >My Subject List</p>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="table-responsive">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th width="5%">SL</th>
                                                <th>Subject Name</th>
                                                <th>Subject Full Mark</th>
                                                <th>Subject Pass Mark</th>
                                                <th>Subjective Mark</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($assignStudent->assignedSubjects as $key => $assignSubject)
                                                <tr>
                                                    <td>{{ $key + 1 }}</td>
                                                    <td> {{ $assignSubject['subject']['name']}}</td>
                                                    <td> {{ $assignSubject->full_mark }}</td>
                                                    <td> {{ $assignSubject->pass_mark }}</td>
                                                    <td> {{ $assignSubject->subjective_mark }}</td>

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
                        @endforeach
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </section>
            <!-- /.content -->
        </div>
    </div>
@endsection

