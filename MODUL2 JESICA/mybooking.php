<!DOCTYPE html>
<?php 
function checkout(){
  $checkin = $_GET['date'];
  $durasi = (string) $_GET['duration'];
  $checkout = date('d/m/yy', strtotime($checkin . '+' . $durasi . 'days'));
  return $checkout;
}

function totalPrice(){
  $durasi = $_GET['duration'];
  $room = $_GET["room_type"];
  $service= array();
  if(!empty($_GET['service'])){
    foreach($_GET['service'] as $selected){
      array_push($service, $selected);
    }
  }
  if ($room == "Standard"){
    $totalprice = 90 * $durasi;
  } else if ($room == "Superior"){
    $totalprice = 150 * $durasi;
  } else if ($room == "Luxury"){
    $totalprice = 200 * $durasi;
  }
  if (!empty($service)){
    for($i = 0; $i < count($service); $i++){
      if($service[$i] == "Room Service"){
        $totalprice = $totalprice + 20;
      }else if ($service[$i] == "Breakfast"){
        $totalprice = $totalprice + 10;
      }
    }
  } 
  return $totalprice;
}
?>
<html>
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  <title>mybooking</title>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-primary">
  <button class="navbar-toggler navbar-toggler-center" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav mx-auto">
      <a class="nav-link active" href="home.php">Home<span class="sr-only">(current)</span></a>
      <a class="nav-link" href="booking.php">Booking</a>
    </div>
    </div>
    </nav>
<table class="table">
  <thead>
    <tr>
      <th scope="col">Booking Number</th>
      <th scope="col">Name</th>
      <th scope="col">Check-in</th>
      <th scope="col">Check-out</th>
      <th scope="col">Room Type</th>
      <th scope="col">Phone Number</th>
      <th scope="col">Service</th>
      <th scope="col">Total Price</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <th> <?php echo rand() ?></th>
        <td> <?php echo $_GET['name']?></td>
        <td> <?php echo $_GET['date']?></td>
        <td> <?php echo checkout() ?></td>
        <td> <?php echo $_GET['room_type']?></td>
        <td> <?php echo $_GET['phone']?></td>
        <td> <?php if (!empty($_GET['service'])){
          foreach ($_GET['service'] as $selected){
            echo "<ul><li>" . $selected . "</li></ul>";
          }
          } else {
            echo "no services";
          } ?> </td>
        <td> <?php echo totalPrice() ?></td>
    </tr>
    </tbody>
    </table>
    </html>