<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <?php
  if (isset($_GET['nrp'])) {
    include "connect.php";

    if (isset($_GET['nrp'])) {
      $nrp = $_GET['nrp'];
      $sql = "DELETE FROM `alphalink` WHERE `nrp` = $nrp";
      $result = $connectdb->query($sql);
    }
  }
  ?>
</body>

</html>