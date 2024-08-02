<?php
include('koneksi.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Sistem Pakar</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css">
  <style>
    /* Override Bootstrap Navbar */
    .navbar {
      margin-bottom: 0;
      border-radius: 0;
    }

    .navbar-inverse {
      background-color: #343a40; /* Warna latar navbar */
      border-color: #343a40;
    }

    .navbar-inverse .navbar-brand,
    .navbar-inverse .navbar-nav > li > a {
      color: #ffffff; /* Warna teks navbar */
    }

    .navbar-inverse .navbar-nav > li > a:hover,
    .navbar-inverse .navbar-brand:hover {
      color: #e9ecef; /* Warna teks navbar hover */
    }

    /* Container and Content Styling */
    .container-fluid {
      padding: 0;
    }

    .row.content {
      min-height: 100vh;
      background: linear-gradient(to right, #28a745, #74c69d); /* Gradien background */
      color: #fff; /* Warna teks konten */
    }

    /* Panel Styling */
    .panel {
      background-color: rgba(255, 255, 255, 0.8); /* Background panel */
      border: none;
    }

    .panel-heading {
      background-color: #28a745; /* Warna latar heading panel */
      color: #fff; /* Warna teks heading panel */
      border: none;
    }

    /* Table Styling */
    .table {
      background-color: #343a40; /* Warna latar belakang tabel */
      color: #fff; /* Warna teks tabel */
    }

    .table th,
    .table td {
      color: #fff; /* Warna teks header dan sel */
      text-align: center; /* Pusatkan teks */
      border: 1px solid #000; /* Garis tepi hitam */
    }

    /* Button Styling */
    .btn-primary {
      background-color: #28a745; /* Warna tombol */
      border-color: #28a745;
    }

    .btn-primary:hover,
    .btn-primary:focus,
    .btn-primary:active {
      background-color: #218838; /* Warna tombol hover */
      border-color: #218838;
    }

    /* Body Styling */
    body {
      background-color: #e9ecef; /* Warna latar belakang body */
      background-size: cover;
      background-repeat: no-repeat;
      background-attachment: fixed;
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
      <a class="navbar-brand" href="homeadmin.php">Diagnosa Mentimun</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li><a href="homeadmin.php">Beranda</a></li>
        <li><a href="penyakit.php">Penyakit</a></li>
        <li class="active"><a href="gejala.php">Gejala</a></li>
        <li><a href="basispengetahuan.php">Keputusan</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="container-fluid text-center">    
  <div class="row content form-container">
    <div class="col-sm-12 text-left"> 
      <h2 class="text-center">DAFTAR GEJALA</h2>
      <br>
      <a href="ainputgejala.php" class="btn btn-default">
        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Tambah Gejala
      </a>
      <br><br>
      <div class="box-body table-responsive">
        <table id="example1" class="table">
          <thead>
            <tr>
              <th>NO</th>
              <th>ID Gejala</th>
              <th>Gejala</th>
              <th>Detail</th>
            </tr>
          </thead>
          <tbody>
          <?php
            $query = "SELECT * FROM gejala";
            $result = mysqli_query($konek_db, $query);
            $id = 0;
            while ($data = mysqli_fetch_array($result)){  
              $id++; 
              echo "      
                <tr>  
                  <td>".$id."</td>
                  <td>".$data[0]."</td>  
                  <td>".$data[1]."</td>  
                  <td>
                    <a href=\"aeditgejala.php?id=".$data[0]."\">
                      <i class='glyphicon glyphicon-pencil'></i> Edit
                    </a> || 
                    <a href=\"adeletegejala.php?id=".$data[0]."\" onclick='return checkDelete()'>
                      <i class='glyphicon glyphicon-trash'></i> Hapus
                    </a>
                  </td>
                </tr>";      
            }
          ?>  
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<script>
function checkDelete(){
  return confirm('Yakin menghapus data ini?');
}

$(document).ready(function(){
    $("#myBtn").click(function(){
        $("#myModal").modal();
    });
});
</script>


  <script>
</body>
</html>
