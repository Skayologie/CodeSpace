export default class Form {

    constructor() {

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
        this.btnSubmit.addEventListener('click', (event) => this.validation(event));
    }


    validation(event){
        const quill = document.querySelector(".ql-editor").innerHTML
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


}
