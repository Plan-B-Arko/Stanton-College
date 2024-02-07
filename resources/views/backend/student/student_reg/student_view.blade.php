    @extends('admin.admin_master')
    @section('admin')
        <div class="content-wrapper">
            <div class="container-full">
                <!-- Content Header (Page header) -->
                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-12">
                            <div class="box bb-3 border-warning">
                                <div class="box-header">
                                    <h4 class="box-title">Student <strong>Search</strong></h4>
                                </div>
                                <div class="box-body">
                                    <form method="GET" action="{{ route('student.year.class.wise') }}">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <h5>Year <span class="text-danger"> </span></h5>
                                                    <div class="controls">
                                                        <select name="year_id" required="" class="form-control">
                                                            <option value="" selected="" disabled="">Select Year
                                                            </option>
                                                            @foreach ($years as $year)
                                                                <option value="{{ $year->id }}"
                                                                    {{ @$year_id == $year->id ? 'selected' : '' }}>
                                                                    {{ $year->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div> <!-- End Col md 4 -->
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <h5>Month <span class="text-danger"> </span></h5>
                                                    <div class="controls">
                                                        <select name="month_id" required="" class="form-control">
                                                            <option value="" selected="" disabled="">Select
                                                                Month
                                                            </option>
                                                            @foreach ($months as $month)
                                                                <option value="{{ $month->id }}"
                                                                    {{ @$month_id == $month->id ? 'selected' : '' }}>
                                                                    {{ $month->month_name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div> <!-- End Col md 4 -->
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <h5>Class <span class="text-danger"> </span></h5>
                                                    <div class="controls">
                                                        <select name="class_id" required="" class="form-control">
                                                            <option value="" selected="" disabled="">Select
                                                                Class
                                                            </option>
                                                            @foreach ($classes as $class)
                                                                <option value="{{ $class->id }}"
                                                                    {{ @$class_id == $class->id ? 'selected' : '' }}>
                                                                    {{ $class->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div> <!-- End Col md 4 -->
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <h5>Batch <span class="text-danger"> </span></h5>
                                                    <div class="controls">
                                                        <select name="batch_id" required="" class="form-control">
                                                            <option value="" selected="" disabled="">Select
                                                                Batch
                                                            </option>
                                                            @foreach ($batches as $batch)
                                                                <option value="{{ $batch->id }}"
                                                                    {{ @$batch_id == $batch->id ? 'selected' : '' }}>
                                                                    {{ $batch->batch_name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div> <!-- End Col md 4 -->
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <h5>Semester <span class="text-danger"> </span></h5>
                                                    <div class="controls">
                                                        <select name="semester_id" required="" class="form-control">
                                                            <option value="" selected="" disabled="">Select
                                                                Semester
                                                            </option>
                                                            @foreach ($semesters as $semester)
                                                                <option value="{{ $semester->id }}"
                                                                    {{ @$semester_id == $semester->id ? 'selected' : '' }}>
                                                                    {{ $semester->semester_name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div> <!-- End Col md 4 -->
                                            <div class="col-md-2" style="padding-top: 25px;">
                                                <input type="submit" class="btn btn-rounded btn-dark mb-5" name="search"
                                                    value="Search">
                                            </div> <!-- End Col md 4 -->
                                        </div><!--  end row -->
                                    </form>
                                </div>
                            </div>
                        </div> <!-- // end first col 12 -->
                        <div class="col-12">
                            <div class="box">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Student List</h3>
                                    <a href="{{ route('student.registration.add') }}" style="float: right;"
                                        class="btn btn-rounded btn-success mb-5"> Add Student </a>
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body">
                                    <div class="table-responsive">
                                        {{-- @if ('search') --}}
                                            @if (!isset($search))
                                            {{-- @if (!@search) --}}
                                            <table id="example1" class="table table-bordered table-striped">
                                                <thead>
                                                    <tr>
                                                        <th width="5%">SL</th>
                                                        <th>Name</th>
                                                        <th>ID No</th>
                                                        <th>Email</th>
                                                        <th>Roll</th>
                                                        <th>Year</th>
                                                        <th>Month</th>
                                                        <th>Semester</th>
                                                        <th>Batch</th>
                                                        <th>Class</th>
                                                        <th>Image</th>
                                                        @if (Auth::user()->role == 'Admin')
                                                            <th>Code</th>
                                                        @endif
                                                        <th width="25%">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($allData as $key => $value)
                                                        <tr>
                                                            <td>{{ $key + 1 }}</td>
                                                            <td> {{ $value['student']['name'] }}</td>
                                                            <td> {{ $value['student']['id_no'] }}</td>
                                                            <td> {{ $value['student']['email'] }}</td>
                                                            <td> {{ $value->roll }} </td>
                                                            <td> {{ $value['student_year']['name'] }}</td>
                                                            <td> {{ $value['student_month']['month_name'] }}</td>
                                                            <td> {{ $value['student_semester']['semester_name'] }}</td>
                                                            <td> {{ $value['student_batch']['batch_name'] }}</td>
                                                            <td> {{ $value['student_class']['name'] }}</td>
                                                            <td>
                                                                <img src="{{ !empty($value['student']['image']) ? url('upload/user_images/' . $value['student']['image']) : url('upload/no_image.jpg') }}"
                                                                    style="width: 60px; width: 60px;">
                                                            </td>
                                                            <td> {{ $value['student']['code'] }}</td>
                                                            <td>
                                                                <a title="Edit"
                                                                    href="{{ route('student.registration.edit', $value->student_id) }}"
                                                                   {{--  class="btn btn-info" --}}class="badge badge-primary"> <i class="fa fa-edit"></i> </a>
                                                                <a title="Promotion"
                                                                    href="{{ route('student.registration.promotion', $value->student_id) }}"
                                                                    {{-- class="btn btn-primary" --}}class="badge badge-info"><i class="fa fa-check"></i></a>
                                                                <a target="_blank" title="Details"
                                                                    href="{{ route('student.registration.details', $value->student_id) }}"
                                                                    {{-- class="btn btn-danger" --}} class="badge badge-success"><i class="fa fa-eye"></i></a>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                                <tfoot>
                                                </tfoot>
                                            </table>
                                        @else
                                            <table id="example1" class="table table-bordered table-striped">
                                                <thead>
                                                    <tr>
                                                        <th width="5%">SL</th>
                                                        <th>Name</th>
                                                        <th>ID No</th>
                                                        <th>Email</th>
                                                        <th>Roll</th>
                                                        <th>Year</th>
                                                        <th>Month</th>
                                                        <th>Semester</th>
                                                        <th>Batch</th>
                                                        <th>Class</th>
                                                        <th>Image</th>
                                                        @if (Auth::user()->role == 'Admin')
                                                            <th>Code</th>
                                                        @endif
                                                        <th width="25%">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($allData as $key => $value)
                                                        <tr>
                                                            <td>{{ $key + 1 }}</td>
                                                            <td> {{ $value['student']['name'] }}</td>
                                                            <td> {{ $value['student']['id_no'] }}</td>
                                                            <td> {{ $value['student']['email'] }}</td>
                                                            <td> {{ $value->roll }} </td>
                                                            <td> {{ $value['student_year']['name'] }}</td>
                                                            <td> {{ $value['student_month']['month_name'] }}</td>
                                                            <td> {{ $value['student_semester']['semester_name'] }}</td>
                                                            <td> {{ $value['student_batch']['batch_name'] }}</td>
                                                            <td> {{ $value['student_class']['name'] }}</td>
                                                            <td>
                                                                <img src="{{ !empty($value['student']['image']) ? url('upload/user_images/' . $value['student']['image']) : url('upload/no_image.jpg') }}"
                                                                    style="width: 60px; width: 60px;">
                                                            </td>
                                                            <td> {{ $value['student']['code'] }}</td>
                                                            <td>
                                                                <a title="Edit"
                                                                    href="{{ route('student.registration.edit', $value->student_id) }}"
                                                                   {{--  class="btn btn-info" --}}class="badge badge-primary"> <i class="fa fa-edit"></i> </a>
                                                                <a title="Promotion"
                                                                    href="{{ route('student.registration.promotion', $value->student_id) }}"
                                                                    {{-- class="btn btn-primary" --}}class="badge badge-info"><i class="fa fa-check"></i></a>
                                                                <a target="_blank" title="Details"
                                                                    href="{{ route('student.registration.details', $value->student_id) }}"
                                                                    {{-- class="btn btn-danger" --}} class="badge badge-success"><i class="fa fa-eye"></i></a>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                                <tfoot>
                                                </tfoot>
                                            </table>
                                        @endif
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
