<?php
session_start();
if (isset($_SESSION["login"])){
  header("location:index.php");
  exit;
}
require 'konek.php';
if ( isset($_POST["login"])){

  $email = $_POST["email"];
  $password = $_POST["password"];

  $result = mysqli_query($con,"SELECT * FROM user WHERE email = '$email'");
  if(mysqli_num_rows($result) ===1){
    $row = mysqli_fetch_assoc($result);
    if(password_verify($password,$row["password"])){
      $_SESSION["login"] = true;
      header("location:index.php");
      exit;
    }
  }
  $error = true;
}
?>
<!DOCTYPE html>
<head><link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/a076d05399.js"></script>
<style>
body{
  background-color: #e7ffff;
}
</style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">WAD BEAUTY</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarText">
    <ul class="navbar-nav mr-auto"></ul>
    <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="login.php">Login</a>
            </li>
            &nbsp;
            <li class="nav-item">
                <a class="nav-link" href="register.php">Register</a>
            </li>
        </ul>
  </div>
    </nav>
<div class="container">

      <div class="row justify-content-center mt-4">
        <div class="col-md-4">
          <div class="card">
            <div class="card-body"><h5 class="text-center">Login</h5>
              <form action="" method="POST">
                <div class="form-group">
                <label for="inputNama">E-mail</label>
                  <input type="text" name="email" class="form-control" placeholder="E-mail" style=”width:700px;”>
                </div>
                <div class="form-group">
                <label for="inputpaswd">Kata Sandi</label>
                  <input type="password" name="password" class="form-control" placeholder="Password">
                </div>
                <div class="form-group custom-control custom-checkbox">
                  <input type="checkbox" class="custom-control-input" id="customControlAutosizing" name="check">
                  <label class="custom-control-label" for="customControlAutosizing">Remember me</label>
                </div>
                <div class="form-group text-center">
                        <button type="submit" name="login" class="btn btn-primary">Login</button>
                    </div>
                <p>Belum punya akun? <a href="register.php">Registrasi</a>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    </body>
    </html>