import Render from "./RenderPage";
import RenderForms from "./RenderForms";

export default class Explore{
    constructor(){
        this.view = new Render();
        this.showExploreCommunities()
        this.showSpecCommunity()
    }
    showExploreCommunities(){
        this.view.render("/Explore/Communities","explorer","UserArea")
    }
    showSpecCommunity(){
        document.getElementById("explorer").addEventListener('click',()=>{
            setTimeout(()=>{
                this.communities = document.querySelectorAll(".communities");
                this.communities.forEach((e)=>{
                    let idValue = e.getAttribute("data-value")
                    this.view.render(`/Community/${idValue}`,`${e.id}`,"UserArea")
                    localStorage.setItem("CommunityID",idValue)
                });
                this.communities.forEach((e)=>{
                    e.addEventListener('click',()=>{
                        setTimeout(()=> {
                            console.log(document.getElementById("inviteModo"))
                            this.form = new RenderForms();
                            this.form.render("ManageCommunity/inviteModo","inviteModo")
                        },3000)
                    })
                });
            },2000)
        })
    }

}
