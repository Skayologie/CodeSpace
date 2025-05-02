import Form from "./Form";

export default class PostForm {
    constructor() {
        new Form();
        this.tags = [];
        this.tagContainer = document.getElementById("tag-container");

        this.tabs = document.querySelectorAll('[data-tab]');
        this.tabContents = document.querySelectorAll('.tab-content');

        const quill = new Quill('#editor', {
            theme: 'snow',
            placeholder:"Wrire your content ..."
        });
        document.querySelector('#btnSubmit').addEventListener('click', (e) =>{
            document.getElementById('quill-content').value = quill.root.innerHTML;
        });
        this.init();
    }
    init(){
        console.log(document.getElementById("searchCommunityResults"))
        document.getElementById("InputSearchCommunity").addEventListener("keyup",(e)=>{
            let nameQuery = e.target.value;
            $.ajax({
                url:`../../../../../../Communities/Search/${nameQuery}`,
                method:"GET",
                success : (result)=>{
                    console.log(result)
                    document.getElementById('searchCommunityResults').innerHTML = result.map((item)=> {
                        return `
                        <div id="${item.id}" class="CommunityResult flex items-center p-3 hover:bg-gray-50 cursor-pointer border-b border-gray-100">
                            <div class="w-8 h-8 rounded-full flex items-center justify-center bg-blue-500 text-white mr-3">🔵</div>
                            <div class="flex flex-col">
                              <span class="font-medium text-sm">r/${item.name}</span>
                              <span class="text-gray-500 text-xs">${item.member_count} members </span>
                            </div>
                        </div>
                        `
                    }).join(" ")
                    let CommunityResult = document.querySelectorAll(".CommunityResult");
                    CommunityResult.forEach((element)=>{
                        element.addEventListener("click",(e)=>{
                            console.log(e)
                            document.getElementById("SearchAreaMall").innerHTML = `
                                <div id="" class="CommunityResult bg-gray-500 rounded-full flex items-center p-3 hover:bg-gray-600 cursor-pointer border-b border-gray-100">
                                    <div class="w-8 h-8 rounded-full flex items-center justify-center bg-blue-500 text-white mr-3">🔵</div>
                                    <div class="flex flex-col">
                                      <span class="font-medium text-sm">r/dddddddddddd</span>
                                      <span class="text-gray-500 text-xs">2 members </span>
                                    </div>
                                    <div id="removeCommunityButton" class="flex justify-end w-full p-2">
                                         <i class="fa-solid fa-xmark"></i>
                                    </div>
                                </div>
                                `
                            document.getElementById('removeCommunityButton').addEventListener("click",()=>{
                                document.getElementById("SearchAreaMall").innerHTML = `
                                 <div class="relative">
                                    <input id="InputSearchCommunity" type="text" placeholder="Search communities" class="w-full pl-8 pr-3 py-2 bg-gray-100 rounded-full text-sm focus:outline-none focus:ring-2 focus:ring-blue-300">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 absolute left-2.5 top-2.5 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                    </svg>
                                 </div>
                                `
                            });
                            document.getElementById('searchCommunityResults').innerHTML = ''
                        })
                    })
                },
                error: (error) => {
                    console.log(error)
                }

            });
        })


        // change
        document.getElementById("tag-input").addEventListener("keyup", () => {
            const inputValue = document.getElementById("tag-input").value.trim();
            const searchBox = document.getElementById('tag-search-box');

            if (inputValue === "") {
                searchBox.innerHTML = "";
                return;
            }
            this.getData(inputValue);
        });
        this.tabs.forEach(tab => {
            tab.addEventListener('click', ()=> {
                const tabId = tab.getAttribute('data-tab');
                this.activateTab(tabId);
            });
        });
    };
    // Get Data for tags with ajax
    async getData(text) {
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
                            <button id="${e.id}," type="button" style="background-color: chocolate;border-radius: 8px" class="TagName  p-2 text-white text-sm font-bold focus:outline-none">#${e.name}</button>
                         </span>
                    `;

            });
            document.querySelectorAll(".TagName").forEach((element)=>{
                element.addEventListener("click",()=>{
                    this.addTag(element.textContent , element.id)

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
    };

    activateTab(tabId) {
        this.tabs.forEach(tab => {
            tab.classList.remove('border-b-2', 'border-blue-500', 'text-gray-800');
            tab.classList.add('text-gray-500');
        });

        this.tabContents.forEach(content => {
            content.classList.add('hidden');
        });

        const selectedTab = document.getElementById('tab-' + tabId);
        selectedTab.classList.add('border-b-2', 'border-blue-500', 'text-gray-800');
        selectedTab.classList.remove('text-gray-500');

        const selectedContent = document.getElementById('content-' + tabId);
        selectedContent.classList.remove('hidden');
        console.log(selectedContent.id)
        this.changeURL(selectedContent.id)
    }
    changeURL(newURL) {
        history.replaceState(null, "New Page", "/Post?Type="+newURL);
    }
    addTag(tagText,id) {
        if (tagText.trim() === "" || this.tags.includes(tagText)) return;

        this.tags.push(tagText);

        const tagElement = document.createElement("div");
        tagElement.classList = "bg-orange-500 text-white px-3 py-1 rounded-full flex items-center gap-2";
        tagElement.innerHTML = `<span id="${id}" class="TagFinall">${tagText}</span>
                            <button class="text-white text-sm font-bold focus:outline-none">&times;</button>`;

        tagElement.querySelector("button").addEventListener("click", () => {
            tagElement.remove();
            this.tags = tags.filter(t => t !== tagText);
        });

        this.tagContainer.appendChild(tagElement);
    }

}
