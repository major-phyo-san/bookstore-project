@extends('management.layouts.master')

@section('body-content')
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
            <button type="button" class="btn btn-primary" id="addButton" data-toggle="modal" data-target="#addBookModal">
                <i class="fa fa-plus"></i>
            </button>
        </div>
    </div>
    <!-- Table container -->
    <div class="table-container">
        <table class="table" id="bookTable">
            <thead>
                <tr>
                    <th>Book ID</th> 
                    <th>Title</th>
                    <th>Author</th>
                    <th>Category</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody id="tableBody">
                <!-- Book data will be dynamically populated here -->
                <tr>
                    <td>001</td>
                    <td>Interstellar war</td>
                    <td>John</td>
                    <td>Fiction</td>
                    <td>
                        <button class="btn btn-sm btn-primary edit-btn" data-toggle="modal" data-target="#editBookModal" data-book-id="1"><i class="fa fa-edit"></i></button>
                        <button class="btn btn-sm btn-danger delete-btn"><i class="fa fa-trash"></i></button>
                    </td>
                </tr>
                <tr>
                    <td>002</td>
                    <td>Falling for you</td>
                    <td>Susan</td>
                    <td>Romance</td>
                    <td>
                        <button class="btn btn-sm btn-primary edit-btn" data-toggle="modal" data-target="#editBookModal" data-book-id="2"><i class="fa fa-edit"></i></button>
                        <button class="btn btn-sm btn-danger delete-btn"><i class="fa fa-trash"></i></button>
                    </td>
                </tr>
                <tr>
                    <td>003</td>
                    <td>Fighting for the country</td>
                    <td>Andrew</td>
                    <td>Action</td>
                    <td>
                        <button class="btn btn-sm btn-primary edit-btn" data-toggle="modal" data-target="#editBookModal" data-book-id="3"><i class="fa fa-edit"></i></button>
                        <button class="btn btn-sm btn-danger delete-btn"><i class="fa fa-trash"></i></button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    

    <!-- Add Book Modal -->
    <div class="modal fade" id="addBookModal" tabindex="-1" role="dialog" aria-labelledby="addBookModalLabel" aria-hidden="true">
        <!-- Modal content -->
    </div>

    <!-- Edit Book Modal -->
    <div class="modal fade" id="editBookModal" tabindex="-1" role="dialog" aria-labelledby="editBookModalLabel" aria-hidden="true">
        <!-- Modal content -->
    </div>

    <script>
        $(document).ready(function () {
            $('.edit-btn').click(function () {
                var bookId = $(this).data('book-id');
                $.get('/books/' + bookId, function (data) {
                    $('#editBookModal .modal-content').html(data);
                });
            });
        });
    </script>
@endsection
