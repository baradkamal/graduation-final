<?php
session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location: ../public/index.php");
    
    exit;
}else {
    $user_type = $_SESSION['user_type'];
    if ($user_type == 'Admin') {
        header("Location: ../admin/deshboards/Dashboard.php");
        exit();
    } elseif ($user_type == 'Security') {
        header("Location: ../Security/Security_dashboard.php");
        exit();
    }
} ?>
<nav id="header" class="bg-white dark:bg-gray-800 dark:text-gray-200 fixed w-full z-10 top-0 shadow">


    <div class="w-full container mx-auto flex flex-wrap items-center mt-0 pt-3 pb-3 md:pb-0 dark:bg-gray-800">

        <div class="flex items-center w-1/2 pl-2 md:pl-0 ">

            <img class="logo-light block dark:hidden W-10 h-12 mr-3" src="../images/logo_black.png" alt="Logo for light theme">
            <img class="logo-dark hidden dark:block W-10 h-12 mr-3" src="../images/logo_white.png" alt="Logo for dark theme">

        </div>

        <div class="w-1/2 pr-0">
            <div class="  flex relative inline-block float-right text-purple-600 dark:text-purple-300">
                <ul class="flex items-center flex-shrink-0 space-x-6 mr-4">
                    <!-- Theme toggler -->
                    <li class="flex">
                        <button class="rounded-md focus:outline-none focus:shadow-outline-purple" @click="toggleTheme" aria-label="Toggle color mode">
                            <template x-if="!dark">
                                <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path>
                                </svg>
                            </template>
                            <template x-if="dark">
                                <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z" clip-rule="evenodd"></path>
                                </svg>
                            </template>
                        </button>
                    </li>
                    <!-- Notifications menu -->
                    <!--<li class="relative">
                        <button class="relative align-middle rounded-md focus:outline-none focus:shadow-outline-purple" @click="toggleNotificationsMenu" @keydown.escape="closeNotificationsMenu" aria-label="Notifications" aria-haspopup="true">
                            <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10 2a6 6 0 00-6 6v3.586l-.707.707A1 1 0 004 14h12a1 1 0 00.707-1.707L16 11.586V8a6 6 0 00-6-6zM10 18a3 3 0 01-3-3h6a3 3 0 01-3 3z"></path>
                            </svg>
                             Notification badge 
                            <span aria-hidden="true" class="absolute top-0 right-0 inline-block w-3 h-3 transform translate-x-1 -translate-y-1 bg-red-600 border-2 border-white rounded-full dark:border-gray-800"></span>
                        </button>
                        <
                        <template x-if="isNotificationsMenuOpen">
                            <ul x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" @click.away="closeNotificationsMenu" @keydown.escape="closeNotificationsMenu" class="absolute right-0 w-56 p-2 mt-2 space-y-2 text-gray-600 bg-white border z-30 border-gray-100 rounded-md shadow-md dark:text-gray-300 dark:border-gray-700 dark:bg-gray-700" aria-label="submenu">
                                <li class="flex">
                                    <a class="inline-flex items-center justify-between w-full px-2 py-1 text-sm font-semibold transition-colors duration-150 rounded-md hover:bg-gray-100 hover:text-gray-800 dark:hover:bg-gray-800 dark:hover:text-gray-200" href="#">
                                        <span>Messages</span>
                                        <span class="inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-red-600 bg-red-100 rounded-full dark:text-red-100 dark:bg-red-600">
                                            13
                                        </span>
                                    </a>
                                </li>
                                <li class="flex">
                                    <a class="inline-flex items-center justify-between w-full px-2 py-1 text-sm font-semibold transition-colors duration-150 rounded-md hover:bg-gray-100 hover:text-gray-800 dark:hover:bg-gray-800 dark:hover:text-gray-200" href="#">
                                        <span>Sales</span>
                                        <span class="inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-red-600 bg-red-100 rounded-full dark:text-red-100 dark:bg-red-600">
                                            2
                                        </span>
                                    </a>
                                </li>
                                <li class="flex">
                                    <a class="inline-flex items-center justify-between w-full px-2 py-1 text-sm font-semibold transition-colors duration-150 rounded-md hover:bg-gray-100 hover:text-gray-800 dark:hover:bg-gray-800 dark:hover:text-gray-200" href="#">
                                        <span>Alerts</span>
                                    </a>
                                </li>
                            </ul>
                        </template>
                    </li> -->
                    <!-- Profile menu -->
                    <li class="relative">
                        <button class="align-middle rounded-full focus:shadow-outline-purple focus:outline-none" @click="toggleProfileMenu" @keydown.escape="closeProfileMenu" aria-label="Account" aria-haspopup="true">
                        <img class="object-cover w-8 h-8 rounded-full" src="../images/profile/profile_image2.png" alt="" aria-hidden="true" />
                        </button>
                        <template x-if="isProfileMenuOpen">
                            <ul x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" @click.away="closeProfileMenu" @keydown.escape="closeProfileMenu" class="absolute right-0 w-56 p-2 mt-2 space-y-2 text-gray-600 bg-white border border-gray-100 z-30 rounded-md shadow-md dark:border-gray-700 dark:text-gray-300 dark:bg-gray-700" aria-label="submenu">
                                <li class="flex">
                                    <a class="inline-flex items-center w-full px-2 py-1 text-sm font-semibold transition-colors duration-150 rounded-md hover:bg-gray-100 hover:text-gray-800 dark:hover:bg-gray-800 dark:hover:text-gray-200" href="#">
                                        <svg class="w-4 h-4 mr-3" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                            <path d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                        </svg>
                                        <span>Profile</span>
                                    </a>
                                </li>
                                <li class="flex">
                                <a class="inline-flex items-center w-full px-2 py-1 text-sm font-semibold transition-colors duration-150 rounded-md hover:bg-gray-100 hover:text-gray-800 dark:hover:bg-gray-800 dark:hover:text-gray-200" onclick="logout();" href="#">
                                    <svg class="w-4 h-4 mr-3" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                        <path d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"></path>
                                    </svg>
                                    <span>Log out</span>
                                </a>
                                </li>
                            </ul>
                        </template>
                    </li>
                </ul>




            </div>

        </div>

        <div class="w-full m-2  flex-grow lg:flex lg:items-center lg:w-auto hidden sm:block lg:block mt-2 lg:mt-0 bg-white z-20 dark:bg-gray-800 dark:text-gray-200" id="nav-content">
            <ul class="list-reset lg:flex flex-1 items-center px-4 md:px-0 text-gray-800 dark:text-gray-200">

                <li class="mr-6 my-2 md:my-0">

                    <a href="dashboard.php" class="block py-1 md:py-3 pl-1 align-middle <?php if ($current_url == 'Dashboard') : ?>
                    border-b-2 border-purple-600
                <?php endif; ?> no-underline w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200">
                        <i class="fas fa-tachometer-alt fa-fw mr-3"></i><span class="pb-1 md:pb-0 text-sm">Dashboard</span>
                    </a>
                </li>
                <li class="mr-6 my-2 md:my-0">
                    <a href="Profile Management.php" class="block py-1 md:py-3 pl-1 align-middle <?php if ($current_url == 'Profile') : ?>
                    border-b-2 border-purple-600
                <?php endif; ?>  no-underline w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200">
                        <i class="fas fa-user fa-fw mr-3"></i><span class="pb-1 md:pb-0 text-sm">Profile Management</span>
                    </a>
                </li>
                <li class="mr-6 my-2 md:my-0">
                    <a href="Property Booking.php" class="block py-1 md:py-3 pl-1 align-middle  <?php if ($current_url == 'Bookings') : ?>
                    border-b-2 border-purple-600
                <?php endif; ?> no-underline w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200">
                        <i class="fas fa-calendar-check fa-fw mr-3"></i><span class="pb-1 md:pb-0 text-sm">Property Booking</span>
                    </a>
                </li>
                <li class="mr-6 my-2 md:my-0">
                    <a href="Complaint Management.php" class="block py-1 md:py-3 pl-1 align-middle  <?php if ($current_url == 'Complaints') : ?>
                    border-b-2 border-purple-600
                <?php endif; ?> no-underline w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200">
                        <i class="fas fa-exclamation-triangle fa-fw mr-3"></i><span class="pb-1 md:pb-0 text-sm">Complaint Management</span>
                    </a>
                </li>
                <li class="mr-6 my-2 md:my-0">
                    <a href="Network.php" class="block py-1 md:py-3 pl-1 align-middle  <?php if ($current_url == 'Network') : ?>
                    border-b-2 border-purple-600
                <?php endif; ?> no-underline w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200">
                        <i class="fas fa-bell fa-fw mr-3"></i><span class="pb-1 md:pb-0 text-sm">Network</span>
                    </a>
                </li>
            </ul>



        </div>

    </div>
