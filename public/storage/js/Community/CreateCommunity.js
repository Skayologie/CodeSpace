

// DOM Elements
const uploadBannerBtn = document.getElementById('uploadBannerBtn');
const uploadIconBtn = document.getElementById('uploadIconBtn');
const bannerFileInput = document.getElementById('bannerFileInput');
const iconFileInput = document.getElementById('iconFileInput');
const bannerPreview = document.getElementById('bannerPreview');
const iconPreview = document.getElementById('iconPreview');




// Banner upload handling
uploadBannerBtn.addEventListener('click', () => {
    bannerFileInput.click();
});

bannerFileInput.addEventListener('change', (e) => {
    if (e.target.files && e.target.files[0]) {
        const reader = new FileReader();

        reader.onload = function(event) {
            bannerPreview.style.backgroundImage = `url(${event.target.result})`;
            bannerPreview.style.backgroundSize = 'cover';
            bannerPreview.style.backgroundPosition = 'center';
        }

        reader.readAsDataURL(e.target.files[0]);
    }
});

// Icon upload handling
uploadIconBtn.addEventListener('click', () => {
    iconFileInput.click();
});

iconFileInput.addEventListener('change', (e) => {
    if (e.target.files && e.target.files[0]) {
        const reader = new FileReader();

        reader.onload = function(event) {
            iconPreview.innerHTML = '';
            iconPreview.style.backgroundImage = `url(${event.target.result})`;
            iconPreview.style.backgroundSize = 'cover';
            iconPreview.style.backgroundPosition = 'center';
        }

        reader.readAsDataURL(e.target.files[0]);
    }
});






// DOM Elements
const openModalBtn = document.getElementById('openModalBtn');
const closeBtn = document.getElementById('closeBtn');
const cancelBtn = document.getElementById('cancelBtn');
const modalOverlay = document.getElementById('modalOverlay');
const communityNameInput = document.getElementById('communityName');
const descriptionInput = document.getElementById('description');
const nameCounter = document.getElementById('nameCounter');
const descCounter = document.getElementById('descCounter');
const previewName = document.getElementById('previewName');
const previewName1 = document.getElementById('previewName1');
const previewDescription = document.getElementById('previewDescription');
const previewDescription1 = document.getElementById('previewDescription1');

// Event Listeners
openModalBtn.addEventListener('click', () => {
    modalOverlay.classList.remove('hidden');
});

[closeBtn].forEach(btn => {
    btn.addEventListener('click', () => {
        modalOverlay.classList.add('hidden');
    });
});

// Close modal when clicking outside
modalOverlay.addEventListener('click', (e) => {
    if (e.target === modalOverlay) {
        modalOverlay.classList.add('hidden');
    }
});

// Update character counter and preview for name
communityNameInput.addEventListener('input', () => {
    const length = communityNameInput.value.length;
    nameCounter.textContent = length;
    previewName.textContent = communityNameInput.value || 'Skayologie';
    previewName1.textContent = communityNameInput.value || 'Skayologie';
});

// Update character counter and preview for description
descriptionInput.addEventListener('input', () => {
    const length = descriptionInput.value.length;
    descCounter.textContent = length;
    previewDescription.textContent = descriptionInput.value || 'Hello this is community.blade.php for you';
    previewDescription1.textContent = descriptionInput.value || 'Hello this is community.blade.php for you';
});



// Next button functionality (placeholder)
document.getElementById('nextBtn').addEventListener('click', () => {
    let currentplace = document.getElementById("Currentplace");
    let next = document.getElementById('nextBtn');
    let back = document.getElementById("backBtn");


    let currentSection = document.getElementById(currentplace.value);
    let nextSection    = document.getElementById(next.dataset.progress);

    currentSection.classList.add("hidden")
    nextSection.classList.remove("hidden")


    back.dataset.progress++;
    currentplace.value++;
    next.dataset.progress++;

    let NextStep = document.getElementById(`step${currentplace.value}`);
    console.log(NextStep)
    NextStep.classList.add("bg-blue-600")
    NextStep.classList.remove("bg-gray-300")
});

document.getElementById('backBtn').addEventListener('click', () => {

    let currentplace = document.getElementById("Currentplace");
    let next = document.getElementById('nextBtn');
    let back = document.getElementById("backBtn");

    let currentSection = document.getElementById(currentplace.value);
    let backSection    = document.getElementById(back.dataset.progress);


    currentSection.classList.add("hidden")
    backSection.classList.remove("hidden")
    document.getElementById(`step${currentplace.value}`).classList.remove("bg-blue-600");
    document.getElementById(`step${currentplace.value}`).classList.add("bg-gray-300");

    back.dataset.progress--;
    currentplace.value--;
    next.dataset.progress--;

    let backStep = document.getElementById(`step${currentplace.value}`);
    console.log(currentStep)
    backStep.classList.add("bg-blue-600")
    backStep.classList.remove("bg-gray-300")


});



