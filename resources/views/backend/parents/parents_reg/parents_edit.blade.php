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
                        <h4 class="box-title">Edit Parents </h4>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <div class="col">
                                <form method="post" action="{{ route('update.parents.registration',$editData->id) }}"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="row"> <!-- 1st Row -->
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <h5>Parents Name <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <input type="text" name="name" class="form-control" value="{{ $editData->name }}"
                                                                required="">
                                                        </div>
                                                    </div>
                                                </div> <!-- End Col md 4 -->
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <h5>Mobile Number <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <input type="text" name="mobile" class="form-control"value="{{ $editData->mobile }}"
                                                                required="">
                                                        </div>
                                                    </div>
                                                </div> <!-- End Col md 4 -->

                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <h5>Email <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <input type="email" name="email" class="form-control" value="{{ $editData->email }}"
                                                                required="">
                                                        </div>
                                                    </div>
                                                </div> <!-- End Col md 4-->

                                            </div> <!-- End 1stRow -->

                                            <div class="row"> <!-- 2nd Row -->
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <h5>Address <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <input type="text" name="address" class="form-control" value="{{ $editData->address }}"
                                                                required="">
                                                        </div>
                                                    </div>
                                                </div> <!-- End Col md 4 -->
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <h5>Gender <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <select name="gender" id="gender" required=""
                                                                class="form-control">
                                                                <option value="" selected="" disabled="">Select
                                                                    Gender</option>
                                                                <option value="Male"
                                                                    {{ $editData->gender == 'Male' ? 'selected' : '' }}>Male
                                                                </option>
                                                                <option value="Female"
                                                                    {{ $editData->gender == 'Female' ? 'selected' : '' }}>
                                                                    Female</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div> <!-- End Col md 4 -->
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <h5>Religion <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <select name="religion" id="religion" required=""
                                                                class="form-control">
                                                                <option value="" selected="" disabled="">Select
                                                                    Religion</option>
                                                                <option value="Islam"{{ $editData->religion == "Islam" ? 'selected' : '' }}>Islam</option>
                                                                <option value="Hindu" {{ $editData->religion == "Hindu" ? 'selected' : '' }}>Hindu</option>
                                                                <option value="Christan"{{ $editData->religion == "Christan" ? 'selected' : '' }}>Christan</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div> <!-- End Col md 4 -->
                                            </div> <!-- End 2nd Row -->
                                            <div class="row"> <!-- 3rd Row -->
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <h5>Date of Birth <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <input type="date" name="dob" class="form-control" value="{{ $editData->dob }}"
                                                                required="">
                                                        </div>
                                                    </div>
                                                </div> <!-- End Col md 4 -->
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <h5>Occupation <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <input type="text" name="occupation" class="form-control" value="{{ $editData->occupation }}"
                                                                required="">
                                                        </div>
                                                    </div>
                                                </div> <!-- End Col md 4 -->
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <h5>Profile Image <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <input type="file" name="image" class="form-control"
                                                                id="image">
                                                        </div>
                                                    </div>
                                                </div> <!-- End Col md 3 -->
                                                <div class="col-md-1">
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <img id="showImage" src="{{ !empty($editData->image) ? url('upload/user_images/'.$editData->image)  : url('upload/no_image.jpg')}}"
                                                                style="width: 100px; width: 100px; border: 1px solid #000000;">
                                                                
                                                        </div>
                                                    </div>
                                                </div> <!-- End Col md 1 -->
                                            </div> <!-- End 3rd Row -->


                                            <div class="text-xs-right">
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
@endsection
