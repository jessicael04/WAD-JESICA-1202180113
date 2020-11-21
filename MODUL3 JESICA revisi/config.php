<?php
    $dbhost = "localhost";
    $dbuser = "root";
    $dbname = "wad_modul3_jesica";
    $dbpass = "";

    $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

    if (!$conn){
        echo "<script>
                alert('Failed Connect into Database');
            </script>";
    }
