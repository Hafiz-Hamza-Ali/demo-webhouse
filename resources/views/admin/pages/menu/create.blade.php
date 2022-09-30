@extends('admin.layouts.master')
@section('title', 'Create Category')

@section('content');

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add Category</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Add Menu</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Form</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
            <form  action="{{route("admin.menus.store")}}" method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                <div class="card-body" >
                   <div class="row">

                      <div class="col-md-12">
                        <div class="form-group">
                           <label for="exampleInputEmail1">Menu Name</label>
                           <input type="text" live_required name="name" class=" form-control" id="firstname" placeholder="Enter Menu Name" required>
                           @error('menu-name')
                           <div class="text-danger">{{ $message }}</div>
                       @enderror
                        </div>
                     </div>


                <!-- /.card-body -->
                <div class="card-footer">
                   <button type="submit" id="submit" class="btn btn-primary">Submit</button>
                </div>
             </form>

            </div>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


  @endsection
