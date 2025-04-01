export default class Form {

    constructor() {

        this.form = document.querySelector("#PostForm");
        if (!this.form) throw new Error("Form not found!");

        // Select elements
        this.titleInput = document.querySelector("[name='title']");
        this.titleError = document.querySelector("#titleError");
        this.titleErrorMessage = document.querySelector("#titleErrorMessage");
        this.titleCounter = document.querySelector("#titleCounter");
        this.description = document.querySelector("#description");
        this.descriptionCheck = document.querySelector("#descriptionCheck");
        this.descriptionCounter = document.querySelector("#descriptionCounter");
        this.privateToggle = document.querySelector("#privateToggle");
        this.profileDisplayOption = document.querySelector("#profileDisplayOption");
        this.profileDisplayCheck = document.querySelector("#profileDisplayCheck");
        this.closeButton = document.querySelector("#closeButton");
        this.cancelButton = document.querySelector("#cancelButton");
        this.submitButton = document.querySelector("#submitButton");
        this.btnSubmit = document.getElementById('btnSubmit');
        this.init();
    }


    init() {

        this.titleInput.addEventListener("input", () => this.handleTitleValidation());
        this.description.addEventListener("input", () => this.handleDescriptionUpdate());
        // this.privateToggle.addEventListener("change", () => this.handlePrivateToggle());
        // this.profileDisplayCheck.addEventListener("click", () => this.handleProfileDisplay());
        // this.closeButton.addEventListener("click", () => alert("Modal would close here"));
        // this.cancelButton.addEventListener("click", () => alert("Action cancelled"));
        this.btnSubmit.addEventListener('click', (event) => this.validation(event));
    }


    validation(event){
        event.preventDefault(); // Prevent default form submission
        const quill = document.querySelector(".ql-editor").innerHTML
        console.log(quill)
        document.getElementById('quill-content').value = quill;

        let isValid = true; // Assume the form is valid initially

        // Get form elements
        let title = document.querySelector('input[name="title"]');
        let category = document.querySelector('select[name="category"]');
        let allTags = document.querySelector('input[name="allTags"]');
        let content = document.querySelector('input[name="content"]');

        // Title validation
        if (title.value.trim() === "") {
            this.showError("titleError");
            isValid = false;
        } else {
            this.hideError("titleError");
        }

        // Category validation
        if (category.value === "Choose a category" || category.value === "") {
            this.showError("categoryError");
            isValid = false;
        } else {
            this.hideError("categoryError");
        }

        // Tags validation
        if (allTags.value.trim() === "") {
            this.showError("tagsError");
            isValid = false;
        } else {
            this.hideError("tagsError");
        }

        // Content validation
        if (content.value === "<p><br></p>" || content.value.length < 30) {
            this.showError("contentError");
            isValid = false;
        } else {
            this.hideError("contentError");
        }


        // Submit form only if all fields are valid
        if (isValid) {
            document.querySelector('form').submit();
        }
    }

    showError(id) {
        let errorElement = document.getElementById(id);
        if (errorElement) {
            errorElement.classList.remove("hidden");
        }
    }

// Function to hide error messages
    hideError(id) {
        let errorElement = document.getElementById(id);
        if (errorElement) {
            errorElement.classList.add("hidden");
        }
    }


    handleDescriptionInit() {
        if (this.description.value.trim().length > 0) {
            this.descriptionCheck.classList.remove("hidden");
        }
    }
    // Title validation and character counter
    handleTitleValidation() {
        const remainingChars = this.titleInput.maxLength - this.titleInput.value.length;
        this.titleCounter.textContent = remainingChars;

        if (this.titleInput.value.trim().length === 0) {
            this.titleInput.classList.add("border-red-500");
            this.titleError.classList.remove("hidden");
            this.titleErrorMessage.classList.remove("hidden");
        } else {
            this.titleInput.classList.remove("border-red-500");
            this.titleError.classList.add("hidden");
            this.titleErrorMessage.classList.add("hidden");
        }
    }

    // Description counter and checkmark
    handleDescriptionUpdate() {
        const remainingChars = this.description.maxLength - this.description.value.length;
        this.descriptionCounter.textContent = remainingChars;

        if (this.description.value.trim().length > 0) {
            this.descriptionCheck.classList.remove("hidden");
        } else {
            this.descriptionCheck.classList.add("hidden");
        }
    }

    // Private toggle functionality
    handlePrivateToggle() {
        if (this.privateToggle.checked) {
            this.profileDisplayOption.classList.add("opacity-50");
            this.profileDisplayCheck.classList.remove("bg-blue-600");
            this.profileDisplayCheck.classList.add("bg-gray-300");
        } else {
            this.profileDisplayOption.classList.remove("opacity-50");
            this.profileDisplayCheck.classList.add("bg-blue-600");
            this.profileDisplayCheck.classList.remove("bg-gray-300");
        }
    }

    // Profile display toggle
    handleProfileDisplay() {
        if (!this.privateToggle.checked) {
            this.profileDisplayCheck.classList.toggle("bg-blue-600");
            this.profileDisplayCheck.classList.toggle("bg-gray-300");
        }
    }

    // Handle form submission
    handleSubmit(event) {
        event.preventDefault();

        if (this.titleInput.value.trim().length === 0) {
            this.handleTitleValidation();
            return;
        }

        const formData = {
            title: this.titleInput.value,
            description: this.description.value,
            isPrivate: this.privateToggle.checked,
            displayOnProfile: this.profileDisplayCheck.classList.contains("bg-blue-600"),
        };

        console.log("Form submitted with data:", formData);
        alert("Form submitted successfully: " + JSON.stringify(formData, null, 2));
    }
}
