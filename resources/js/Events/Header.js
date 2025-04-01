export default class Header {
    constructor() {
        this.profileButton = document.getElementById('profileButton');
        this.darkModeToggle = document.getElementById('toggleDarkMode');
        this.profileDropdown = document.getElementById('profileDropdown');

        this.init();
    }

    init(){
        this.profileButton.addEventListener('click', (event)=> {
            // Prevent the click from propagating to the document
            event.stopPropagation();
            this.toggleDropdown();
        });

        document.addEventListener('click', (event)=> {
            // If the click is outside the dropdown and the dropdown is visible
            if (!this.profileDropdown.contains(event.target) && !this.profileButton.contains(event.target)) {
                if (!this.profileDropdown.classList.contains('hidden')) {
                    this.profileDropdown.classList.add('hidden');
                }
            }
        });

        document.addEventListener('keydown', function(event) {
            if (event.key === 'Escape' && !this.profileDropdown.classList.contains('hidden')) {
                this.profileDropdown.classList.add('hidden');
            }
        });

        if (this.darkModeToggle) {
            this.darkModeToggle.addEventListener('change', ()=> {
                // You can implement dark mode toggle functionality here
                console.log('Dark mode toggled:', this.checked);
            });
        }
    }
    toggleDropdown() {
        this.profileDropdown.classList.toggle('hidden');
    }
}
