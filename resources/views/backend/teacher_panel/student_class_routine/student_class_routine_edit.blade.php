@extends('admin.admin_master')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <div class="content-wrapper">
        <div class="container-full">
            <!-- Content Header (Page header) -->
            <section class="content">
                <!-- Basic Forms -->
                <div class="box">
                    <div class="box-header with-border">
                        <h4 class="box-title">Edit Student Class Routine </h4>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <div class="col">
                                <form method="post" action="{{ route('update.student.class.routine',$editData->id) }}"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="row"> <!-- 4TH Row -->
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <h5>Year <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <select name="year_id" required="" class="form-control">
                                                                <option value="" selected="" disabled="">
                                                                    Select Year</option>
                                                                @foreach ($years as $year)
                                                                    <option value="{{ $year->id }}"{{ $editData->year_id == $year->id ? 'selected' : '' }}>{{ $year->name }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div> <!-- End Col md 4 -->
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <h5>Class <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <select name="class_id" required="" class="form-control">
                                                                <option value="" selected="" disabled="">
                                                                    Select Class</option>
                                                                @foreach ($classes as $class)
                                                                    <option value="{{ $class->id }}"{{ $editData->class_id == $class->id ? 'selected' : '' }}>{{ $class->name }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div> <!-- End Col md 4 -->
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <h5>Group <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <select name="group_id" required="" class="form-control">
                                                                <option value="" selected="" disabled="">
                                                                    Select Group</option>
                                                                @foreach ($groups as $group)
                                                                    <option value="{{ $group->id }}"{{ $editData->group_id == $group->id ? 'selected' : '' }}>{{ $group->name }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div> <!-- End Col md 4 -->
                                            </div> <!-- End 4TH Row -->
                                            <div class="row"> <!-- 5TH Row -->
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <h5>Student Batch <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <select name="batch_id" required="" class="form-control">
                                                                <option value="" selected="" disabled="">
                                                                    Select Batch</option>
                                                                @foreach ($batches as $batch)
                                                                    <option value="{{ $batch->id }}"{{ $editData->batch_id == $batch->id ? 'selected' : '' }}>{{ $batch->batch_name }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div> <!-- End Col md 4 -->
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <h5>Month <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <select name="month_id" required="" class="form-control">
                                                                <option value="" selected="" disabled="">
                                                                    Select Month</option>
                                                                @foreach ($months as $month)
                                                                    <option value="{{ $month->id }}"{{ $editData->month_id == $month->id ? 'selected' : '' }}>{{ $month->month_name }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div> <!-- End Col md 4 -->
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <h5>Semester <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <select name="semester_id" required="" class="form-control">
                                                                <option value="" selected="" disabled="">
                                                                    Select Semester</option>
                                                                @foreach ($semesters as $semester)
                                                                    <option value="{{ $semester->id }}"{{ $editData->semester_id == $semester->id ? 'selected' : '' }}>{{ $semester->semester_name }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div> <!-- End Col md 4 -->
                                            </div> <!-- End 5TH Row -->
                                            <div class="row"> <!-- 6TH Row -->

                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <h5>Shift <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <select name="shift_id" required="" class="form-control">
                                                                <option value="" selected="" disabled="">
                                                                    Select Shift</option>
                                                                @foreach ($shifts as $shift)
                                                                    <option value="{{ $shift->id }}"{{ $editData->shift_id == $shift->id ? 'selected' : '' }}>{{ $shift->name }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div> <!-- End Col md 4 -->
                                              
                                             


                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <h5>Attach Document<span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <input type="file" name="routine_file"  class="form-control"
                                                               id="routine_file">
                                                        </div>
                                                    </div>
                                                </div> <!-- End Col md 4 -->
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <iframe id="showDocument" src="{{ !empty($editData->routine_file) ? url('upload/student_routine_file/' . $editData->routine_file) : url('upload/no_image.jpg') }}"
                                                                style="width: 300px; height: 100px; border: 1px solid #000000;"></iframe>
                                                        </div>
                                                    </div>
                                                </div> <!-- End Col md 4 -->
                                            </div> <!-- End 6TH Row -->
                                            <div class="text-xs-right mt-5">
                                                <input type="submit" class="btn btn-rounded btn-info mb-5"
                                                    value="Update">
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


	<!-- Sunny Admin App -->
    <script type="text/javascript">
        $(document).ready(function() {
            $('#routine_file').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#showDocument').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script>
@endsection
