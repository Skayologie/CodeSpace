import inviteModo from "./InviteModo";

class EventHandler {
    constructor(ActionIdBtn) {
        this.init(ActionIdBtn);
    }
    init(ActionIdBtn){
        let btn = document.getElementById(ActionIdBtn);
        btn.addEventListener("click", () => {
            if (ActionIdBtn === "inviteModo"){
                (new inviteModo()).OnchangeFunc();
            }
        })

    }
}
