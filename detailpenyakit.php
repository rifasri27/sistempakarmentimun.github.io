<?php
session_start(); // Start session if not already started
include('koneksi.php'); // Include your database connection script

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Sistem Pakar - Detail Penyakit</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css">
  <style>
    /* Custom CSS styles */
    body {
      background-color: #4CAF50; /* Green background */
      color: #fff; /* White text color */
    }
    .navbar-inverse {
      background-color: #2c3e50; /* Dark blue navbar */
      border-color: #2c3e50;
    }
    .navbar-inverse .navbar-nav>li>a {
      color: #ecf0f1; /* White text color for links */
    }
    .navbar-inverse .navbar-brand {
      color: #ecf0f1; /* White text color for brand */
    }
    .form-group {
      margin-bottom: 15px; /* Adjust spacing for form groups */
    }

    /* Change specific red text to white */
    .white-text, /* Add specific class if exists */
    [style*="color: #ffffff"] { /* Target elements with inline red color */
      color: #ffffff !important; /* Force white text color */
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
        <?php
          if (isset($_SESSION['login_user'])) {
              echo '<li><a href="#" id="loginLink"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>';
          }
        ?>
      </ul>
    </div>
  </div>
</nav>

<div class="container-fluid text-center">    
  <div class="row content">
    <div class="col-sm-12 text-left"> 
      <h2 class="text-center">DETAIL PENYAKIT</h2>
      
      <div class="form-group">
        <label class="control-label col-sm-2">ID:</label>
        <div class="col-sm-10">
          <?php
            $idpenyakit = $_GET['id']; // Get idpenyakit from URL parameter
            $query = "SELECT * FROM penyakit WHERE idpenyakit='$idpenyakit'";
            $result = mysqli_query($konek_db, $query);
            $data = mysqli_fetch_array($result);
            echo "<input type='text' class='form-control' readonly value='".$data['idpenyakit']."'>";
          ?>
        </div>
      </div>
      
      <div class="form-group">
        <label class="control-label col-sm-2">NAMA:</label>
        <div class="col-sm-10">
          <?php
            echo "<input type='text' class='form-control' readonly value='".$data['namapenyakit']."'>";
          ?>
        </div>
      </div>
      
      <div class="form-group">
        <label class="control-label col-sm-2">GEJALA:</label>
        <div class="col-sm-10">
          <?php
            $query_gejala = "SELECT * FROM basispengetahuan WHERE namapenyakit='".$data['namapenyakit']."'";
            $result_gejala = mysqli_query($konek_db, $query_gejala);
            while ($gejala = mysqli_fetch_array($result_gejala)) {
                echo "<input type='text' class='form-control' readonly value='".$gejala['gejala']."'><br>";
            }
          ?>
        </div>
      </div>
      
      <div class="form-group">
        <label class="control-label col-sm-2">PENGENDALIAN:</label>
        <div class="col-sm-10">
          <?php
            echo "<textarea rows='8' class='form-control' readonly>".$data['pengendalian']."</textarea>";
          ?>
        </div>  
      </div>
      
    </div>
  </div>
</div>

<footer class="container-fluid text-center">
  <p>&copy; 2024 Sistem Pakar - Diagnosa Mentimun</p>
</footer>

<!-- Login Modal -->
<div class="modal fade" id="myModal" role="dialog">
  <div class="modal-dialog">
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
          <button type="submit" id="submit" name="submit" class="btn btn-primary btn-block"><span class="glyphicon glyphicon-off"></span> Login</button>
        </form>
      </div>
    </div>
  </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script>
$(document).ready(function(){
    $("#loginLink").click(function(){
        $("#myModal").modal();
    });
});
</script>

</body>
</html>
