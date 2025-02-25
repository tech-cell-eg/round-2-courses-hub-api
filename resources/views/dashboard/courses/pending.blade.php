@extends('dashboard.master')

@section('content')
    <div class="container mt-5">
        <div class="card shadow p-4">
            <h3 class="mb-4 text-center text-warning"><i class="fa fa-hourglass-half"></i> Pending Courses</h3>

            @if($pendingCourses->isEmpty())
                <div class="alert alert-info text-center">No pending courses available.</div>
            @else
                <table class="table table-bordered table-hover">
                    <thead class="table-warning">
                    <tr>
                        <th>#</th>
                        <th>Course Name</th>
                        <th>Instructor</th>
                        <th>Category</th>
                        <th>Submitted On</th>
                        <th class="text-center">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($pendingCourses as $index => $course)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $course->name }}</td>
                            <td>{{ $course->instructor->name }}</td>
                            <td>{{ $course->category->name }}</td>
                            <td>{{ $course->created_at->format('Y-m-d') }}</td>
                            <td class="text-center">
{{--                                {{ route('admin.courses.approve', $course->id) }}--}}
                                <form action="{{ route('courses.approved', $course->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="btn btn-success btn-sm">
                                        <i class="fa fa-check"></i> Approve
                                    </button>
                                </form>
                                <form action="{{ route('courses.rejectedCourses', $course->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        <i class="fa fa-times"></i> Reject
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endif

            <div class="text-center mt-4">
{{--                <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-secondary">--}}
                    <i class="fa fa-arrow-left"></i> Back to Dashboard
                </a>
            </div>
        </div>
    </div>
@endsection
