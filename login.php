<?php
session_start();
include 'connect.php';
if (isset($_SESSION["login"])) {
  header('Location: overview.php');
  exit;
}

if (isset($_POST["login"])) {
  $username = $_POST["username"];
  $password = $_POST["password"];


  $result = $connectdb->query("SELECT username, password FROM alphalink WHERE username = '$username'");

  if ($row = $result->fetch_assoc()) {
    if (password_verify($password, $row["password"])) {
      $_SESSION["login"] = true;
      header('Location: overview.php');
      exit;
    }
  }

  $error = true;
}

?>
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
  <div class="rounded grid grid-cols-8 w-7/12 mx-auto drop-shadow" style="margin-top: 10vh;">
    <div class="col-span-3 h-full">
      <img src="img/llogin.jpeg" alt="">
    </div>
    <div class="flex flex-col justify-between p-12 col-span-5 bg-white h-full">
      <div class="mx-auto h-full">
        <div class="flex flex-col justify-between h-full">
          <div>
            <img src="img/logofix.png" width="350px" alt="" class="text-center">
            <form class="mx-auto mt-5 w-10/12 h-full" action="" method="post">
              <?php
              if (!isset($error)) {
                echo ' <div class="mt-8 ">';
                echo ' <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="username">Username </label>';
                echo ' <div class="flex"><input';
                echo ' class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"';
                echo ' placeholder="username" type="username" required name="username"></div>';
                echo ' </div>';

                echo ' <div class="mt-5 ">';
                echo ' <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="password">Password </label>';
                echo ' <div class="flex"><input';
                echo ' class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"';
                echo ' placeholder="password" type="password" required name="password"></div>';
                echo ' </div>';
              } else {
                echo '<div class="mt-5">';
                echo '<label for="error" class="block mb-2 text-sm font-medium text-red-700 dark:text-red-500">';
                echo 'Username </label>';
                echo '<input type="username" name="username" required id="error"';
                echo 'class="bg-red-50 border border-red-500  placeholder-red-700 placeholder-italic-custom text-sm rounded-lg focus:ring-red-500 dark:bg-gray-700 focus:border-red-500 block w-full p-2.5 dark:text-red-500 dark:placeholder-red-500 dark:border-red-500"';
                echo 'placeholder="wrong input">';
                echo '</div>';

                echo '<div class="mt-5">';
                echo '<label for="error" class="block mb-2 text-sm font-medium text-red-700 dark:text-red-500">';
                echo 'Password</label>';
                echo '<input type="password" name="password" required id="error"';
                echo 'class="bg-red-50 border border-red-500 placeholder-red-700 placeholder-italic-custom text-sm rounded-lg focus:ring-red-500 dark:bg-gray-700 focus:border-red-500 block w-full p-2.5 dark:text-red-500 dark:placeholder-red-500 dark:border-red-500"';
                echo 'placeholder="wrong input">';
                echo '<p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium italic">wrong username or password!</span></p>';
                echo '</div>';
              }
              ?>
              <div class="mt-7">
                <button type="submit" name="login"
                  class="text-white w-full bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Login</button>
              </div>
          </div>
          </form>
          <div class="w-10/12 mx-auto">
            <div class="flex justify-between ">
              <p class="text-xs">Dont have account?</p>
              <a class="text-xs underline" href="create.php">Create account!</a>
            </div>
          </div>
        </div>
        <!-- <h1 class="text-2xl font-bold leading-9 bg-primary tracking-tight text-center">USER LOGIN</h1> -->


      </div>
    </div>
  </div>
</body>


</html>