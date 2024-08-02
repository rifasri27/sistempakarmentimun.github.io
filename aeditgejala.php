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
      <h2 class="text-center">EDIT GEJALA</h2>
      <form method="post">
        <div class="form-group">
          <label class="control-label col-sm-2">ID :</label>
          <div class="col-sm-10">
            <?php
              $tampil = "SELECT * FROM gejala where idgejala='".$_GET['id']."'";
              $sql = mysqli_query($konek_db, $tampil);
              while($data = mysqli_fetch_array($sql)) {
                echo "<input type='text' name='idgejala' class='form-control' id='idgejala' disabled value='".$data['idgejala']."'><br>";
              }
            ?>
          </div>
        </div>  
        <div class="form-group">
          <label class="control-label col-sm-2">GEJALA :</label>
          <div class="col-sm-10">
            <?php
              $tampil = "SELECT * FROM gejala where idgejala='".$_GET['id']."'";
              $sql = mysqli_query($konek_db, $tampil);
              while($data = mysqli_fetch_array($sql)) {
                echo "<input type='text' class='form-control' id='gejala' name='gejala' value='".$data['gejala']."'><br>";
              }
            ?>
          </div>
        </div>
        <button type="submit" name="submit" class="btn btn-dark-green">Simpan</button>
        <?php
          if(isset($_POST['submit'])){
            $id = $_GET['id'];
            $gejala = $_POST['gejala'];
            $query = "update gejala SET gejala='".$_POST['gejala']."' WHERE idgejala='$id'";
            mysqli_query($konek_db, $query);
            header('location:gejala.php');
          }
        ?>
      </form>
    </div>
  </div>
</div>

<footer class="container-fluid text-center">
  <p></p>
</footer>

</body>
</html>
