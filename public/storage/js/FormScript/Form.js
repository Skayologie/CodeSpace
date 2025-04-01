document.addEventListener('DOMContentLoaded', function() {
    // Elements
    const form = document.getElementById('customFlowForm');
    const titleInput = document.getElementById('title');
    const titleError = document.getElementById('titleError');
    const titleErrorMessage = document.getElementById('titleErrorMessage');
    const titleCounter = document.getElementById('titleCounter');
    const description = document.getElementById('description');
    const descriptionCheck = document.getElementById('descriptionCheck');
    const descriptionCounter = document.getElementById('descriptionCounter');
    const privateToggle = document.getElementById('privateToggle');
    const profileDisplayOption = document.getElementById('profileDisplayOption');
    const profileDisplayCheck = document.getElementById('profileDisplayCheck');
    const closeButton = document.getElementById('closeButton');
    const cancelButton = document.getElementById('cancelButton');
    const submitButton = document.getElementById('submitButton');

    // Initialize display state (show check mark if description has content)
    if (description.value.trim().length > 0) {
        descriptionCheck.classList.remove('hidden');
    }

    // Title validation and character counter
    titleInput.addEventListener('input', function() {
        const remainingChars = this.maxLength - this.value.length;
        titleCounter.textContent = remainingChars;

        if (this.value.trim().length === 0) {
            this.classList.add('border-red-500');
            titleError.classList.remove('hidden');
            titleErrorMessage.classList.remove('hidden');
        } else {
            this.classList.remove('border-red-500');
            titleError.classList.add('hidden');
            titleErrorMessage.classList.add('hidden');
        }
    });

    // Description character counter and checkmark
    description.addEventListener('input', function() {
        const remainingChars = this.maxLength - this.value.length;
        descriptionCounter.textContent = remainingChars;

        if (this.value.trim().length > 0) {
            descriptionCheck.classList.remove('hidden');
        } else {
            descriptionCheck.classList.add('hidden');
        }
    });

    // Private toggle functionality
    privateToggle.addEventListener('change', function() {
        if (this.checked) {
            // Disable profile display when private is enabled
            profileDisplayOption.classList.add('opacity-50');
            profileDisplayCheck.classList.remove('bg-blue-600');
            profileDisplayCheck.classList.add('bg-gray-300');
        } else {
            // Enable profile display when private is disabled
            profileDisplayOption.classList.remove('opacity-50');
            profileDisplayCheck.classList.add('bg-blue-600');
            profileDisplayCheck.classList.remove('bg-gray-300');
        }
    });

    // Profile display toggle
    profileDisplayCheck.addEventListener('click', function() {
        // Only allow toggling if private mode is not enabled
        if (!privateToggle.checked) {
            if (this.classList.contains('bg-blue-600')) {
                this.classList.remove('bg-blue-600');
                this.classList.add('bg-gray-300');
            } else {
                this.classList.add('bg-blue-600');
                this.classList.remove('bg-gray-300');
            }
        }
    });

    // Close button functionality
    closeButton.addEventListener('click', function() {
        // In a real application, this would close the modal
        alert('Modal would close here');
    });

    // Cancel button functionality
    cancelButton.addEventListener('click', function() {
        // In a real application, this would close the modal
        alert('Action cancelled');
    });

    // Form submission
    form.addEventListener('submit', function(e) {
        e.preventDefault();

        // Validate title
        if (titleInput.value.trim().length === 0) {
            titleInput.classList.add('border-red-500');
            titleError.classList.remove('hidden');
            titleErrorMessage.classList.remove('hidden');
            return;
        }

        // Collect form data
        const formData = {
            title: titleInput.value,
            description: description.value,
            isPrivate: privateToggle.checked,
            displayOnProfile: profileDisplayCheck.classList.contains('bg-blue-600')
        };

        // Display form data (in a real app, you would send this to a server)
        console.log('Form submitted with data:', formData);
        alert('Form submitted successfully: ' + JSON.stringify(formData, null, 2));
    });
});
