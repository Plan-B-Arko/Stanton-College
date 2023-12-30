@extends('admin.admin_master')
@section('admin')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <div class="container-full">
      <!-- Content Header (Page header) -->


      <!-- Main content -->
      <section class="content">
        <div class="row">



          <div class="col-12">

           <div class="box">
              <div class="box-header with-border">
                <h3 class="box-title">Fee Category List</h3>
                <a href="{{ route('fee.category.add') }}" style="float: right;" class="btn btn-rounded btn-dark mb-5">Add Fee Category</a>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                  <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                          <tr>
                              <th >SL</th>

                              <th>Name</th>

                              <th>Action </th>
                          </tr>
                      </thead>
                      <tbody>
                          @foreach ($allData as $key =>$fee_category )

                          <tr>
                              <td>{{ $key+1 }}</td>
                              <td>{{ $fee_category->name }}</td>
                              <td>
                                  <a href="{{ route('fee.category.edit',$fee_category->id) }}" class="btn btn-success">Edit</a>
                                  <a href="{{ route('fee.category.delete',$fee_category->id) }}" id="delete" class="btn btn-danger">Delete</a>
                              </td>


                            </tr>
                            @endforeach

                      </tbody>

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
<!-- /.content-wrapper -->

@endsection
