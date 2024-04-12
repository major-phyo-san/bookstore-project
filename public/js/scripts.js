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
});

// form submission
document.getElementById("addBookForm").addEventListener("submit", function(event) {
    event.preventDefault(); // Prevent the default form submission behavior

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
    // Attach event listener to the delete button in the new row
    attachDeleteButtonListener(newRow.querySelector('.delete-btn'));

});

// delete button click
function deleteButtonClick(event) {
    // Get the parent row of the delete button
    var row = event.target.closest('tr');
    // Remove the row from the table
    row.remove();
}

// Function to attach event listener to delete button
function attachDeleteButtonListener(button) {
    button.addEventListener('click', deleteButtonClick);
}

// Attach event listeners to delete buttons
document.querySelectorAll('.delete-btn').forEach(attachDeleteButtonListener);
