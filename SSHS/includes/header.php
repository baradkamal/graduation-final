<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>SSHS Dashboard</title>
  <link rel="stylesheet" href="/SSHS/assets/css/fonts-google.css">
  <link rel="stylesheet" href="https://unpkg.com/tailwindcss@2.2.19/dist/tailwind.min.css" />
  <link rel="stylesheet" href="/SSHS/assets/css/normalize.css">
  


  

</head>

<body>

  <div class="flex h-screen bg-gray-50 dark:bg-gray-900" :class="{ 'overflow-hidden': isSideMenuOpen}">