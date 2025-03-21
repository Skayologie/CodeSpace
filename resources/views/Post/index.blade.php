<x-UserHompage>
    <link href="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.snow.css" rel="stylesheet" />

    <body class="w-100 bg-white text-gray-800 font-sans">
        <div class="flex justify-center">
            <div class="w-[600px]  ">
                <div class="flex justify-between items-center mb-6">
                    <h1 class="text-2xl font-semibold text-gray-800">Créer une publication</h1>
                    <a href="#" class="text-gray-800 hover:underline">Brouillons</a>
                </div>

                <div id="communitySelector" class="inline-flex items-center bg-gray-100 rounded-full px-4 py-2 mb-6 cursor-pointer">
                    <div id="communityIcon" class="w-6 h-6 rounded-full mr-2 flex items-center justify-center">
                        <span id="communityIconText" class="text-white">/</span>
                    </div>
                    <span id="communityText" class="font-medium">Sélectionner une communauté</span>
                    <svg class="ml-2 w-4 h-4" viewBox="0 0 16 16" fill="none">
                        <path d="M4 6L8 10L12 6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </div>

                <div class="flex border-b border-gray-200 mb-6">
                    <div id="tab-texte" class="px-4 py-2 font-medium cursor-pointer" data-tab="texte">Texte</div>
                    <div id="tab-images" class="px-4 py-2 font-medium cursor-pointer" data-tab="images">Images et vidéo</div>
                    <div id="tab-lien" class="px-4 py-2 font-medium cursor-pointer" data-tab="lien">Lien</div>
                </div>

                <input type="text" class="w-full px-4 py-3 text-base border border-gray-200 rounded-lg mb-1 focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Titre*">
                <div class="text-right text-gray-500 text-sm mb-4">0/300</div>

                <select id="categories" class="w-full px-4 py-3 text-base border border-gray-200 rounded-lg mb-5 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option disabled selected>Choose a category</option>
                    <option value="Web Development">Web Development</option>
                    <option value="Software Development">Software Development</option>
                    <option value="Mobile Development">Mobile Development</option>
                    <option value="Cloud & DevOps">Cloud & DevOps</option>
                    <option value="Database & Data Management">Database & Data Management</option>
                    <option value="Artificial Intelligence & Machine Learning">Artificial Intelligence & Machine Learning</option>
                    <option value="Cybersecurity">Cybersecurity</option>
                    <option value="Blockchain & Web3">Blockchain & Web3</option>
                    <option value="System Administration & Networking">System Administration & Networking</option>
                    <option value="Game Development">Game Development</option>
                    <option value="Embedded Systems Development">Embedded Systems Development</option>
                    <option value="Internet of Things (IoT) Development">Internet of Things (IoT) Development</option>
                    <option value="Augmented Reality & Virtual Reality">Augmented Reality & Virtual Reality</option>
                    <option value="Quantum Computing Development">Quantum Computing Development</option>
                    <option value="Low-Code / No-Code Development">Low-Code / No-Code Development</option>
                    <option value="Progressive Web Apps (PWAs)">Progressive Web Apps (PWAs)</option>
                    <option value="Web Accessibility (a11y)">Web Accessibility (a11y)</option>
                    <option value="Web Security">Web Security</option>
                    <option value="Desktop Application Development">Desktop Application Development</option>
                    <option value="Software Architecture & Design Patterns">Software Architecture & Design Patterns</option>
                    <option value="Cross-Platform Development">Cross-Platform Development</option>
                    <option value="Serverless Computing">Serverless Computing</option>
                    <option value="Cloud Computing">Cloud Computing</option>
                    <option value="DevOps">DevOps</option>
                    <option value="Infrastructure as Code (IaC)">Infrastructure as Code (IaC)</option>
                    <option value="Big Data Processing">Big Data Processing</option>
                    <option value="Machine Learning (ML)">Machine Learning (ML)</option>
                    <option value="Deep Learning">Deep Learning</option>
                    <option value="Natural Language Processing (NLP)">Natural Language Processing (NLP)</option>
                    <option value="Computer Vision">Computer Vision</option>
                    <option value="AI Ethics & Bias">AI Ethics & Bias</option>
                    <option value="Ethical Hacking & Penetration Testing">Ethical Hacking & Penetration Testing</option>
                    <option value="Network Security">Network Security</option>
                    <option value="Cryptography & Encryption">Cryptography & Encryption</option>
                    <option value="Smart Contracts Development">Smart Contracts Development</option>
                    <option value="Decentralized Applications (dApps)">Decentralized Applications (dApps)</option>
                    <option value="NFT & Token Development">NFT & Token Development</option>
                    <option value="Blockchain Security & Audits">Blockchain Security & Audits</option>
                    <option value="Linux Administration">Linux Administration</option>
                    <option value="Networking Protocols">Networking Protocols</option>
                    <option value="Monitoring & Logging">Monitoring & Logging</option>
                    <option value="Data Engineering">Data Engineering</option>
                    <option value="Database Optimization & Indexing">Database Optimization & Indexing</option>
                    <option value="API Development">API Development</option>
                    <option value="Microservices Architecture">Microservices Architecture</option>
                    <option value="Functional Programming">Functional Programming</option>
                    <option value="Concurrency & Parallel Computing">Concurrency & Parallel Computing</option>
                    <option value="Testing & Test Automation">Testing & Test Automation</option>
                    <option value="CI/CD Pipelines">CI/CD Pipelines</option>
                    <option value="Software Performance Optimization">Software Performance Optimization</option>
                    <option value="Containerization & Kubernetes">Containerization & Kubernetes</option>
                    <option value="Edge Computing">Edge Computing</option>
                    <option value="Observability & Monitoring">Observability & Monitoring</option>
                    <option value="Digital Forensics">Digital Forensics</option>
                    <option value="Reverse Engineering">Reverse Engineering</option>
                    <option value="Cloud Security">Cloud Security</option>
                    <option value="Robotics Software Development">Robotics Software Development</option>
                    <option value="Computer Graphics Development">Computer Graphics Development</option>
                    <option value="Operating System Development">Operating System Development</option>
                    <option value="Firmware Development">Firmware Development</option>

                </select>

                <div class="mb-4">
                    <div id="tag-container" class="mb-2 flex flex-wrap gap-2"></div>

                    <input id="tag-input"
                           class="px-4 py-2 text-sm bg-gray-100 text-gray-500 rounded-full hover:bg-gray-200 focus:outline-none"
                           placeholder="Ajouter des étiquettes">
                </div>

                <div id="content-texte" class="tab-content mb-6">
                    <div class="rounded-lg mb-6 border border-gray-200">
                        <div id="editor" style="height: 250px;"></div>
                    </div>
                </div>

                <div id="content-images" class="tab-content mb-6 hidden">
                    <div class="border border-dashed border-gray-300 rounded-lg p-12 flex flex-col items-center justify-center text-center">
                        <p class="text-gray-600 mb-2">Glisse puis dépose ou charge des médias</p>
                        <div class="flex items-center justify-center bg-gray-100 rounded-full p-2 w-8 h-8">
                            <svg class="w-4 h-4 text-gray-600" viewBox="0 0 16 16" fill="none">
                                <path d="M8 12V4M4 8H12" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                            </svg>
                        </div>
                    </div>
                </div>

                <div id="content-lien" class="tab-content mb-6 hidden">
                    <input type="text" class="w-full px-4 py-3 text-base border border-gray-200 rounded-lg mb-4 focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="URL du lien *">

                </div>


                <div class="flex justify-end gap-2">
                    <button class="px-4 py-2 bg-gray-100 text-gray-600 rounded-full text-sm font-medium hover:bg-gray-200">Enregistrer le brouillon</button>
                    <button class="px-4 py-2 bg-gray-100 text-gray-600 rounded-full text-sm font-medium hover:bg-gray-200">Publier</button>
                </div>
            </div>

        </div>
    </body>
    <!-- Include the Quill library -->
    <script src="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.js"></script>

    <!-- Initialize Quill editor -->
    <script>
        const quill = new Quill('#editor', {
            theme: 'snow',
            placeholder:"Wrire your content ..."
        });
        function changeURL(newURL) {
            history.replaceState(null, "New Page", "/Post?Type="+newURL);
        }
    </script>
    <script>
        const titleInput = document.querySelector('input[placeholder="Titre*"]');
        const charCount = document.querySelector('.text-right.text-gray-500');
        const tabs = document.querySelectorAll('[data-tab]');
        const tabContents = document.querySelectorAll('.tab-content');
        const communitySelector = document.getElementById('communitySelector');
        const communityIcon = document.getElementById('communityIcon');
        const communityIconText = document.getElementById('communityIconText');
        const communityText = document.getElementById('communityText');

        titleInput.addEventListener('input', function() {
            const count = this.value.length;
            charCount.textContent = count + '/300';
        });

        function activateTab(tabId) {
            tabs.forEach(tab => {
                tab.classList.remove('border-b-2', 'border-blue-500', 'text-gray-800');
                tab.classList.add('text-gray-500');
            });

            tabContents.forEach(content => {
                content.classList.add('hidden');
            });

            const selectedTab = document.getElementById('tab-' + tabId);
            selectedTab.classList.add('border-b-2', 'border-blue-500', 'text-gray-800');
            selectedTab.classList.remove('text-gray-500');

            const selectedContent = document.getElementById('content-' + tabId);
            selectedContent.classList.remove('hidden');
            console.log(selectedContent.id)
            changeURL(selectedContent.id)
        }

        tabs.forEach(tab => {
            tab.addEventListener('click', function() {
                const tabId = this.getAttribute('data-tab');
                activateTab(tabId);
            });
        });


        document.addEventListener('DOMContentLoaded', function() {
            activateTab('texte');

        });

        const toggleUserState = function() {
            if (communityText.textContent === 'Sélectionner une communauté') {
                setUserCommunity();
            } else {
                communityIcon.classList.remove('bg-green-500');
                communityIcon.classList.add('bg-gray-800');
                communityIconText.textContent = '/';
                communityText.textContent = 'Sélectionner une communauté';
            }
        };

        communitySelector.addEventListener('click', toggleUserState);
        const tagInput = document.getElementById("tag-input");
        const tagContainer = document.getElementById("tag-container");

        let tags = [];

        function addTag(tagText) {
            if (tagText.trim() === "" || tags.includes(tagText)) return;

            tags.push(tagText);

            const tagElement = document.createElement("div");
            tagElement.classList = "bg-orange-500 text-white px-3 py-1 rounded-full flex items-center gap-2";
            tagElement.innerHTML = `
                                        <span>${tagText}</span>
                                        <button class="text-white text-sm font-bold focus:outline-none">&times;</button>
                                    `;

            tagElement.querySelector("button").addEventListener("click", () => {
                tagElement.remove();
                tags = tags.filter(t => t !== tagText);
            });

            tagContainer.appendChild(tagElement);
        }

        tagInput.addEventListener("keypress", (event) => {
            if (event.key === "Enter") {
                event.preventDefault();
                addTag(tagInput.value);
                tagInput.value = "";
            }
        });

    </script>
</x-UserHompage>