</nav>
<script>
        function logout() {
            // Send a GET request to the logout.php file
            fetch('/SSHS/public/logout.php')
                .then(response => {
                    // Redirect to the homepage
                    window.location.href = '/SSHS/public/index.php';
                })
                .catch(error => {
                    console.error('Error:', error);
                });
        }
    </script>
<!--Container-->
<div class="lg:hidden md:hidden flex  flex-col ">
    <nav aria-label="alternative nav">
        <div class="bg-gray-800 shadow-xl h-20 fixed bottom-0 mt-12 md:relative md:h-screen z-10 w-full md:w-48 content-center">

            <div class="md:mt-12 md:w-48 md:fixed md:left-0 md:top-0 content-center md:content-start text-left justify-between">
                <ul class="list-reset flex flex-row md:flex-col pt-3 md:py-3 px-1 md:px-2 text-center md:text-left text-gray-500 dark:text-gray-400">
                    <li class="mr-3 flex-1">
                        <a href="dashboard.php" class="block py-1 md:py-3 pl-1 align-middle font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 no-underline  <?php if ($current_url == 'Dashboard') : ?>
                                    border-b-2 border-purple-600
                                <?php endif; ?> ">
                            <i class="fas fa-tachometer-alt pr-0 md:pr-3"></i><span class="pb-1 md:pb-0 text-xs md:text-base text-gray-400 md:text-gray-200 block md:inline-block">Dashboard</span>
                        </a>
                    </li>
                    <li class="mr-3 flex-1">
                        <a href="Profile Management.php" class="block py-1 md:py-3 pl-1 align-middle font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 no-underline  <?php if ($current_url == 'Profile') : ?>
                                    border-b-2 border-purple-600
                                <?php endif; ?> ">
                            <i class="fas fa-user-cog pr-0 md:pr-3"></i><span class="pb-1 md:pb-0 text-xs md:text-base text-gray-400 md:text-gray-200 block md:inline-block">Profile</span>
                        </a>
                    </li>
                    <li class="mr-3 flex-1">
                        <a href="Property Booking.php" class="block py-1 md:py-3 pl-1 align-middle font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 no-underline  <?php if ($current_url == 'Bookings') : ?>
                                    border-b-2 border-purple-600
                                <?php endif; ?> ">
                            <i class="fas fa-calendar-check pr-0 md:pr-3"></i><span class="pb-1 md:pb-0 text-xs md:text-base text-gray-400 md:text-gray-200 block md:inline-block">Bookings</span>
                        </a>
                    </li>
                    <li class="mr-3 flex-1">
                        <a href="Complaint Management.php" class="block py-1 md:py-3 pl-1 align-middle font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 no-underline  <?php if ($current_url == 'Complaints') : ?>
                                    border-b-2 border-purple-600
                                <?php endif; ?> ">
                            <i class="fas fa-exclamation-triangle pr-0 md:pr-3"></i><span class="pb-1 md:pb-0 text-xs md:text-base text-gray-400 md:text-gray-200 block md:inline-block">Complaints</span>
                        </a>
                    </li>
                    <li class="mr-3 flex-1">
                        <a href="Network.php" class="block py-1 md:py-3 pl-1 align-middle font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 no-underline  <?php if ($current_url == 'Network') : ?>
                                    border-b-2 border-purple-600
                                <?php endif; ?> ">
                            <i class="fas fa-bell pr-0 md:pr-3"></i><span class="pb-1 md:pb-0 text-xs md:text-base text-gray-400 md:text-gray-200 block md:inline-block">Network</span>
                        </a>
                    </li>
                </ul>
            </div>


        </div>
    </nav>
</div>

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="../assets/css/normalize.css">
<link rel="stylesheet" type="text/css" href="../assets/css/fonts-google.css">
<link rel="stylesheet" href="https://unpkg.com/tailwindcss@2.2.19/dist/tailwind.min.css" />
<div class="flex flex-col flex-1">

    <main class="h-full overflow-y-auto">
        <div class="container grid px-4 md:px-0 mx-auto">
            <div class=" my-24 md:mt-32">