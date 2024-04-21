<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>SSHS Dashboard</title>
  <link rel="stylesheet" type="text/css" href="../../assets/css/fonts-google.css">
  <link rel="stylesheet" href="https://unpkg.com/tailwindcss@2.2.19/dist/tailwind.min.css" />
  <link rel="stylesheet" type="text/css" href="../../assets/css/normalize.css">

  <!-- DataTables CSS -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">

<!-- jQuery library -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

<!-- DataTables JS -->
<script type="text/javascript" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>

<script>
  $(document).ready(function() {
    $('#myTable').DataTable({
      "dom": '<"flex flex-wrap justify-between items-center text-gray-600 dark:text-gray-300 rounded-md rounded-l-lg focus:outline-none focus:shadow-outline-purple px-6" >rtip',
      "language": {
        "paginate": {
          "previous": '<button class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple" aria-label="Previous"><svg class="w-4 h-4 fill-current" aria-hidden="true" viewBox="0 0 20 20"><path d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" fill-rule="evenodd"></path></svg></button>',
          "next": '<button class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple" aria-label="Next"><svg class="w-4 h-4 fill-current" aria-hidden="true" viewBox="0 0 20 20"><path d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" fill-rule="evenodd"></path></svg></button>',
        }
      }
    });
  });
</script>

  

</head>

<body>

  <div class="flex h-screen bg-gray-50 dark:bg-gray-900" :class="{ 'overflow-hidden': isSideMenuOpen}">