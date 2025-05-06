
export default function Settings() {
    const modalIds = [
        "modalSettingEmail",
        "modalSettingProfileImage",
        "modalSettingBio",
        "modalSettingPassword"
    ];

    const buttonMap = {
        emailBTN: "modalSettingEmail",
        profileBTN: "modalSettingProfileImage",
        profileBio: "modalSettingBio",
        passwordBTN: "modalSettingPassword",
    };

    // Open modal
    Object.entries(buttonMap).forEach(([btnId, modalId]) => {
        const button = document.getElementById(btnId);
        const modal = document.getElementById(modalId);
        button?.addEventListener("click", () => {
            closeAllModals(); // Hide any open modal first
            modal?.classList.remove("hidden");
        });
    });

    // Close all modals
    function closeAllModals() {
        modalIds.forEach(id => {
            document.getElementById(id)?.classList.add("hidden");
        });
    }

    // Add event listeners for outside click, close button, and cancel button
    modalIds.forEach(modalId => {
        const modal = document.getElementById(modalId);
        const dialog = modal.querySelector("div.bg-white");

        // Click outside to close
        modal.addEventListener("click", (e) => {
            if (!dialog.contains(e.target)) {
                modal.classList.add("hidden");
            }
        });

        // Close (X) button
        const closeBtn = modal.querySelector("#closeBTNModal");
        closeBtn?.addEventListener("click", () => modal.classList.add("hidden"));

        // Cancel button
        const cancelBtn = modal.querySelector("#CancelBTN");
        cancelBtn?.addEventListener("click", () => modal.classList.add("hidden"));
    });
}

export function sendChangeEmail(){
    document.getElementById('SendTheChangeEmailToEmail').addEventListener("click",()=>{
        document.getElementById("LoadingOne").classList.remove("hidden")
        $.ajax({
            url:"../../../../Setting/sendChangeEmailVerification",
            method:"GET",
            success:(response)=>{
                document.getElementById("LoadingOne").classList.add("hidden")
            },
            error:(error)=>{
                alert("Check Your Email"+ response)

            }
        });
    })
}

export function changeProfilePhoto(){
    document.addEventListener('DOMContentLoaded', function() {
        const profileContainer = document.getElementById('profile-container');
        const profileUpload = document.getElementById('profile-upload');
        const profileImage = document.getElementById('profile-image');
        const previewContainer = document.getElementById('preview-container');
        const previewImage = document.getElementById('preview-image');
        const cancelButton = document.getElementById('cancel-button');
        const saveButton = document.getElementById('save-button');

        let currentImage = profileImage.src;
        let selectedFile = null;

        // Open file dialog when clicking on the profile container
        profileContainer.addEventListener('click', function() {
            profileUpload.click();
        });

        // Handle file selection
        profileUpload.addEventListener('change', function(e) {
            if (e.target.files && e.target.files[0]) {
                selectedFile = e.target.files[0];
                const reader = new FileReader();

                reader.onload = function(event) {
                    previewImage.src = event.target.result;
                    previewContainer.classList.remove('hidden');
                };

                reader.readAsDataURL(selectedFile);
            }
        });

        // Cancel button handler
        cancelButton.addEventListener('click', function() {
            previewContainer.classList.add('hidden');
            profileUpload.value = '';
            selectedFile = null;
        });

        // Save button handler
        saveButton.addEventListener('click', function() {
            if (selectedFile) {
                profileImage.src = previewImage.src;
                currentImage = previewImage.src;
                previewContainer.classList.add('hidden');
                const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
                const formData = new FormData();
                formData.append('_token', csrfToken);
                formData.append('selectedFile', selectedFile); // note: 'profileFIle' must match the backend validation key
                console.log(selectedFile)
                // Here you would typically upload the image to your server
                console.log('Image saved! In a real app, this would be uploaded to the server.'+selectedFile);
                $.ajax({
                    url : "../../../../Setting/changeImageProfile",
                    method : "post",
                    data:formData,
                    processData: false,  // prevent jQuery from converting the FormData into a query string
                    contentType: false,  // prevent jQuery from setting the contentType
                    success : (response)=>{
                        console.log(response)
                    }
                })
                // Show a success notification
                showNotification('Profile picture updated successfully!');
            }
        });

        // Function to show a notification
        function showNotification(message) {
            // Create notification element
            const notification = document.createElement('div');
            notification.className = 'fixed bottom-4 right-4 bg-green-500 text-white px-4 py-2 rounded-lg shadow-lg transform translate-y-10 opacity-0 transition-all duration-500';
            notification.textContent = message;
            document.body.appendChild(notification);

            // Animate in
            setTimeout(() => {
                notification.classList.remove('translate-y-10', 'opacity-0');
            }, 10);

            // Animate out after 3 seconds
            setTimeout(() => {
                notification.classList.add('translate-y-10', 'opacity-0');
                setTimeout(() => {
                    document.body.removeChild(notification);
                }, 500);
            }, 3000);
        }
    });

}

