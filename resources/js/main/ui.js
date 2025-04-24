import Community from "../Events/Community";
import PostForm from "../Events/PostForm";
import Toaster from "../Events/Toaster";

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


