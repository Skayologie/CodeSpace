import {
    getMyCommunitiesSideBar,
    dropDownMenuSideBar,
    ProfileButtonHeader,
    CreateNewCommunityForm,
    CreatePostPage,
    JoinCommunity,
    InviteModo,
    sentMessage,
    ChangeConversation
} from "./main/ui";
import Settings from "./main/Settings"
function main() {
    try { InviteModo(); } catch (e) { console.error(e); }
    try { JoinCommunity(); } catch (e) { console.error(e); }
    try { getMyCommunitiesSideBar(); } catch (e) { console.error(e); }
    try { dropDownMenuSideBar(); } catch (e) { console.error(e); }
    try { ProfileButtonHeader(); } catch (e) { console.error(e); }
    try { CreateNewCommunityForm(); } catch (e) { console.error(e); }
    try { CreatePostPage(); } catch (e) { console.error(e); }
    try { ChangeConversation(); } catch (e) { console.error(e); }
    try { sentMessage(); } catch (e) { console.error(e); }
    try { Settings(); } catch (e) { console.error(e); }
}
document.addEventListener('DOMContentLoaded', main);

