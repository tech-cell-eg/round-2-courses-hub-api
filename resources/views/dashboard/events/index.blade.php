@extends('dashboard.master')

@section('content')
    <div class="container mt-5">
        <div class="card shadow p-4">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h3 class="mb-0">Events List</h3>
                <a href="{{ route('event.create') }}" class="btn btn-success">+ Add New Event</a>
            </div>

            <table class="table table-hover table-bordered text-center">
                <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Location</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Price</th>
                    <th>Category</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($events as $event)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $event->name }}</td>
                        <td>{{ $event->location }}</td>
                        <td>{{ $event->start_date }}</td>
                        <td>{{ $event->end_date }}</td>
                        <td>${{ number_format($event->price, 2) }}</td>
                        <td>{{ $event->category->name }}</td>
                        <td>
                            <a href="{{ route('event.edit', $event->id) }}" class="btn btn-primary btn-sm">Edit</a>

                            <form action="{{ route('event.destroy', $event->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"
                                        onclick="return confirm('Are you sure?')">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            {{--            {{ $events->links() }} <!-- إضافة Pagination -->--}}
        </div>
    </div>
@endsection
