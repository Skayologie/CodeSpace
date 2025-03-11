<x-app-layout>
<div class="flex justify-center">
<div class="bg-white rounded-lg shadow-lg w-full p-6">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-xl font-semibold text-gray-800">Create a Post</h2>
        </div>

        <form>
            <div class="mb-4">
                <label class="block text-gray-700 mb-2" for="title">Title*</label>
                <input 
                    type="text" 
                    id="title" 
                    name="title" 
                    maxlength="50"
                    style="border:1px black solid !important ;"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="Enter post title"
                >
                <div class="text-right text-gray-500 text-sm mt-1">50</div>
            </div>
            <div class="mb-8 animate-slide-up w-[500px]">
                    <div class="relative">
                        <div id="imagePreview" class="hidden mb-4">
                            <img
                                    id="uploadedImage"
                                    class="w-full h-48 object-cover rounded-lg"
                                    alt="Event preview" />
                            <a
                                    type="button"
                                    id="removeImage"
                                    class="absolute top-2 right-2 bg-red-500 text-white p-2 rounded-full hover:bg-red-600">
                                <svg
                                        class="w-4 h-4"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24">
                                    <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M6 18L18 6M6 6l12 12"></path>
                                </svg>
                            </a>
                        </div>
                        <div
                                id="uploadArea"
                                class="border-2 border-dashed border-gray-300 rounded-lg p-8 text-center cursor-pointer hover:border-orange-500 transition-colors">
                            <input
                                    name="coverImage"
                                    type="file"
                                    id="imageInput"
                                    class="hidden"
                                    accept="image/*"
                                    placeholder="image" />
                            <svg
                                    class="mx-auto h-12 w-12 text-gray-400"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24">
                                <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                            <p class="mt-2 text-sm text-gray-600">
                                Click or drag and drop to upload event image
                            </p>
                            <p class="mt-1 text-xs text-gray-500">PNG, JPG, GIF up to 10MB</p>
                        </div>
                    </div>
                </div>

            <div class="mb-4">
                <label class="block text-gray-700 mb-2" for="content">Content</label>
                <textarea 
                    id="content" 
                    name="content" 
                    maxlength="500"
                    style="border:1px black solid !important ;"
                    rows="4"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 resize-y"
                    placeholder="Write your post content"
                ></textarea>
                <div class="text-right text-gray-500 text-sm mt-1">500</div>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 mb-2" for="category">Category</label>
                <select 
                    id="category" 
                    style="border:1px black solid !important ;"
                    name="category"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                >
                    <option value="">Select Category</option>
                    <option value="technology">Technology</option>
                    <option value="lifestyle">Lifestyle</option>
                    <option value="travel">Travel</option>
                </select>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 mb-2" for="tags">Tags</label>
                <input 
                    type="text" 
                    style="border:1px black solid !important ;"
                    id="tags" 
                    name="tags"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="#technology #innovation"
                >
            </div>

            <div class="mb-4 flex justify-between items-center">
                <div>
                    <p class="text-gray-700">Make Private</p>
                    <p class="text-gray-500 text-sm">Only you can see this post</p>
                </div>
                <label class="relative inline-flex items-center cursor-pointer">
                    <input type="checkbox" value="" class="sr-only peer">
                    <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-blue-600"></div>
                </label>
            </div>

            <div class="flex justify-between mt-6">
                <button 
                    type="submit" 
                    class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700"
                >
                    Publish
                </button>
            </div>
        </form>
    </div>
</div>

</x-app-layout>

