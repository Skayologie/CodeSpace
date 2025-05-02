import Community from "../Events/Community";
import PostForm from "../Events/PostForm";
import Toaster from "../Events/Toaster";
import Render from "../Events/RenderPage";
import Echo from "laravel-echo";

export function getMyCommunitiesSideBar() {
    $.ajax({
        url:`../../../../../../../Communities/listAllMyCommunities`,
        method:"GET",
        success : (result)=>{
            document.getElementById("CommunitiesDispo").innerHTML = result.map(item=>{
                return `
                    <a href="../../../../../../Explore/Community/${item.id}" class="flex items-center justify-between px-3 py-2 text-sm font-medium rounded-md text-gray-700 hover:bg-gray-100">
                        <div class="flex items-center">
                            <div class="w-5 h-5 rounded-full bg-red-500 flex items-center justify-center mr-3">
                                <img src="https://www.redditstatic.com/desktop2x/img/favicon/apple-icon-57x57.png" class="w-4 h-4" alt="Canada">
                            </div>
                            <span>r/${item.name}</span>
                        </div>
                        <i class="far fa-star favorite-icon"></i>
                    </a>
                    `
            });

        },
    });
}

export function dropDownMenuSideBar(){
    const sectionHeaders = document.querySelectorAll('.section-header');
    sectionHeaders.forEach(header => {
        header.addEventListener('click', function() {
            const sectionId = this.getAttribute('data-section');
            const contentElement = document.getElementById(`${sectionId}-content`);
            const iconElement = this.querySelector('.section-icon');

            // Toggle the section visibility
            if (contentElement.style.display === 'none') {
                contentElement.style.display = 'block';
                iconElement.classList.remove('fa-chevron-down');
                iconElement.classList.add('fa-chevron-up');
            } else {
                contentElement.style.display = 'none';
                iconElement.classList.remove('fa-chevron-up');
                iconElement.classList.add('fa-chevron-down');
            }
        });
    });
}

export function ProfileButtonHeader() {
    const profileButton = document.getElementById('profileButton');
    profileButton.addEventListener('click', (event)=> {
        // Prevent the click from propagating to the document
        event.stopPropagation();
        toggleDropdown();
    });
    function toggleDropdown() {
        let profileDropdown = document.getElementById('profileDropdown');
       profileDropdown.classList.toggle('hidden');
    }
    document.addEventListener('click', (event)=> {
        // If the click is outside the dropdown and the dropdown is visible
        if (!profileDropdown.contains(event.target) && !profileButton.contains(event.target)) {
            if (!profileDropdown.classList.contains('hidden')) {
                profileDropdown.classList.add('hidden');
            }
        }
    });
}

export function CreateNewCommunityForm(){
    $("#CommunityButtonCreate").on("click",()=>{
        document.getElementById("CommunityOverlay").classList.remove("hidden")
        document.getElementById("FinishedBtn").addEventListener("click",()=>{
            document.getElementById("CommunityOverlay").classList.add("hidden")
        })
        new Community()
    })
}

