  function search() {
    var input = document.getElementById('searchInput').value;
    // Perform search functionality here based on the input value
    console.log('Searching for:', input);
    // You can modify this function to perform search operations as needed
}

// "Add" button click
document.getElementById("addButton").addEventListener("click", function() {
    // Display the modal
    $('#addBookModal').modal('show');
    $('#addCategoryModal').modal('show');
    $('#addSubCategoryModal').modal('show');
});


// form for book
document.getElementById("addBookForm").addEventListener("submit", function(event) {
    event.preventDefault();
    // Collect form data
    var title = document.getElementById("title").value;
    var author = document.getElementById("author").value;
    var category = document.getElementById("category").value;
    // Add the new book data to the table
    var newRow = document.getElementById("tableBody").insertRow();
    newRow.innerHTML = "<td>" + title + "</td><td>" + author + "</td><td>" + category + "</td>" +
                        "<td>" +
                        "<button class='btn btn-sm btn-primary edit-btn'><i class='fa fa-edit'></i></button> " +
                        "<button class='btn btn-sm btn-danger delete-btn'><i class='fa fa-trash'></i></button>" +
                        "</td>";

    // Hide the modal
    $('#addBookModal').modal('hide');
    // Reset the form fields
    document.getElementById("addBookForm").reset();
    newRow.querySelector(".edit-btn").addEventListener("click", function() {
        // Handle edit button click
        console.log("Edit button clicked");
    });

});


// form for category
document.getElementById("addCategoryForm").addEventListener('submit', function(event) {
    event.preventDefault();
    // Collect form data
    var name = document.getElementById("name").value;
    // Add the new book data to the table
    var newRow = document.getElementById("tableBody").insertRow();
    newRow.innerHTML = "<td>" + name + "</td><td>" +
                        "<button class='btn btn-sm btn-primary edit-btn'><i class='fa fa-edit'></i></button> " +
                        "<button class='btn btn-sm btn-danger delete-btn'><i class='fa fa-trash'></i></button>" +
                        "</td>";

    // Hide the modal
    $('#addCategoryModal').modal('hide');
    // Reset the form fields
    document.getElementById("addCategoryForm").reset();
    newRow.querySelector(".edit-btn").addEventListener("click", function() {
        // Handle edit button click
        console.log("Edit button clicked");
    });

});


// form for sub category
document.getElementById("addSubCategoryForm").addEventListener('submit', function(event) {
    event.preventDefault();
    // Collect form data
    var name = document.getElementById("name").value;
    var category = document.getElementById("category").value;
    // Add the new book data to the table
    var newRow = document.getElementById("tableBody").insertRow();
    newRow.innerHTML = "<td>" + name + "</td><td>" + category + "</td><td>" +
                        "<button class='btn btn-sm btn-primary edit-btn'><i class='fa fa-edit'></i></button> " +
                        "<button class='btn btn-sm btn-danger delete-btn'><i class='fa fa-trash'></i></button>" +
                        "</td>";

    // Hide the modal
    $('#addSubCategoryModal').modal('hide');
    // Reset the form fields
    document.getElementById("addSubCategoryForm").reset();
    newRow.querySelector(".edit-btn").addEventListener("click", function() {
        // Handle edit button click
        console.log("Edit button clicked");
    });

});

function showEditForm(categoryId) {
    var editFormRow = document.getElementById('editFormRow' + categoryId);
    editFormRow.style.display = 'table-row';
}

function hideEditForm(categoryId) {
    var editFormRow = document.getElementById('editFormRow' + categoryId);
    editFormRow.style.display = 'none';
}
// Function to show the edit modal
function showEditModal(categoryId) {
    $('#editModal' + categoryId).modal('show'); // Show the modal
}

function hideEditModal(categoryId) {
    $('#editModal' + categoryId).modal('hide'); // Hide the modal
}