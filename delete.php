<?php
if (isset($_GET['nrp'])) {
    include "connect.php";

    if (isset($_GET['nrp'])) {
        $nrp = $_GET['nrp'];
        $sql = "DELETE FROM `alphalink` WHERE `nrp` = ?";
        $stmt = $connectdb->prepare($sql);
        $stmt->bind_param("s", $nrp);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            header("Location: studentdata.php");
            exit;
        } else {
            echo "Gagal menghapus data";
        }

        $stmt->close();
    }
}
?>
