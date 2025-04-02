
import Dropdown from "./Events/dropdown.js";
import Community from "./Events/Community";
import PostForm from "./Events/PostForm";
import Header from "./Events/Header";

import Dashboard from "./Dashboard/index";
import Render from "./Events/RenderPage";
import RenderForms from "./Events/RenderForms";


const path = window.location.pathname;
if (path !== "/Dashboard"){
    document.addEventListener("DOMContentLoaded", () => {
        new Dropdown();
        new Community();
        new Header();
        new PostForm();
    });
}else{
    document.addEventListener("DOMContentLoaded", () => {
        let view = new Render()
        let form = new RenderForms()
        new Dashboard();

        form.render("/Categorie/create","category");
        form.render("/Tag/create","tag");
        view.render("Theme","ManageThemes","AdminArea")
        view.render("Categorie","ManageCategories","AdminArea")
        view.render("Tag","ManageTags","AdminArea")
    })
}

