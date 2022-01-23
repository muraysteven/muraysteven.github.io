<!doctype html>
<html lang="en">
  <head>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../css/sytleHome.css">
    <link rel="stylesheet" type="text/css" href="../fontawesome/css/all.min.css">


    <title>Membuat file foto</title>
  </head>
  <body>
    <center>
    <h1> Membuat Upload File dengan PHP <br> <strong>MITCHELL NET </strong></h1>
    <form method="post" action="aksi.php" enctype="multipart/form-data">
      <input type="file" name="file">
      <input type="submit" name="bupload" value="upload">
    </form>

    <table>
     <?php
     //koneksi  data base
     include "koneksi.php";

     $tampil = mysqli_query($koneksi, "SELECT * From tupload");
     while($data = mysqli_fetch_array($tampil)):
     ?>
    <tr>
      <td>
        <img src="<?php echo "../file/".$data['nama_file']?>" class="img-thumbnail" width="150px" height="200px">
      </td>
    </tr>
    <?php endwhile;?>      
    </table>
    </center>

  </body>



</html>