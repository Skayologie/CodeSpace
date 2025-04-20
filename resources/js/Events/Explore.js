import Render from "./RenderPage";

export default class Explore{
    constructor(){
        this.view = new Render();
        this.showExploreCommunities()
    }
    showExploreCommunities(){
        this.view.render("/Explore/Communities","explorer","UserArea")
    }


}
