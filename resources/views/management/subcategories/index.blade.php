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
                <!-- Dynamic rows for subcategories -->
                @foreach ($subcategories as $subcategory)
                    <tr>
                        <td>{{ $subcategory->name }}</td>
                        <td>{{ $subcategory->category->name }}</td>
                        <td>
                            <button class="btn btn-sm btn-primary edit-btn"><i class="fa fa-edit"></i></button>
                            {{-- <button class="btn btn-sm btn-danger delete-btn"><i class="fa fa-trash"></i></button> --}}
                            <form action="{{ route('management.subcategories.destroy', $subcategory->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger delete-btn" onclick="return confirm('Are you sure you want to delete this category?')">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </form>
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
                            <option value="" disabled>Select Category</option>
                            <!-- Static options -->
                            @foreach ($categories as $cateogry)
                                <option value="{{$cateogry->id}}">{{ $cateogry->name }}</option>
                            @endforeach
                            {{-- <option value="fiction">Novel</option>
                            <option value="education">Education</option>
                            <option value="health">Health</option> --}}
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
    <!-- Edit Modal -->
    @foreach ($subcategories as $subcategory)
        <div class="modal fade" id="editModal{{ $subcategory->id }}" tabindex="-1" role="dialog" aria-labelledby="editModal{{ $subcategory->id }}Label" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <!-- Edit Form -->
                        <form id="editSubCategoryForm{{ $subcategory->id }}" action="{{ route('management.subcategories.update', $category->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <!-- Use Laravel's form model binding to populate fields -->
                            <div class="form-group">
                                <label for="editSubCategoryName{{ $subcategory->id }}">Name</label>
                                <input type="text" id="editSubCategoryName{{ $subcategory->id }}" name="name" class="form-control" value="{{ old('name', $subcategory->name) }}" data-original-value="{{ old('name', $subcategory->name) }}">
                            </div>
                            <button type="submit" class="btn btn-primary">Update</button>
                            <button type="button" class="btn btn-secondary" onclick="resetEditForm({{ $subcategory->id }})">Cancel</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>

@endsection
