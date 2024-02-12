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
						<div class="col-md-4">
                            <h6 class="description-header">Assignment Details 1  </h6>
							<div>

								<p>Semester :<span class="text-gray pl-10">{{ $details['student_semester']['semester_name'] }}</span></p>
								<p>Batch :<span class="text-gray pl-10">{{ $details['student_batch']['batch_name'] }}</span></p>
								<p>Year :<span class="text-gray pl-10">{{ $details['student_year']['name'] }}</span></p>
								<p>Month :<span class="text-gray pl-10">{{ $details['student_month']['month_name'] }}</span></p>
								<p>Group :<span class="text-gray pl-10">{{ $details['group']['name'] }}</span></p>
								<p>Shift :<span class="text-gray pl-10">{{ $details['shift']['name'] }}</span></p>
							</div>
						</div>
						<div class="col-md-4">
                            <h6 class="description-header">Assignment Details 2  </h6>
							<div>
                                <p>Assignment Name :<span class="text-gray pl-10">{{ $details->assignment_title }}</span> </p>
								<p>Assignment of Subject :<span class="text-gray pl-10">{{ $details['student_subject']['name'] }}</span></p>
								<p>Start Date :<span class="text-gray pl-10">{{ $details->assignment_start_date }}</span></p>
								<p>End Date :<span class="text-gray pl-10">{{ $details->assignment_end_date }}</span></p>
								<p>Assignment Marks :<span class="text-gray pl-10">{{ $details->assignment_marks }}</span></p>
                                <p>Program :<span class="text-gray pl-10">{{ $details['student_class']['name' ]}}</span> </p>
							</div>
						</div>
						<div class="col-md-3">
							<div class="pb-15">
								<h6 class="description-header">Assignment Resource Download   </h5>
								<div class="user-social-acount">
									<a title="Picute Show" href="{{ route('assignment.picture.show',$details->id) }}" class="btn btn-circle btn-social-icon btn-facebook"><i class="fa fa-file-image-o"></i></a>
									<a  title="Picute Dwonload" href="{{ route('assignment.picture.download',$details->picture) }}" class="btn btn-circle btn-social-icon btn-facebook"><i class="fa fa-download"></i></a>
									<a title="Document Show" href="{{ route('assignment.document.show',$details->id) }}" class="btn btn-circle btn-social-icon btn-instagram"><i class="fa fa-file-pdf-o"></i></a>
									<a  title="Document Dwonload" href="{{ route('assignment.document.download',$details->document) }}" class="btn btn-circle btn-social-icon btn-instagram"><i class="fa fa-download"></i></a>
								</div>
							</div>
						</div>
                    </div>
                    <textarea id="editor1"  name="description" rows="10" cols="80">
                        {{ $details->description }}
                     </textarea>
					</div>
					<!-- /.box-body -->
				  </div>
            </div>
            <!-- /.row -->
            {{-- <div class="row">
            			  <!-- Profile Image -->
				  <div class="box">
					<div class="box-body box-profile">
					  <div class="row">
						<div class="col-md-12">
                            <h6 class="description-header">Assignment Long Description </h6>
							<div>

								<span class="text-gray pl-10">{!! $details->description !!}</span>
                               
								
							</div>
						</div>
						
						
                    </div>
                   
					</div>
					<!-- /.box-body -->
				  </div>
            </div>
            <!-- /.row --> --}}

          </section>
          <!-- /.content -->
        </div>
    </div>
    <!-- /.content-wrapper -->
 @endsection
