
document.querySelector('form').addEventListener('submit', function() {
    document.getElementById('quill-content').value = quill.root.innerHTML;
});
const quill = new Quill('#editor', {
    theme: 'snow',
    placeholder:"Wrire your content ..."
});
function changeURL(newURL) {
    history.replaceState(null, "New Page", "/Post?Type="+newURL);
}


// Get Data for tags with ajax
async function getData(text) {
    const url = "Tag/Search/"+text;
    try {
        const response = await fetch(url);
        if (!response.ok) {
            throw new Error(`Response status: ${response.status}`);
        }
        document.getElementById('tag-search-box').innerHTML = ``;
        let json = await response.json();
        json["data"].forEach((e)=>{
            document.getElementById('tag-search-box').innerHTML += `
                         <span>
                            <button id="${e.id}," type="button" class="TagName text-white bg-orange-700 p-2  text-sm font-bold focus:outline-none">#${e.name}</button>
                         </span>
                    `;

        });
        document.querySelectorAll(".TagName").forEach((element)=>{
            element.addEventListener("click",()=>{
                addTag(element.textContent , element.id)

                let TagFinal = "" ;
                document.querySelectorAll('.TagFinall').forEach((e)=>{
                    TagFinal += e.id
                    console.log(TagFinal)
                    document.getElementById('allTags').value = TagFinal
                })
            })
        });

    } catch (error) {
        console.error(error.message);
    }
}
// change
document.getElementById("tag-input").addEventListener("keyup", () => {
    const inputValue = document.getElementById("tag-input").value.trim();
    const searchBox = document.getElementById('tag-search-box');

    if (inputValue === "") {
        searchBox.innerHTML = ""; // Clear the search box
        return; // Stop execution to prevent an unnecessary API call
    }

    getData(inputValue);
});

const tagInput = document.getElementById("tag-input");
const tagContainer = document.getElementById("tag-container");

let tags = [];

function addTag(tagText,id) {
    if (tagText.trim() === "" || tags.includes(tagText)) return;

    tags.push(tagText);

    const tagElement = document.createElement("div");
    tagElement.classList = "bg-orange-500 text-white px-3 py-1 rounded-full flex items-center gap-2";
    tagElement.innerHTML = `<span id="${id}" class="TagFinall">${tagText}</span>
                            <button class="text-white text-sm font-bold focus:outline-none">&times;</button>`;

    tagElement.querySelector("button").addEventListener("click", () => {
        tagElement.remove();
        tags = tags.filter(t => t !== tagText);
    });

    tagContainer.appendChild(tagElement);
}
