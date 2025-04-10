import Toaster from "./Toaster";
import Render from "./RenderPage";

export default class StoreAJAX{
    constructor(params) {
        this.data = [];
        Object.keys(params).forEach(key=>{
            this.data.push(params[key])
        })
    }

    save(CreationEndpoint){
        let loading = document.getElementById("LoadingOne");
        loading.classList.remove('hidden');
        let toaster = new Toaster();
        let data = {};
        this.data.forEach(ele => {
            Object.assign(data,ele)
        })
        // console.log(data)
        $.ajax({
            url:CreationEndpoint,
            method:"POST",
            data:data,
            success : (res)=>{
                let view = new Render()
                toaster.show(res.message,"success")
                loading.classList.add('hidden');
                view.renderWithout(CreationEndpoint,"AdminArea")
            },
            error : (res)=>{
                toaster.show(JSON.parse(res.responseText).message,"error")
            }
        })
    }
}


