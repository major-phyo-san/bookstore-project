@extends('management.layouts.master')

@section('body-content')
    <!-- Search bar -->
    <div class="mb-3">
        <h5>Category Lists</h5>
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
        <table class="table" id="categoryTable">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Category</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody id="tableBody">
                @foreach ($categories as $category)
                    <!-- Loop through categories -->
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->name }}</td>
                        <td>
                            <button id="editCategory" class="btn btn-sm btn-primary edit-btn" data-id="{{ $category->id }}"
                                data-name="{{ $category->name }}"><i class="fa fa-edit"></i></button>

                            <form action="{{ route('management.categories.destroy', $category->id) }}" method="POST"
                                class="d-inline">
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

        <!-- Add Category Modal -->
        <div class="modal fade" id="addCategoryModal" tabindex="-1" role="dialog" aria-labelledby="addCategoryModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
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

        <!-- Edit Modal -->
        <div class="modal fade" id="editCategoryModal" tabindex="-1" role="dialog"
            aria-labelledby="editCategoryModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <!-- Edit Form -->
                        <form id="editCategoryForm" action="{{ route('management.categories.update', $category->id) }}"
                            method="POST">
                            @csrf
                            @method('PUT')
                            <!-- Use Laravel's form model binding to populate fields -->
                            <input type="hidden" id="editCategoryId" name="id" value="{{ $category->id }}">
                            <div class="form-group">
                                <label for="editCategoryName">Name</label>
                                <input type="text" id="editCategoryName" name="name" class="form-control"
                                    value="{{ $category->name }}">
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
                $('#addCategoryModal').modal('show');
            });
            var categoryId = null;
            var categoryName = null;
            // Show edit modal
            $(document).on("click", ".edit-btn", function() {
                categoryId = $(this).data('id');
                categoryName = $(this).data('name');
                $("#editCategoryModal").modal('show');
            });

        });
        //  document.getElementById("addCategoryForm").addEventListener('submit', function(event) {
        //      event.preventDefault();
        //      var name = document.getElementById("name").value;
        //      var newRow = document.getElementById("tableBody").insertRow();
        //      newRow.innerHTML = "<td>" + name + "</td><td>" +
        //          "<button class='btn btn-sm btn-primary edit-btn'><i class='fa fa-edit'></i></button> " +
        //          "<button class='btn btn-sm btn-danger delete-btn'><i class='fa fa-trash'></i></button>" +
        //          "</td>";

        //      // Hide the modal
        //      $('#addCategoryModal').modal('hide');
        //      // Reset the form fields
        //      document.getElementById("addCategoryForm").reset();
        //      newRow.querySelector(".edit-btn").addEventListener("click", function() {
        //          // Handle edit button click
        //          console.log("Edit button clicked");
        //      });
        //  });

        //  // Function to show the edit modal
        //  function showEditModal(categoryId) {
        //      $('#editModal' + categoryId).modal('show'); // Show the modal
        //  }

        //  // Function to reset form fields to their original values when canceled
        //  function resetEditForm(categoryId) {
        //      var originalValue = $('#editCategoryName' + categoryId).data('originalValue');
        //      $('#editCategoryName' + categoryId).val(originalValue);
        //      $('#editModal' + categoryId).modal('hide');
        //  }

        //  // Function to store original form values when modal is opened
        //  $('#editModal{{ $category->id }}').on('show.bs.modal', function(event) {
        //      var inputField = $(this).find('#editCategoryName{{ $category->id }}');
        //      inputField.attr('data-original-value', inputField.val());
        //  });
    </script>
@endsection
