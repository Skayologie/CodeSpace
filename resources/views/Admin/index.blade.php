<div id="ContainForm">

</div>
<style>
    .ActiveBTN{
        background-color: white !important;
        color: black !important;
    }
</style>
<x-app-layout>

    <div>

        <div id="AdminArea">

            <h2 class="main-title">Dashboard</h2>
            <div class="bg-gradient-to-r from-orange-600 to-red-500 p-4 mb-4 rounded-full shadow-lg flex flex-wrap gap-3 ">
                <button id="get_top_postsBTN" title="This calculated the top 5 posts that has more reaction and views " class="px-5 tableBTNS bg-orange-500 text-white py-2.5  font-medium rounded-full hover:bg-orange-50 hover:text-orange-600 focus:outline-none focus:ring-2 focus:ring-orange-300 focus:ring-opacity-50 transition-all duration-300 shadow-md flex items-center space-x-2">
                    <i class="fa-solid fa-arrow-trend-up"></i>
                    <span>Top Posts</span>
                </button>
                <button  id="get_top_usersBTN"  class="tableBTNS px-5 py-2.5 bg-orange-500 text-white font-medium rounded-full hover:bg-orange-400  focus:outline-none focus:ring-2 focus:ring-orange-300 focus:ring-opacity-50 transition-all duration-300 shadow-md flex items-center space-x-2">
                    <i class="fa-solid fa-users"></i>
                    <span>Top Users</span>
                </button>
                <button class="px-5 py-2.5 bg-orange-500 text-white font-medium rounded-full hover:bg-orange-400 focus:outline-none focus:ring-2 focus:ring-orange-300 focus:ring-opacity-50 transition-all duration-300 shadow-md flex items-center space-x-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                    </svg>
                    <span>Profile</span>
                </button>
                <button class="px-5 py-2.5 bg-orange-500 text-white font-medium rounded-full hover:bg-orange-400 focus:outline-none focus:ring-2 focus:ring-orange-300 focus:ring-opacity-50 transition-all duration-300 shadow-md flex items-center space-x-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    </svg>
                    <span>Settings</span>
                </button>
            </div>

            <div class="row stat-cards">
                <div class="col-md-6 col-xl-3">
                    <article class="stat-cards-item">
                        <div class="stat-cards-icon primary">
                            <i class="fa-solid fa-users"></i>
                        </div>
                        <div class="stat-cards-info">
                            <p class="stat-cards-info__num">{{$registeredUsers}}</p>
                            <p class="stat-cards-info__title">Total registered users</p>
                        </div>
                    </article>
                </div>
                <div class="col-md-6 col-xl-3">
                    <article class="stat-cards-item">
                        <div class="stat-cards-icon warning">
                            <i class="fa-solid fa-chart-line"></i>
                        </div>
                        <div class="stat-cards-info">
                            <p class="stat-cards-info__num">{{$activeUsers}}</p>
                            <p class="stat-cards-info__title">Active users</p>
                        </div>
                    </article>
                </div>
                <div class="col-md-6 col-xl-3">
                    <article class="stat-cards-item">
                        <div class="stat-cards-icon purple">
                            <i class="fa-solid fa-newspaper"></i>
                        </div>
                        <div class="stat-cards-info">
                            <p class="stat-cards-info__num">{{$totalPosts}}</p>
                            <p class="stat-cards-info__title">Total posts created</p>
                        </div>
                    </article>
                </div>
                <div class="col-md-6 col-xl-3">
                    <article class="stat-cards-item">
                        <div class="stat-cards-icon success">
                            <i class="fa-solid fa-comments"></i>
                        </div>
                        <div class="stat-cards-info">
                            <p class="stat-cards-info__num">{{$totalCommunities}}</p>
                            <p class="stat-cards-info__title">Total communities</p>
                        </div>
                    </article>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-9">
                    <div class="chart">
                        <canvas id="myChart" aria-label="Site statistics" role="img"></canvas>
                    </div>


                    <div class="users-table table-wrapper">

                        <div class="overflow-x-auto">
                            <div id="tableContentData" class="min-w-full bg-white rounded-2xl shadow-md">

                            </div>
                        </div>
                    </div>
                </div>
                <div  class="col-lg-3">
                    <article class="customers-wrapper">
                        <!-- <canvas id="customersChart" aria-label="Customers statistics" role="img"></canvas> -->
                        <!--              <p class="customers__title">New Customers <span>+958</span></p>
                        <p class="customers__date">28 Daily Avg.</p>
                        <picture><source srcset="./img/svg/customers.svg" type="image/webp"><img src="./img/svg/customers.svg" alt=""></picture> -->
                    </article>
                    <article class="white-block">
                        <div class="top-cat-title">
                            <h3>Top categories</h3>
                            <p></p>
                        </div>
                        <ul id="CategoriesStats" class="top-cat-list">

                        </ul>
                    </article>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>

