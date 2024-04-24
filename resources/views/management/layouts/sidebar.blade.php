<nav class="col-sm-2 sidebar">
    <div class="position-sticky">
        <h2>Admin Panel</h2>
        <ul class="nav flex-column">
            <li><a href="{{ url('/management/books') }}">Books</a></li>
            <li><a href="{{ route('management.categories.index') }}">Categories</a></li>
            <li><a href="{{ route('management.subcategories.index') }}">Sub Categories</a></li>
            <li><a href="#">Genres</a></li>

        </ul>
    </div>
</nav>
