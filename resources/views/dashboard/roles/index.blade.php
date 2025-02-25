@extends('dashboard.master')

@section('content')
    <div class="container">
        <div class="row mb-3">
            <div class="col-lg-6">
                <h2 class="text-white">Role Management</h2>
            </div>
            <div class="col-lg-6 text-end">
                @can('role-create')
                    <a class="btn btn-success btn-sm" href="{{ route('roles.create') }}">
                        <i class="fa fa-plus"></i> Create New Role
                    </a>
                @endcan
            </div>
        </div>

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="table-responsive">
            <table class="table table-dark table-bordered table-striped table-hover">
                <thead class="table-light">
                <tr>
                    <th width="100px">No</th>
                    <th>Name</th>
                    <th width="280px">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($roles as $key => $role)
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td>{{ $role->name }}</td>
                        <td>
                            <a class="btn btn-info btn-sm" href="{{ route('roles.show',$role->id) }}">
                                <i class="fa-solid fa-list"></i> Show
                            </a>
                            @can('role-edit')
                                <a class="btn btn-primary btn-sm" href="{{ route('roles.edit',$role->id) }}">
                                    <i class="fa-solid fa-pen-to-square"></i> Edit
                                </a>
                            @endcan
                            @can('role-delete')
                                <form method="POST" action="{{ route('roles.destroy', $role->id) }}" style="display:inline" onsubmit="return confirm('Are you sure?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        <i class="fa-solid fa-trash"></i> Delete
                                    </button>
                                </form>
                            @endcan
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        {!! $roles->links('pagination::bootstrap-5') !!}
    </div>
@endsection
