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
  <style>
    body {
      background-color: #4CAF50; /* Hijau */
      color: #fff; /* Warna teks putih */
    }
    .navbar-inverse {
      background-color: #2c3e50;
      border-color: #2c3e50;
    }
    .navbar-inverse .navbar-nav > li > a {
      color: #ecf0f1;
    }
    .navbar-inverse .navbar-brand {
      color: #ecf0f1;
    }
    .table-grey {
      background-color: #808080; /* Warna abu-abu */
      color: #fff; /* Warna teks putih */
    }
    .table-grey th, .table-grey td {
      color: #fff; /* Warna teks putih */
      text-align: center; /* Center align text */
      border: 1px solid #fff;
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
      <a class="navbar-brand" href="#">Diagnosa Mentimun</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li><a href="homeadmin.php">Beranda</a></li>
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
    <div class="col-sm-8 col-sm-offset-2 text-left"> 
      <h2 class="text-center">DETAIL PENYAKIT</h2>
      <div class="form-group" method="POST">
        <br><label class="control-label col-sm-2">ID :</label>
        <div class="col-sm-10">
          <?php
            $tampil = "SELECT * FROM penyakit WHERE idpenyakit='".$_GET['id']."'";
            $sql = mysqli_query($konek_db, $tampil);
            while($data = mysqli_fetch_array($sql)) {
              echo "<input type='text' class='form-control' id='idpenyakit' readonly value='".$data['idpenyakit']."'><br>";
            }
          ?>
        </div>
      </div>
      <div class="form-group" method="POST">
        <br><label class="control-label col-sm-2">NAMA :</label>
        <div class="col-sm-10">
          <?php
            $tampil = "SELECT * FROM penyakit WHERE idpenyakit='".$_GET['id']."'";
            $sql = mysqli_query($konek_db, $tampil);
            while($data = mysqli_fetch_array($sql)) {
              echo "<input type='text' class='form-control' id='namapenyakit' readonly value='".$data['namapenyakit']."'><br>";
            }
          ?>
        </div>
      </div>
      <div class="form-group" method="POST">
        <br><label class="control-label col-sm-2">GEJALA :</label>
        <div class="col-sm-10">
          <?php
            $tampil = "SELECT * FROM penyakit p, basispengetahuan b WHERE p.idpenyakit='".$_GET['id']."' AND p.namapenyakit=b.namapenyakit";
            $sql = mysqli_query($konek_db, $tampil);
            while($data = mysqli_fetch_array($sql)) {
              echo "<input type='text' class='form-control' id='gejala' readonly value='".$data['gejala']."'><br>";
            }
          ?>
        </div>
      </div>
      <div class="form-group" method="POST">
        <br><label class="control-label col-sm-2">PENGENDALIAN :</label>
        <div class="col-sm-10">
          <?php
            $tampil = "SELECT * FROM penyakit WHERE idpenyakit='".$_GET['id']."'";
            $sql = mysqli_query($konek_db, $tampil);
            while($data = mysqli_fetch_array($sql)) {
              echo "<textarea rows='8' class='form-control' id='pengendalian' readonly>".$data['pengendalian']."</textarea><br>";
            }
          ?>
        </div>  
      </div>
    </div>
  </div>
</div>

<footer class="container-fluid text-center">
  <p><p>© 2024 Sistem Pakar Diagnosa Penyakit Tanaman Mentimun</p></p>
</footer>

<script>
$(document).ready(function(){
    $("#myBtn").click(function(){
        $("#myModal").modal();
    });
});
</script>

</body>
</html>
