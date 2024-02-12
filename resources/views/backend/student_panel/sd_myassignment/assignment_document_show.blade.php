@extends('admin.admin_master')
@section('admin')
<div class="content-wrapper">
    <div class="container-full">
		<!-- Main content -->
		<section class="content">

            <div class="row">
            			  <!-- Profile Image -->
				  <div class="box">
					<div class="box-body box-profile">
					 <div class="row">
                        <div class="col-md-12">
                            <iframe  src="{{ !empty($assignmentDocument->document) ? url('upload/student_assignment_file/' . $assignmentDocument->document) : url('upload/no_image.jpg') }}"
                                style="width: 100%; height: 1000px;"frameborder="0" ></iframe>
                        </div>
                     </div>
					</div>
					<!-- /.box-body -->
				  </div>
            </div>
            <!-- /.row -->

          </section>
          <!-- /.content -->
        </div>
    </div>
    <!-- /.content-wrapper -->
 @endsection
