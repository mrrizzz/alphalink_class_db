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

<body class="bg-gray-100">
  <?php
  session_start();
  include 'sidebar.php';
  include 'guard.php';
  include 'navbar.php';

  ?>

  <div class="container flex w-8/12 ml-64 mt-20 pr-12 justify-between">
    <div class="w-3/5">
      <table class="table-auto mx-auto w-full border mt-5 border-black-300">
        <tbody>
          <?php
          include 'connect.php';
          $user = $_COOKIE['users'];
          $sql = "SELECT * FROM alphalink WHERE username='$user'";
          $result = $connectdb->query($sql);
          if ($row = $result->fetch_assoc()) {
            $formatted_birthday = date("d F Y", strtotime($row['tanggal_lahir']));
            echo '<tr>';
            echo '<td class="border-2 p-2 px-4 font-bold border-black">NRP</td>';
            echo '<td class="border-2 p-2 px-4 border-black ">' . $row['nrp'] . '</td>';
            echo '<tr>';
            echo '<tr>';
            echo '<td class="border-2 p-2 px-4 font-bold border-black">Nama</td>';
            echo '<td class="border-2 p-2 px-4 border-black ">' . $row['nama'] . '</td>';
            echo '<tr>';
            echo '<tr>';
            echo '<td class="border-2 p-2 px-4 font-bold border-black">Gender</td>';
            echo '<td class="border-2 p-2 px-4 border-black ">' . $row['jenis_kelamin'] . '</td>';
            echo '<tr>';
            echo '<tr>';
            echo ' <td class="border-2 p-2 px-4 font-bold border-black">TTL</td>';
            echo '<td class="border-2 p-2 px-4 border-black ">' . $row['tempat_lahir'] . ', ' . $formatted_birthday . '</td>';
            echo '<tr>';
            echo '<tr>';
            echo '<td class="border-2 p-2 px-4 font-bold border-black">Alamat</td>';
            echo '<td class="border-2 p-2 px-4 border-black ">' . $row['alamat'] . '</td>';
            echo '<tr>';
            echo '<td class="border-2 p-2 px-4 font-bold border-black">No. HP</td>';
            echo '<td class="border-2 p-2 px-4 border-black ">' . $row['no_hp'] . '</td>';
            echo '<tr>';
            echo '<td class="border-2 p-2 px-4 font-bold border-black">Email</td>';
            echo '<td class="border-2 p-2 px-4 border-black ">' . $row['email'] . '</td>';
            echo '<tr>';
          } else {
            echo ' <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">';
            echo ' <strong class="font-bold">Holy smokes!</strong>';
            echo ' <span class="block sm:inline">Something seriously bad happened.</span>';
            echo ' <span class="absolute top-0 bottom-0 right-0 px-4 py-3">';
            echo ' <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>';
            echo ' </span>';
            echo ' </div>';
          }
          ?>
        </tbody>
      </table>
    </div>
    <div>
      <img class="rounded-full w-72 h-72 mt-4 border-2 p-2" src="img/profil.jpg" alt="image description">
    </div>
  </div>





</body>

</html>