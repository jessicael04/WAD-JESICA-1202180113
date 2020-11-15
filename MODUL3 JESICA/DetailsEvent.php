<?php
require 'config.php';

$id = $_GET['id'];

$result= mysqli_query($conn, "SELECT * FROM event_table WHERE id=$id");
$data = mysqli_fetch_array($result);
$benefits = explode(",", $data['benefit']);

$cek = mysqli_num_rows($result);
//MENERIMA DATA
if (isset($_POST['simpan'])) {
	$id = $_POST['id'];
	$name = $_POST['name'];
	$deskripsi = $_POST['deskripsi'];
	$kategori = $_POST['kategori'];
	$tanggal = $_POST['tanggal'];
	$jmulai = $_POST['inputJamMulai'];
	$jakhir = $_POST['inputJamBerakhir'];
	$tempat = $_POST['tempat'];
	$harga = $_POST['harga'];
	$benefit = $_POST['benefit'];
	$filename = $_FILES['gambar']['name'];
// MENERIMA GAMBAR
	if($filename != ""){
		$rand = rand();
		$tipefile =  array('png','jpg','jpeg','gif');
		$filename = $_FILES['gambar']['name'];
		$ukuran = $_FILES['gambar']['size'];
		$tmp_file = $_FILES['gambar']['tmp_name'];
		$ext = pathinfo($filename, PATHINFO_EXTENSION);
		if(in_array($ext,$tipefile) == true ) {
			$rann = $rand.'_'.$filename;
			move_uploaded_file($tmp_file, 'file/'.$rand.'_'.$filename);
			$benefit = implode(",", $_POST['benefit']);
					//QUERY UNTUK UPDATE
			$equery = "UPDATE event_table SET 
			name='$name',
			deskripsi='$deskripsi',
			gambar='$rann',
			kategori='$kategori',
			tanggal='$tanggal',
			mulai='$jmulai',
			berakhir='$jakhir',
			tempat='$tempat',
			harga='$harga',
			benefit='$benefit' WHERE id=$id";
			$query = mysqli_query($con, $equery);
			echo "
			<script>
			alert('data berhasil diperbarui');
			document.location.href = 'index.php';
			</script>
			";
		}else{
			echo "
			<script>
			alert('data gagal diperbarui');
			document.location.href = 'index.php';
			</script>
			";
		}
// UPDATE JIKA GAMBAR TIDAK DIMASUKAN
	}else{
		$benefits = implode(",", $_POST['benefit']);
		$esql = "UPDATE event_table SET 
		name='$name',
		deskripsi='$deskripsi',
		kategori='$kategori',
		tanggal='$tanggal',
		mulai='$jmulai',
		berakhir='$jakhir',
		tempat='$tempat',
		harga='$harga',
		benefit='$benefit' WHERE id=$id";
		$query = mysqli_query($conn, $esql);
		echo "
		<script>
		alert('data berhasil diperbarui');
		document.location.href = 'index.php';
		</script>
		";
	}	
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
  <body>
  <h3 class="text-primary text-center mt-4">Detail Event!</h3>
  
  <div class="container">
  <div class="row justify-content-center">
  <div class="col-6">
  <div class="card text-auto shadow mb-5 bg-white" style="width: 34rem; height: 45rem;">
  <img class="card-img-top" src="kamar.jpg">
  <div class="card-body info">
  <h5 class="card-title">Open Mind ESD Laboratory</h5>
  <h6 class><b>Deskripsi</b></p>
  
  <div class="row">
  <div class="col-5">
  <h6 class><b>Informasi Event</b></h6>
  <p> <span class="fa fa-calendar" style="color: orange;"> </span> </p>
  <p> <span class="fa fa-map-marker" style="color: orange;"> </span> </p> 
  <p> <span class="fa fa-clock-o" style="color: orange;"></p>
  <p><b>Kategori:</b></p>
  <p><b>HTM Rp.</b></p>
  </div>
  <div class ="col-2">
  <p><b>Benefit</b></p>
  </div>
  <div class="card-text text-center mb-3">
	<button class="btn btn-primary" type="button" data-toggle="modal" data-target="#modaledit">Edit</button>							
	<a class="btn btn-danger" href="hapus.php?id=<?=$data['id'];?>" onclick="return confirm('Yakin ingin menghapus data?');">Delete</a>
	</div>
  </div>
  </div>
  </div>
  </div>
  </div>

  <div class="modal" id="modaledit" tabindex="-1">
	<div class="modal-dialog mw-100 w-75">
	<div class="modal-content">
	<form action="" method="POST" enctype="multipart/form-data">
	<div class="modal-header">
	<h5 class="modal-title">EDIT DATA EVENT</h5>
	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
	<span aria-hidden="true">&times;</span>
	</button>
	</div>
	<div class="modal-body">
	<div class="row">
	<div class="col-md-6 ml-3">
	<div class="card">
	<div class="card-header bg-danger"></div>
	<div class="card-text">
	<input type="hidden" name="id" value="<?= $data['id'] ?>" />
	<div class="form-group">
	<label for ="nama" class="col mt-2">Name</label>
	<div class="col-12">
	<input type="text" name="name" class="form-control" placeholder="Name Event" value="<?= $data['name']?>">
	</div>
	<label for ="nama" class="col mt-2">Deskripsi</label>
	<div class="col-12">
	<textarea name="deskripsi" class="form-control" rows="4" placeholder="Deskripsi Event"><?= $data['deskripsi']?></textarea>
	</div>
	<label for="upload" class="col mt-2">Upload Gambar</label>
	<div class="custom-file">
	<input type="file" class="custom-file-input" name="gambar" id="customfile">
	<label class="custom-file-label ml-3 mr-3" for="customfile">
	<?= $data['gambar']?></label>
	</div>
	<label for="Kategori" class="col mt-4 ">Kategori</label>
	<div class="form-check form-check-inline ml-3 mb-1">
	<input class="form-check-input" type="radio" name="kategori" value="Online" <?php if($data['kategori']=='Online'){ echo 'checked';} ?> id="online">
	<label class="form-check-label" for="online">Online</label>
	</div>
	<div class="form-check form-check-inline">
	<input class="form-check-input" type="radio" name="kategori" value="Offline" <?php if($data['kategori']=='Offline'){ echo 'checked';} ?> id="offline">
	<label class="form-check-label" for="offline">Offline</label>
	</div>
	</div>
	</div>
	</div>
	</div>
	<div class="col-md-5">
	<div class="card">
	<div class="card-header bg-primary"></div>
	<div class="card-text">
	<div class="form-group">
	<label for ="tanggal" class="col mt-2">Tanggal</label>
	<div class="col-12">
	<input type="date" name="tanggal" class="form-control" value="<?= $data['tanggal']?>">
	</div>
	<div class="form-inline">
	<label for ="jmulai" class="ml-3 mt-2">Jam Mulai</label>
	<label for ="jakhir" class="col mt-2 ml-2">Jam Berakhir</label>
	</div>
	<div class="form-inline">
	<input type="time" name="jmulai" class="form-control col ml-3 mt-2" value="<?= $data['mulai']?>">
	<input type="time" name="jakhir" class="form-control col ml-2 mt-2 mr-3"
	value="<?= $data['berakhir']?>">
	</div>
	<label for ="tempat" class="col mt-2">Tempat</label>
	<div class="col-12">
	<input type="text" name="tempat" class="form-control" placeholder="Tempat" value="<?= $data['tempat']?>">
	</div>
	<label for ="harga" class="col mt-2">Harga</label>
	<div class="col-12">
	<input type="text" name="harga" class="form-control" value="<?= $data['harga']?>">
	</div>
	<label for="benefit" class="col mt-2">Benefit</label>
	<div class="form-check form-check-inline ml-3 mb-3">
	<input class="form-check-input" type="checkbox" name="benefit[]" value="Snacks" <?php if(in_array("Snacks",$benefits)) echo "checked";?>id="Snacks">
	<label class="form-check-label" for="snacks">Snacks</label>
	</div>
	<div class="form-check form-check-inline">
	<input class="form-check-input" type="checkbox" name="benefit[]" value="Sertifikat" <?php if(in_array("Sertifikat",$benefits)) echo "checked";?> id="Sertifikat">
	<label class="form-check-label" for="sertifikat">Sertifikat</label>
	</div>
	<div class="form-check form-check-inline">
	<input class="form-check-input" type="checkbox" name="benefit[]" value="Souvenir" <?php if(in_array("Souvenir",$benefits)) echo "checked";?> id="Souvenir">
	<label class="form-check-label" for="souvenir">Souvenir</label>
	</div>
	</div>
	</div>
	</div>
	</div>
	</div>
	</div>
	<div class="modal-footer">
	<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
	<input type="submit" class="btn btn-primary" name="simpan" value="Save Changes">
	</div>
	</div>
	</div>
	</div>
	</form>
		
</body>
