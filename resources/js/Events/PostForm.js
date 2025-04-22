import Form from "./Form";

export default class PostForm {
    constructor() {
        new Form();
        this.tags = [];
        this.tagContainer = document.getElementById("tag-container");

        this.tabs = document.querySelectorAll('[data-tab]');
        this.tabContents = document.querySelectorAll('.tab-content');

        const quill = new Quill('#editor', {
            theme: 'snow',
            placeholder:"Wrire your content ..."
        });
        document.querySelector('form').addEventListener('submit', function() {
            document.getElementById('quill-content').value = quill.root.innerHTML;
        });
        this.init();
    }
    init(){

        // change
        document.getElementById("tag-input").addEventListener("keyup", () => {
            const inputValue = document.getElementById("tag-input").value.trim();
            const searchBox = document.getElementById('tag-search-box');

            if (inputValue === "") {
                searchBox.innerHTML = "";
                return;
            }
            this.getData(inputValue);
        });
        this.tabs.forEach(tab => {
            tab.addEventListener('click', ()=> {
                const tabId = tab.getAttribute('data-tab');
                this.activateTab(tabId);
            });
        });
    };
    // Get Data for tags with ajax
    async getData(text) {
        const url = "Tag/Search/"+text;
        try {
            const response = await fetch(url);
            if (!response.ok) {
                throw new Error(`Response status: ${response.status}`);
            }
            document.getElementById('tag-search-box').innerHTML = ``;
            let json = await response.json();
            json["data"].forEach((e)=>{
                document.getElementById('tag-search-box').innerHTML += `
                         <span>
                            <button id="${e.id}," type="button" style="background-color: chocolate;border-radius: 8px" class="TagName  p-2 text-white text-sm font-bold focus:outline-none">#${e.name}</button>
                         </span>
                    `;

            });
            document.querySelectorAll(".TagName").forEach((element)=>{
                element.addEventListener("click",()=>{
                    this.addTag(element.textContent , element.id)

                    let TagFinal = "" ;
                    document.querySelectorAll('.TagFinall').forEach((e)=>{
                        TagFinal += e.id
                        console.log(TagFinal)
                        document.getElementById('allTags').value = TagFinal
                    })
                })
            });

        } catch (error) {
            console.error(error.message);
        }
    };

    activateTab(tabId) {
        this.tabs.forEach(tab => {
            tab.classList.remove('border-b-2', 'border-blue-500', 'text-gray-800');
            tab.classList.add('text-gray-500');
        });

        this.tabContents.forEach(content => {
            content.classList.add('hidden');
        });

        const selectedTab = document.getElementById('tab-' + tabId);
        selectedTab.classList.add('border-b-2', 'border-blue-500', 'text-gray-800');
        selectedTab.classList.remove('text-gray-500');

        const selectedContent = document.getElementById('content-' + tabId);
        selectedContent.classList.remove('hidden');
        console.log(selectedContent.id)
        this.changeURL(selectedContent.id)
    }
    changeURL(newURL) {
        history.replaceState(null, "New Page", "/Post?Type="+newURL);
    }
    addTag(tagText,id) {
        if (tagText.trim() === "" || this.tags.includes(tagText)) return;

        this.tags.push(tagText);

        const tagElement = document.createElement("div");
        tagElement.classList = "bg-orange-500 text-white px-3 py-1 rounded-full flex items-center gap-2";
        tagElement.innerHTML = `<span id="${id}" class="TagFinall">${tagText}</span>
                            <button class="text-white text-sm font-bold focus:outline-none">&times;</button>`;

        tagElement.querySelector("button").addEventListener("click", () => {
            tagElement.remove();
            this.tags = tags.filter(t => t !== tagText);
        });

        this.tagContainer.appendChild(tagElement);
    }

}




