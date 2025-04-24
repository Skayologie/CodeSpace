import PostForm from "./Events/PostForm";
import EventHandle from "./Events/EventHandle";
import Explore from "./Events/Explore";
import inviteModo from "./Events/InviteModo";
import Form from "./Events/Form";
import RenderForms from "./Events/RenderForms";
import Toaster from "./Events/Toaster";
import Community from "./Events/Community";
document.addEventListener("DOMContentLoaded", function () {
    const path = window.location.pathname;
    if (path.startsWith("/Post")) {
        new PostForm();
    } else if (path === "/Explore") {
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
                    },
                    error : (error)=>{
                        document.getElementById("LoadingOne").classList.add("hidden");
                        (new Toaster()).show(error.message,"error")
                    }
                })
            })
        })
    } else if (path.startsWith("/Explore/Community")) {
        document.getElementById("closeBtn").addEventListener('click', () => {
            document.getElementById("inviteModos").classList.add("hidden")
        })
        document.getElementById("cancelBtn").addEventListener('click', () => {
            document.getElementById("inviteModos").classList.add("hidden")
        })
        document.getElementById('inviteModo').addEventListener('click', () => {
            document.getElementById("inviteModos").classList.remove("hidden")
            $("#SearchUserInput").on("keyup", (e) => {
                let nameQuery = e.target.value;
                $.ajax({
                    url: `../../../../../Users/Search/${nameQuery}`,
                    success: (result) => {
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
                    error: (error) => {
                        console.log(error)
                    }
                })
            })
        })
    }

    $("#CommunityButtonCreate").on("click",()=>{
        document.getElementById("CommunityOverlay").classList.remove("hidden")
        document.getElementById("FinishedBtn").addEventListener("click",()=>{
            document.getElementById("CommunityOverlay").classList.add("hidden")
        })
        new Community()
    })

})




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
                document.getElementById("inviteModos").classList.add("hidden")
                const url = window.location.pathname;
                const parts = url.split('/');
                let CommunityID = parts[parts.length - 1].split('#')[0];
                let UserID = C.target.getAttribute("data-value");
                let data = {
                    "CommunityID":CommunityID,
                    "UserID":UserID,
                    "role":role,
                }
                document.getElementById("LoadingOne").classList.remove("hidden");
                console.log(CommunityID)
                $.ajax({
                    url : `../../../../../../ManageCommunity/SendInviteToCommunity/${CommunityID}/${UserID}/${role}`,
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
