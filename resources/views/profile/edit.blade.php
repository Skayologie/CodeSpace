<x-app-layout>
<div class="container mx-auto px-4 py-8">
    <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <!-- Profile Header -->
        <div class="bg-orange-600 p-6 flex items-center justify-between">
            <div class="flex items-center">
                <div class="w-24 h-24 bg-white rounded-full flex items-center justify-center mr-6">
                    <span class="text-3xl font-bold text-orange-700">JD</span>
                </div>
                <div>
                    <h1 class="text-2xl font-bold text-white">John Doe</h1>
                    <p class="text-orange-200">Software Engineer</p>
                </div>
            </div>
            <div class="text-white">
                <button>
                    <i class="fa-solid fa-pen"></i>
                </button>
            </div>
        </div>
 <!-- Sidebar Navigation -->
            <div class="bg-white shadow-md rounded-lg p-4">
                <nav class="space-y-2">
                    <button class="w-full text-left py-2 px-3 hover:bg-gray-100 rounded-md flex items-center text-gray-700 hover:text-blue-600 transition">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                        Profile
                    </button>
                    <button class="w-full text-left py-2 px-3 hover:bg-gray-100 rounded-md flex items-center text-gray-700 hover:text-blue-600 transition">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        Account
                    </button>
                    <button class="w-full text-left py-2 px-3 hover:bg-gray-100 rounded-md flex items-center text-gray-700 hover:text-blue-600 transition">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        Preferences
                    </button>
                    <button class="w-full text-left py-2 px-3 hover:bg-gray-100 rounded-md flex items-center text-gray-700 hover:text-blue-600 transition">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                        </svg>
                        Security
                    </button>
                </nav>
            </div>
        
        <!-- Employee Information Grid -->
        <div class="grid md:grid-cols-3 gap-6 p-6">
            <!-- Personal Information -->
            <div class="bg-gray-50 p-4 rounded-lg">
                <h2 class="text-xl font-semibold mb-4 text-gray-800">Personal Information</h2>
                <div class="space-y-3">
                    <div>
                        <p class="text-sm text-gray-600">Full Name</p>
                        <p class="font-medium">John Michael Doe</p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-600">Email</p>
                        <p class="font-medium">john.doe@company.com</p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-600">Phone</p>
                        <p class="font-medium">+1 (555) 123-4567</p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-600">Date of Birth</p>
                        <p class="font-medium">May 15, 1990</p>
                    </div>
                </div>
            </div>

          
        </div>

        <!-- Additional Sections -->
        <div class="grid md:grid-cols-2 gap-6 p-6">
            <!-- Skills & Certifications -->
            <div class="bg-gray-50 p-4 rounded-lg">
                <h2 class="text-xl font-semibold mb-4 text-gray-800">Skills & Certifications</h2>
                <div class="flex flex-wrap gap-2">
                    <span class="bg-indigo-100 text-indigo-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded">JavaScript</span>
                    <span class="bg-indigo-100 text-indigo-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded">React</span>
                    <span class="bg-indigo-100 text-indigo-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded">Node.js</span>
                    <span class="bg-indigo-100 text-indigo-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded">AWS Certified</span>
                </div>
            </div>

            <!-- Contact Information -->
            <div class="bg-gray-50 p-4 rounded-lg">
                <h2 class="text-xl font-semibold mb-4 text-gray-800">Contact Information</h2>
                <div class="space-y-3">
                    <div>
                        <p class="text-sm text-gray-600">Address</p>
                        <p class="font-medium">123 Tech Lane, San Francisco, CA 94105</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</x-app-layout>
