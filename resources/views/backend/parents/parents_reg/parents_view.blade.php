@extends('admin.admin_master')
@section('admin')
    <div class="content-wrapper">
        <div class="container-full">
            <!-- Content Header (Page header) -->
            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-12">
                        <div class="box">
                            <div class="box-header with-border">
                                <h3 class="box-title">Parents List</h3>
                                <a href="{{ route('parents.registration.add') }}" style="float: right;"
                                    class="btn btn-rounded btn-success mb-5"> Add Parents</a>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="table-responsive">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th width="5%">SL</th>
                                                <th>Name</th>
                                                <th>Image</th>
                                                <th>Mobile</th>
                                                <th>Email</th>
                                                <th>Occupation</th>
                                                <th>Gender</th>
                                                <th>Date of Birth</th>
                                                @if (Auth::user()->role == 'Admin')
                                                    <th>Code</th>
                                                @endif
                                                <th width="25%">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($allData as $key => $parents)
                                                <tr>
                                                    <td>{{ $key + 1 }}</td>
                                                    <td> {{ $parents->name }}</td>
                                                    <td>
                                                        <img src="{{ !empty($parents->image) ? url('upload/user_images/' . $parents->image) : url('upload/no_image.jpg') }}"
                                                            style="width: 60px; width: 60px;">
                                                    </td>
                                                    <td> {{ $parents->mobile }}</td>
                                                    <td> {{ $parents->email }}</td>
                                                    <td> {{ $parents->occupation }}</td>
                                                    <td> {{ $parents->gender }}</td>
                                                    <td> {{ $parents->dob }}</td>
                                                    @if (Auth::user()->role == 'Admin')
                                                        <td> {{ $parents->code }}</td>
                                                    @endif
                                                    <td>
                                                        <a title="Edit" href="{{ route('parents.registration.edit', $parents->id) }}"
                                                            class="btn btn-info"><i class="fa fa-edit"></i></a>
                                                        <a title="Delete" href="{{ route('parents.registration.delete', $parents->id) }}"
                                                            class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                                       

                                                    </td>
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
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </section>
            <!-- /.content -->
        </div>
    </div>
@endsection
