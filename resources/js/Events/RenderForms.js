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
                    // document.getElementById("closeButton").addEventListener('click', () => {
                    //     document.getElementById("ContainForm").innerHTML = ""
                    // })
                    // document.getElementById("cancelButton").addEventListener('click', () => {
                    //     document.getElementById("ContainForm").innerHTML = ""
                    // })
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

    SideBarFormEvents(){
            // Elements
            const form = document.getElementById('customFlowForm');
            const titleInput = document.getElementById('title');
            const titleError = document.getElementById('titleError');
            const titleErrorMessage = document.getElementById('titleErrorMessage');
            const titleCounter = document.getElementById('titleCounter');
            const description = document.getElementById('description');
            const descriptionCheck = document.getElementById('descriptionCheck');
            const descriptionCounter = document.getElementById('descriptionCounter');
            const privateToggle = document.getElementById('privateToggle');
            const profileDisplayOption = document.getElementById('profileDisplayOption');
            const profileDisplayCheck = document.getElementById('profileDisplayCheck');
            const closeButton = document.getElementById('closeButton');
            const cancelButton = document.getElementById('cancelButton');
            const submitButton = document.getElementById('submitButton');

            // Initialize display state (show check mark if description has content)
            if (description.value.trim().length > 0) {
                descriptionCheck.classList.remove('hidden');
            }

            // Title validation and character counter
            titleInput.addEventListener('input', function() {
                const remainingChars = this.maxLength - this.value.length;
                titleCounter.textContent = remainingChars;

                if (this.value.trim().length === 0) {
                    this.classList.add('border-red-500');
                    titleError.classList.remove('hidden');
                    titleErrorMessage.classList.remove('hidden');
                } else {
                    this.classList.remove('border-red-500');
                    titleError.classList.add('hidden');
                    titleErrorMessage.classList.add('hidden');
                }
            });

            // Description character counter and checkmark
            description.addEventListener('input', function() {
                const remainingChars = this.maxLength - this.value.length;
                descriptionCounter.textContent = remainingChars;

                if (this.value.trim().length > 0) {
                    descriptionCheck.classList.remove('hidden');
                } else {
                    descriptionCheck.classList.add('hidden');
                }
            });


            // Close button functionality
            closeButton.addEventListener('click', function() {
                // In a real application, this would close the modal
                alert('Modal would close here');
            });

            // Cancel button functionality
            cancelButton.addEventListener('click', function() {
                // In a real application, this would close the modal
                alert('Action cancelled');
            });

            // Form submission
            form.addEventListener('submit', function(e) {
                e.preventDefault();

                // Validate title
                if (titleInput.value.trim().length === 0) {
                    titleInput.classList.add('border-red-500');
                    titleError.classList.remove('hidden');
                    titleErrorMessage.classList.remove('hidden');
                    return;
                }

                // Collect form data
                const formData = {
                    title: titleInput.value,
                    description: description.value,
                    // isPrivate: privateToggle.checked,
                    // displayOnProfile: profileDisplayCheck.classList.contains('bg-blue-600')
                };

                // Display form data (in a real app, you would send this to a server)
                console.log('Form submitted with data:', formData);
                alert('Form submitted successfully: ' + JSON.stringify(formData, null, 2));
            });

    }
}
