@extends('management.layouts.master')

@section('categories-content')
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
    {{-- <!-- Table container -->
    <div class="table-container">
        <table class="table" id="categoryTable">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody id="tableBody">
                @foreach ($categories as $category) <!-- Loop through categories -->
                    <tr>
                        <td>{{ $category->name }}</td>
                        <td>
                            <button class="btn btn-sm btn-primary edit-btn"><i class="fa fa-edit"></i></button>
                            <button class="btn btn-sm btn-danger delete-btn"><i class="fa fa-trash"></i></button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table> --}}

        <ul class="list-group">
            <li class="list-group-item list-group-item-action d-flex justify-content-between align-items-center font-weight-bold">
                <span>Name</span>
                <span>Actions</span>
            </li>
            @foreach ($categories as $category)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <span>{{ $category->name }}</span>
                    <div>
                        <!-- Edit Button -->
                        <button class="btn btn-sm btn-primary edit-btn" onclick="window.location='{{ route('management.categories.edit', $category->id) }}';">
                            <i class="fa fa-edit"></i>
                        </button>
                        
                        <!-- Delete Button -->
                        <form action="{{ route('management.categories.destroy', $category->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger delete-btn" onclick="return confirm('Are you sure you want to delete this category?')">
                                <i class="fa fa-trash"></i>
                            </button>
                        </form>                
                    </div>
                </li>
            @endforeach
        </ul>
        
        
        <!-- Add Category Modal -->
        <div class="modal fade" id="addCategoryModal" tabindex="-1" role="dialog" aria-labelledby="addCategoryModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <!-- Form for adding a new category will go here -->
                        <form id="addCategoryForm" action="{{ route('management.categories.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" name="name" required />
                            </div>
                            <button type="submit" class="btn btn-primary">
                                Add Category
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection