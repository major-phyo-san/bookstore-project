@extends('management.layouts.master')

@section('categories-content')
<div class="container">
    <h1>Categories</h1>
    
    <!-- Add Category Form -->
    <form action="{{ route('management.books.categories.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="category_name">Category Name:</label>
            <input type="text" name="name" id="category_name" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Add Category</button>
    </form>

    <!-- Category List -->
    <ul class="list-group">
        @foreach ($categories as $category)
            <li class="list-group-item">
                {{ $category->name }}
                <div class="float-right">
                    <!-- Edit Button -->
                    <a href="{{ route('management.books.categories.edit', $category->id) }}" class="btn btn-sm btn-info">Edit</a>
                    <!-- Delete Button -->
                    <form action="{{ route('management.books.categories.destroy', $category->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this category?')">Delete</button>
                    </form>
                </div>
            </li>
        @endforeach
    </ul>
</div>
@endsection