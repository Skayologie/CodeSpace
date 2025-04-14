<table class="min-w-full text-sm text-left">
    <thead class="bg-gradient-to-r from-white-500 to-white-600 text-black">
    <tr>
        <th class="px-6 py-4 font-semibold">User Name</th>
        <th class="px-6 py-4 font-semibold"><i class="fa-solid fa-eye"></i> Total Views </th>
        <th class="px-6 py-4 font-semibold">Total Posts</th>
        <th class="px-6 py-4 font-semibold">Joined At</th>
    </tr>
    </thead>
    <tbody class="divide-y divide-gray-200">
        @foreach($data as $stats)
            <tr class="hover:bg-gray-50 transition">
                <td class="px-6 py-4 font-medium text-gray-800">{{$stats->username}}</td>
                <td class="px-6 py-4 text-gray-600 truncate max-w-xs">{{$stats->MaxViews}} views</td>
                <td class="px-6 py-4 text-gray-700">{{$stats->TotalPost}} Posts</td>
                <td class="px-6 py-4 text-gray-700">{{$stats->created_at}}</td>
            </tr>
        @endforeach
    </tbody>
</table>
