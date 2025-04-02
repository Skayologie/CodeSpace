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
                }
            });
        })
    }
}
