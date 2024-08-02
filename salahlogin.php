<?php
include('koneksi.php');
 
if(isset($_SESSION['login_user'])){
header("location: about.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Sistem Pakar Diagnosa Penyakit Mentimun</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
    /* Custom CSS untuk override Bootstrap */
    .navbar {
      margin-bottom: 0;
      border-radius: 0;
    }

    .navbar-inverse {
      background-color: #28a745;
      border-color: #28a745;
    }

    .navbar-inverse .navbar-brand,
    .navbar-inverse .navbar-nav > li > a {
      color: #ffffff;
    }

    .navbar-inverse .navbar-nav > li > a:hover,
    .navbar-inverse .navbar-brand:hover {
      color: #000000;
    }

    .container-fluid {
      padding: 0;
    }

    .row.content {
      height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      background: linear-gradient(to right, #28a745, #74c69d);
      color: #fff;
    }

    .panel {
      background-color: rgba(255, 255, 255, 0.8);
      border: none;
    }

    .panel-heading {
      background-color: #28a745;
      color: #fff;
      border: none;
    }

    footer {
      background-color: #28a745;
      color: white;
      padding: 15px;
      position: fixed;
      bottom: 0;
      width: 100%;
      text-align: center;
    }

    .modal-header, h4, .close {
      background-color: #28a745;
      color: white !important;
      text-align: center;
      font-size: 30px;
    }

    .btn-primary {
      background-color: #28a745;
      border-color: #28a745;
    }

    .btn-primary:hover,
    .btn-primary:focus,
    .btn-primary:active {
      background-color: #218838;
      border-color: #218838;
    }

    body {
      background-color: #e9ecef;
      background-size: cover;
      background-repeat: no-repeat;
      background-attachment: fixed;
    }

    .panel-body img {
      max-width: 100%;
      height: auto;
    }

    .image-container {
      margin-bottom: 20px;
    }

    .image-container img {
      width: 100%;
      height: auto;
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
          <li><a href="index.php">Beranda</a></li>
          <li><a href="diagnosa.php">Diagnosa Penyakit</a></li>
          <li><a href="daftarpenyakit.php">Daftar Penyakit</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li><a href="#" id="myBtn"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="container-fluid text-center">    
    <div class="row content">
      <div class="col-sm-12 text-left"> 
        <center><h2>SISTEM PAKAR DIAGNOSA PENYAKIT TANAMAN MENTIMUN</h2></center><br>
        <div class="panel panel-info">
          <div class="panel-body">
            <div class="row">
              <div class="col-sm-4 image-container">
                <img src="mentimun.jpg" alt="Gambar 1">
              </div>
              <div class="col-sm-4 image-container">
                <img src="Mentimun2.jpg" alt="Gambar 2">
              </div>
              <div class="col-sm-4 image-container">
                <img src="mentimun3.jpeg" alt="Gambar 3">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style="padding:35px 50px;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4><span class="glyphicon glyphicon-lock"></span> Login</h4>
        </div>
        <div class="modal-body" style="padding:40px 50px;">
          <form role="form" method="post" action="ceklogin.php">
            <div class="form-group">
              <label for="username"><span class="glyphicon glyphicon-user"></span> Username</label>
              <input type="text" class="form-control" name="username" id="username" placeholder="Enter username">
            </div>
            <div class="form-group">
              <label for="password"><span class="glyphicon glyphicon-eye-open"></span> Password</label>
              <input type="password" class="form-control" name="password" id="password" placeholder="Enter password">
            </div>
            <button type="submit" id="submit" nama="submit" class="btn btn-primary btn-block"><span class="glyphicon glyphicon-off"></span> Login</button>
          </form>     
        </div>
      </div>
    </div>
  </div> 

  <footer class="container-fluid text-center">
    <p>© 2024 Sistem Pakar Diagnosa Penyakit Tanaman Mentimun. All rights reserved.</p>
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