export function CreatePostPage() {
        // Tab switching functionality
        const tabs = document.querySelectorAll('[data-tab]');
        const tabContents = document.querySelectorAll('.tab-content');

        tabs.forEach(tab => {
            tab.addEventListener('click', () => {
                // Remove active class from all tabs
                tabs.forEach(t => {
                    t.classList.remove('border-b-2', 'border-orange-500', 'text-orange-500');
                    t.classList.add('text-gray-600', 'hover:text-gray-900');
                });

                // Add active class to clicked tab
                tab.classList.add('border-b-2', 'border-orange-500', 'text-orange-500');
                tab.classList.remove('text-gray-600', 'hover:text-gray-900');

                // Hide all tab contents
                tabContents.forEach(content => {
                    content.classList.add('hidden');
                });

                // Show the selected tab content
                const tabName = tab.getAttribute('data-tab');
                document.getElementById(`content-${tabName}`).classList.remove('hidden');
            });
        });



        // Title character counter
        const titleInput = document.getElementById('post-title');
        const titleCount = document.getElementById('titleCount');

        titleInput.addEventListener('input', function() {
            const count = this.value.length;
            titleCount.textContent = count;

            if (count > 300) {
                titleCount.classList.add('text-red-600');
            } else {
                titleCount.classList.remove('text-red-600');
            }
        });

        // Tags functionality
        const tagInput = document.getElementById('tag-input');
        const tagContainer = document.getElementById('tag-container');
        const allTagsInput = document.getElementById('allTags');
        const tagSearchBox = document.getElementById('tag-search-box');
        let tags = [];

        // Add tag when pressing Enter
        tagInput.addEventListener('keydown', function(e) {
            if (e.key === 'Enter') {
                e.preventDefault();
                const tag = this.value.trim();

                if (tag && !tags.includes(tag)) {
                    addTag(tag);
                    this.value = '';
                    updateAllTagsInput();
                }
            }
        });

        // Show/hide tag search box
        tagInput.addEventListener('focus', function() {
            // In a real implementation, you would populate this with tag suggestions
            // For now, we'll just show some example tags
            tagSearchBox.innerHTML = '';

            const exampleTags = ['discussion', 'question', 'help', 'announcement', 'tutorial'];
            exampleTags.forEach(tag => {
                const tagElement = document.createElement('span');
                tagElement.className = 'px-3 py-1.5 bg-gray-100 text-gray-700 rounded-full text-sm cursor-pointer hover:bg-gray-200 transition-colors';
                tagElement.textContent = tag;
                tagElement.addEventListener('click', function() {
                    addTag(tag);
                    tagInput.value = '';
                    updateAllTagsInput();
                    tagSearchBox.classList.add('hidden');
                });
                tagSearchBox.appendChild(tagElement);
            });

            tagSearchBox.classList.remove('hidden');
        });

        tagInput.addEventListener('blur', function() {
            // Hide the search box with a small delay to allow for clicks
            setTimeout(() => {
                tagSearchBox.classList.add('hidden');
            }, 200);
        });

        // Function to add a tag
        function addTag(text) {
            const tag = document.createElement('div');
            tag.className = 'tag-item';

            const tagText = document.createElement('span');
            tagText.textContent = text;

            const removeBtn = document.createElement('span');
            removeBtn.className = 'tag-remove';
            removeBtn.innerHTML = '&times;';
            removeBtn.addEventListener('click', function() {
                tag.remove();
                tags = tags.filter(t => t !== text);
                updateAllTagsInput();
            });

            tag.appendChild(tagText);
            tag.appendChild(removeBtn);
            tagContainer.appendChild(tag);

            tags.push(text);
        }

        // Update the hidden input with all tags
        function updateAllTagsInput() {
            allTagsInput.value = tags.join(',');
        }

        // Community search functionality
        const searchInput = document.getElementById('InputSearchCommunity');
        const searchResults = document.getElementById('searchCommunityResults');

        searchInput.addEventListener('focus', function() {
            searchResults.classList.remove('hidden');
        });

        searchInput.addEventListener('input', function() {
            // In a real implementation, you would fetch results from the server
            // For now, we'll just show a loading state
            if (this.value.trim() !== '') {
                searchResults.innerHTML = `
                        <div class="p-4">
                            <div class="flex items-center">
                                <div class="animate-spin rounded-full h-5 w-5 border-b-2 border-orange-500 mr-3"></div>
                                <span>Recherche en cours...</span>
                            </div>
                        </div>
                    `;
            } else {
                searchResults.innerHTML = `
                        <div class="p-4 text-center text-gray-500 text-sm">
                            Commencez à taper pour rechercher des communautés
                        </div>
                    `;
            }
        });

        // Hide search results when clicking outside
        document.addEventListener('click', function(e) {
            if (!searchInput.contains(e.target) && !searchResults.contains(e.target)) {
                searchResults.classList.add('hidden');
            }
        });

        // File Upload Functionality
        const fileUpload = document.getElementById('file-upload');
        const uploadArea = document.getElementById('upload-area');
        const selectFilesBtn = document.getElementById('select-files-btn');
        const previewContainer = document.getElementById('preview-container');
        const uploadProgress = document.getElementById('upload-progress');
        const progressBar = document.getElementById('progress-bar');
        const progressPercentage = document.getElementById('progress-percentage');
        const uploadError = document.getElementById('upload-error');
        const errorMessage = document.getElementById('error-message');
        const uploadedFilesInput = document.getElementById('uploaded-files');

        // Store uploaded files
        let uploadedFiles = [];

        // Trigger file input when clicking the upload area or button
        uploadArea.addEventListener('click', function() {
            fileUpload.click();
        });

        selectFilesBtn.addEventListener('click', function(e) {
            e.stopPropagation(); // Prevent triggering the uploadArea click event
            fileUpload.click();
        });

        // Handle drag and drop
        ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
            uploadArea.addEventListener(eventName, preventDefaults, false);
        });

        function preventDefaults(e) {
            e.preventDefault();
            e.stopPropagation();
        }

        ['dragenter', 'dragover'].forEach(eventName => {
            uploadArea.addEventListener(eventName, highlight, false);
        });

        ['dragleave', 'drop'].forEach(eventName => {
            uploadArea.addEventListener(eventName, unhighlight, false);
        });

        function highlight() {
            uploadArea.classList.add('border-orange-500', 'bg-orange-50');
        }

        function unhighlight() {
            uploadArea.classList.remove('border-orange-500', 'bg-orange-50');
        }

        // Handle dropped files
        uploadArea.addEventListener('drop', handleDrop, false);

        function handleDrop(e) {
            const dt = e.dataTransfer;
            const files = dt.files;
            handleFiles(files);
        }

        // Handle file selection
        fileUpload.addEventListener('change', function() {
            handleFiles(this.files);
        });

        function handleFiles(files) {
            // Reset error state
            uploadError.classList.add('hidden');

            // Validate files
            const validFiles = Array.from(files).filter(file => {
                // Check file type
                const isImage = file.type.startsWith('image/');
                const isVideo = file.type.startsWith('video/');

                // Check file size (20MB max)
                const isValidSize = file.size <= 20 * 1024 * 1024; // 20MB in bytes

                return (isImage || isVideo) && isValidSize;
            });

            // Show error if invalid files were selected
            if (validFiles.length < files.length) {
                showError('Certains fichiers ont été ignorés. Assurez-vous que tous les fichiers sont des images ou des vidéos de moins de 20MB.');
            }

            if (validFiles.length === 0) return;

            // Process valid files
            validFiles.forEach(file => {
                uploadFile(file);
            });
        }

        function uploadFile(file) {
            // In a real implementation, you would upload to your server here
            // For this example, we'll simulate an upload with a timeout

            // Show progress
            uploadProgress.classList.remove('hidden');

            // Simulate upload progress
            let progress = 0;
            const interval = setInterval(() => {
                progress += 5;
                progressBar.style.width = `${progress}%`;
                progressPercentage.textContent = `${progress}%`;

                if (progress >= 100) {
                    clearInterval(interval);
                    setTimeout(() => {
                        uploadProgress.classList.add('hidden');
                        addFileToPreview(file);
                    }, 500);
                }
            }, 100);

            // In a real implementation, you would use XMLHttpRequest or fetch API:
            /*
            const formData = new FormData();
            formData.append('file', file);

            const xhr = new XMLHttpRequest();
            xhr.open('POST', '/upload-endpoint', true);

            xhr.upload.addEventListener('progress', (e) => {
                if (e.lengthComputable) {
                    const progress = Math.round((e.loaded / e.total) * 100);
                    progressBar.style.width = `${progress}%`;
                    progressPercentage.textContent = `${progress}%`;
                }
            });

            xhr.addEventListener('load', () => {
                if (xhr.status === 200) {
                    const response = JSON.parse(xhr.responseText);
                    uploadProgress.classList.add('hidden');
                    addFileToPreview(file, response.fileUrl);
                } else {
                    showError('Échec du téléchargement. Veuillez réessayer.');
                }
            });

            xhr.addEventListener('error', () => {
                showError('Une erreur réseau s\'est produite. Veuillez réessayer.');
            });

            xhr.send(formData);
            */
        }

        function addFileToPreview(file, fileUrl = null) {
            // Create a unique ID for this file
            const fileId = `file-${Date.now()}-${Math.random().toString(36).substr(2, 9)}`;

            // Create preview element
            const previewEl = document.createElement('div');
            previewEl.className = 'relative group';
            previewEl.dataset.fileId = fileId;

            // Create preview content based on file type
            if (file.type.startsWith('image/')) {
                // For images
                const reader = new FileReader();
                reader.onload = function(e) {
                    previewEl.innerHTML = `
                            <div class="aspect-w-16 aspect-h-9 rounded-lg overflow-hidden bg-gray-100">
                                <img src="${e.target.result}" alt="${file.name}" class="w-full h-full object-cover">
                            </div>
                            <button type="button" class="remove-file absolute top-2 right-2 bg-white rounded-full p-1 shadow-sm opacity-0 group-hover:opacity-100 transition-opacity">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-600 hover:text-red-600" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </button>
                            <div class="mt-1 text-xs text-gray-500 truncate">${file.name}</div>
                        `;
                };
                reader.readAsDataURL(file);
            } else if (file.type.startsWith('video/')) {
                // For videos
                const videoUrl = URL.createObjectURL(file);
                previewEl.innerHTML = `
                        <div class="aspect-w-16 aspect-h-9 rounded-lg overflow-hidden bg-gray-100">
                            <video src="${videoUrl}" class="w-full h-full object-cover"></video>
                            <div class="absolute inset-0 flex items-center justify-center">
                                <div class="bg-black bg-opacity-50 rounded-full p-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM9.555 7.168A1 1 0 008 8v4a1 1 0 001.555.832l3-2a1 1 0 000-1.664l-3-2z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <button type="button" class="remove-file absolute top-2 right-2 bg-white rounded-full p-1 shadow-sm opacity-0 group-hover:opacity-100 transition-opacity">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-600 hover:text-red-600" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </button>
                        <div class="mt-1 text-xs text-gray-500 truncate">${file.name}</div>
                    `;
            }

            // Add to preview container
            previewContainer.appendChild(previewEl);

            // Store file data
            uploadedFiles.push({
                id: fileId,
                file: file,
                url: fileUrl || null
            });

            // Update hidden input
            updateUploadedFilesInput();

            // Add event listener for remove button
            setTimeout(() => {
                const removeBtn = previewEl.querySelector('.remove-file');
                if (removeBtn) {
                    removeBtn.addEventListener('click', function() {
                        removeFile(fileId);
                    });
                }
            }, 100);
        }

        function removeFile(fileId) {
            // Remove from DOM
            const fileEl = document.querySelector(`[data-file-id="${fileId}"]`);
            if (fileEl) {
                fileEl.remove();
            }

            // Remove from array
            uploadedFiles = uploadedFiles.filter(file => file.id !== fileId);

            // Update hidden input
            updateUploadedFilesInput();
        }

        function updateUploadedFilesInput() {
            // In a real implementation, you would store file URLs or IDs
            // For this example, we'll just store the count
            uploadedFilesInput.value = JSON.stringify(
                uploadedFiles.map(file => ({
                    id: file.id,
                    name: file.file.name,
                    type: file.file.type,
                    url: file.url
                }))
            );

        }

        function showError(message) {
            errorMessage.textContent = message;
            uploadError.classList.remove('hidden');
        }

        // Add aspect ratio utility for preview images
        const style = document.createElement('style');
        style.textContent = `
                .aspect-w-16 {
                    position: relative;
                    padding-bottom: 56.25%;
                }
                .aspect-w-16 > * {
                    position: absolute;
                    height: 100%;
                    width: 100%;
                    top: 0;
                    right: 0;
                    bottom: 0;
                    left: 0;
                }
            `;
        document.head.appendChild(style);

        // Update form submission to include file validation
        document.getElementById('btnSubmit').addEventListener('click', function() {
            // Existing validation code...

            // Check which tab is active
            const activeTab = document.querySelector('[data-tab].border-orange-500').getAttribute('data-tab');

            // If on images tab, validate that files were uploaded
            if (activeTab === 'images' && uploadedFiles.length === 0) {
                showError('Veuillez télécharger au moins une image ou vidéo.');
                return;
            }

            let data = {
                "title":document.getElementById("post-title").value,
                "category":document.getElementById("categories").value,
                "content":document.getElementById("quill-content").value,
                "allTags":document.getElementById("allTags").value,
                "_token":$('meta[name="csrf-token"]').attr('content')
            };
            console.log(activeTab)
            $.ajax({
                url:`/Post?Type=${activeTab}`,
                method:`POST`,
                data:{
                    "title":document.getElementById("post-title").value,
                    "category":document.getElementById("categories").value,
                    "content":document.getElementById("quill-content").value,
                    "allTags":document.getElementById("allTags").value,
                    "_token":$('meta[name="csrf-token"]').attr('content')
                },
                success:(response)=>{
                    console.log(response.responseJSON)
                },
                error:(error)=>{
                    (new Toaster).show(error.responseJSON.message,"error")
                }
            });



        });
    new PostForm();
}

