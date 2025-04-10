import PostForm from "./PostForm";
import Form from "./Form";

export default class Render {
    render(endpoint , ActionIdBtn , renderPlace){
        let place = document.getElementById(renderPlace);
        let btn = document.getElementById(ActionIdBtn);
        let loading = document.getElementById("LoadingOne");
        btn.addEventListener("click", ()=>{
            loading.classList.remove('hidden');
            $.ajax({
                url: endpoint,
                success: function(result) {
                    loading.classList.add('hidden');
                    place.innerHTML = result;

                    if (endpoint === "Post"){
                        new PostForm();
                    }
                }
            });



        })

    }
    renderWithout(endpoint , renderPlace){
        let place = document.getElementById(renderPlace);
        let loading = document.getElementById("LoadingOne");
        loading.classList.remove('hidden');
        $.ajax({
            url: endpoint,
            success: function(result) {
                loading.classList.add('hidden');
                place.innerHTML = result;
            }
        });
    }
}
