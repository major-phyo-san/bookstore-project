<nav class="col-sm-2 sidebar">
    <div class="position-sticky">
        <h2>Admin Panel</h2>
        <ul class="nav flex-column">
            <li><a href="{{ route('management.categories.index') }}"><i class="fa-solid fa-list"></i> Categories</a></li>
            <li><a href="{{ route('management.subcategories.index') }}"><i class="fa-solid fa-table-list"></i> Sub Categories</a></li>
            <li><a href="{{ route('management.genres.index') }}"><i class="fa-solid fa-feather"></i> Genres</a></li>
            <li><a href="{{ url('/management/books') }}"><i class="fa-solid fa-book"></i> Books</a></li>
        </ul>
    </div>
</nav>
