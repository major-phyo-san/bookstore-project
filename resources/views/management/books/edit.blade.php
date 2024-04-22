@extends('management.layouts.master')

@section('categories-content')
<div class="container">
    <h1>Edit Category</h1>
    
    <!-- Edit Category Form -->
    <form action="{{ route('management.books.categories.update', $category->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="category_name">Category Name:</label>
            <input type="text" name="name" id="category_name" class="form-control" value="{{ $category->name }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update Category</button>
    </form>
</div>
@endsection
