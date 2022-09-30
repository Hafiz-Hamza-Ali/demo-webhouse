<?php
//dd($values);die();
?>
@extends('admin.layouts.master')

@section('content');
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
   
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Menus</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <a  href="{{route('admin.menus.create')}}"  value="Add Vendor"class="btn btn-block btn-primary btn-flat">Add Menus</a>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- /.card -->

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">DataTable with default features</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Id</th>
                    <th>Name</th>
                   
                    <th>Date</th>
                    <th>Actions</th>
                  </tr>
                  </thead>
                  <tbody>
                      @foreach ($data as $value)


                  <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $value->name }}</td>
                   
                    <td>{{ date('d-M-Y', strtotime($value->created_at)); }}</td>
                    <td>
                        <a href = '{{ route('admin.menus.edit', $value->id) }}' class="btn btn-sm btn-success">Edit</a>
                        <form method="POST" action="{{ route('admin.menus.destroy', $value->id) }}" style="display: inline-block">
                            @csrf
                            <input type="hidden" name="_method" value="DELETE">

                            <button type="submit" class="btn btn-sm btn-danger" >Delete</button>
                        </form>

                      </td>
                  </tr>
                  @endforeach
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  @endsection
