<?php

$con= mysqli_connect("localhost","root","","wad_modul4");

if (!$con){
	echo "<script>Database Tidak Terhubung</script>";
}


function registrasi($data){
	global $con;

	$nama = strtolower(stripslashes($data["nama"]));
	$email = mysqli_real_escape_string($con,$data["email"]);
	$no_hp = mysqli_real_escape_string($con,$data["nohp"]);
	$email = mysqli_real_escape_string($con,$data["email"]);
	$password = mysqli_real_escape_string($con,$data["katasandi"]);
	$passwordd = mysqli_real_escape_string($con,$data["sandi"]);

	$result = mysqli_query($con, "SELECT nama FROM user WHERE nama = '$nama'");

	if(mysqli_fetch_assoc($result)){
		echo "<script>
				alert('sudah terdaftar!')
			 </script>";
			 return false;
	}
	if ($password !== $passwordd){
		echo"<script>
				alert('password tidak sesuai!');
			</script>";
			return false;
	}
	$password = password_hash($password,PASSWORD_DEFAULT);

	mysqli_query($con, "INSERT INTO user VALUES('','$nama','$email','$no_hp','$password')");
	return mysqli_affected_rows($con);
    }

?>