@extends('management.layouts.master')

@section('categories-content')
    <div class="container">
        <h1>Genres</h1>
        <a href="{{ route('genres.create') }}" class="btn btn-primary mb-3">Add Genre</a>
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($genres as $genre)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $genre->name }}</td>
                    <td>
                        <a href="{{ route('genres.edit', $genre->id) }}" class="btn btn-sm btn-primary">Edit</a>
                        <form action="{{ route('genres.destroy', $genre->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this genre?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
