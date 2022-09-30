@extends('admin.layouts.default')
@section('title', 'Users')

@section('content')
    <!-- /.content-header -->
    {{-- <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="text-right mb-3">
                        <a href="{{ route('admin.users.create') }}" class="btn btn-primary">Create</a>
                    </div>
                    <div class="card">
                        <div class="card-body p-0">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Last Login</th>
                                        <th>Created at</th>
                                        <th style="width: 90px">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data->items() as $key => $user)
                                        <tr role="row" class="{{ $key % 2 == 0 ? 'odd' : 'even' }}">
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->last_login }}</td>
                                            <td>{{ $user->created_at }}</td>
                                            <td>
                                                <form action="{{ route('admin.users.destroy', ['user' => $user->id]) }}"
                                                    method="POST">
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <a class="text-success"
                                                        href="{{ route('admin.users.edit', ['user' => $user->id]) }}"><i
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
    </section> --}}
    <!-- /.content-wrapper -->
@stop
