import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

document.getElementById("email").addEventListener("input",()=>{
    if (document.getElementById("email").value.length != 0) {
        document.getElementById("sendBtn").classList.remove("bg-gray-200");
        document.getElementById("sendBtn").classList.remove("text-gray-700");
        document.getElementById("sendBtn").classList.add("text-white");
        document.getElementById("sendBtn").classList.add("bg-orange-600");
    }else{
        document.getElementById("sendBtn").classList.add("bg-gray-200");
        document.getElementById("sendBtn").classList.remove("bg-orange-600");
        document.getElementById("sendBtn").classList.add("text-gray-700");
        document.getElementById("sendBtn").classList.remove("text-white");
    }
})