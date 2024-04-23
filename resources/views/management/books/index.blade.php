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
            <button type="button" class="btn btn-primary" id="addButton">
                <i class="fa fa-plus"></i>
            </button>
        </div>
    </div>
    <!-- Table container -->
    <div class="table-container">
        <table class="table" id="bookTable">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Category</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody id="tableBody">
                <!-- Book data will be dynamically populated here -->
                <tr>
                    <td>Interstellar war</td>
                    <td>John</td>
                    <td>Fiction</td>
                    <td>
                        <button class="btn btn-sm btn-primary edit-btn"><i class="fa fa-edit"></i></button>
                        <button class="btn btn-sm btn-danger delete-btn"><i class="fa fa-trash"></i></button>
                    </td>
                </tr>
                <tr>
                    <td>Falling for you</td>
                    <td>Susan</td>
                    <td>Romance</td>
                    <td>
                        <button class="btn btn-sm btn-primary edit-btn"><i class="fa fa-edit"></i></button>
                        <button class="btn btn-sm btn-danger delete-btn"><i class="fa fa-trash"></i></button>
                    </td>
                </tr>
                <tr>
                    <td>Fighting for the country</td>
                    <td>Andrew</td>
                    <td>Action</td>
                    <td>
                        <button class="btn btn-sm btn-primary edit-btn"><i class="fa fa-edit"></i></button>
                        <button class="btn btn-sm btn-danger delete-btn"><i class="fa fa-trash"></i></button>
                    </td>
                </tr>
            </tbody>
        </table>

    <!-- Add Book Modal -->
    <div class="modal fade" id="addBookModal" tabindex="-1" role="dialog" aria-labelledby="addBookModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <!-- Form for adding a new book will go here -->
                    <form id="addBookForm">
                        @csrf
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" id="title" required />
                        </div>
                        <div class="form-group">
                            <label for="author">Author</label>
                            <input type="text" class="form-control" id="author" required />
                        </div>
                        <div class="form-group">
                            <label for="category">Category</label>
                                <select class="form-control" id="category" required>
                                    <option value="">Select Category</option>
                                    <option value="fiction">Fiction</option>
                                    <option value="romance">Romance</option>
                                    <option value="fantasy">Fantasy</option>
                                    <option value="action">Action</option>
                                    <option value="education">Education</option>
                                    <option value="health">Health</option>
                                    <!-- Add more options as needed -->
                                </select>
                        </div>
                        <button type="submit" class="btn btn-primary">
                            Submit
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
