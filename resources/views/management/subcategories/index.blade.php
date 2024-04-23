@extends('management.layouts.master')

@section('sub-categories-content')
    <!-- Search bar -->
    <div class="mb-3">
        <div class="input-group col-3">
            <input type="text" class="form-control" id="searchInput" placeholder="Search..." />
            <div class="input-group-append">
                <button class="btn btn-primary" type="button" onclick="search()">
                    <i class="fa fa-search"></i>
                </button>
            </div>
        </div>
        <div class="add-row">
            <button type="button" class="btn btn-primary" id="addButton">
                <i class="fa fa-plus"></i>
            </button>
        </div>
    </div>

    <!-- Table container -->
    <div class="table-container">
        <table class="table" id="subcategoryTable">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody id="tableBody">
                <!-- Static rows for sample categories -->
                <tr>
                    <td>English</td>
                    <td>Education</td>
                    <td>
                        <button class="btn btn-sm btn-primary edit-btn"><i class="fa fa-edit"></i></button>
                        <button class="btn btn-sm btn-danger delete-btn"><i class="fa fa-trash"></i></button>
                    </td>
                </tr>
                <tr>
                    <td>Exercises</td>
                    <td>Health</td>
                    <td>
                        <button class="btn btn-sm btn-primary edit-btn"><i class="fa fa-edit"></i></button>
                        <button class="btn btn-sm btn-danger delete-btn"><i class="fa fa-trash"></i></button>
                    </td>
                </tr>
                <!-- Dynamic rows for subcategories -->
                @foreach ($subcategories as $subcategory)
                    <tr>
                        <td>{{ $subcategory->name }}</td>
                        <td>{{ $subcategory->category->name }}</td>
                        <td>
                            <button class="btn btn-sm btn-primary edit-btn"><i class="fa fa-edit"></i></button>
                            <button class="btn btn-sm btn-danger delete-btn"><i class="fa fa-trash"></i></button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    
<!-- Add Sub Category Modal -->
<div class="modal fade" id="addSubCategoryModal" tabindex="-1" role="dialog" aria-labelledby="addSubCategoryModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <!-- Form for adding a new subcategory -->
                <form id="addSubCategoryForm"  action="{{ route('management.subcategories.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" required />
                    </div>
                    <div class="form-group">
                        <label for="category">Category</label>
                        <!-- Dropdown for selecting the category -->
                        <select class="form-control" id="category" name="category_id" required>
                            <option value="">Select Category</option>
                            <!-- Static options -->
                            <option value="fiction">Novel</option>
                            <option value="education">Education</option>
                            <option value="health">Health</option>
                            <!-- Add dynamic options here if needed -->
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">
                        Add Sub Category
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>


    {{-- <!-- Category List -->
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
    </ul> --}}

@endsection
