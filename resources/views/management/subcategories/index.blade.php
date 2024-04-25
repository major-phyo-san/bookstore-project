@extends('management.layouts.master')

@section('body-content')
    <!-- Search bar -->
    <div class="mb-3">
        <div class="input-group col-3">
            <input type="text" class="form-control" id="searchInput" placeholder="Search..." />
            <div class="input-group-append">
                <button id="search-btn" class="btn btn-primary" type="button">
                    <i class="fa fa-search"></i>
                </button>
            </div>
        </div>
        <div class="add-row">
            <button type="button" class="btn btn-primary" id="add-btn">
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
                            <button id="editSubcategory" class="btn btn-sm btn-primary edit-btn" data-id="{{ $subcategory->id }}" data-name="{{ $subcategory->name }}"><i class="fa fa-edit"></i></button>
                            <form action="{{ route('management.subcategories.destroy', $subcategory->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger delete-btn"
                                    onclick="return confirm('Are you sure you want to delete this category?')">
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
    <div class="modal fade" id="addSubCategoryModal" tabindex="-1" role="dialog"
        aria-labelledby="addSubCategoryModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <!-- Form for adding a new subcategory -->
                    <form id="addSubCategoryForm" action="{{ route('management.subcategories.store') }}" method="POST">
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
                                    <option value="{{ $cateogry->id }}">{{ $cateogry->name }}</option>
                                @endforeach
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
        <div class="modal fade" id="editSubCategoryModal" tabindex="-1" role="dialog"
        aria-labelledby="editSubCategoryModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <!-- Edit Form -->
                    <form id="editSubCategoryForm"
                        action="{{ route('management.subcategories.update', $subcategory->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <!-- Use Laravel's form model binding to populate fields -->
                        <div class="form-group">
                            <label for="editSubCategoryName">Name</label>
                            <input type="text" id="editGenreName" name="name" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                        <button type="button" class="btn btn-secondary">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection

@section('script-index')
    <script>
        $(document).ready(function() {
            // "Add" button click
            $("#add-btn").click(function() {
                $('#addSubCategoryModal').modal('show');
            });
            var subcategoryId = null;
            var subcategoryName = null;
            // Show edit modal
            $(document).on("click", ".edit-btn", function() {
                subcategoryId = $(this).data('id');
                subcategoryName = $(this).data('name');
                $("#editSubCategoryModal").modal('show');
            });

        });
        // document.getElementById("addSubCategoryForm").addEventListener('submit', function(event) {
        //     event.preventDefault();
        //     var name = document.getElementById("name").value;
        //     var category = document.getElementById("category").value;
        //     var newRow = document.getElementById("tableBody").insertRow();
        //     newRow.innerHTML = "<td>" + name + "</td><td>" + category + "</td><td>" +
        //         "<button class='btn btn-sm btn-primary edit-btn'><i class='fa fa-edit'></i></button> " +
        //         "<button class='btn btn-sm btn-danger delete-btn'><i class='fa fa-trash'></i></button>" +
        //         "</td>";

        //     // Hide the modal
        //     $('#addSubCategoryModal').modal('hide');
        //     // Reset the form fields
        //     document.getElementById("addSubCategoryForm").reset();
        // });

        // // Function to show the edit modal
        // function showEditSubcategoryModal(subcategoryId) {
        //     $('#editSubcategoryModal' + subcategoryId).modal('show'); // Show the modal
        // }

        // // Function to reset form fields to their original values when canceled
        // function resetEditSubcategoryForm(subcategoryId) {
        //     var originalValue = $('#editSubcategoryName' + subcategoryId).data('originalValue');
        //     $('#editSubcategoryName' + subcategoryId).val(originalValue);
        //     $('#editSubcategoryModal' + subcategoryId).modal('hide');
        // }

        // // Function to store original form values when modal is opened
        // $('#editSubcategoryModal{{ $subcategory->id }}').on('show.bs.modal', function(event) {
        //     var inputField = $(this).find('#editSubcategoryName{{ $subcategory->id }}');
        //     inputField.attr('data-original-value', inputField.val());
        // });
    </script>
@endsection
