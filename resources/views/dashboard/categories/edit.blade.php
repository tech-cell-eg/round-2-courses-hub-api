@extends('dashboard.master')
@section('content')
    <div class="container mt-5">
        <div class="card shadow p-4">
            <h3 class="mb-4 text-center">Edit Category</h3>

            <form action="{{ route('category.update', $category->id) }}" method="POST">
                @csrf
                @method('PUT') <!-- لإخبار Laravel أن هذا تحديث وليس إنشاء جديد -->

                <div class="mb-3">
                    <label for="name" class="form-label">Category Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $category->name) }}" required>
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('categories.index') }}" class="btn btn-outline-secondary">Back</a>
                    <button type="submit" class="btn btn-primary">Edit</button>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
@endsection
