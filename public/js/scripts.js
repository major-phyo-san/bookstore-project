  function search() {
    var input = document.getElementById('searchInput').value;
    // Perform search functionality here based on the input value
    console.log('Searching for:', input);
    // You can modify this function to perform search operations as needed
}

// "Add" button click
document.getElementById("addButton").addEventListener("click", function() {
    $('#addBookModal').modal('show');
    $('#addCategoryModal').modal('show');
    $('#addSubCategoryModal').modal('show');
});


// Modal for add Category
document.getElementById("addCategoryForm").addEventListener('submit', function(event) {
    event.preventDefault();
    var name = document.getElementById("name").value;
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

// Function to show the edit modal
 function showEditModal(categoryId) {
    $('#editModal' + categoryId).modal('show'); // Show the modal
}

// Function to reset form fields to their original values when canceled
function resetEditForm(categoryId) {
    var originalValue = $('#editCategoryName' + categoryId).data('originalValue');
    $('#editCategoryName' + categoryId).val(originalValue);
    $('#editModal' + categoryId).modal('hide');
}

// Function to store original form values when modal is opened
$('#editModal{{ $category->id }}').on('show.bs.modal', function (event) {
    var inputField = $(this).find('#editCategoryName{{ $category->id }}');
    inputField.attr('data-original-value', inputField.val());
});


// Modal for add Sub Category
document.getElementById("addSubCategoryForm").addEventListener('submit', function(event) {
    event.preventDefault();
    var name = document.getElementById("name").value;
    var category = document.getElementById("category").value;
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

// Function to show the edit modal
function showEditSubcategoryModal(subcategoryId) {
    $('#editSubcategoryModal' + subcategoryId).modal('show'); // Show the modal
}

// Function to reset form fields to their original values when canceled
function resetEditSubcategoryForm(subcategoryId) {
    var originalValue = $('#editSubcategoryName' + subcategoryId).data('originalValue');
    $('#editSubcategoryName' + subcategoryId).val(originalValue);
    $('#editSubcategoryModal' + subcategoryId).modal('hide');
}

// Function to store original form values when modal is opened
$('#editSubcategoryModal{{ $subcategory->id }}').on('show.bs.modal', function (event) {
    var inputField = $(this).find('#editSubcategoryName{{ $subcategory->id }}');
    inputField.attr('data-original-value', inputField.val());
});



// Modal for add Book
document.getElementById("addBookForm").addEventListener("submit", function(event) {
    event.preventDefault();
    var title = document.getElementById("title").value;
    var author = document.getElementById("author").value;
    var category = document.getElementById("category").value;
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
