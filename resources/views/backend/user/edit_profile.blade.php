@extends('admin.admin_master')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <div class="container-full">
            <!-- Content Header (Page header) -->
            <section class="content">
                <!-- Basic Forms -->
                <div class="box">
                    <div class="box-header with-border">
                        <h4 class="box-title">Manage Profile</h4>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <div class="col">
                                <form method="post" action="{{ route('profile.store') }}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-12">
                                            <!--end row-->
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <h5>User Name <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <input type="text" name="name" class="form-control"
                                                                value="{{ $editData->name }}" required="">
                                                        </div>
                                                    </div>
                                                </div>
                                                <!----end col md -6---->
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <h5>User Email <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <input type="email" name="email" class="form-control"
                                                                value="{{ $editData->email }}" required="">
                                                        </div>
                                                    </div>
                                                </div>
                                                <!----end col md -6---->
                                            </div>
                                            <!--end row-->
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <h5>User Mobile <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <input type="text" name="mobile" class="form-control"
                                                                value="{{ $editData->mobile }}" required="">
                                                        </div>
                                                    </div>
                                                </div>
                                                <!----end col md -6---->
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <h5>User Address <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <input type="text" name="address" class="form-control"
                                                                value="{{ $editData->address }}" required="">
                                                        </div>
                                                    </div>
                                                </div>
                                                <!----end col md -6---->
                                            </div>
                                            <!--end row-->
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <h5> User Gender<span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <select name="gender" id="gender" required=""
                                                                class="form-control">
                                                                <option value="" selected="" disabled="">Select
                                                                    Gender
                                                                </option>
                                                                <option value="Male"
                                                                    {{ $editData->gender == 'Male' ? 'selected' : '' }}>
                                                                    Male</option>
                                                                <option value="Female"
                                                                    {{ $editData->gender == 'Female' ? 'selected' : '' }}>
                                                                    Female</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!----end col md -6---->
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <h5>User Profile Image <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <input type="file" name="image" class="form-control"
                                                                id="image">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="controls">

                                                            <img id="showImage"
                                                                src="{{ !empty($editData->image) ? url('upload/user_images/'. $editData->image) : url('upload/no_image.jpg') }}"
                                                                style="width: 100px;  border:1px solid #0000">
                                                        </div>
                                                    </div>
                                                </div>
                                                <!----end col md -6---->
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-xs-right">
                                        <input href="" type="submit" class="btn btn-rounded btn-info"
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
    <!-- /.content-wrapper -->
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