// document.addEventListener('DOMContentLoaded', function() {
//
//     const titleInput = document.querySelector('input[placeholder="Titre*"]');
//     const charCount = document.querySelector('.text-right.text-gray-500');
//     const tabs = document.querySelectorAll('[data-tab]');
//     const tabContents = document.querySelectorAll('.tab-content');
//     const communitySelector = document.getElementById('communitySelector');
//     const communityIcon = document.getElementById('communityIcon');
//     const communityIconText = document.getElementById('communityIconText');
//     const communityText = document.getElementById('communityText');
//
//     // titleInput.addEventListener('input', function() {
//     //     const count = this.value.length;
//     //     charCount.textContent = count + '/300';
//     // });
//
//
//
//
//
//
//     // const toggleUserState = function() {
//     //     if (communityText.textContent === 'Sélectionner une communauté') {
//     //         setUserCommunity();
//     //     } else {
//     //         communityIcon.classList.remove('bg-green-500');
//     //         communityIcon.classList.add('bg-gray-800');
//     //         communityIconText.textContent = '/';
//     //         communityText.textContent = 'Sélectionner une communauté';
//     //     }
//     // };
//
//     // communitySelector.addEventListener('click', toggleUserState);
//
//     // Handle favorite icons
//     // const favoriteIcons = document.querySelectorAll('.favorite-icon');
//
//     // favoriteIcons.forEach(icon => {
//     //     icon.addEventListener('click', function(e) {
//     //         e.preventDefault();
//     //         e.stopPropagation();
//     //
//     //         // Toggle between filled and empty star
//     //         if (this.classList.contains('far')) {
//     //             this.classList.remove('far');
//     //             this.classList.add('fas');
//     //             this.style.color = '#ff4500'; // Reddit orange
//     //         } else {
//     //             this.classList.remove('fas');
//     //             this.classList.add('far');
//     //             this.style.color = ''; // Reset color
//     //         }
//     //     });
//     // });
//
//     // Make navigation links active when clicked
//     // const navLinks = document.querySelectorAll('nav a');
//     //
//     // navLinks.forEach(link => {
//     //     link.addEventListener('click', function(e) {
//     //         e.preventDefault();
//     //
//     //         // Remove active class from all links
//     //         navLinks.forEach(l => {
//     //             l.classList.remove('bg-gray-100', 'text-black');
//     //             l.classList.add('text-gray-700');
//     //         });
//     //
//     //         // Add active class to clicked link
//     //         this.classList.remove('text-gray-700');
//     //         this.classList.add('bg-gray-100', 'text-black');
//     //     });
//     // });
//
//     // Mobile functionality - toggle sidebar
//     // const toggleSidebar = document.createElement('button');
//     // toggleSidebar.innerHTML = '<i class="fas fa-bars"></i>';
//     // toggleSidebar.className = 'fixed top-4 left-4 md:hidden bg-white p-2 rounded-md shadow-md z-50';
//     // document.body.appendChild(toggleSidebar);
//     //
//     // const sidebar = document.querySelector('.w-64');
//     // let sidebarVisible = true;
//     //
//     // // On smaller screens, hide sidebar by default
//     // if (window.innerWidth < 768) {
//     //     sidebar.style.transform = 'translateX(-100%)';
//     //     sidebarVisible = false;
//     // }
//
//     // toggleSidebar.addEventListener('click', function() {
//     //     if (sidebarVisible) {
//     //         sidebar.style.transform = 'translateX(-100%)';
//     //     } else {
//     //         sidebar.style.transform = 'translateX(0)';
//     //     }
//     //     sidebarVisible = !sidebarVisible;
//     // });
//
//     // Add transition for smooth sidebar sliding
//     // sidebar.style.transition = 'transform 0.3s ease';
//     //
//     //
//     // document.getElementById("email").addEventListener("input",()=>{
//     //     if (document.getElementById("email").value.length !== 0) {
//     //         document.getElementById("sendBtn").classList.remove("bg-gray-200");
//     //         document.getElementById("sendBtn").classList.remove("text-gray-700");
//     //         document.getElementById("sendBtn").classList.add("text-white");
//     //         document.getElementById("sendBtn").classList.add("bg-orange-600");
//     //     }else{
//     //         document.getElementById("sendBtn").classList.add("bg-gray-200");
//     //         document.getElementById("sendBtn").classList.remove("bg-orange-600");
//     //         document.getElementById("sendBtn").classList.add("text-gray-700");
//     //         document.getElementById("sendBtn").classList.remove("text-white");
//     //     }
//     // })
//
//
// });














