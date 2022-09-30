@extends('admin.layouts.default')
@section('title', 'Create Plan')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Create Plan</h1>
                </div><!-- /.col -->
                <!-- <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.users.index') }}">Plans</a></li>
                        <li class="breadcrumb-item active">Create</li>
                    </ol>
                </div> -->
                <!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Main row -->
            <div class="row">
                <div class="offset-md-2 col-md-8">
                    <div class="card card-primary">
                        <form action="{{ route('admin.plans.store') }}" method="POST">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Name</label>
                                    <input type="text" class="form-control" id="userName" name="name" placeholder="Name" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Price</label>
                                    <input type="number" class="form-control" name="price" id="exampleInputEmail1" placeholder="Price" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Benefit</label>
                                    <input type="text" class="form-control" name='benefit' id="Password" placeholder="Benefit" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Month</label>
                                    <input type="text" class="form-control" name='month' id="passwordComfitmation" placeholder="Month" required>
                                </div>
                            </div>
                            <!-- /.card-body -->
    
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>        
                </div>
            </div>
            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    <!-- /.content-wrapper -->
@stop
