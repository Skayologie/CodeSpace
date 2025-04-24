import {
    getMyCommunitiesSideBar,
    dropDownMenuSideBar,
    ProfileButtonHeader,
    CreateNewCommunityForm,
    CreatePostPage,
    JoinCommunity,
    InviteModo
} from "./main/ui";

function main() {
    try { InviteModo(); } catch (e) { console.error(e); }
    try { JoinCommunity(); } catch (e) { console.error(e); }
    try { getMyCommunitiesSideBar(); } catch (e) { console.error(e); }
    try { dropDownMenuSideBar(); } catch (e) { console.error(e); }
    try { ProfileButtonHeader(); } catch (e) { console.error(e); }
    try { CreateNewCommunityForm(); } catch (e) { console.error(e); }
    try { CreatePostPage(); } catch (e) { console.error(e); }
}
document.addEventListener('DOMContentLoaded', main);
