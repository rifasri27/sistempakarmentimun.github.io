<?php
include "session.php";
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
  <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
  <style>
    body {
      background-color: #4CAF50; /* Hijau */
      color: #000; /* Warna teks hitam */
    }
    .navbar-inverse {
      background-color: #2c3e50;
      border-color: #2c3e50;
    }
    .navbar-inverse .navbar-nav>li>a {
      color: #ecf0f1;
    }
    .navbar-inverse .navbar-brand {
      color: #ecf0f1;
    }
    .menu-item {
      margin-top: 20px;
    }
    .menu-item img {
      max-width: 100%;
      height: auto;
    }
  </style>
  <script>
    $(document).ready(function() {
        $('#example1').DataTable();  
    });
  </script>
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
      <a class="navbar-brand" href="#">Sistem Pakar</a>
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
    <div class="col-sm-12 text-left"> 
      <h2 class="text-center">KEPUTUSAN</h2>
      <br>
      <a href="abasispengetahuan.php">
        <button type="button" class="btn btn-default">
          <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Tambah Penyakit
        </button>
      </a>
      <br><br>
      <div class="box-body table-responsive">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>NO</th>
              <th>ID Penyakit</th>
              <th>Nama Penyakit</th>
              <th>Gejala</th>
              <th>Detail</th>
            </tr>
          </thead>
          <?php
            $queri = "SELECT p.idpenyakit, b.namapenyakit, b.gejala FROM basispengetahuan b, penyakit p WHERE p.namapenyakit=b.namapenyakit";
            $hasil = mysqli_query($konek_db, $queri);   
            $id = 0;
            while ($data = mysqli_fetch_array($hasil)){  
              $id++; 
              echo "<tr>  
                      <td>".$id."</td>
                      <td>".$data['idpenyakit']."</td>  
                      <td>".$data['namapenyakit']."</td>  
                      <td>".$data['gejala']."</td>
                      <td><a href=\"adeletebasispengetahuan.php?id=".$data['namapenyakit']."\" onclick='return checkDelete()'><i class='glyphicon glyphicon-trash'></i></a></td>
                    </tr>";      
            }
          ?>  
        </table>
      </div>
    </div>
  </div>
</div>

<script language="JavaScript" type="text/javascript">
function checkDelete(){
    return confirm('Yakin menghapus data ini?');
}
</script>

</body>
</html>
