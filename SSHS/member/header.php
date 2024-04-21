<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Tailwind Starter Template - Day Admin Template: Tailwind Toolbox</title>
  <meta name="description" content="description here">
  <meta name="keywords" content="keywords,here">

  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
  <link rel="stylesheet" href="https://unpkg.com/tailwindcss@2.2.19/dist/tailwind.min.css" />
  <!--Replace with your tailwind.css once created-->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.min.js" integrity="sha256-XF29CBwU1MWLaGEnsELogU6Y6rcc5nCkhhx89nFMIDQ=" crossorigin="anonymous"></script>



</head>

<body class="bg-gray-100 font-sans leading-normal tracking-normal">

  <nav id="header" class="bg-white fixed w-full z-10 top-0 shadow">


    <div class="w-full container mx-auto flex flex-wrap items-center mt-0 pt-3 pb-3 md:pb-0">

      <div class="w-1/2 pl-2 md:pl-0">
        <a class="text-gray-900 text-base xl:text-xl no-underline hover:no-underline font-bold" href="#">
          <i class="fas fa-sun text-pink-600 pr-3"></i> Admin Day Mode
        </a>
      </div>
      <div class="w-1/2 pr-0">
        <div class="flex relative inline-block float-right">

          <div class="relative text-sm">
            <button id="userButton" class="flex items-center focus:outline-none mr-3">
              <img class="w-8 h-8 rounded-full mr-4" src="http://i.pravatar.cc/300" alt="Avatar of User"> <span class="hidden md:inline-block">Hi, User </span>
              <svg class="pl-2 h-2" version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 129 129" xmlns:xlink="http://www.w3.org/1999/xlink" enable-background="new 0 0 129 129">
                <g>
                  <path d="m121.3,34.6c-1.6-1.6-4.2-1.6-5.8,0l-51,51.1-51.1-51.1c-1.6-1.6-4.2-1.6-5.8,0-1.6,1.6-1.6,4.2 0,5.8l53.9,53.9c0.8,0.8 1.8,1.2 2.9,1.2 1,0 2.1-0.4 2.9-1.2l53.9-53.9c1.7-1.6 1.7-4.2 0.1-5.8z" />
                </g>
              </svg>
            </button>
            <div id="userMenu" class="bg-white rounded shadow-md mt-2 absolute mt-12 top-0 right-0 min-w-full overflow-auto z-30 invisible">
              <ul class="list-reset">
                <li><a href="#" class="px-4 py-2 block text-gray-900 hover:bg-gray-400 no-underline hover:no-underline">My account</a></li>
                <li><a href="#" class="px-4 py-2 block text-gray-900 hover:bg-gray-400 no-underline hover:no-underline">Notifications</a></li>
                <li>
                  <hr class="border-t mx-2 border-gray-400">
                </li>
                <li><a href="#" class="px-4 py-2 block text-gray-900 hover:bg-gray-400 no-underline hover:no-underline">Logout</a></li>
              </ul>
            </div>
          </div>


          <div class="block lg:hidden pr-4">

          </div>
        </div>

      </div>

      <div class="w-full flex-grow lg:flex lg:items-center lg:w-auto hidden lg:block mt-2 lg:mt-0 bg-white z-20" id="nav-content">
        <ul class="list-reset lg:flex flex-1 items-center px-4 md:px-0">

          <li class="mr-6 my-2 md:my-0">
            <a href="#" class="block py-1 md:py-3 pl-1 align-middle text-gray-500 no-underline hover:text-gray-900 border-b-2 border-white hover:border-pink-500">
              <i class="fas fa-tasks fa-fw mr-3"></i><span class="pb-1 md:pb-0 text-sm">Tasks</span>
            </a>
          </li>
          <li class="mr-6 my-2 md:my-0">
            <a href="#" class="block py-1 md:py-3 pl-1 align-middle text-gray-500 no-underline hover:text-gray-900 border-b-2 border-white hover:border-purple-500">
              <i class="fa fa-envelope fa-fw mr-3"></i><span class="pb-1 md:pb-0 text-sm">Messages</span>
            </a>
          </li>
          <li class="mr-6 my-2 md:my-0">
            <a href="#" class="block py-1 md:py-3 pl-1 align-middle text-gray-500 no-underline hover:text-gray-900 border-b-2 border-white hover:border-green-500">
              <i class="fas fa-chart-area fa-fw mr-3"></i><span class="pb-1 md:pb-0 text-sm">Analytics</span>
            </a>
          </li>
          <li class="mr-6 my-2 md:my-0">
            <a href="#" class="block py-1 md:py-3 pl-1 align-middle text-gray-500 no-underline hover:text-gray-900 border-b-2 border-white hover:border-red-500">
              <i class="fa fa-wallet fa-fw mr-3"></i><span class="pb-1 md:pb-0 text-sm">Payments</span>
            </a>
          </li>
        </ul>

        <div class="relative pull-right pl-4 pr-4 md:pr-0">
          <input type="search" placeholder="Search" class="w-full bg-gray-100 text-sm text-gray-800 transition border focus:outline-none focus:border-gray-700 rounded py-1 px-2 pl-10 appearance-none leading-normal">
          <div class="absolute search-icon" style="top: 0.375rem;left: 1.75rem;">
            <svg class="fill-current pointer-events-none text-gray-800 w-4 h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
              <path d="M12.9 14.32a8 8 0 1 1 1.41-1.41l5.35 5.33-1.42 1.42-5.33-5.34zM8 14A6 6 0 1 0 8 2a6 6 0 0 0 0 12z"></path>
            </svg>
          </div>
        </div>

      </div>

    </div>
  </nav>

  <!--Container-->
  <div class="lg:hidden flex flex-col md:flex-row">
    <nav aria-label="alternative nav">
      <div class="bg-gray-800 shadow-xl h-20 fixed bottom-0 mt-12 md:relative md:h-screen z-10 w-full md:w-48 content-center">

        <div class="md:mt-12 md:w-48 md:fixed md:left-0 md:top-0 content-center md:content-start text-left justify-between">
          <ul class="list-reset flex flex-row md:flex-col pt-3 md:py-3 px-1 md:px-2 text-center md:text-left">
            <li class="mr-3 flex-1">
              <a href="#" class="block py-1 md:py-3 pl-1 align-middle text-white no-underline hover:text-white border-b-2 border-gray-800 hover:border-pink-500">
                <i class="fas fa-tasks pr-0 md:pr-3"></i><span class="pb-1 md:pb-0 text-xs md:text-base text-gray-400 md:text-gray-200 block md:inline-block">Tasks</span>
              </a>
            </li>
            <li class="mr-3 flex-1">
              <a href="#" class="block py-1 md:py-3 pl-1 align-middle text-white no-underline hover:text-white border-b-2 border-gray-800 hover:border-pink-500">
                <i class="fas fa-tasks pr-0 md:pr-3"></i><span class="pb-1 md:pb-0 text-xs md:text-base text-gray-400 md:text-gray-200 block md:inline-block">user</span>
              </a>
            </li>
            <li class="mr-3 flex-1">
              <a href="#" class="block py-1 md:py-3 pl-1 align-middle text-white no-underline hover:text-white border-b-2 border-gray-800 hover:border-purple-500">
                <i class="fa fa-envelope pr-0 md:pr-3"></i><span class="pb-1 md:pb-0 text-xs md:text-base text-gray-400 md:text-gray-200 block md:inline-block">Messages</span>
              </a>
            </li>
            <li class="mr-3 flex-1">
              <a href="#" class="block py-1 md:py-3 pl-1 align-middle text-white no-underline hover:text-white border-b-2 border-blue-600">
                <i class="fas fa-chart-area pr-0 md:pr-3 text-blue-600"></i><span class="pb-1 md:pb-0 text-xs md:text-base text-white md:text-white block md:inline-block">Analytics</span>
              </a>
            </li>
            <li class="mr-3 flex-1">
              <a href="#" class="block py-1 md:py-3 pl-0 md:pl-1 align-middle text-white no-underline hover:text-white border-b-2 border-gray-800 hover:border-red-500">
                <i class="fa fa-wallet pr-0 md:pr-3"></i><span class="pb-1 md:pb-0 text-xs md:text-base text-gray-400 md:text-gray-200 block md:inline-block">Payments</span>
              </a>
            </li>
          </ul>
        </div>


      </div>
    </nav>
  </div>
  <!--/container-->
  <div class="mt-16 lg:mt-24 flex flex-wrap">
    <div class="w-full md:w-1/2 xl:w-1/3 p-3">
      <!--Metric Card-->
      <div class="bg-white border rounded shadow p-2">
        <div class="flex flex-row items-center">
          <div class="flex-shrink pr-4">
            <div class="rounded p-3 bg-green-600"><i class="fa fa-wallet fa-2x fa-fw fa-inverse"></i></div>
          </div>
          <div class="flex-1 text-right md:text-center">
            <h5 class="font-bold uppercase text-gray-500">Total Revenue</h5>
            <h3 class="font-bold text-3xl">$3249 <span class="text-green-500"><i class="fas fa-caret-up"></i></span></h3>
          </div>
        </div>
      </div>
      <!--/Metric Card-->
    </div>
    <div class="w-full md:w-1/2 xl:w-1/3 p-3">
      <!--Metric Card-->
      <div class="bg-white border rounded shadow p-2">
        <div class="flex flex-row items-center">
          <div class="flex-shrink pr-4">
            <div class="rounded p-3 bg-pink-600"><i class="fas fa-users fa-2x fa-fw fa-inverse"></i></div>
          </div>
          <div class="flex-1 text-right md:text-center">
            <h5 class="font-bold uppercase text-gray-500">Total Users</h5>
            <h3 class="font-bold text-3xl">249 <span class="text-pink-500"><i class="fas fa-exchange-alt"></i></span></h3>
          </div>
        </div>
      </div>
      <!--/Metric Card-->
    </div>
    <div class="w-full md:w-1/2 xl:w-1/3 p-3">
      <!--Metric Card-->
      <div class="bg-white border rounded shadow p-2">
        <div class="flex flex-row items-center">
          <div class="flex-shrink pr-4">
            <div class="rounded p-3 bg-yellow-600"><i class="fas fa-user-plus fa-2x fa-fw fa-inverse"></i></div>
          </div>
          <div class="flex-1 text-right md:text-center">
            <h5 class="font-bold uppercase text-gray-500">New Users</h5>
            <h3 class="font-bold text-3xl">2 <span class="text-yellow-600"><i class="fas fa-caret-up"></i></span></h3>
          </div>
        </div>
      </div>
      <!--/Metric Card-->
    </div>
    <div class="w-full md:w-1/2 xl:w-1/3 p-3">
      <!--Metric Card-->
      <div class="bg-white border rounded shadow p-2">
        <div class="flex flex-row items-center">
          <div class="flex-shrink pr-4">
            <div class="rounded p-3 bg-blue-600"><i class="fas fa-server fa-2x fa-fw fa-inverse"></i></div>
          </div>
          <div class="flex-1 text-right md:text-center">
            <h5 class="font-bold uppercase text-gray-500">Server Uptime</h5>
            <h3 class="font-bold text-3xl">152 days</h3>
          </div>
        </div>
      </div>
      <!--/Metric Card-->
    </div>
    <div class="w-full md:w-1/2 xl:w-1/3 p-3">
      <!--Metric Card-->
      <div class="bg-white border rounded shadow p-2">
        <div class="flex flex-row items-center">
          <div class="flex-shrink pr-4">
            <div class="rounded p-3 bg-indigo-600"><i class="fas fa-tasks fa-2x fa-fw fa-inverse"></i></div>
          </div>
          <div class="flex-1 text-right md:text-center">
            <h5 class="font-bold uppercase text-gray-500">To Do List</h5>
            <h3 class="font-bold text-3xl">7 tasks</h3>
          </div>
        </div>
      </div>
      <!--/Metric Card-->
    </div>
    <div class="w-full md:w-1/2 xl:w-1/3 p-3">
      <!--Metric Card-->
      <div class="bg-white border rounded shadow p-2">
        <div class="flex flex-row items-center">
          <div class="flex-shrink pr-4">
            <div class="rounded p-3 bg-red-600"><i class="fas fa-inbox fa-2x fa-fw fa-inverse"></i></div>
          </div>
          <div class="flex-1 text-right md:text-center">
            <h5 class="font-bold uppercase text-gray-500">Issues</h5>
            <h3 class="font-bold text-3xl">3 <span class="text-red-500"><i class="fas fa-caret-up"></i></span></h3>
          </div>
        </div>
      </div>
      <!--/Metric Card-->
    </div>
  </div>

  <!--Divider-->
  <hr class="border-b-2 border-gray-400 my-8 mx-4">

  <div class="flex flex-row flex-wrap flex-grow mt-2">

    <div class="w-full md:w-1/2 p-3">
      <!--Graph Card-->
      <div class="bg-white border rounded shadow">
        <div class="border-b p-3">
          <h5 class="font-bold uppercase text-gray-600">Graph</h5>
        </div>
        <div class="p-5">
          <canvas id="chartjs-7" class="chartjs" width="undefined" height="undefined"></canvas>
          <script>
            new Chart(document.getElementById("chartjs-7"), {
              "type": "bar",
              "data": {
                "labels": ["January", "February", "March", "April"],
                "datasets": [{
                  "label": "Page Impressions",
                  "data": [10, 20, 30, 40],
                  "borderColor": "rgb(255, 99, 132)",
                  "backgroundColor": "rgba(255, 99, 132, 0.2)"
                }, {
                  "label": "Adsense Clicks",
                  "data": [5, 15, 10, 30],
                  "type": "line",
                  "fill": false,
                  "borderColor": "rgb(54, 162, 235)"
                }]
              },
              "options": {
                "scales": {
                  "yAxes": [{
                    "ticks": {
                      "beginAtZero": true
                    }
                  }]
                }
              }
            });
          </script>
        </div>
      </div>
      <!--/Graph Card-->
    </div>

    <div class="w-full md:w-1/2 p-3">
      <!--Graph Card-->
      <div class="bg-white border rounded shadow">
        <div class="border-b p-3">
          <h5 class="font-bold uppercase text-gray-600">Graph</h5>
        </div>
        <div class="p-5">
          <canvas id="chartjs-0" class="chartjs" width="undefined" height="undefined"></canvas>
          <script>
            new Chart(document.getElementById("chartjs-0"), {
              "type": "line",
              "data": {
                "labels": ["January", "February", "March", "April", "May", "June", "July"],
                "datasets": [{
                  "label": "Views",
                  "data": [65, 59, 80, 81, 56, 55, 40],
                  "fill": false,
                  "borderColor": "rgb(75, 192, 192)",
                  "lineTension": 0.1
                }]
              },
              "options": {}
            });
          </script>
        </div>
      </div>
      <!--/Graph Card-->
    </div>

    <div class="w-full md:w-1/2 xl:w-1/3 p-3">
      <!--Graph Card-->
      <div class="bg-white border rounded shadow">
        <div class="border-b p-3">
          <h5 class="font-bold uppercase text-gray-600">Graph</h5>
        </div>
        <div class="p-5">
          <canvas id="chartjs-1" class="chartjs" width="undefined" height="undefined"></canvas>
          <script>
            new Chart(document.getElementById("chartjs-1"), {
              "type": "bar",
              "data": {
                "labels": ["January", "February", "March", "April", "May", "June", "July"],
                "datasets": [{
                  "label": "Likes",
                  "data": [65, 59, 80, 81, 56, 55, 40],
                  "fill": false,
                  "backgroundColor": ["rgba(255, 99, 132, 0.2)", "rgba(255, 159, 64, 0.2)", "rgba(255, 205, 86, 0.2)", "rgba(75, 192, 192, 0.2)", "rgba(54, 162, 235, 0.2)", "rgba(153, 102, 255, 0.2)", "rgba(201, 203, 207, 0.2)"],
                  "borderColor": ["rgb(255, 99, 132)", "rgb(255, 159, 64)", "rgb(255, 205, 86)", "rgb(75, 192, 192)", "rgb(54, 162, 235)", "rgb(153, 102, 255)", "rgb(201, 203, 207)"],
                  "borderWidth": 1
                }]
              },
              "options": {
                "scales": {
                  "yAxes": [{
                    "ticks": {
                      "beginAtZero": true
                    }
                  }]
                }
              }
            });
          </script>
        </div>
      </div>
      <!--/Graph Card-->
    </div>

    <div class="w-full md:w-1/2 xl:w-1/3 p-3">
      <!--Graph Card-->
      <div class="bg-white border rounded shadow">
        <div class="border-b p-3">
          <h5 class="font-bold uppercase text-gray-600">Graph</h5>
        </div>
        <div class="p-5"><canvas id="chartjs-4" class="chartjs" width="undefined" height="undefined"></canvas>
          <script>
            new Chart(document.getElementById("chartjs-4"), {
              "type": "doughnut",
              "data": {
                "labels": ["P1", "P2", "P3"],
                "datasets": [{
                  "label": "Issues",
                  "data": [300, 50, 100],
                  "backgroundColor": ["rgb(255, 99, 132)", "rgb(54, 162, 235)", "rgb(255, 205, 86)"]
                }]
              }
            });
          </script>
        </div>
      </div>
      <!--/Graph Card-->
    </div>

    <div class="w-full md:w-1/2 xl:w-1/3 p-3">
      <!--Template Card-->
      <div class="bg-white border rounded shadow">
        <div class="border-b p-3">
          <h5 class="font-bold uppercase text-gray-600">Template</h5>
        </div>
        <div class="p-5">

        </div>
      </div>
      <!--/Template Card-->
    </div>

    <div class="w-full p-3">
      <!--Table Card-->
      <div class="bg-white border rounded shadow">
        <div class="border-b p-3">
          <h5 class="font-bold uppercase text-gray-600">Table</h5>
        </div>
        <div class="p-5">
          <table class="w-full p-5 text-gray-700">
            <thead>
              <tr>
                <th class="text-left text-blue-900">Name</th>
                <th class="text-left text-blue-900">Side</th>
                <th class="text-left text-blue-900">Role</th>
              </tr>
            </thead>

            <tbody>
              <tr>
                <td>Obi Wan Kenobi</td>
                <td>Light</td>
                <td>Jedi</td>
              </tr>
              <tr>
                <td>Greedo</td>
                <td>South</td>
                <td>Scumbag</td>
              </tr>
              <tr>
                <td>Darth Vader</td>
                <td>Dark</td>
                <td>Sith</td>
              </tr>
            </tbody>
          </table>

          <p class="py-2"><a href="#">See More issues...</a></p>

        </div>
      </div>
      <!--/table Card-->
    </div>


  </div>

  <!--/ Console Content-->

  </div>


  </div>


  <script>
    /*Toggle dropdown list*/
    /*https://gist.github.com/slavapas/593e8e50cf4cc16ac972afcbad4f70c8*/

    var userMenuDiv = document.getElementById("userMenu");
    var userMenu = document.getElementById("userButton");

    var navMenuDiv = document.getElementById("nav-content");
    var navMenu = document.getElementById("nav-toggle");

    document.onclick = check;

    function check(e) {
      var target = (e && e.target) || (event && event.srcElement);

      //User Menu
      if (!checkParent(target, userMenuDiv)) {
        // click NOT on the menu
        if (checkParent(target, userMenu)) {
          // click on the link
          if (userMenuDiv.classList.contains("invisible")) {
            userMenuDiv.classList.remove("invisible");
          } else {
            userMenuDiv.classList.add("invisible");
          }
        } else {
          // click both outside link and outside menu, hide menu
          userMenuDiv.classList.add("invisible");
        }
      }

      //Nav Menu
      if (!checkParent(target, navMenuDiv)) {
        // click NOT on the menu
        if (checkParent(target, navMenu)) {
          // click on the link
          if (navMenuDiv.classList.contains("hidden")) {
            navMenuDiv.classList.remove("hidden");
          } else {
            navMenuDiv.classList.add("hidden");
          }
        } else {
          // click both outside link and outside menu, hide menu
          navMenuDiv.classList.add("hidden");
        }
      }

    }

    function checkParent(t, elm) {
      while (t.parentNode) {
        if (t == elm) {
          return true;
        }
        t = t.parentNode;
      }
      return false;
    }
  </script>

</body>

</html>