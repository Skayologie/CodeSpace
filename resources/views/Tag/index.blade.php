<x-app-layout>
<div class="flex justify-center">
<div class="bg-white rounded-lg shadow-lg w-full p-6">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-xl font-semibold text-gray-800">Manage Tag</h2>
            
        </div>

        <form>


            <div class="mb-4">
                <label class="block text-gray-700 mb-2" for="name">Tag Name*</label>
                <input 
                    type="text" 
                    id="name" 
                    name="name" 
                    maxlength="50"
                    class="w-full px-3 py-2 rounded-md "
                    style="border:1px black solid !important ;"
                    placeholder="Enter tag name"
                >
                <div class="text-right text-gray-500 text-sm mt-1">50</div>
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
