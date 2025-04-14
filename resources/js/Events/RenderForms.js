import StoreAJAX from "./StoreAJAX";
import Community from "./Community";

export default class RenderForms {

    render(endpoint , ActionIdBtn ) {
        let btn = document.getElementById(ActionIdBtn);
        let loading = document.getElementById("LoadingOne");
        btn.addEventListener("click", () => {
            loading.classList.remove('hidden');

            $.ajax({
                url: endpoint,
                success: async function (result) {
                    loading.classList.add('hidden');
                    document.getElementById("ContainForm").innerHTML = result.content;
                    document.getElementById("closeButton").addEventListener('click', () => {
                        document.getElementById("ContainForm").innerHTML = ""
                    })
                    document.getElementById("cancelButton").addEventListener('click', () => {
                        document.getElementById("ContainForm").innerHTML = ""
                    })
                    if (ActionIdBtn === "theme"){
                        let response = await fetch("/AllThemes");
                        let parentSelection = document.getElementById('parentSelection');
                        let finalResponse = await response.json()
                        let CheckBoxParent = document.getElementById("isParent");
                        let title = document.querySelector("form #title");
                        let submitButton = document.getElementById("ThemeSubmitButton");
                        if (parentSelection) {
                            parentSelection.innerHTML = ""; // Clear previous content if needed

                            finalResponse.forEach(theme => {
                                let option = document.createElement("option");
                                option.value = theme.id;  // Assuming each theme has an `id`
                                option.textContent = theme.name; // Assuming each theme has a `name`
                                parentSelection.appendChild(option);
                            });
                        }
                        CheckBoxParent.addEventListener('click',()=>{
                            if (CheckBoxParent.checked){
                                document.getElementById("optionalWay").classList.add("hidden")
                            }else{
                                document.getElementById("optionalWay").classList.remove("hidden")
                            }
                        })
                        submitButton.addEventListener("click",()=>{
                            if (CheckBoxParent.checked){
                                CheckBoxParent = true
                                parentSelection = null
                            }else{
                                CheckBoxParent = false
                                parentSelection = parentSelection.value
                            }
                            let ajaxon = new StoreAJAX([{
                                _token: document.querySelector('meta[name="csrf-token"]').content,
                                name: title.value,
                                parent: parentSelection,
                                isParent: CheckBoxParent
                            }]);
                            ajaxon.save("Theme")
                            document.getElementById("themeForm").remove()
                        })
                    }
                    else if (ActionIdBtn === "tag"){
                        let submitButton = document.getElementById('tagSubmitButton');
                        submitButton.addEventListener("click",()=>{
                            let title = document.getElementById("title")
                            let ajaxon = new StoreAJAX([{
                                _token: document.querySelector('meta[name="csrf-token"]').content,
                                name: title.value,
                            }]);
                            ajaxon.save("Tag");
                            document.getElementById("LoadingOne").classList.add("hidden")
                        })
                    }
                    else if (ActionIdBtn === "category"){
                        let submitButton = document.getElementById('CategorySubmitButton');
                        submitButton.addEventListener("click",()=>{
                            let title = document.getElementById("title")
                            let description = document.getElementById("description")
                            let ajaxon = new StoreAJAX([{
                                _token: document.querySelector('meta[name="csrf-token"]').content,
                                name: title.value,
                                description: description.value,
                            }]);
                            ajaxon.save("Categorie");
                            document.getElementById("LoadingOne").classList.add("hidden")
                        })
                    }
                    else if (ActionIdBtn === "openModalBtn"){
                        new Community();
                    }

                }
            });
        })
    }
}