export function JoinCommunity(){
    document.querySelectorAll(".rejoindreButton").forEach((button)=>{
        button.addEventListener("click",(e)=>{
            let communityID = e.target.id;
            document.getElementById("LoadingOne").classList.remove("hidden");
            $.ajax({
                url:`Community/join/${communityID}`,
                method:"GET",
                success:(result)=>{
                    document.getElementById("LoadingOne").classList.add("hidden");
                    (new Toaster()).show(result.message,"success")
                    console.log(result)
                },
                error : (error)=>{
                    document.getElementById("LoadingOne").classList.add("hidden");
                    (new Toaster()).show(error.message,"error")
                    console.log(result)
                }
            })
        })
    })
}

export function InviteModo() {

    const openModalBtn = document.getElementById('inviteModo');

    const closeBtn = document.getElementById('closeBtn');
    const cancelBtn = document.getElementById('cancelBtn');
    const modalOverlay = document.getElementById('inviteModoForm');
    const SearchUserInput = document.getElementById("SearchUserInput");

    [closeBtn].forEach(btn => {
        btn.addEventListener('click', () => {
            modalOverlay.classList.add('hidden');
        });
    });

    if (modalOverlay){
        modalOverlay.addEventListener('click', (e) => {
            if (e.target === modalOverlay) {
                modalOverlay.classList.add('hidden');
            }
        });
    }

    cancelBtn.addEventListener('click', () => {
        modalOverlay.classList.add('hidden');
    });

    openModalBtn.addEventListener("click",()=>{
        modalOverlay.classList.toggle('hidden');
    })

    function searchUser(queryName){
        $.ajax({
            url:`../../../../../../../Users/Search/${queryName}`,
            method:"GET",
            success:(result)=>{
                document.getElementById("UsersInvite").innerHTML = result.map(item => {
                    return `<div class="flex items-center justify-between relative">
                                <div class="flex items-center ">
                                    <div class=" w-[50px] h-[50px]">
                                        <img class="rounded-full h-full w-full object-cover" src="${item.profilePicture}" />
                                    </div>

                                    <div class="flex flex-col">
                                        <h1 class="pl-5 ">${item.username}</h1>
                                        <p class="pl-5 text-sm">${item.email}</p>
                                    </div>
                                </div>
                                <div class="relative">
                                    <button data-name="${item.username}" data-value="${item.id}" class="sendInviteTo px-4 py-2 bg-blue-600 text-white font-medium rounded-full hover:bg-blue-700">
                                        Invite to be
                                    </button>
                                </div>

                                <div id="dropdownDelay${item.id}" class="absolute top-[50px] right-0 z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow-sm w-44 dark:bg-gray-700">
                                    <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDelayButton">
                                      <li data-type="admin" class="adminInvite">
                                        <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Admin</a>
                                      </li>
                                      <li data-type="Moderator" class="ModeratorInvite">
                                        <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Moderator</a>
                                      </li>
                                    </ul>
                                </div>
                            </div>`;
                }).join(''); // Join the array into a single HTML string
                showOptionsMod()
            },
            error:(error)=>{
                console.log(error)
            }
        })
    }

    function OnchangeFunc(){
        SearchUserInput.addEventListener("keyup",(e)=>{
            searchUser(e.target.value)
        })
    }

    function showOptionsMod(){
        let sendInviteTo = document.querySelectorAll(".sendInviteTo");
        sendInviteTo.forEach((e) => {
            e.addEventListener("click", (C) => {
                let role ;
                let choosedUsername = C.target.getAttribute("data-name");
                let dropdownId = 'dropdownDelay' + C.target.getAttribute("data-value");
                let dropdown = document.getElementById(dropdownId);

                document.querySelectorAll('.adminInvite').forEach((e)=>{
                    e.addEventListener("click",(e)=>{
                        document.getElementById("default-modal").classList.remove("hidden")
                        document.getElementById("messageSentInvite").innerHTML = `Are you sure to send user number ${choosedUsername} invite to be admin ??`
                        role = "admin";
                    })
                })
                document.querySelectorAll('.ModeratorInvite').forEach((e)=>{
                    e.addEventListener("click",(e)=>{
                        document.getElementById("default-modal").classList.remove("hidden")
                        document.getElementById("messageSentInvite").innerHTML = `Are you sure to send user number ${choosedUsername} invite to be moderator ??`
                        role = "moderator";
                    })
                })
                dropdown.classList.remove("hidden");

                document.addEventListener("click", function outsideClickListener(event) {
                    if (!dropdown.contains(event.target) && !e.contains(event.target)) {
                        dropdown.classList.add("hidden");

                        document.removeEventListener("click", outsideClickListener);
                    }
                });

                document.getElementById("DeclineBtn").addEventListener("click",()=>{
                    document.getElementById("default-modal").classList.add("hidden")
                })
                document.getElementById("AcceptBtn").addEventListener("click",()=>{
                    let CommunityID = localStorage.getItem('CommunityID');
                    let UserID = C.target.getAttribute("data-value");
                    let data = {
                        "CommunityID":CommunityID,
                        "UserID":UserID,
                        "role":role,
                    }
                    document.getElementById("LoadingOne").classList.remove("hidden");
                    $.ajax({
                        url : `ManageCommunity/SendInviteToCommunity/${CommunityID}/${UserID}/${role}`,
                        method : "GET",
                        success : (result)=>{
                            document.getElementById("LoadingOne").classList.add("hidden");
                            document.getElementById("default-modal").classList.add("hidden");
                            (new Toaster()).show(result.message,"success")
                            console.log(result)
                        },
                        error : (error)=>{
                            console.log(error)
                        }
                    })
                })
            });
        });
    }

    new OnchangeFunc()

}


