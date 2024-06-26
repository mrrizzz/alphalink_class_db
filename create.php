<?php
// session_start();
// include 'connect.php';
// if (isset($_SESSION["login"])) {
//   header('Location: overview.php');
//   exit;
// }

include "connect.php";
// Insert data
if (isset($_POST['submit'])) {
  $nrp = $_POST['nrp'];
  $first_name = $_POST['first-name'];
  $last_name = $_POST['last-name'];
  $birth_place = $_POST['birth_place'];
  $birthday = $_POST['birthday'];
  $gender = $_POST['gender'];
  $phone_number = $_POST['phone_number'];
  $email = $_POST['email'];
  $address = $_POST['address'];
  $hobby = $_POST['hobby'];
  $fav_object = $_POST['fav_object'];
  
  $key = $_COOKIE['users'];                    

  // Update data berdasarkan username yang sesuai
  $sql = "UPDATE `alphalink` SET 
  nrp = '31236000$nrp', 
  nama = '" . $first_name . " " . $last_name . "', 
  jenis_kelamin = '$gender', 
  email = '$email', 
  alamat = '$address', 
  no_hp = '$phone_number', 
  matkul_favorit = '$fav_object', 
  tempat_lahir = '$birth_place', 
  tanggal_lahir = '$birthday', 
  hobi = '$hobby' 
  WHERE username = '$key'";
  
  if ($connectdb->query($sql)) {
    header('Location: overview.php');
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($connectdb);
  }
  

  if ($connectdb->query($sql)) {
    header('Location: overview.php');
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($connectdb);
  }

  $connectdb->close();

}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
  <title>Document</title>
</head>

<body>
  <div class="flex justify-center w-7/12 mt-10">
    <h2 class="text-2xl font-semibold tracking-tight text-black sm:text-4xl">Fill Your Biodata!</h2>
  </div>
  <!-- FORM SECTION START -->
  <form class="w-6/12 mx-auto flex justify-center" method="post">
    <div class="border-b border-gray-900/10 pb-12 w-full">

      <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-7  ">
        <div class="sm:col-span-2 sm:col-start-1">
          <label for="nrp" class="block text-sm font-medium leading-6 text-gray-900">NRP</label>
          <div class="mt-2">
            <input type="text" name="nrp" id="nrp" autocomplete="address-level2"
              class="block w-full rounded-md pl-3 border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
          </div>
        </div>
        <div class="sm:col-span-4 row-start-2">
          <label for="first-name" class="block text-sm font-medium leading-6 text-gray-900">First name</label>
          <div class="mt-2">
            <input type="text" name="first-name" id="first-name" autocomplete="given-name"
              class="block w-full rounded-md pl-3 border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
          </div>
        </div>

        <div class="sm:col-span-3 row-start-2">
          <label for="last-name" class="block text-sm font-medium leading-6 text-gray-900">Last name</label>
          <div class="mt-2">
            <input type="text" name="last-name" id="last-name" autocomplete="family-name"
              class="block w-full rounded-md pl-3 border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
          </div>
        </div>

        <div class="sm:col-span-3 row-start-3">
          <label for="birth_place" class="block text-sm font-medium leading-6 text-gray-900">Birth Place</label>
          <div class="mt-2">
            <div class="mt-2">
              <input type="text" name="birth_place" id="birth_place" autocomplete="family-name"
                class="block w-full rounded-md pl-3 border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
            </div>
          </div>
        </div>

        <div class="sm:col-span-2 row-start-3">
          <label for="birthday" class="block text-sm font-medium leading-6 text-gray-900">Birth Date</label>
          <div class="mt-2">
            <input type="date" id="birthday" name="birthday"
              class="block w-full rounded-md pl-3 border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
              required>
          </div>
        </div>

        <div class="sm:col-span-2 row-start-4">
          <label for="gender" class="block text-sm font-medium leading-6 text-gray-900">Gender</label>
          <div class="mt-2">
            <select id="gender" name="gender" autocomplete="country-name"
              class="block w-full rounded-md pl-3 border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
              <option>Laki laki</option>
              <option>Perempuan</option>
            </select>
          </div>
        </div>

        <div class="sm:col-span-3 row-start-5">
          <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email address</label>
          <div class="mt-2">
            <input id="email" name="email" type="email" autocomplete="email"
              class="block w-full rounded-md pl-3 border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
          </div>
        </div>

        <div class="sm:col-span-3 sm:col-start-1">
          <label for="phone_number" class="block text-sm font-medium leading-6 text-gray-900">Phone Number</label>
          <div class="mt-2">
            <input type="text" name="phone_number" id="phone_number" autocomplete="address-level2"
              class="block w-full rounded-md pl-3 border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
          </div>
        </div>

        <div class="col-span-full row-span-2">
          <label for="address" class="block text-sm font-medium leading-6 text-gray-900">Address</label>
          <div class="mt-2">
            <textarea rows="3" name="address" id="address"
              class="block w-full rounded-md pl-3 border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"></textarea>
          </div>
        </div>

        <div class="sm:col-span-3 sm:col-start-1">
          <label for="hobby" class="block text-sm font-medium leading-6 text-gray-900">Hobby</label>
          <div class="mt-2">
            <input type="text" name="hobby" id="hobby" autocomplete="address-level2"
              class="block w-full rounded-md pl-3 border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
          </div>
        </div>

        <div class="sm:col-span-3">
          <label for="fav_object" class="block text-sm font-medium leading-6 text-gray-900">Favourite Object</label>
          <div class="mt-2">
            <input type="text" name="fav_object" id="fav_object" autocomplete="address-level1"
              class="block w-full rounded-md pl-3 border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
          </div>
        </div>
      </div>
      <div class="mt-6 flex items-center justify-end gap-x-6">
        <a href="login.php"><button type="button"
            class="text-sm font-semibold leading-6 text-gray-900">Cancel</button></a>
        <button type="submit" name="submit"
          class="rounded-md pl-3 bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm ">Create</button>
      </div>
    </div>
  </form>
  <!-- FORM SECTION END -->
</body>

</html>