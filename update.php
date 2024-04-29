<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
    rel="stylesheet">
  <title>Document</title>
</head>

<body>
  <?php
  include "connect.php";

  if (isset($_GET['nrp'])) {
    $nrp = $_GET['nrp'];
    $cut_nrp = substr($nrp, -2);
    $sql = "SELECT * FROM `alphalink` WHERE `nrp` = $nrp";
    $result = $connectdb->query($sql);

    if ($result->num_rows > 0) {
      $row = $result->fetch_assoc();
      $nrp = $row['nrp'];
      $name = $row['nama'];
      $birth_place = $row['tempat_lahir'];
      $birthday = $row['tanggal_lahir'];
      $gender = $row['jenis_kelamin'];
      $phone_number = $row['no_hp'];
      $email = $row['email'];
      $address = $row['alamat'];
      $hobby = $row['hobi'];
      $fav_object = $row['matkul_favorit'];
    } else {
      echo "No result found";
      exit;
    }
  } else {
    echo "NRP not found";
    exit;
  }
  $connectdb->close();
  ?>
  <form class="w-6/12 mx-auto flex justify-center mt-6" method="post">

    <div class="border-b border-gray-900/10 pb-12 w-full">

      <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-7  ">
        <div class="sm:col-span-2 sm:col-start-1">
          <label for="nrp" class="block text-sm font-medium leading-6 text-gray-900">NRP</label>
          <div class="mt-2">
            <!-- PR = otak atik ATRIBUT HOVER FOCUS DAN ring -->
            <div
              class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
              <span class="flex select-none items-center pl-3  sm:text-sm">31236000</span>
              <input type="text" name="nrp" id="nrp" autocomplete="nrp"
                class=" w-full flex-1 border-0 bg-transparent py-1.5 pl-1 ml-1 text-gray-900 placeholder:text-gray-400 font-bold sm:text-sm sm:leading-6 text-white"
                placeholder="00" value="<?php echo $cut_nrp ?>">
            </div>
          </div>
        </div>
        <div class="sm:col-span-4 row-start-2">
          <label for="name" class="block text-sm font-medium leading-6 text-gray-900">Name</label>
          <div class="mt-2">
            <input type="text" name="name" id="name" autocomplete="given-name" value="<?php echo $name ?>"
              class="block w-full rounded-md pl-3 border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
          </div>
        </div>

        <div class="sm:col-span-3 row-start-3">
          <label for="birth_place" class="block text-sm font-medium leading-6 text-gray-900">Birth Place</label>
          <div class="mt-2">
            <div class="mt-2">
              <input type="text" name="birth_place" id="birth_place" autocomplete="family-name"
                value="<?php echo $birth_place ?>"
                class="block w-full rounded-md pl-3 border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
            </div>
          </div>
        </div>

        <div class="sm:col-span-2 row-start-3">
          <label for="birthday" class="block text-sm font-medium leading-6 text-gray-900">Birth Date</label>
          <div class="mt-2">
            <input type="date" id="birthday" name="birthday" value="<?php echo $birthday ?>"
              class="block w-full rounded-md pl-3 border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
              required>
          </div>
        </div>

        <div class="sm:col-span-2 row-start-4">
          <label for="gender" class="block text-sm font-medium leading-6 text-gray-900">Gender</label>
          <div class="mt-2">
            <select id="gender" name="gender" autocomplete="gender"
              class="block w-full rounded-md pl-3 border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
              <option value='Laki laki' <?php echo ($gender == 'Laki laki' ? 'selected' : '') ?>>Laki laki</option>
              <option value='Perempuan' <?php echo ($gender == 'Perempuan' ? 'selected' : '') ?>>Perempuan</option>
            </select>
          </div>
        </div>

        <div class="sm:col-span-3 row-start-5">
          <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email address</label>
          <div class="mt-2">
            <input id="email" name="email" type="email" autocomplete="email" value="<?php echo $email ?>"
              class="block w-full rounded-md pl-3 border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
          </div>
        </div>

        <div class="sm:col-span-3 sm:col-start-1">
          <label for="phone_number" class="block text-sm font-medium leading-6 text-gray-900">Phone Number</label>
          <div class="mt-2">
            <input type="text" name="phone_number" id="phone_number" autocomplete="phone-number"
              value="<?php echo $phone_number ?>"
              class="block w-full rounded-md pl-3 border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
          </div>
        </div>

        <div class="col-span-full row-span-2">
          <label for="address" class="block text-sm font-medium leading-6 text-gray-900">Address</label>
          <div class="mt-2">
            <textarea rows="3" name="address" id="address"
              class="block w-full rounded-md pl-3 border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"><?php echo $address ?></textarea>
          </div>
        </div>

        <div class="sm:col-span-3 sm:col-start-1">
          <label for="hobby" class="block text-sm font-medium leading-6 text-gray-900">Hobby</label>
          <div class="mt-2">
            <input type="text" name="hobby" id="hobby" autocomplete="hobby" value="<?php echo $hobby ?>"
              class="block w-full rounded-md pl-3 border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
          </div>
        </div>

        <div class="sm:col-span-3">
          <label for="fav_object" class="block text-sm font-medium leading-6 text-gray-900">Favourite Object</label>
          <div class="mt-2">
            <input type="text" name="fav_object" id="fav_object" autocomplete="fav-object"
              value="<?php echo $fav_object ?>"
              class="block w-full rounded-md pl-3 border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
          </div>
        </div>
      </div>
      <div class="mt-6 flex items-center justify-end gap-x-6">
        <button type="button" class="text-sm font-semibold leading-6 text-gray-900">Cancel</button>
        <button type="submit" name="save"
          class="rounded-md pl-3 bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
      </div>
    </div>
  </form>
  <?php
  // Insert data
  if (isset($_POST['save'])) {
    include "connect.php";
    $nrp = $_POST['nrp'];
    $name = $_POST['name'];
    $birth_place = $_POST['birth_place'];
    $birthday = $_POST['birthday'];
    $gender = $_POST['gender'];
    $phone_number = $_POST['phone_number'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $hobby = $_POST['hobby'];
    $fav_object = $_POST['fav_object'];


    $sql = "UPDATE `alphalink` SET 
    nrp = '31236000$nrp',
    nama = '$name',
    jenis_kelamin = '$gender',
    tempat_lahir = '$birth_place',
    tanggal_lahir = '$birthday',
    email = '$email',
    no_hp = '$phone_number',
    alamat = '$address',
    hobi = '$hobby',
    matkul_favorit = '$fav_object'
    WHERE nrp = '31236000$cut_nrp'";

    if ($connectdb->query($sql) == true) {
      echo "Data berhasil diperbaharui<br>";
    } else {
      echo "Error: " . $sql . "<br>" . mysqli_error($connectdb);
    }

    $connectdb->close();
  }
  ?>
</body>

</html>