export function sentMessage() {
    document.getElementById("SentThisMessage").addEventListener('click', () => {
        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        const receiver_id = window.location.pathname.split('/').pop();
        const messageContent = document.getElementById("MessageInput").value;

        $.ajax({
            url: `../../Message/${receiver_id}`,
            method: "POST",
            data: {
                content: messageContent,
                receiver_id: receiver_id,
                _token: csrfToken
            },
            success: (response) => {
                console.log(response);

                let senderMessage = `
                    <div class="flex mb-4 justify-end">
                        <div class="max-w-[75%] text-right">
                            <div class="bg-violet-500 p-3 rounded-lg rounded-tr-none">
                                <p class="text-sm text-white">${messageContent}</p>
                            </div>
                            <p class="text-xs text-gray-500">Just now</p>
                        </div>
                    </div>
                `;
                $("#messageArea").append(senderMessage);
                document.getElementById("MessageInput").value = "";
                scrollToBottom()

            },
            error: (error) => {
                console.log(error.responseJSON);
            }
        });
    });
    const receiver_id = window.location.pathname.split('/').pop();
    const userId = document.getElementById('MyId').value;

}
function scrollToBottom() {
    let chat = document.getElementById('messageArea');
    if (chat){
        chat.scrollTop = chat.scrollHeight;
    }
}
scrollToBottom()

export function ChangeConversation(){
    document.querySelectorAll('.Conversation').forEach((CNV)=>{
            let view = new Render();
            CNV.addEventListener("click",()=>{
                document.getElementById("IndexChatAlert").classList.add("hidden")
                try { sentMessage(); } catch (e) { console.error(e); }
            })
            view.render("Chat/"+CNV.id,CNV.id,"ChatArea")
    })
}
