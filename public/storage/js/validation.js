document.getElementById('btnSubmit').addEventListener('click', function (e) {
    e.preventDefault(); // Prevent default form submission

    document.getElementById('quill-content').value = quill.root.innerHTML;

    let isValid = true; // Assume the form is valid initially

    // Get form elements
    let title = document.querySelector('input[name="title"]');
    let category = document.querySelector('select[name="category"]');
    let allTags = document.querySelector('input[name="allTags"]');
    let content = document.querySelector('input[name="content"]');

    // Title validation
    if (title.value.trim() === "") {
        showError("titleError");
        isValid = false;
    } else {
        hideError("titleError");
    }

    // Category validation
    if (category.value === "Choose a category" || category.value === "") {
        showError("categoryError");
        isValid = false;
    } else {
        hideError("categoryError");
    }

    // Tags validation
    if (allTags.value.trim() === "") {
        showError("tagsError");
        isValid = false;
    } else {
        hideError("tagsError");
    }

    // Content validation
    if (content.value === "<p><br></p>" || content.value.length < 30) {
        showError("contentError");
        isValid = false;
    } else {
        hideError("contentError");
    }


    // Submit form only if all fields are valid
    if (isValid) {
        document.querySelector('form').submit();
    }
});

// Function to display error messages
function showError(id) {
    let errorElement = document.getElementById(id);
    if (errorElement) {
        errorElement.classList.remove("hidden");
    }
}

// Function to hide error messages
function hideError(id) {
    let errorElement = document.getElementById(id);
    if (errorElement) {
        errorElement.classList.add("hidden");
    }
}
