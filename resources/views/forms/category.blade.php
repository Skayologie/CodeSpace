<div class="bg-black/40 fixed z-10 w-full h-[100vh] flex justify-center items-center">
    <div class=" fixed z-10 ">
        <div>
            <div class="bg-white rounded-lg shadow-lg w-[700px] max-w-md p-6 relative">
                <!-- Header with close button -->
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-lg font-medium text-gray-800">Add Category</h2>
                    <button id="closeButton" class="text-gray-500 hover:text-gray-700">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
                <!-- Form -->
                <form id="customFlowForm">
                    <!-- Title Field -->
                    <div class="mb-4">
                        <div class="relative">
                            <input
                                type="text"
                                id="title"
                                placeholder="Category name*"
                                class="w-full px-3 py-3 bg-gray-100 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                                maxlength="50"
                                required
                            />
                            <div id="titleError" class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none hidden">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-red-500" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </div>
                        <div class="flex justify-between mt-1">
                            <p id="titleErrorMessage" class="text-xs text-red-500 hidden">Veuillez renseigner ce champ.</p>
                            <span id="titleCounter" class="text-xs text-gray-500">50</span>
                        </div>
                    </div>

                    <!-- Description Field -->
                    <div class="mb-4">
                        <div class="relative">
                      <textarea
                          id="description"
                          placeholder="Category description"
                          rows="3"
                          maxlength="500"
                          class="w-full px-3 py-3 bg-gray-100 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                      ></textarea>
                            <div id="descriptionCheck" class="absolute top-3 right-3 hidden">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-500" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </div>
                        <div class="flex justify-end mt-1">
                            <span id="descriptionCounter" class="text-xs text-gray-500">500</span>
                        </div>
                    </div>


                    <!-- Action Buttons -->
                    <div class="flex justify-end space-x-2">
                        <button type="button" id="cancelButton" class="px-4 py-2 bg-gray-200 text-gray-800 rounded-md hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-500">
                            Annuler
                        </button>
                        <button type="submit" id="CategorySubmitButton" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                            Soumettre
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>


</script>
