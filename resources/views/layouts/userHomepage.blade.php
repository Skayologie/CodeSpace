<x-guest-layout>
    <x-header auth="{{$auth}}"></x-header>
    <x-usersidebar auth="{{$auth}}"></x-usersidebar>
    <!-- Main Content Area -->
    <div class="flex flex-col gap-5 p-6">

        <!-- Post Card -->
        {{$slot}}


    </div>

</x-guest-layout>
