<?php

session_start();
if (! isset($_SESSION['login'])) {
	header('location:login.php');
	exit;
}
require 'konek.php';
if (isset($_POST['update'])) {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $no_hp = $_POST['nohp'];
    $password = password_hash($_POST['katasandi'],PASSWORD_DEFAULT);
    
    if ($_POST['sandi'] == $_POST['katasandi']){
        try {
            $sql = "UPDATE user SET nama='$nama', email='$email', nohp='$no_hp', katasandi='$password' WHERE email='$email'";
            $stmt = $con->prepare($sql);
            $stmt->execute();
            header('Refresh:2');
            echo '<div class="alert alert-warning" role="alert">';
            echo 'Berhasil di update!';
            echo '</div>';
        } catch (PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }
        $con = null;
    }
    else{
            header('Refresh:2');
            echo '<div class="alert alert-danger" role="alert">';
            echo 'Gagal di update!';
            echo '</div>';
    }
    }
else{
    if(isset($_POST['cancel'])){
        header('location: index.php');
    }
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>MODUL4 LOGIN AND REGISTRASI</title>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
	<!-- <link rel="stylesheet" type="text/css" href="style.css"> -->
	<script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/a076d05399.js"></script>
	
</head>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
	
	<div class="container-fluid">
		<div class="navbar-header">
			<a class="navbar-brand" href="index.php">WAD Beauty</a>
		</div>
		<div class="nav navbar-nav">
			<div>
				<a class="fa fa-cart-plus mr-3" href="cart.php"></a>
			</div>
			<p class="text-primary"> Selamat datang,  </p>
			<li class="dropdown-toggle text-primary" data-toggle="dropdown" data-display="static" aria-haspopup="true"> 
			</li>
			<div class="dropdown-menu dropdown-menu-lg-right">
				<li class="dropdown-item"><a class="nav-link" href="profile.php">Profile</li></a>
				<li class="dropdown-item"><a class="nav-link" href="logout.php">Logout</li></a>
			</div>
		</div>	
	</div>
</nav>
<body>
	<div class="container shadow p-3 mb-5 bg-white rounded mt-5">
		<form class="form-group" action="" method="POST">
			<h4 class="text-center">PROFILE</h4>
			<hr>
			<div class="col-md-10 ml-4">
				<label for="email">E-mail</label>
				<div class="col-sm-10">
                <input type="text" class="form-control-plaintext" name="email" readonly>
                </div>
				<label for="nama">Nama</label>
				<input class="form-control" type="text" name="nama" id="nama" required="1">
				<label for="nohp">No. Handphone</label>
				<input class="form-control" type="text" name="nohp" id="nohp" required="1" >
				<label for="katasandi">Katasandi</label>
				<input class="form-control" type="password" name="katasandi" id="katasandi">
				<label for="sandi">Konfirmasi Kata sandi</label>
				<input class="form-control" type="password" name="sandi" id="nama">
				<br>
				<label for="room">Warna Navbar</label>
				<div class="col-sm-10">
                <select id="select-color" name="warna_nav">
                <option value="#f8f9fa">Light</option>
                <option value="#343a40">Dark</option>
                </select>
                </div>
			</div>
			<br>
			<div class="col-md-10 text-center ml-4">
			<button type="submit" class="btn btn-primary btn-block" name="update">Submit</button>
				<button type="submit" class="btn btn-light btn-block" name="cancel">Cancel</button>
				</div>
		</form>
	</body>
	</html>