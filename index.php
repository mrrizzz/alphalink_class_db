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
</head>

<body>

  <!--  NAVBAR SECTION START -->
  <nav class="bg-blue-400 py-5">
    <div class="container w-10/12 mx-auto grid grid-cols-3">
      <div class="font-bold text-white text-lg">
        <a href="">ALPHALINK</a>
      </div>
      <div class=" col-start-2">
        <ul class="flex justify-center">
          <li class="px-3 text-white"><a href=""></a>Home</li>
          <li class="px-3 text-white"><a href=""></a>List</li>
          <li class="px-3 text-white"><a href=""></a>About Us</li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- NAVBAR SECTION END -->
  <div class="container w-10/12 mx-auto">
    <a href="create.php"><button class="bg-blue-800 text-white px-2 py-1 m-1 mt-10 rounded-md flex items-center"><svg
          xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
          class="w-4 h-4 mr-1.5">
          <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
        </svg>
        Add</button></a>
    <table class="table-auto w-full mx-auto border mt-1 border-black-300">
      <thead>
        <tr>
          <th class="border-2 border-black">No</th>
          <th class="border-2 border-black">NRP</th>
          <th class="border-2 border-black">Nama</th>
          <th class="border-2 border-black">Gender</th>
          <th class="border-2 border-black">TTL</th>
          <th class="border-2 border-black">Alamat</th>
          <th class="border-2 border-black">No. HP</th>
          <th class="border-2 border-black">Action</th>
        </tr>
      </thead>
      <tbody>
        <?php
        include 'connect.php';
        $sql = "SELECT * FROM alphalink";
        $result = $connectdb->query($sql);
        if ($result->num_rows > 0) {
          $counter = 1;
          while ($row = $result->fetch_assoc()) {
            $formatted_birthday = date("d F Y", strtotime($row['tanggal_lahir']));
            echo '<tr>';
            echo '<td class="border-2 border-black text-center">' . $counter . '</td>';
            echo '<td class="border-2 border-black text-center">' . $row['nrp'] . '</td>';
            echo '<td class="border-2 border-black text-center">' . $row['nama'] . '</td>';
            echo '<td class="border-2 border-black text-center">' . $row['jenis_kelamin'] . '</td>';
            echo '<td class="border-2 border-black text-center">' . $row['tempat_lahir'] . ', ' . $formatted_birthday . '</td>';
            echo '<td class="border-2 border-black text-center">' . $row['alamat'] . '</td>';
            echo '<td class="border-2 border-black text-center">' . $row['no_hp'] . '</td>';
            echo '<td class="border-2 border-black text-center">';
            echo '<div class="container flex justify-evenly"><button onclick="location.href=\'update.php?nrp='.$row["nrp"].'\'" class="bg-indigo-200 px-2 py-1 m-1 rounded-lg flex items-center"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">';
            echo '<path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L6.832 19.82a4.5 4.5 0 0 1-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 0 1 1.13-1.897L16.863 4.487Zm0 0L19.5 7.125" />';
            echo ' </svg>';
            echo 'Edit</button><button onclick="location.href=\'delete.php?nrp='.$row["nrp"].'\'" class="bg-red-200 px-2 py-1 m-1 rounded-lg flex items-center"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">';
            echo '<path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />';
            echo '</svg>';
            echo 'Delete</button></div></td>';
            echo ' </tr>';
            $counter++;
          }
        } else {
          echo '<tr>';
          echo '<td class="border-2 border-black text-center py-3" colspan=8>Belum ada isinya</td>';
          echo '</tr>';
        }
        ?>
        <button></button>

      </tbody>
    </table>
  </div>





</body>

</html>