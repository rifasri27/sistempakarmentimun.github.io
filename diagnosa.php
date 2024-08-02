<?php
error_reporting( error_reporting() & ~E_NOTICE );
include('koneksi.php');

// Redirect ke halaman about jika sudah login
if(isset($_SESSION['login_user'])){
    header("location: about.php");
    exit(); // Pastikan keluar dari skrip setelah melakukan redirect
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
    color: #e9ecef;
  }

  .container-fluid {
    padding: 0;
  }

  .row.content {
    min-height: 100vh;
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

  .navbar-brand img {
    display: inline-block;
    height: 30px;
    margin-right: 10px;
  }

  /* Custom styles for the table */
  .table {
    color: #000; /* Warna teks hitam */
  }

  .table th,
  .table td {
    color: #000; /* Warna teks hitam */
    text-align: center; /* Pusatkan teks */
    border: 1px solid #000; /* Garis hitam */
  }

  .panel-heading {
    color: #fff; /* Warna teks putih untuk heading */
  }

  .form-container {
    margin: 0px; /* Tambahkan margin untuk menggeser konten */
  }

  /* Specific styles for the highlighted table */
  .highlighted-table {
    background-color: #000;
    color: #fff;
  }

  .highlighted-table th,
  .highlighted-table td {
    color: #fff;
    text-align: center;
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
      <a class="navbar-brand" href="index.php"><img src="rifa.png" alt="Logo">Diagnosa Mentimun</a>
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
    <div class="col-sm-8 col-sm-offset-2 text-left"> 
      <center><h2>DIAGNOSA PENYAKIT</h2></center>
      <br>
      <form id="form1" name="form1" method="post" action="diagnosa.php">
        <div class="panel panel-info">
          <div class="panel-heading">Pilih Gejala</div>
          <div class="panel-body">
            <?php 
            $tampil = "SELECT * FROM gejala";
            $query = mysqli_query($konek_db, $tampil);
            while ($hasil = mysqli_fetch_array($query)) {  
              echo "<input type='checkbox' value='".$hasil['gejala']."' name='gejala[]' /> <span style='color: #000;'>".$hasil['gejala']."</span><br>";
            }
            ?>
          </div>
        </div>
        <button type="submit" name="submit" onclick="return checkDiagnosa()" class="btn btn-primary">CEK PENYAKIT</button>
      </form>
      <br>
      <div class="panel panel-info">
        <div class="panel-heading">HASIL DIAGNOSA</div>
        <div class="panel-body">
          <div class="box-body table-responsive">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>NO</th>
                  <th>ID PENYAKIT</th>
                  <th>Nama Penyakit</th>
                  <th>Detail</th>
                </tr>
              </thead>
              <tbody>
                <?php
                if(isset($_POST['submit'])){
                  if (!isset($_POST['gejala'])) {
                    echo "<script>alert('Gejala harus diceklist..!!')</script>";
                  } else {
                    $gejala = $_POST['gejala'];
                    $jumlah_dipilih = count($gejala);
                    
                    // Bangun query untuk mencari penyakit berdasarkan gejala yang dipilih
                    $query = "SELECT p.idpenyakit, p.namapenyakit FROM penyakit p 
                              JOIN basispengetahuan b ON p.namapenyakit = b.namapenyakit
                              WHERE b.gejala IN ('" . implode("','", $gejala) . "')
                              GROUP BY p.idpenyakit, p.namapenyakit
                              HAVING COUNT(DISTINCT b.gejala) = $jumlah_dipilih";
                    
                    $result = mysqli_query($konek_db, $query);
                    
                    if (!$result) {
                      echo "<script>alert('Error: " . mysqli_error($konek_db) . "')</script>";
                    } else {
                      $id = 0;
                      while ($hasil = mysqli_fetch_array($result)) {
                        $id++;
                        echo "
                          <tr>  
                            <td>".$id."</td>
                            <td>".$hasil['idpenyakit']."</td>
                            <td>".$hasil['namapenyakit']."</td>  
                            <td><a href=\"hasildiagnosa.php?id=".$hasil['idpenyakit']."\"><i class='glyphicon glyphicon-search'></i></a></td>
                          </tr>";
                      }
                      if (mysqli_num_rows($result) == 0) {
                        echo "<tr><td colspan='4'>Tidak ada penyakit yang sesuai dengan gejala yang dipilih.</td></tr>";
                      }
                    }
                  }
                }
                ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<footer class="container-fluid text-center">
    <p>© 2024 Sistem Pakar Diagnosa Penyakit Tanaman Mentimun. All rights reserved.Rifa Sri Nurfadillah</p>
  </footer>

  <script>
    $(document).ready(function(){
      $("#myBtn").click(function(){
        $("#myModal").modal();
      });
    });

<script language="JavaScript" type="text/javascript">
function checkDiagnosa(){
  return confirm('Apakah sudah benar gejalanya?');
}
</script>

</body>
</html>
