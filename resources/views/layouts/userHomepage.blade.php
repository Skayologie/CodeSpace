@props(["auth"])
<x-guest-layout>
    <x-header></x-header>
    <x-usersidebar auth="{{$auth}}"></x-usersidebar>
    <!-- Main Content Area -->
    <div class="flex flex-col gap-5 p-6">

        <!-- Post Card -->
        {{$slot}}


    </div>

</x-guest-layout>
