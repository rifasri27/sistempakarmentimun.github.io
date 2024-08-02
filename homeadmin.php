<?php
include "session.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Sistem Pakar Diagnosa Mentimun</title>
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
    .navbar-inverse .navbar-nav>li>a, .navbar-inverse .navbar-brand {
      color: #ecf0f1;
    }
    .navbar-inverse .navbar-nav>li>a:hover, .navbar-inverse .navbar-nav>li>a:focus {
      background-color: #34495e;
      color: #fff;
    }
    .menu-item {
      margin-top: 10px;
    }
    .menu-item img {
      max-width: 100%;
      height: auto;
    }
    .menu-item h3 {
      font-size: 24px;
      margin-top: 10px;
    }
    h2 {
      font-size: 32px;
      font-weight: bold;
      margin-bottom: 20px;
    }
    p {
      font-size: 18px;
    }
    .container-fluid {
      padding-top: 5px;
    }
    footer {
      background-color: #2c3e50;
      color: #ecf0f1;
      padding: 10px 0;
      position: fixed;
      bottom: 0;
      width: 100%;
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
        <li class="active"><a href="homeadmin.php">Beranda</a></li>
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
      <center><h2>Sistem Pakar Diagnosa Penyakit Tanaman Mentimun</h2></center><br>
      <p>Selamat datang, <?php echo $login_session; ?>. Silahkan pilih menu yang diinginkan:</p>
      <div class="row">
        <div class="col-sm-4 menu-item text-center">
          <a href="penyakit.php">
            <img src="penyakit.jpg" alt="Penyakit" class="img-responsive img-circle center-block">
            <h3>Penyakit</h3>
          </a>
        </div>
        <div class="col-sm-4 menu-item text-center">
          <a href="gejala.php">
            <img src="gejala.jpg" alt="Gejala" class="img-responsive img-circle center-block">
            <h3>Gejala</h3>
          </a>
        </div>
        <div class="col-sm-4 menu-item text-center">
          <a href="basispengetahuan.php">
            <img src="keputusan.jpg" alt="Keputusan" class="img-responsive img-circle center-block">
            <h3>Keputusan</h3>
          </a>
        </div>
      </div>
    </div>
  </div>
</div>

<footer class="container-fluid text-center">
  <p>© 2024 Sistem Pakar Diagnosa Penyakit Tanaman Mentimun</p>
</footer>

</body>
</html>
