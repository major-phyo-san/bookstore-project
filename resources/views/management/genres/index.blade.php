@extends('management.layouts.master')

@section('body-content')
    <!-- Search bar -->
    <div class="mb-3">
        <h5>Genre Lists</h5>
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
        <table class="table" id="genreTable">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Genre</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody id="tableBody">
                @foreach ($genres as $genre)
                    <!-- Loop through genres -->
                    <tr>
                        <td class="genre-id">{{ $genre->id }}</td>
                        <td class="genre-name">{{ $genre->name }}</td>
                        <td>
                            <button type="button" id="editGenre" class="btn btn-sm btn-primary edit-btn" data-id="{{ $genre->id }}" data-name="{{ $genre->name }}"><i class="fa fa-edit"></i></button>
                            <form action="{{ route('management.genres.destroy', $genre->id) }}" method="POST"
                                class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger delete-btn"
                                    onclick="return confirm('Are you sure you want to delete this genre?')">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </form>

                        </td>
                    </tr>
                @endforeach
            </tbody>

        </table>

        <!-- Add Genre Modal -->
        <div class="modal fade" id="addGenreModal" tabindex="-1" role="dialog" aria-labelledby="addGenreModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <!-- Form for adding a new genre will go here -->
                        <form id="addGenreForm" action="{{ route('management.genres.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" name="name" required />
                            </div>
                            <button type="submit" class="btn btn-primary">
                                Add Genre
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Edit Modal -->
            <div class="modal fade" id="editGenreModal" tabindex="-1" role="dialog"
                aria-labelledby="editGenreModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-body">
                            <!-- Edit Form -->
                            <form id="editGenreForm"
                                action="{{ route('management.genres.update', $genre->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <!-- Use Laravel's form model binding to populate fields -->
                                <input type="hidden" id="editGenreId" name="id" value="{{ $genre->id }}">
                                <div class="form-group">
                                    <label for="editGenreName">Name</label>
                                    <input type="text" id="editGenreName" name="name" class="form-control" value="{{ $genre->name }}">
                                </div>
                                <button type="submit" id="update-btn" class="btn btn-primary">Update</button>
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
                $('#addGenreModal').modal('show');
            });
            // Show edit modal
            $(document).on("click", ".edit-btn", function() {
                var genreId = $(this).data('id');
                var genreName = $(this).data('name');
                $("#editGenreId").val(genreId);
                $("#editGenreName").val(genreName);
                $("#editGenreModal").modal('show');
            });
            // Handle form submission
            $("#update-btn").click(function() {
                $("#editGenreForm").submit();
            });


        });
    </script>
@endsection
