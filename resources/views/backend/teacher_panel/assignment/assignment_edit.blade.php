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
                        <h4 class="box-title">Edit Assignment </h4>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <div class="col">
                                <form method="post" action="{{ route('update.assignment',$editData->id) }}"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="row"> <!-- 1st Row -->
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <h5>Assignment Title <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <input type="text" name="assignment_title" value="{{ $editData->assignment_title }}" class="form-control"
                                                                required="">
                                                        </div>
                                                    </div>
                                                </div> <!-- End Col md 4 -->
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <h5>Assignment Marks<span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <input type="text" name="assignment_marks" value="{{ $editData->assignment_marks }}" class="form-control"
                                                                required="">
                                                        </div>
                                                    </div>
                                                </div> <!-- End Col md 4 -->
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <h5>Subject <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <select name="subject_id" required="" class="form-control">
                                                                <option value="" selected="" disabled="">
                                                                    Select Subject</option>
                                                                @foreach ($subjects as $subject)
                                                                    <option value="{{ $subject->id }}"{{ $editData->subject_id == $subject->id ? 'selected' : '' }}>{{ $subject->name }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div> <!-- End Col md 4 -->
                                            </div> <!-- End 1stRow -->
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
                                                        <h5>Assignment Submission Start Date<span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <input type="date" name="assignment_start_date" value="{{ $editData->assignment_start_date }}" class="form-control"
                                                                required="">
                                                        </div>
                                                    </div>
                                                </div> <!-- End Col md 4 -->
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <h5>Assignment Submission End Date<span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <input type="date" name="assignment_end_date" value="{{ $editData->assignment_end_date }}" class="form-control"
                                                                required="">
                                                        </div>
                                                    </div>
                                                </div> <!-- End Col md 4 -->


                                            </div> <!-- End 6TH Row -->
                                            <div class="row">

                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <h5>Attach Document<span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <input type="file" name="document"  class="form-control"
                                                               id="document">
                                                        </div>
                                                    </div>
                                                </div> <!-- End Col md 4 -->
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <iframe id="showDocument" src="{{ !empty($editData->document) ? url('upload/student_assignment_file/' . $editData->document) : url('upload/no_image.jpg') }}"
                                                                style="width: 300px; height: 100px; border: 1px solid #000000;"></iframe>
                                                        </div>
                                                    </div>
                                                </div> <!-- End Col md 4 -->

                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <h5>Attach Picture<span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <input type="file" name="picture" class="form-control"
                                                                id="image">
                                                        </div>
                                                    </div>
                                                </div> <!-- End Col md 4 -->
                                                <div class="col-md-1">
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <img id="showImage" src="{{ !empty($editData->picture) ? url('upload/student_assignment_image/' . $editData->picture) : url('upload/no_image.jpg') }}"
                                                                style="width: 100px; width: 100px; border: 1px solid #000000;">
                                                        </div>
                                                    </div>
                                                </div> <!-- End Col md 4 -->

                                            </div>

                                            <h5>Assignment Description<span class="text-danger">*</span></h5>
                                            <textarea id="editor1"  name="description" rows="10" cols="80">
                                                {{ $editData->description }}
                                             </textarea>
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
            $('#image').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#showImage').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#document').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#showDocument').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script>
@endsection
