<x-app-layout>
<div class="flex justify-center">

    <div class="bg-white rounded-lg shadow-lg w-full p-6">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-xl font-semibold text-gray-800">Manage Category</h2>
        </div>

        <form>


            <div class="mb-4">
                <label class="block text-gray-700 mb-2" for="name">Category Name*</label>
                <input 
                    type="text" 
                    id="name" 
                    style="border:1px black solid !important ;"
                    name="name" 
                    maxlength="50"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="Enter category name"
                >
                <div class="text-right text-gray-500 text-sm mt-1">50</div>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 mb-2" for="description">Description</label>
                <textarea 
                    id="description" 
                    name="description" 
                    maxlength="500"
                    rows="4"
                    style="border:1px black solid !important ;"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 resize-y"
                    placeholder="Provide a detailed description of the category"
                ></textarea>
                <div class="text-right text-gray-500 text-sm mt-1">500</div>
            </div>

            
            <div class="flex justify-between mt-6">
                
                <div class="space-x-2">
                    
                    <button 
                        type="submit" 
                        class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700"
                    >
                        Create
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>


</x-app-layout>
