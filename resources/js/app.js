
import Dropdown from "./Events/dropdown.js";
import Community from "./Events/Community";
import PostForm from "./Events/PostForm";
import Header from "./Events/Header";

import Dashboard from "./Dashboard/index";
import Render from "./Events/RenderPage";
import RenderForms from "./Events/RenderForms";
import StoreAJAX from "./Events/StoreAJAX";
import Explore from "./Events/Explore";
import inviteModo from "./Events/InviteModo";


const path = window.location.pathname;
if (path !== "/Dashboard"){
    document.addEventListener("DOMContentLoaded", () => {
        new Dropdown();
        new Header();
        // let view = new Render()
        // let form = new RenderForms()
        // new Explore();
        // form.render("/Community/create","openModalBtn");
        // $this->communities = CommunityMembers::join('communities', 'community_members.communityID', '=', 'communities.id')->where("userId",$user->id)->where("status","regularUser")->get();
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
            error : (error)=>{

            }
        });
        // view.render("Post","CreatePost","UserArea")
        document.getElementById("inviteModo").addEventListener('click',()=>{
            let invite = new inviteModo();
            document.getElementById("inviteModoForm").classList.remove('hidden')

            invite.OnchangeFunc();
        })

    });
}else{
    document.addEventListener("DOMContentLoaded", () => {
        let view = new Render()
        let form = new RenderForms()
        new Dashboard();
        form.render("/Categorie/create","category");
        form.render("/Tag/create","tag");
        form.render("/Theme/create","theme");
        view.render("Theme","ManageThemes","AdminArea")
        view.render("Categorie","ManageCategories","AdminArea")
        view.render("Tag","ManageTags","AdminArea")
    })
}


