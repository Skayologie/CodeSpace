<table class="min-w-full text-sm text-left">
    <thead class="bg-gradient-to-r from-white-500 to-white-600 text-black">
    <tr>
        <th class="px-6 py-4 font-semibold">Title</th>
        <th class="px-6 py-4 font-semibold">Content</th>
        <th class="px-6 py-4 font-semibold">Category</th>
        <th class="px-6 py-4 font-semibold">Author</th>
        <th class="px-6 py-4 font-semibold">Views</th>
        <th class="px-6 py-4 font-semibold">Reactions</th>
    </tr>
    </thead>
    <tbody class="divide-y divide-gray-200">
        @foreach($data as $stats)
            <tr class="hover:bg-gray-50 transition">
                <td class="px-6 py-4 font-medium text-gray-800">{{$stats->title}}</td>
                <td class="px-6 py-4 text-gray-600 truncate max-w-xs">{{$stats->description}}</td>
                <td class="px-6 py-4">
                    <span class="inline-block bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded-full">{{$stats->categoryID}}</span>
                </td>
                <td class="px-6 py-4 text-gray-700">{{$stats->username}}</td>
                <td class="px-6 py-4 text-gray-700">{{$stats->views}}</td>
                <td class="px-6 py-4">
                                          <span class="inline-flex items-center space-x-1">
                                            <svg class="w-4 h-4 text-red-500" fill="currentColor" viewBox="0 0 20 20">
                                              <path d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 18.343l-6.828-6.829a4 4 0 010-5.656z"/>
                                            </svg>
                                            <span class="text-sm text-gray-700">{{$stats->reactions}}</span>
                                          </span>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
