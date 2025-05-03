
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
try { sendChangeEmail(); } catch (e) { console.error(e); }
