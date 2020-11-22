<?php

require 'konek.php';
$alert = "";
if(isset($_POST["submit"])){
  if(registrasi($_POST)>0){
    echo "<script> alert ('Berhasil registrasi!')
          </script>";
  }else { 
    echo mysqli_error($con);
  }
}

?>
<!DOCTYPE html>
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
<style>
body{
  background-color: #e7ffff;
}
</style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="index.php">WAD BEAUTY</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarText">
    <ul class="navbar-nav mr-auto"></ul>
    <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="login.php">Login</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="register.php">Register</a>
            </li>
        </ul>
  </div>
    </nav>

    <?php if ($alert) : ?>
    <div class="alert alert-warning" role="alert">
        <?= $alert ?>
    </div>
<?php endif; ?>
<div class="container">

      <div class="row justify-content-center mt-4">
        <div class="col-md-4">
          <div class="card">
            <div class="card-body"><h5 class="text-center">Registrasi</h5>
              <form action="" method="POST">
                <div class="form-group">
                <label for="inputNama">Nama</label>
                  <input type="text" name="nama" class="form-control" placeholder="Masukkan Nama Lengkap" style=”width:700px;”>
                </div>
                <div class="form-group">
                <label for="email">E-mail</label>
                  <input type="text" name="email" class="form-control" placeholder="Masukkan Alamat E-mail">
                </div>
                <div class="form-group">
                <label for="inputnohp">No. Handphone</label>
                  <input type="text" name="nohp" class="form-control" placeholder="Masukkan Nomor Handphone">
                </div>
                <div class="form-group">
                <label for="inputpassword">Kata Sandi</label>
                  <input type="password" name="katasandi" class="form-control" placeholder="Buat Kata Sandi">
                </div>
                <div class="form-group">
                <label for="inputsandi">Konfirmasi Kata Sandi</label>
                  <input type="password" name="sandi" class="form-control" placeholder="Konfirmasi Kata Sandi">
                </div>
                <div class="form-group custom-control custom-checkbox">
                  <input type="checkbox" class="custom-control-input" id="customControlAutosizing">
                  <label class="custom-control-label" for="customControlAutosizing">Remember me</label>
                </div>
                <div class="form-group text-center">
                        <button type="submit" name="submit" class="btn btn-primary">Daftar</button>
                    </div>
                <p>Sudah punya akun? <a href="login.php">Login</a>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    </body>
    </html>