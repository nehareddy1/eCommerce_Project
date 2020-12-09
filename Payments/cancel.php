<?php
    session_start();
    $_SESSION['paymentStatus'] = "0";
    header("Location:../html/BuyPropertiesAdmin.php");
?>