<?php
include('koneksi.php');

if(isset($_SESSION['login_user'])){
  header("location: about.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Sistem Pakar</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="js/validator.js"></script>
  <style>
    body {
      background-color: #f8f9fa;
    }
    .navbar-inverse {
      background-color: #006400;
      border-color: #004d00;
    }
    .navbar-inverse .navbar-brand, 
    .navbar-inverse .navbar-nav > li > a {
      color: #fff;
    }
    .navbar-inverse .navbar-nav > li > a:hover,
    .navbar-inverse .navbar-nav > li > a:focus {
      background-color: #004d00;
      color: #fff;
    }
    .btn-dark-green {
      background-color: #006400;
      color: white;
      border-color: #004d00;
    }
    .btn-dark-green:hover,
    .btn-dark-green:focus {
      background-color: #004d00;
      border-color: #003300;
    }
    .container-fluid {
      padding-top: 20px;
    }
    .form-group label {
      color: #006400;
    }
    .form-control {
      border-color: #006400;
    }
    .form-control:focus {
      border-color: #004d00;
      box-shadow: none;
    }
  </style>
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li><a href="index.php">Beranda</a></li>
        <li><a href="penyakit.php">Penyakit</a></li>
        <li><a href="gejala.php">Gejala</a></li>
        <li><a href="basispengetahuan.php">Keputusan</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="container-fluid text-center">    
  <div class="row content">
    <div class="col-sm-12 text-left">
      <h2 class="text-center">INPUT PENYAKIT</h2>
      <form class="form-horizontal" method="post" data-toggle="validator" role="form" action="ainputpenyakit.php">
        <div class="form-group has-feedback">
          <label class="control-label col-sm-2" for="nama">ID Penyakit:</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" required name="idpenyakit" data-error="Isi kolom dengan benar">
            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
            <div class="help-block with-errors" role="alert"></div>
          </div>
        </div>
        <div class="form-group has-feedback">
          <label class="control-label col-sm-2" for="nama">Nama Penyakit:</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" required name="namapenyakit" data-error="Isi kolom dengan benar">
            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
            <div class="help-block with-errors" role="alert"></div>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-2" for="alamat">Pengendalian:</label>
          <div class="col-sm-10">
            <textarea rows="8" class="form-control" name="pengendalian"></textarea>
          </div>
        </div>
        <button type="submit" name="submit" class="btn btn-dark-green">Simpan</button><br>
        <?php
          if(isset($_POST['submit'])){
            $idpenyakit = $_POST['idpenyakit'];
            $namapenyakit = $_POST['namapenyakit'];
            $pengendalian = $_POST['pengendalian'];

            $query = "INSERT INTO penyakit SET idpenyakit='$idpenyakit', namapenyakit='$namapenyakit', pengendalian='$pengendalian'";
            $result = mysqli_query($konek_db, $query);
            if($result){
              echo '<script language="javascript">';
              echo 'alert("Data Berhasil disimpan")';
              echo '</script>';
            }
            header("location:penyakit.php");
          }
        ?>
      </form><br>
    </div>
  </div>
</div>

<footer class="container-fluid text-center">
  <p></p>
</footer>

</body>
</html>
