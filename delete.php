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