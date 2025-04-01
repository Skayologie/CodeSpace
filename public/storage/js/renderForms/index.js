document.addEventListener('DOMContentLoaded', function () {

    document.getElementById('category').addEventListener('click',()=>{
        fetch('/Categorie')
            .then(response => response.json())
            .then(data => {
                document.getElementById("ContainForm").innerHTML = data.content;
                document.getElementById("closeButton").addEventListener('click',()=>{
                    document.getElementById("ContainForm").innerHTML = ""
                })
                document.getElementById("cancelButton").addEventListener('click',()=>{
                    document.getElementById("ContainForm").innerHTML = ""
                })
            })
            .catch(error => console.error('Error fetching Blade file:', error));
    })


});
