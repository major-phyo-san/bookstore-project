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

    <!-- Table container -->
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
                            <button class="btn btn-sm btn-primary edit-btn" onclick="showEditForm({{ $category->id }})"><i class="fa fa-edit"></i></button>

                            <form action="{{ route('management.categories.destroy', $category->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger delete-btn" onclick="return confirm('Are you sure you want to delete this category?')">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    <tr id="editFormRow{{ $category->id }}" style="display: none;">
                        <td colspan="2">
                            <form action="{{ route('management.categories.update', $category->id) }}" method="POST" class="edit-form">
                                @csrf
                                @method('PUT')
                                <input type="text" name="name" value="{{ $category->name }}">
                                <button type="submit" class="btn btn-sm btn-success">Save</button>
                                <button type="button" class="btn btn-sm btn-secondary" onclick="hideEditForm({{ $category->id }})">Cancel</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>

        </table>
        <script>

        </script>

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
