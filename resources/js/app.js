
import Dropdown from "./Events/dropdown.js";
import Community from "./Events/Community";
import PostForm from "./Events/PostForm";
import Header from "./Events/Header";

import Dashboard from "./Dashboard/index";


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
        new Dashboard();
    })
}