export function changeProfileBio(){
    document.addEventListener('DOMContentLoaded', function() {
        // Profile Image Elements
        const profileUpload = document.getElementById('profile-upload');
        const profileImage = document.getElementById('profile-image');
        const previewContainer = document.getElementById('preview-container');

        // Bio Elements
        const bioDisplay = document.getElementById('bio-display');
        const bioText = document.getElementById('bio-text');
        const bioEditContainer = document.getElementById('bio-edit-container');
        const bioTextarea = document.getElementById('bio-textarea');
        const charCounter = document.getElementById('char-counter');
        const editBioButton = document.getElementById('edit-bio-button');
        const cancelBioButton = document.getElementById('cancel-bio-button');
        const saveBioButton = document.getElementById('save-bio-button');

        let currentBio = bioText.textContent.trim();


        // Initialize textarea with current bio
        bioTextarea.value = currentBio;
        updateCharCounter();

        // Edit bio button handler
        editBioButton.addEventListener('click', function() {
            bioDisplay.classList.add('hidden');
            bioEditContainer.classList.remove('hidden');
            bioTextarea.focus();
            updateCharCounter();
        });

        // Cancel bio edit handler
        cancelBioButton.addEventListener('click', function() {
            bioEditContainer.classList.add('hidden');
            bioDisplay.classList.remove('hidden');
            bioTextarea.value = currentBio;
        });

        // Save bio handler
        saveBioButton.addEventListener('click', function() {
            const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            const newBio = bioTextarea.value.trim();
            if (newBio) {
                bioText.textContent = newBio;
                currentBio = newBio;
                bioEditContainer.classList.add('hidden');
                bioDisplay.classList.remove('hidden');

                // Here you would typically save the bio to your server
                console.log('Bio saved! In a real app, this would be saved to the server.');
                $.ajax({
                    url:"../../../../../../Setting/changeBioProfile",
                    method:"post",
                    data:{
                        newBio : newBio,
                        _token : csrfToken
                    },
                    success : (response)=>{
                        console.log(response)
                        showNotification('Bio updated successfully!');
                    },
                    error : (error)=>{
                        console.log(error)
                    }
                })
                // Show a success notification
            }
        });

        // Character counter for bio
        bioTextarea.addEventListener('input', updateCharCounter);

        function updateCharCounter() {
            const length = bioTextarea.value.length;
            const maxLength = bioTextarea.getAttribute('maxlength');
            charCounter.textContent = `${length}/${maxLength}`;

            // Change color when approaching limit
            if (length > maxLength * 0.8) {
                charCounter.classList.add('text-amber-500');
            } else {
                charCounter.classList.remove('text-amber-500');
            }

            if (length > maxLength * 0.95) {
                charCounter.classList.add('text-red-500');
                charCounter.classList.remove('text-amber-500');
            } else {
                charCounter.classList.remove('text-red-500');
            }
        }

        // ===== Shared Functionality =====

        // Function to show a notification
        function showNotification(message) {
            // Create notification element
            const notification = document.createElement('div');
            notification.className = 'fixed bottom-4 right-4 bg-green-500 text-white px-4 py-2 rounded-lg shadow-lg transform translate-y-10 opacity-0 transition-all duration-500';
            notification.textContent = message;
            document.body.appendChild(notification);

            // Animate in
            setTimeout(() => {
                notification.classList.remove('translate-y-10', 'opacity-0');
            }, 10);

            // Animate out after 3 seconds
            setTimeout(() => {
                notification.classList.add('translate-y-10', 'opacity-0');
                setTimeout(() => {
                    document.body.removeChild(notification);
                }, 500);
            }, 3000);
        }
    });

}
try { sendChangeEmail(); } catch (e) { console.error(e); }
try { changeProfilePhoto(); } catch (e) { console.error(e); }
try { changeProfileBio(); } catch (e) { console.error(e); }
