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
        <table class="table" id="genreTable">
            <thead>
                <tr>
                    <th>Genre</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody id="tableBody">
                @foreach ($genres as $genre)
                    <!-- Loop through genres -->
                    <tr>
                        <td>{{ $genre->name }}</td>
                        <td>
                            <button id="editGenre" class="btn btn-sm btn-primary edit-btn"
                                onclick="showEditModal({{ $genre->id }})"><i class="fa fa-edit"></i></button>

                            <form action="{{ route('management.genres.destroy', $genre->id) }}" method="POST"
                                class="d-inline">
                                @csrf
                                @method('DELETE') <button type="submit" class="btn btn-sm btn-danger delete-btn"
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
        @foreach ($genres as $genre)
            <div class="modal fade" id="editModal{{ $genre->id }}" tabindex="-1" role="dialog"
                aria-labelledby="editModal{{ $genre->id }}Label" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-body">
                            <!-- Edit Form -->
                            <form id="editGenreForm{{ $genre->id }}"
                                action="{{ route('management.genres.update', $genre->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <!-- Use Laravel's form model binding to populate fields -->
                                <div class="form-group">
                                    <label for="editGenreName{{ $genre->id }}">Name</label>
                                    <input type="text" id="editGenreName{{ $genre->id }}" name="name"
                                        class="form-control" value="{{ old('name', $genre->name) }}"
                                        data-original-value="{{ old('name', $genre->name) }}">
                                </div>
                                <button type="submit" class="btn btn-primary">Update</button>
                                <button type="button" class="btn btn-secondary"
                                    onclick="resetEditGenreForm({{ $genre->id }})">Cancel</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection

@section('script-index')
    <script>
        // "Add" button click
        document.getElementById("addButton").addEventListener("click", function() {
            $('#addGenreModal').modal('show');
        });
        document.getElementById("addGenreForm").addEventListener('submit', function(event) {
            event.preventDefault();
            var name = document.getElementById("name").value;
            var newRow = document.getElementById("tableBody").insertRow();
            newRow.innerHTML = "<td>" + name + "</td><td>" +
                "<button class='btn btn-sm btn-primary edit-btn'><i class='fa fa-edit'></i></button> " +
                "<button class='btn btn-sm btn-danger delete-btn'><i class='fa fa-trash'></i></button>" +
                "</td>";

            // Hide the modal
            $('#addGenreModal').modal('hide');
            // Reset the form fields
            document.getElementById("addGenreForm").reset();
        });

        // Function to show the edit modal for genre
        function showEditGenreModal(genreId) {
            $('#editModal' + genreId).modal('show'); // Show the modal
        }

        // Function to reset form fields to their original values when canceled for genre
        function resetEditGenreForm(genreId) {
            var originalValue = $('#editGenreName' + genreId).data('originalValue');
            $('#editGenreName' + genreId).val(originalValue);
            $('#editModal' + genreId).modal('hide');
        }

        // Function to store original form values when modal is opened for genre
        $('#editModal{{ $genre->id }}').on('show.bs.modal', function(event) {
            var inputField = $(this).find('#editGenreName{{ $genre->id }}');
            inputField.attr('data-original-value', inputField.val());
        });
    </script>
@endsection
