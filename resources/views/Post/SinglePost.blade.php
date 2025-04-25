<x-UserHompage>
    <div id="UserArea">
        <div class="max-w-3xl mx-auto bg-white">
            <!-- Header with back button and post info -->
            <div class="sticky top-0 bg-white z-10 border-b border-gray-200 px-3 py-2 flex items-center">
                <button class="w-8 h-8 rounded-full bg-gray-100 flex items-center justify-center mr-3 hover:bg-gray-200 transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                </button>

                <div class="flex items-center">
                    <div class="w-6 h-6 rounded-full bg-orange-500 flex items-center justify-center mr-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-white" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 0C4.477 0 0 4.477 0 10c0 5.523 4.477 10 10 10s10-4.477 10-10c0-5.523-4.477-10-10-10zm4.47 13.53a.75.75 0 01-1.06 0L10 10.12 6.59 13.53a.75.75 0 11-1.06-1.06L9.44 8.06a.75.75 0 011.06 0l3.97 3.97a.75.75 0 010 1.06z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div>
                        <div class="flex items-center">
                            <span class="font-medium text-sm text-gray-900">r/mildlyinfuriating</span>
                            <span class="mx-1 text-gray-500 text-xs">•</span>
                            <span class="text-gray-500 text-xs">il y a 2 h</span>
                        </div>
                        <div class="text-xs text-gray-500">Nightshadepastry</div>
                    </div>
                </div>

                <button class="ml-auto">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z" />
                    </svg>
                </button>
            </div>

            <!-- Post content -->
            <div class="px-3 py-4">
                <h1 class="text-xl font-bold text-gray-900 mb-3">They will NOT STOP coming to my door</h1>

                <p class="text-gray-800 mb-4">
                    Had pretty bad hail a couple days ago and since then we have had dozens of MFers come to the door in spite of the "No Solicitors" sign. Every time, the dog goes mad, it's a whole thing, and I can only tell so many of them off in person. If only I could get them to FUCK OFF. Let's see if this works?
                </p>

                <!-- Post image -->
                <div class="rounded-md overflow-hidden mb-4">
                    <img src="https://hebbkx1anhila5yf.public.blob.vercel-storage.com/image-rRbmp8M3FQUBRI3BPqu55zs5LixzPA.png" alt="Front door with No Solicitors sign and bucket" class="w-full object-cover" />
                </div>

                <!-- Post actions -->
                <div class="flex items-center space-x-2 pt-2">
                    <!-- Vote buttons -->
                    <div class="flex items-center bg-gray-100 rounded-full px-3 py-1.5">
                        <button class="flex items-center justify-center text-gray-500 hover:text-orange-500 transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7" />
                            </svg>
                        </button>
                        <span class="mx-2 text-sm font-medium">11k</span>
                        <button class="flex items-center justify-center text-gray-500 hover:text-blue-500 transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                    </div>

                    <!-- Comments button -->
                    <div class="flex items-center bg-gray-100 rounded-full px-3 py-1.5">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                        </svg>
                        <span class="text-sm font-medium">11k</span>
                    </div>

                    <!-- Award button -->
                    <button class="flex items-center justify-center bg-gray-100 rounded-full w-9 h-9 text-gray-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v13m0-13V6a2 2 0 112 2h-2zm0 0V5.5A2.5 2.5 0 109.5 8H12zm-7 4h14M5 12a2 2 0 110-4h14a2 2 0 110 4M5 12v7a2 2 0 002 2h10a2 2 0 002-2v-7" />
                        </svg>
                    </button>

                    <!-- Share button -->
                    <button class="flex items-center bg-gray-100 rounded-full px-4 py-1.5 text-gray-800">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z" />
                        </svg>
                        <span class="text-sm font-medium">Partager</span>
                    </button>
                </div>
            </div>

            <!-- Comment section divider -->
            <div class="border-t border-gray-200 my-2"></div>

            <!-- Comment sorting options -->
            <div class="px-3 py-2 flex items-center text-sm">
                <span class="font-medium text-gray-700">Trier par:</span>
                <button class="flex items-center ml-2 text-blue-600 font-medium">
                    Meilleurs commentaires
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
            </div>

            <!-- Comment input -->
            <div class="px-3 py-3 flex items-start space-x-2 border-b border-gray-200">
                <div class="w-8 h-8 rounded-full bg-blue-100 flex-shrink-0"></div>
                <div class="flex-1 bg-gray-100 rounded-md px-3 py-2 text-gray-500">
                    Ajouter un commentaire...
                </div>
            </div>

            <!-- Comments -->
            <div class="py-2">
                <!-- Comment 1 -->
                <div class="flex space-x-2 px-3 py-3 hover:bg-gray-50 transition-colors">
                    <!-- Left column with avatar and vote buttons -->
                    <div class="flex flex-col items-center space-y-2">
                        <!-- User Avatar -->
                        <div class="w-8 h-8 rounded-full overflow-hidden bg-orange-100 flex-shrink-0">
                            <div class="w-full h-full flex items-center justify-center text-orange-500 font-bold text-xs">A</div>
                        </div>

                        <!-- Vote buttons -->
                        <button class="text-gray-400 hover:text-orange-500 transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7" />
                            </svg>
                        </button>
                        <span class="text-xs font-medium text-gray-700">2,4k</span>
                        <button class="text-gray-400 hover:text-blue-500 transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                    </div>

                    <!-- Right column with comment content -->
                    <div class="flex-1">
                        <!-- Comment header -->
                        <div class="flex items-center flex-wrap gap-1.5 mb-1">
                            <span class="font-medium text-gray-900">Accurate_Koala_4698</span>
                            <span class="text-xs text-gray-500">• 1h</span>
                            <div class="bg-blue-100 text-blue-800 text-xs px-1.5 py-0.5 rounded flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 mr-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                                </svg>
                                <span>Comm. du top 1%</span>
                            </div>
                        </div>

                        <!-- Comment content -->
                        <p class="text-gray-800 mb-2">Change the bucket for a shredder</p>

                        <!-- Comment actions -->
                        <div class="flex items-center space-x-4 text-xs text-gray-500">
                            <button class="flex items-center hover:bg-gray-200 rounded-md px-2 py-1 transition-colors">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                                </svg>
                                Répondre
                            </button>
                            <button class="flex items-center hover:bg-gray-200 rounded-md px-2 py-1 transition-colors">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v13m0-13V6a2 2 0 112 2h-2zm0 0V5.5A2.5 2.5 0 109.5 8H12zm-7 4h14M5 12a2 2 0 110-4h14a2 2 0 110 4M5 12v7a2 2 0 002 2h10a2 2 0 002-2v-7" />
                                </svg>
                                Récompenser
                            </button>
                            <button class="flex items-center hover:bg-gray-200 rounded-md px-2 py-1 transition-colors">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z" />
                                </svg>
                                Partager
                            </button>
                            <button class="ml-auto hover:bg-gray-200 rounded-md p-1 transition-colors">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Comment 2 -->
                <div class="flex space-x-2 px-3 py-3 hover:bg-gray-50 transition-colors">
                    <div class="flex flex-col items-center space-y-2">
                        <div class="w-8 h-8 rounded-full overflow-hidden bg-green-100 flex-shrink-0">
                            <div class="w-full h-full flex items-center justify-center text-green-500 font-bold text-xs">B</div>
                        </div>
                        <button class="text-gray-400 hover:text-orange-500 transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7" />
                            </svg>
                        </button>
                        <span class="text-xs font-medium text-gray-700">1,8k</span>
                        <button class="text-gray-400 hover:text-blue-500 transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                    </div>
                    <div class="flex-1">
                        <div class="flex items-center flex-wrap gap-1.5 mb-1">
                            <span class="font-medium text-gray-900">SolicitingExpert</span>
                            <span class="text-xs text-gray-500">• 45m</span>
                        </div>
                        <p class="text-gray-800 mb-2">Fill the bucket with water and place it slightly above the door. Problem solved.</p>
                        <div class="flex items-center space-x-4 text-xs text-gray-500">
                            <button class="flex items-center hover:bg-gray-200 rounded-md px-2 py-1 transition-colors">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                                </svg>
                                Répondre
                            </button>
                            <button class="flex items-center hover:bg-gray-200 rounded-md px-2 py-1 transition-colors">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v13m0-13V6a2 2 0 112 2h-2zm0 0V5.5A2.5 2.5 0 109.5 8H12zm-7 4h14M5 12a2 2 0 110-4h14a2 2 0 110 4M5 12v7a2 2 0 002 2h10a2 2 0 002-2v-7" />
                                </svg>
                                Récompenser
                            </button>
                            <button class="flex items-center hover:bg-gray-200 rounded-md px-2 py-1 transition-colors">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z" />
                                </svg>
                                Partager
                            </button>
                            <button class="ml-auto hover:bg-gray-200 rounded-md p-1 transition-colors">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Nested comment -->
                <div class="flex space-x-2 px-3 py-3 pl-12 hover:bg-gray-50 transition-colors border-l-2 border-gray-200 ml-8">
                    <div class="flex flex-col items-center space-y-2">
                        <div class="w-8 h-8 rounded-full overflow-hidden bg-purple-100 flex-shrink-0">
                            <div class="w-full h-full flex items-center justify-center text-purple-500 font-bold text-xs">OP</div>
                        </div>
                        <button class="text-gray-400 hover:text-orange-500 transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7" />
                            </svg>
                        </button>
                        <span class="text-xs font-medium text-gray-700">856</span>
                        <button class="text-gray-400 hover:text-blue-500 transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                    </div>
                    <div class="flex-1">
                        <div class="flex items-center flex-wrap gap-1.5 mb-1">
                            <span class="font-medium text-gray-900">Nightshadepastry</span>
                            <span class="bg-blue-100 text-blue-800 text-xs px-1.5 py-0.5 rounded">OP</span>
                            <span class="text-xs text-gray-500">• 30m</span>
                        </div>
                        <p class="text-gray-800 mb-2">I like the way you think! But I'd rather not damage my own property lol</p>
                        <div class="flex items-center space-x-4 text-xs text-gray-500">
                            <button class="flex items-center hover:bg-gray-200 rounded-md px-2 py-1 transition-colors">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                                </svg>
                                Répondre
                            </button>
                            <button class="flex items-center hover:bg-gray-200 rounded-md px-2 py-1 transition-colors">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v13m0-13V6a2 2 0 112 2h-2zm0 0V5.5A2.5 2.5 0 109.5 8H12zm-7 4h14M5 12a2 2 0 110-4h14a2 2 0 110 4M5 12v7a2 2 0 002 2h10a2 2 0 002-2v-7" />
                                </svg>
                                Récompenser
                            </button>
                            <button class="flex items-center hover:bg-gray-200 rounded-md px-2 py-1 transition-colors">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z" />
                                </svg>
                                Partager
                            </button>
                            <button class="ml-auto hover:bg-gray-200 rounded-md p-1 transition-colors">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Comment 3 -->
                <div class="flex space-x-2 px-3 py-3 hover:bg-gray-50 transition-colors">
                    <div class="flex flex-col items-center space-y-2">
                        <div class="w-8 h-8 rounded-full overflow-hidden bg-red-100 flex-shrink-0">
                            <div class="w-full h-full flex items-center justify-center text-red-500 font-bold text-xs">C</div>
                        </div>
                        <button class="text-gray-400 hover:text-orange-500 transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7" />
                            </svg>
                        </button>
                        <span class="text-xs font-medium text-gray-700">742</span>
                        <button class="text-gray-400 hover:text-blue-500 transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                    </div>
                    <div class="flex-1">
                        <div class="flex items-center flex-wrap gap-1.5 mb-1">
                            <span class="font-medium text-gray-900">DoorDefender99</span>
                            <span class="text-xs text-gray-500">• 20m</span>
                        </div>
                        <p class="text-gray-800 mb-2">Have you tried putting up a bigger sign? Maybe in neon colors? These people can't seem to read the first one.</p>
                        <div class="flex items-center space-x-4 text-xs text-gray-500">
                            <button class="flex items-center hover:bg-gray-200 rounded-md px-2 py-1 transition-colors">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                                </svg>
                                Répondre
                            </button>
                            <button class="flex items-center hover:bg-gray-200 rounded-md px-2 py-1 transition-colors">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v13m0-13V6a2 2 0 112 2h-2zm0 0V5.5A2.5 2.5 0 109.5 8H12zm-7 4h14M5 12a2 2 0 110-4h14a2 2 0 110 4M5 12v7a2 2 0 002 2h10a2 2 0 002-2v-7" />
                                </svg>
                                Récompenser
                            </button>
                            <button class="flex items-center hover:bg-gray-200 rounded-md px-2 py-1 transition-colors">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z" />
                                </svg>
                                Partager
                            </button>
                            <button class="ml-auto hover:bg-gray-200 rounded-md p-1 transition-colors">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Load more comments -->
                <div class="px-3 py-4 text-center">
                    <button class="bg-gray-100 hover:bg-gray-200 text-gray-800 font-medium py-2 px-4 rounded-full transition-colors">
                        Voir plus de commentaires
                    </button>
                </div>
            </div>
        </div>
    </div>
</x-UserHompage>
