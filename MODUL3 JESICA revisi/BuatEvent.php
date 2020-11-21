<?php
require 'config.php';
if(isset($_POST['submit'])){
	$name = $_POST['nama'];
	$deskripsi = $_POST['deskripsi'];
	$gambar = $_POST['gambar'];
	$kategori = $_POST['kategori'];
	$tanggal = $_POST['date'];
	$jmulai = $_POST['inputJamMulai'];
	$jakhir = $_POST['inputJamBerakhir'];
	$tempat = $_POST['tempat'];
	$harga = $_POST['harga'];
	$benefit = $_POST['benefit'];
//UPLOD GAMBAR
	$rand = rand();
	$tipefile =  array('png','jpg','jpeg','gif');
	$filename = $_FILES['gambar']['name'];
	$ukuran = $_FILES['gambar']['size'];
	$tmp_file = $_FILES['gambar']['tmp_name'];
	$ext = pathinfo($filename, PATHINFO_EXTENSION);

//PROSES SIMPAN 
	if(!in_array($ext,$tipefile) ) {
		header("location:home.php?alert=gagal");
	}else{
		if($ukuran < 1543231){
			$ran = $rand.'_'.$filename;
			move_uploaded_file($tmp_file, 'file/'.$rand.'_'.$filename); 
			$benefits = explode(",", $list['benefit']);
			mysqli_query($conn, "INSERT INTO event_table (nama, deskripsi, gambar, kategori, tanggal, mulai, berakhir, tempat, harga, benefit) value ('$name', '$deskripsi', '$ran', '$kategori', '$tanggal', '$jmulai', '$jakhir', '$tempat', '$harga', '$benefits')");
			header('location: home.php?status=success');
		}else{
			header('location: home.php?status=failed');
		}
	}
}
?> 
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</head>
<body> 
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <button class="navbar-toggler navbar-toggler-center" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
  <a class="navbar-brand" href="#">EAD EVENTS</a>
    <div class="navbar-nav ml-auto">
      <a class="nav-link active mr-3" href="home.php">Home<span class="sr-only">(current)</span></a>
      <a class="btn btn-outline-light" href="">Buat Event</a>
    </div>
    </div>
    </nav>
    <h3 style="color:#2980B9">Buat Event<h3>
    <br>
    
    <div class="card-deck">
    <div class="card">
    <div class="card-header bg-danger"></div>
    <div class="card-body">
    <form action="home.php" method="POST">

    <label for="inputnama">Name</label>
        <input type="name" class="form-control" style="auto" name="nama"><br>
    <label for="inputdeskripsi">Deskripsi</label>
        <textarea type="deskripsi" class="form-control" style="auto" name="deskripsi"></textarea><br>
    <label for="upload">Upload Gambar</label>
    <div class="custom-file">
        <input type="file" class="custom-file-input" id="customfile" name="gambar">
        <label class="custom-file-label" for="customFile"></label>
    </div>
    <br>
    <br>
    <label for="upload">Kategori</label>
    <br>
    <div class="form-check form-check-inline">
    <input class="form-check-input" type="radio" name="kategori" value="option1" for="kategori1">Online</br>
    </div>
    <div class="form-check form-check-inline">
    <input class="form-check-input" type="radio" name="kategori" value="option2" for="kategori2">Offline</br>
    </div>
    </div>
    </div>
    <div class="col col-md-6">
    <div class="card">
        <div class="card-header bg-primary"></div>
        <div class="card-text">
							<div class="form-group">
        <label for="checkin">Tanggal</label>
        <input type="date" name="date"  class="form-control">
        <br>
        <div class="form-row">
        <div class="col">
        <label for="inputJamMulai">Jam Mulai</label>
            <input type="time" name="inputJamMulai"class="form-control" placeholder="">
        </div>
        <div class="col">
        <label for="inputJamBerakhir">Jam Berakhir</label>
            <input type="time" name="inputJamBerakhir"class="form-control" placeholder="">
        </div>
        </div>
        
        <br>

        <label for="tempat">Tempat</label>
        <input type="text" class="form-control" name="tempat" style="auto"></br>

        <label for="harga">Harga</label>
        <input type="text" class="form-control" name="harga" style="auto"></br>

        <label for="inputbenefit">Benefit</label><br>
        <div class="form-check form-check-inline">
        <input class ="form-check-input" type="checkbox" name="benefit" value="option1" for="benefit1">Snacks</br>
        </div>
        <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox" name="benefit" value="option2" for="benefit2">Sertifikat</br>
        </div>
        <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox" name="benefit" value="option3" for="benefit3">Souvenir</br>
        </div>
        <div class="card-body text-right">
        <button type="submit" name="submit" id="submit" class="btn btn-primary mr-2">Submit</button>
									<button type="reset" name="reset" class="btn btn-danger">Cancel</button>
        </div>
        </div>
        </div>
        </div>
        </form>
        <script>
			$(".custom-file-input").on("change", function() {
				var fileName = $(this).val().split("\\").pop();
				$(this).siblings(".custom-file-label").addClass("selected").html(fileName);
			});

			function home() {
				window.location = "home.php";
			}
		</script>
        </body>
 