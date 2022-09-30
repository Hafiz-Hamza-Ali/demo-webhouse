@extends('admin.layouts.default')
@section('title', 'Plans')

@section('content')
    <!-- /.content-header -->
   <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="text-right mb-3">
                        <a href="{{ route('admin.plans.create') }}" class="btn btn-primary margin-bottom">Create</a>
                    </div>
                    <div class="card">
                        <div class="card-body p-0">
                            <table class="table table-striped table-bordered table-condensed border-bottom">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Price</th>
                                        <th>Benefit</th>
                                        <th>Month</th>
                                        <th style="width: 90px">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data->items() as $key => $user)
                                        <tr role="row" class="{{ $key % 2 == 0 ? 'odd' : 'even' }}">
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->price }}</td>
                                            <td>{{ $user->benefit }}</td>
                                            <td>{{ $user->month }}</td>
                                            <td>
                                                @if(empty($user->plan_id))
                                                <form action="{{ route('admin.plans.activate', ['id' => $user->id]) }}"
                                                    method="POST">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <button type="submit" style="background-color: inherit; border: inherit;"
                                                        class="text-danger"><i class="fas fa-unlock-alt"></i></button>
                                                </form>
                                                @endif
                                                <form action="{{ route('admin.plans.destroy', ['plan' => $user->id]) }}"
                                                    method="POST">
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <a class="text-success"
                                                        href="{{ route('admin.plans.edit', ['plan' => $user->id]) }}"><i
                                                            class="fas fa-edit"></i></a>
                                                    <button style="background-color: inherit; border: inherit;"
                                                        class="text-danger"><i class="fas fa-trash-alt"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <div class="row">
                                <div class="col-md-6">
                                    <h3 class="card-title">Showing {{ $data->firstItem() }} to {{ $data->lastItem() }}
                                        of {{ $data->total() }} entries</h3>
                                </div>
                                <div class="col-md-6">
                                    <div class="card-tools d-flex justify-content-end">
                                        {{ $data->links() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> 
    <!-- /.content-wrapper -->
@stop
