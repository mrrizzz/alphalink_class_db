<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>LOGIN
  </title>
  <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
  <link rel="stylesheet" href="styles.css">

</head>


<body class="bg-gray-200">
  <div class="grid grid-cols-8 w-7/12 mx-auto drop-shadow" style="margin-top: 10vh;">
    <div class="col-span-3 h-full">
      <img src="img/llogin.jpeg" alt="">
    </div>
    <div class="flex flex-col justify-between p-12 col-span-5 bg-white h-full">
      <div class="flex flex-col justify-between h-full">
        <div>
          <form class="mx-auto" action="" method="post">
            <h1 class="text-3xl font-bold leading-9 tracking-tight">CREATE ACCOUNT</h1>
            <div class="ml-10 w-4/5 mt-12">
              <div class="mt-5 mx-auto">
                <label class="text-base" for="username">Username :</label>
                <div class="flex"><input class="w-10/12 pl-3 justify-center mt-2 h-9 ring-black ring-1 rounded-md "
                    placeholder="Input username" type="username" required name="username"></div>
              </div>
              <div class="mt-5 mx-auto">
                <label class="text-base" for="password">Password :</label>
                <div class="flex"><input class="w-10/12 pl-3 justify-center mt-2 h-9 ring-black ring-1 rounded-md "
                    placeholder="Input password" type="password" required name="password"></div>
              </div>
              <div class="mt-5 mx-auto">
                <label class="text-base" for="password2">Confirm Password :</label>
                <div class="flex"><input class="w-10/12 pl-3 justify-center mt-2 h-9 ring-black ring-1 rounded-md "
                    placeholder="Confirm password" type="password" required name="password2"></div>
              </div>
              <div class="mt-10">
                <button type="submit" name="signup"
                  class="w-10/12 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Sign
                  Up</button>
              </div>
            </div>
          </form>
        </div>
        <div class="mx-10">
          <div class="flex justify-between w-10/12 pr-3">
            <p class="text-xs">Already have an account?</p>
            <a class="text-xs underline" href="login.php">Sign in</a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php
  include 'connect.php';
  if (isset($_POST['signup'])) {
    if (konfirmasi_password($_POST)) {
      header('Location: login.php');
    } else
      echo $connectdb->error;
  }


  function konfirmasi_password($data)
  {
    global $connectdb;

    $users = $connectdb->real_escape_string($data["username"]);
    $pw = $connectdb->real_escape_string($data["password"]);
    $pw2 = $connectdb->real_escape_string($data["password2"]);

    $check_unique_user = $connectdb->query("SELECT username FROM alphalink  WHERE username = '$users'");
    if ($check_unique_user->fetch_assoc()) {
      echo "<script> alert ('username sudah terdaftar')</script>";
      return false;
    }

    if ($pw != $pw2) {
      echo "<script> alert ('konfirmasi password tidak sesuai')</script>";
      return false;
    }

    $pw = password_hash($pw, PASSWORD_DEFAULT);
    $sql = "INSERT INTO alphalink (`username`, `password`) VALUE ('$users', '$pw')";
    $connectdb->query($sql);
    return $connectdb->affected_rows;

  }

  ?>
</body>


</html>