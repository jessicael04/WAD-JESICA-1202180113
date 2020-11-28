<?php
session_destroy();
error_reporting(0);
if (!isset($_SESSION["login"])){
	header("Location: login.php");
}
require 'konek.php';
$current = $_SESSION['email'];
$sql = "SELECT id FROM user WHERE email = '$current'";
$user_id = mysqli_query($con,$sql);
$id_user=0;
while ($user_ids = mysqli_fetch_assoc($user_id)) {
    $id_user = $user_ids['id'];
}
if(isset($_POST['item1'])){
  $sql = "INSERT INTO cart (user_id, nama_barang, harga) VALUES ('$id_user', 'Yuja Niacin', '169000')";
  $insert = mysqli_query($con, $sql);
  if ($insert) {
          header("Refresh:2");
          echo '<div class="alert alert-warning" role="alert">';
          echo 'Berhasil Ditambahkan';
          echo '</div>';
  }
  else{
          header("Refresh:2");
          echo '<div class="alert alert-danger" role="alert">';
          echo 'Gagal Menambahkan';
          echo '</div>';
  }
}
if(isset($_POST['item2'])){
  $sql = "INSERT INTO cart (user_id, nama_barang, harga) VALUES ('$id_user', 'Snail Truecica', '180000')";
  $insert = mysqli_query($con, $sql);
  if ($insert) {
          header("Refresh:2");
          echo '<div class="alert alert-warning" role="alert">';
          echo 'Berhasil Ditambahkan';
          echo '</div>';
  }
  else{
          header("Refresh:2");
          echo '<div class="alert alert-danger" role="alert">';
          echo 'Gagal Menambahkan';
          echo '</div>';
  }
}
if(isset($_POST['item3'])){
  $sql = "INSERT INTO cart (user_id, nama_barang, harga) VALUES ('$id_user', 'Miracle Toner', '108000')";
  $insert = mysqli_query($con, $sql);
  if ($insert) {
          header("Refresh:2");
          echo '<div class="alert alert-warning" role="alert">';
          echo 'Berhasil Ditambahkan';
          echo '</div>';
  }
  else{
          header("Refresh:2");
          echo '<div class="alert alert-danger" role="alert">';
          echo 'Gagal Menambahkan';
          echo '</div>';
  }
}
?>

<!DOCTYPE html>
<head><link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/a076d05399.js"></script>

</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">WAD BEAUTY</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarText">
  
  <ul class="navbar-nav ml-auto">
  <div>
				<a class="fa fa-cart-plus mr-3" href="cart.php" style = "margin-top:13px;"></a>
			</div>
    <li class="nav-item active mr-3">
    <div class="dropdown">
    <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Selamat Datang, <font class="text-primary"><?php echo $_SESSION['nama']?></font>
    </button>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="profile.php">Profile</a>
          <a class="dropdown-item" href="logout.php">Logout</a>
        </div>
    </ul>
    </div>
    </nav>
<div class="container">
    <div class="card">
    <div class="card-header" style= "background: linear-gradient(to right, cyan , green, yellow);">
    <h4><center>WAD Beauty </h4>
    <p><center>Tersedia Skin Care dengan harga murah tapi bukan murahan dan berkualitas </>
    </div>
        <div class="card-group">
            <div class="col-sm-4 border">
                <br>
                <img src="kamar.jpg" class="card-img-top" alt="...">
                <h5 class="card-title">YUJA NIACIN 30 DAYS BLEMISH CARE SERUM</h5>
                <p class="card-text">Produk terbaru dari somebymi yang memiliki manfaat untuk Whitening + blemish care + Anti wrinkle, sangat recomended untuk masalah kulit kusam, kulit kering dan bekas jerawat atau FLEK hitam</p>
                <hr>
                
                <p class="card-text">Rp.169.000</p>
                <br>
                <br>
                <br>
                <div class = "card-footer">
                <button type="submit" name= "item1" class="btn btn-primary" style="width: 18.5rem; margin-top:10px;">Tambahkan ke Keranjang</button>
                </div>
                <br>
                
            </div>
            <div class="col-sm-4 border">
                <br>
                <img src="kamar2.jpg" class="card-img-top" alt="...">
                <h5 class="card-title">SOMEBYMI Snail Truecica Miracle Repair Cream</h5>
                <p class="card-text">Sebagai pelembap, krim ini mampu memberikan kelembapan yang menyeluruh dan tahan lama bagi kulit, sehingga terasa halus, lembap dan kenyal. Mencerahkan, menghambat penuaan seperti keriput dan garis halus, juga menenangkan kulit yang iritasi, dengan kandungan 420,000ppm Snail Truecica</p>
                <hr>
                <p class="card-text">Rp.180.000</p>
                <br>
                <div class = "card-footer">
                <button type="submit" name= "item2" class="btn btn-primary" style="width: 18.5rem; margin-top:10px;">Tambahkan ke Keranjang</button>
                </div>
                <br>
               
            </div>
            <div class="col-sm-4 border">
                <br>
                <img src="kamar3.jpg" class="card-img-top" alt="...">
                <h5 class="card-title">30 DAYS MIRACLE TONER</h5>
                <p class="card-text">Dengan kandungan AHA,BHA dan PHA bekerja secara efektif untuk membuat kulit lebih bersih dan lebih bersinar, mengandung 10.000 ppm ekstrak pohon teh alami yang secara efektif meningkatkan elastisitas dan menutrisi kulit Anda tanpa efek iritasi karena tidak mengandung 20 bahan 500 dan pewarna berbahaya.</p>
                <hr>
                <p class="card-text">Rp.108.000</p>
                <br>
                <div class = "card-footer">
                <button type="submit" name= "item3" class="btn btn-primary" style="width: 18.5rem; margin-top:10px;">Tambahkan ke Keranjang</button>
                </div>
                <br>
            </div>
            </body>