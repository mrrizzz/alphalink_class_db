<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bismillah lancar</title>
  <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
    rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css" />
  <!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" /> -->

</head>

<body>
  <?php
  session_start();
  include 'guard.php';
  include 'sidebar.php';
  include 'navbar.php';
  ?>

  <!-- <span class="absolute text-white text-4xl top-5 left-4 cursor-pointer" onclick="openSidebar()">
    <i class="bi bi-filter-left px-2 bg-gray-900 rounded-md"></i>
  </span> -->


  <!--  NAVBAR SECTION START -->

  <!-- NAVBAR SECTION END -->
  <div class="container w-10/12 ml-64 bg-cover h-screen mt-16 flex flex-col text-center justify-center" style="background-image: url('img/bgbody.jpg');">
    <div class="">
      <p class="text-4xl text-white font-light">WELCOME TO</p>
      <div class="border-b-2 border-white mb-2 mt-4 opacity-50"></div>
      <p class="text-9xl text-white font-bold drop-shadow-xl tracking-widest ">ALPHALINK</p>
      <div class="border-b-2 border-white my-4 opacity-50"></div>
      <p class="text-xl italic font-medium opacity-90 my-4 text-white">The Best EEPIS's IT Class</p>
    </div>
  </div>





</body>

</html>