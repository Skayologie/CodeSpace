

export default class Community {
    constructor() {
        this.openModalBtn = document.getElementById('openModalBtn');
        this.closeBtn = document.getElementById('closeBtn');
        this.cancelBtn = document.getElementById('cancelBtn');
        this.modalOverlay = document.getElementById('modalOverlay');
        this.communityNameInput = document.getElementById('communityName');
        this.descriptionInput = document.getElementById('description');
        this.nameCounter = document.getElementById('nameCounter');
        this.descCounter = document.getElementById('descCounter');
        this.previewName = document.getElementById('previewName');
        this.previewName1 = document.getElementById('previewName1');
        this.previewDescription = document.getElementById('previewDescription');
        this.previewDescription1 = document.getElementById('previewDescription1');
        this.uploadBannerBtn = document.getElementById('uploadBannerBtn');
        this.uploadIconBtn = document.getElementById('uploadIconBtn');
        this.bannerFileInput = document.getElementById('bannerFileInput');
        this.iconFileInput = document.getElementById('iconFileInput');
        this.bannerPreview = document.getElementById('bannerPreview');
        this.iconPreview = document.getElementById('iconPreview');
        this.CreateCommunity();
    }
    CreateCommunity(){

// Banner upload handling
        this.uploadBannerBtn.addEventListener('click', () => {
            this.bannerFileInput.click();
        });

        this.bannerFileInput.addEventListener('change', (e) => {
            if (e.target.files && e.target.files[0]) {
                const reader = new FileReader();

                reader.onload = (event)=>{
                    this.bannerPreview.style.backgroundImage = `url(${event.target.result})`;
                    this.bannerPreview.style.backgroundSize = 'cover';
                    this.bannerPreview.style.backgroundPosition = 'center';
                }

                reader.readAsDataURL(e.target.files[0]);
            }
        });

// Icon upload handling
        this.uploadIconBtn.addEventListener('click', () => {
            this.iconFileInput.click();
        });

        this.iconFileInput.addEventListener('change', (e) => {
            if (e.target.files && e.target.files[0]) {
                const reader = new FileReader();

                reader.onload = (event) => {
                    this.iconPreview.innerHTML = '';
                    this.iconPreview.style.backgroundImage = `url(${event.target.result})`;
                    this.iconPreview.style.backgroundSize = 'cover';
                    this.iconPreview.style.backgroundPosition = 'center';
                }

                reader.readAsDataURL(e.target.files[0]);
            }
        });






// Event Listeners
        this.openModalBtn.addEventListener('click', () => {
            this.modalOverlay.classList.remove('hidden');
        });

        [this.closeBtn].forEach(btn => {
            btn.addEventListener('click', () => {
                this.modalOverlay.classList.add('hidden');
            });
        });

// Close modal when clicking outside
        this.modalOverlay.addEventListener('click', (e) => {
            if (e.target === this.modalOverlay) {
                this.modalOverlay.classList.add('hidden');
            }
        });

// Update character counter and preview for name
        this.communityNameInput.addEventListener('input', () => {
            const length = this.communityNameInput.value.length;
            console.log(this.communityNameInput.value)
            this.nameCounter.textContent = length;
            this.previewName.textContent = this.communityNameInput.value || 'Skayologie';
            this.previewName1.textContent = this.communityNameInput.value || 'Skayologie';
        });

// Update character counter and preview for description
        this.descriptionInput.addEventListener('input', () => {
            const length = this.descriptionInput.value.length;
            this.descCounter.textContent = length;
            console.log(this.previewDescription)
            this.previewDescription.textContent = this.descriptionInput.value || 'Hello this is community.blade.php for you';
            this.previewDescription1.textContent = this.descriptionInput.value || 'Hello this is community.blade.php for you';
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


    }

}




