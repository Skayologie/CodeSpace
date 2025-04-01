



document.addEventListener('DOMContentLoaded', function() {

    const titleInput = document.querySelector('input[placeholder="Titre*"]');
    const charCount = document.querySelector('.text-right.text-gray-500');
    const tabs = document.querySelectorAll('[data-tab]');
    const tabContents = document.querySelectorAll('.tab-content');
    const communitySelector = document.getElementById('communitySelector');
    const communityIcon = document.getElementById('communityIcon');
    const communityIconText = document.getElementById('communityIconText');
    const communityText = document.getElementById('communityText');

    // titleInput.addEventListener('input', function() {
    //     const count = this.value.length;
    //     charCount.textContent = count + '/300';
    // });

    function activateTab(tabId) {
        tabs.forEach(tab => {
            tab.classList.remove('border-b-2', 'border-blue-500', 'text-gray-800');
            tab.classList.add('text-gray-500');
        });

        tabContents.forEach(content => {
            content.classList.add('hidden');
        });

        const selectedTab = document.getElementById('tab-' + tabId);
        selectedTab.classList.add('border-b-2', 'border-blue-500', 'text-gray-800');
        selectedTab.classList.remove('text-gray-500');

        const selectedContent = document.getElementById('content-' + tabId);
        selectedContent.classList.remove('hidden');
        console.log(selectedContent.id)
        changeURL(selectedContent.id)
    }

    tabs.forEach(tab => {
        tab.addEventListener('click', function() {
            const tabId = this.getAttribute('data-tab');
            activateTab(tabId);
        });
    });


    document.addEventListener('DOMContentLoaded', function() {
        activateTab('texte');

    });

    const toggleUserState = function() {
        if (communityText.textContent === 'Sélectionner une communauté') {
            setUserCommunity();
        } else {
            communityIcon.classList.remove('bg-green-500');
            communityIcon.classList.add('bg-gray-800');
            communityIconText.textContent = '/';
            communityText.textContent = 'Sélectionner une communauté';
        }
    };

    communitySelector.addEventListener('click', toggleUserState);

    // Handle favorite icons
    const favoriteIcons = document.querySelectorAll('.favorite-icon');

    favoriteIcons.forEach(icon => {
        icon.addEventListener('click', function(e) {
            e.preventDefault();
            e.stopPropagation();

            // Toggle between filled and empty star
            if (this.classList.contains('far')) {
                this.classList.remove('far');
                this.classList.add('fas');
                this.style.color = '#ff4500'; // Reddit orange
            } else {
                this.classList.remove('fas');
                this.classList.add('far');
                this.style.color = ''; // Reset color
            }
        });
    });

    // Make navigation links active when clicked
    const navLinks = document.querySelectorAll('nav a');

    navLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();

            // Remove active class from all links
            navLinks.forEach(l => {
                l.classList.remove('bg-gray-100', 'text-black');
                l.classList.add('text-gray-700');
            });

            // Add active class to clicked link
            this.classList.remove('text-gray-700');
            this.classList.add('bg-gray-100', 'text-black');
        });
    });

    // Mobile functionality - toggle sidebar
    const toggleSidebar = document.createElement('button');
    toggleSidebar.innerHTML = '<i class="fas fa-bars"></i>';
    toggleSidebar.className = 'fixed top-4 left-4 md:hidden bg-white p-2 rounded-md shadow-md z-50';
    document.body.appendChild(toggleSidebar);

    const sidebar = document.querySelector('.w-64');
    let sidebarVisible = true;

    // On smaller screens, hide sidebar by default
    if (window.innerWidth < 768) {
        sidebar.style.transform = 'translateX(-100%)';
        sidebarVisible = false;
    }

    toggleSidebar.addEventListener('click', function() {
        if (sidebarVisible) {
            sidebar.style.transform = 'translateX(-100%)';
        } else {
            sidebar.style.transform = 'translateX(0)';
        }
        sidebarVisible = !sidebarVisible;
    });

    // Add transition for smooth sidebar sliding
    sidebar.style.transition = 'transform 0.3s ease';


    document.getElementById("email").addEventListener("input",()=>{
        if (document.getElementById("email").value.length !== 0) {
            document.getElementById("sendBtn").classList.remove("bg-gray-200");
            document.getElementById("sendBtn").classList.remove("text-gray-700");
            document.getElementById("sendBtn").classList.add("text-white");
            document.getElementById("sendBtn").classList.add("bg-orange-600");
        }else{
            document.getElementById("sendBtn").classList.add("bg-gray-200");
            document.getElementById("sendBtn").classList.remove("bg-orange-600");
            document.getElementById("sendBtn").classList.add("text-gray-700");
            document.getElementById("sendBtn").classList.remove("text-white");
        }
    })


});
document.addEventListener('DOMContentLoaded', function() {
    // Get the profile button and dropdown elements
    const profileButton = document.getElementById('profileButton');
    const profileDropdown = document.getElementById('profileDropdown');

    // Function to toggle the dropdown visibility
    function toggleDropdown() {
        profileDropdown.classList.toggle('hidden');
    }

    // Add click event listener to the profile button
    profileButton.addEventListener('click', function(event) {
        // Prevent the click from propagating to the document
        event.stopPropagation();
        toggleDropdown();
    });

    // Close dropdown when clicking anywhere else on the page
    document.addEventListener('click', function(event) {
        // If the click is outside the dropdown and the dropdown is visible
        if (!profileDropdown.contains(event.target) && !profileButton.contains(event.target)) {
            if (!profileDropdown.classList.contains('hidden')) {
                profileDropdown.classList.add('hidden');
            }
        }
    });

    // Close dropdown when pressing Escape key
    document.addEventListener('keydown', function(event) {
        if (event.key === 'Escape' && !profileDropdown.classList.contains('hidden')) {
            profileDropdown.classList.add('hidden');
        }
    });

    // Toggle dark mode switch functionality
    const darkModeToggle = document.getElementById('toggleDarkMode');
    if (darkModeToggle) {
        darkModeToggle.addEventListener('change', function() {
            // You can implement dark mode toggle functionality here
            console.log('Dark mode toggled:', this.checked);
        });
    }


    const titleInput = document.querySelector('input[placeholder="Titre*"]');
    const charCount = document.querySelector('.text-right.text-gray-500');
    const tabs = document.querySelectorAll('[data-tab]');
    const tabContents = document.querySelectorAll('.tab-content');
    const communitySelector = document.getElementById('communitySelector');
    const communityIcon = document.getElementById('communityIcon');
    const communityIconText = document.getElementById('communityIconText');
    const communityText = document.getElementById('communityText');



    function activateTab(tabId) {
        tabs.forEach(tab => {
            tab.classList.remove('border-b-2', 'border-blue-500', 'text-gray-800');
            tab.classList.add('text-gray-500');
        });

        tabContents.forEach(content => {
            content.classList.add('hidden');
        });

        const selectedTab = document.getElementById('tab-' + tabId);
        selectedTab.classList.add('border-b-2', 'border-blue-500', 'text-gray-800');
        selectedTab.classList.remove('text-gray-500');

        const selectedContent = document.getElementById('content-' + tabId);
        selectedContent.classList.remove('hidden');
        console.log(selectedContent.id)
        changeURL(selectedContent.id)
    }

    tabs.forEach(tab => {
        tab.addEventListener('click', function() {
            const tabId = this.getAttribute('data-tab');
            activateTab(tabId);
        });
    });


    document.addEventListener('DOMContentLoaded', function() {
        activateTab('texte');

    });

    const toggleUserState = function() {
        if (communityText.textContent === 'Sélectionner une communauté') {
            setUserCommunity();
        } else {
            communityIcon.classList.remove('bg-green-500');
            communityIcon.classList.add('bg-gray-800');
            communityIconText.textContent = '/';
            communityText.textContent = 'Sélectionner une communauté';
        }
    };

    communitySelector.addEventListener('click', toggleUserState);
    const tagInput = document.getElementById("tag-input");
    const tagContainer = document.getElementById("tag-container");

    let tags = [];

    function addTag(tagText,id) {
        if (tagText.trim() === "" || tags.includes(tagText)) return;

        tags.push(tagText);

        const tagElement = document.createElement("div");
        tagElement.classList = "bg-orange-500 text-white px-3 py-1 rounded-full flex items-center gap-2";
        tagElement.innerHTML = `
                                        <span id="${id}" class="TagFinall">${tagText}</span>
                                        <button class="text-white text-sm font-bold focus:outline-none">&times;</button>
                                    `;

        tagElement.querySelector("button").addEventListener("click", () => {
            tagElement.remove();
            tags = tags.filter(t => t !== tagText);
        });

        tagContainer.appendChild(tagElement);
    }

});


