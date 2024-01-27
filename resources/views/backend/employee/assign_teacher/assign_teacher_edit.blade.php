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
                        <h4 class="box-title">Edit Assign Teacher</h4>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <div class="col">
                                <form method="post" action="{{ route('teacher.assign.update', $editData[0]->class_id) }}">
                                    @csrf
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="add_item">
                                                <div class="form-group">
                                                    <h5>Class Name <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <select name="class_id" required="" class="form-control">
                                                            <option value="" selected="" disabled="">Select
                                                                Class</option>
                                                                @foreach ($classes as $class)
                                                                <option value="{{ $class->id }}"
                                                                    {{ $editData['0']->class_id == $class->id ? 'selected' : '' }}>
                                                                    {{ $class->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div> <!-- // end form group -->
                                                @foreach ($editData as $edit)
                                                <div class="delete_whole_extra_item_add"
                                                    id="delete_whole_extra_item_add">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <h5>Class Teacher <span class="text-danger">*</span></h5>
                                                            <div class="controls">
                                                                <select name="teacher_id[]" required=""
                                                                    class="form-control">
                                                                    <option value="" selected="" disabled="">
                                                                        Select Teacher</option>
                                                                    @foreach ($teachers as $teacher)
                                                                        <option value="{{ $teacher->id }}"{{ $edit->teacher_id == $teacher->id ? 'selected' : '' }}>
                                                                            {{ $teacher->name }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div> <!-- // end form group -->
                                                    </div> <!-- End col-md-3 -->
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <h5>Group <span class="text-danger">*</span></h5>
                                                            <div class="controls">
                                                                <select name="group_id[]" required=""
                                                                    class="form-control">
                                                                    <option value="" selected="" disabled="">
                                                                        Select Group</option>
                                                                    @foreach ($groups as $group)
                                                                    <option value="{{ $group->id }}"{{ $edit->group_id == $group->id ? 'selected' : '' }}>
                                                                            {{ $group->name }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div> <!-- End Col md 3 -->
                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <h5>Year <span class="text-danger">*</span></h5>
                                                            <div class="controls">
                                                                <select name="year_id[]" required=""
                                                                    class="form-control">
                                                                    <option value="" selected="" disabled="">
                                                                        Select Year</option>
                                                                    @foreach ($years as $year)
                                                                        <option value="{{ $year->id }}" {{ $edit->year_id == $year->id ? 'selected' : '' }}>
                                                                            {{ $year->name }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div> <!-- End Col md 4 -->

                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <h5>Shift <span class="text-danger">*</span></h5>
                                                            <div class="controls">
                                                                <select name="shift_id[]" required=""
                                                                    class="form-control">
                                                                    <option value="" selected="" disabled="">
                                                                        Select Shift</option>
                                                                    @foreach ($shifts as $shift)
                                                                        <option value="{{ $shift->id }}" {{ $edit->shif_id == $shift->id ? 'selected' : '' }}>
                                                                            {{ $shift->name }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div> <!-- End Col md 2 -->

                                                    <div class="col-md-2" style="padding-top: 25px;">
                                                        <span class="btn btn-success addeventmore"><i
                                                                class="fa fa-plus-circle"></i> </span> <span
                                                            class="btn btn-danger removeeventmore"><i
                                                                class="fa fa-minus-circle"></i> </span>
                                                    </div><!-- End col-md-2 -->
                                                </div> <!-- end Row -->
                                            </div><!-- // End Remove Delete  -->
                                            @endforeach
                                            </div> <!-- // End add_item -->
                                            <div class="text-xs-right">
                                                <input type="submit" class="btn btn-rounded btn-info mb-5" value="Submit">
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
    <div style="visibility: hidden;">
        <div class="whole_extra_item_add" id="whole_extra_item_add">
            <div class="delete_whole_extra_item_add" id="delete_whole_extra_item_add">
                <div class="form-row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <h5>Class Teacher <span class="text-danger">*</span></h5>
                            <div class="controls">
                                <select name="teacher_id[]" required="" class="form-control">
                                    <option value="" selected="" disabled="">
                                        Select Teacher</option>
                                    @foreach ($teachers as $teacher)
                                        <option value="{{ $teacher->id }}">
                                            {{ $teacher->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div> <!-- // end form group -->
                    </div> <!-- End col-md-3 -->
                    <div class="col-md-3">
                        <div class="form-group">
                            <h5>Group <span class="text-danger">*</span></h5>
                            <div class="controls">
                                <select name="group_id[]" required="" class="form-control">
                                    <option value="" selected="" disabled="">
                                        Select Group</option>
                                    @foreach ($groups as $group)
                                        <option value="{{ $group->id }}">{{ $group->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div> <!-- End Col md 3 -->
                    <div class="col-md-2">
                        <div class="form-group">
                            <h5>Year <span class="text-danger">*</span></h5>
                            <div class="controls">
                                <select name="year_id[]" required="" class="form-control">
                                    <option value="" selected="" disabled="">
                                        Select Year</option>
                                    @foreach ($years as $year)
                                        <option value="{{ $year->id }}">{{ $year->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div> <!-- End Col md 4 -->
                    <div class="col-md-2">
                        <div class="form-group">
                            <h5>Shift <span class="text-danger">*</span></h5>
                            <div class="controls">
                                <select name="shift_id[]" required="" class="form-control">
                                    <option value="" selected="" disabled="">
                                        Select Shift</option>
                                    @foreach ($shifts as $shift)
                                        <option value="{{ $shift->id }}">{{ $shift->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div> <!-- End Col md 2 -->
                    <div class="col-md-2" style="padding-top: 25px;">
                        <span class="btn btn-success addeventmore"><i class="fa fa-plus-circle"></i> </span>
                        <span class="btn btn-danger removeeventmore"><i class="fa fa-minus-circle"></i> </span>
                    </div><!-- End col-md-2 -->
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function() {
            var counter = 0;
            $(document).on("click", ".addeventmore", function() {
                var whole_extra_item_add = $('#whole_extra_item_add').html();
                $(this).closest(".add_item").append(whole_extra_item_add);
                counter++;
            });
            $(document).on("click", '.removeeventmore', function(event) {
                $(this).closest(".delete_whole_extra_item_add").remove();
                counter -= 1
            });
        });
    </script>
@endsection
