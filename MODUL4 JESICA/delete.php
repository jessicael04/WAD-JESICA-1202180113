<?php
    require 'konek.php';
    $sql = "DELETE FROM cart WHERE id='" . $_GET['name'] . "'";
    if (mysqli_query($con, $sql)) {
        echo "Record deleted successfully";
        header('location:cart.php');
    }
    else {
        echo "Error";
    }
    mysqli_close($con);
?>