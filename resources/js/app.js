
import Dropdown from "./Events/dropdown.js";
import Community from "./Events/Community";
import PostForm from "./Events/PostForm";
import Header from "./Events/Header";

import Dashboard from "./Dashboard/index";
import Render from "./Events/RenderPage";
import RenderForms from "./Events/RenderForms";
import StoreAJAX from "./Events/StoreAJAX";
import Explore from "./Events/Explore";


const path = window.location.pathname;
if (path !== "/Dashboard"){
    document.addEventListener("DOMContentLoaded", () => {
        new Dropdown();
        new Header();
        let view = new Render()
        let form = new RenderForms()
        new Explore();
        form.render("/Community/create","openModalBtn");
        view.render("Post","CreatePost","UserArea")
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

