
<?php
		
//koneksi Database
	$server ="localhost";
	$user = "root";
	$pass = "";
	$database = "dblatihan";

	$koneksi = mysqli_connect($server, $user, $pass, $database)or die (mysqli_error($koneksi));

//jika tombol simpan di klik
	if(isset($_POST['bsimpan']))
{

		//pengujian apakah data akan diedit atau tersimpan baru
		if($_GET['hal'] == "edit")
		{
			//Data akan diedit

				$edit = mysqli_query($koneksi, "UPDATE tmhs set
												nim = '$_POST[tnim]',
												nama = '$_POST[tnama]',
												alamat = '$_POST[talamat]',
												prodi = '$_POST[tprodi]'
											WHERE id_mhs = '$_GET[id]'
									 ");

				if($edit) //jika edit sukses
				{
					echo "<script>
						alert ('Edit Data Sukses !');
						document.location='index.php'
						</script>";
				}
				else
				{
					echo "<script>
						alert ('Edit Data GAGAL !!');
						document.location='index.php'
						</script>";
				}

			}
			else
			{
			//data akan disimpan baru

				$simpan = mysqli_query($koneksi, "INSERT INTO tmhs (nim, nama, alamat, prodi)
								VALUES ('$_POST[tnim]', 
										'$_POST[tnama]', 
										'$_POST[talamat]',
										'$_POST[tprodi]')
									 ");

				if($simpan) //jika simpan sukses
				{
					echo "<script>
						alert ('Simpan Data Sukses !');
						document.location='index.php'
						</script>";
				}
				else
				{
					echo "<script>
						alert ('Simpan Data GAGAL !!');
						document.location='index.php'
						</script>";
				}

			}
}





	//Pengujian Jika tombol edit/hapus diklik

	if(isset($_GET['hal']))
	{
		//Pengujian jika edit Data
		if($_GET['hal'] == "edit")
		{
		
		//Tampilkan Data yang di edit
			$tampil = mysqli_query($koneksi, "SELECT * FROM tmhs WHERE id_mhs = '$_GET[id]'");
			$data = mysqli_fetch_array($tampil);
			if($data)
			{
		//jika data ditemukan, maka data di tampung ke dalam variabel
				$vnim = $data['nim'];
				$vnama = $data['nama'];
				$valamat = $data['alamat'];
				$vprodi = $data['prodi'];
			}
		}
		else if($_GET['hal'] == "hapus")
		{
			//Persiapan Hapus Data
			$hapus = mysqli_query($koneksi, "DELETE FROM tmhs WHERE id_mhs = '$_GET[id]'");
			if($hapus){
				echo "<script>
						alert ('Hapus Data Susksess !!');
						document.location='index.php'
						</script>";
			}
		}
	}

?>

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

    <title>Justinnet</title>
  </head>
  <body>
  	<!-- Awal Navbar -->
  		
  	 	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		  <div class="container">
		        <a class="navbar-brand" href="#">
			      <img src="../assets/logo2.png" alt="" width="70" height="50" class="me-3">
			     Justin <strong>Net</strong>
			    </a>
		    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
		      <span class="navbar-toggler-icon"></span>
		    </button>
		    <div class="collapse navbar-collapse" id="navbarNav">
	    	
		      <ul class="navbar-nav ms-auto">
		        <li class="nav-item">
		          <a class="nav-link active" aria-current="page" href="HomePage.html">Home</a>
		        </li>
		        <li class="nav-item">
		          <a class="nav-link" href="#">Galeri</a>
		        </li>
		        <li class="nav-item">
		          <a class="nav-link" href="#">Download</a>
		        </li>
		        <li class="nav-item">
		          <a class="nav-link" href="#">Daftar</a>
		        </li>
		        <li class="nav-item">
		          <a class="nav-link" href="loginPage.html">Masuk</a>
		        </li>
				</ul>
		    </div>
		     </div>
		   </nav>
			
    	<!-- Akhir Navbar -->	
		
    	<h1 class="text-center mt-5">FORM  INPUTAN  DATA  PESERTA</h1>

    	<!-- awal  card form -->
    	<div class="container">
				<div class="card mt-3 mb-2">
				  <div class="card-header bg-primary text-white">
				    Form Inputan Data Peserta
				  </div>
				  <div class="card-body">
				  	<form method="post" action="">
				  		<div class="form-group">
				  			<label>Nim</label>
				  			<input type="text" name="tnim" value="<?=@$vnim?>" class="form-control" placeholder="input nim anda disini!" required>
				  		</div>
				  		<div class="form-group">
				  			<label>Nama</label>
				  			<input type="text" name="tnama" value="<?=@$vnama?>" class="form-control" placeholder="input Nama anda disini!" required>
				  		</div>
				  		<div class="form-group">
				  			<label>Alamat</label>
				  			<textarea class="form-control" name="talamat" placeholder="input nama anda disini"><?=@$valamat?></textarea>
				  		</div>
				  		<div class="form-group">
				  			<label>Program Studi</label>
				  			<select class="form-control" name="tprodi">
				  				<option value="<?=@$vprodi?>"><?=@$vprodi?></option>
				  				<option value="D3-MI">D3-MI</option>
				  				<option value="S1-SI">S1-SI</option>
				  				<option value="S1-TI">S1-TI</option>
				  			</select>
				  		</div>

						<button type="submit" class="btn btn-success mt-2" name="bsimpan">Simpan</button>
				  		<button type="submit" class="btn btn-danger mt-2" name="breset">Kosongkan</button>
				  	</form>
				    
				  </div>
				</div>
		</div>
		<!-- akhir  card form -->

<br>

<!-- awal  card tabel -->
    	<div class="container">
				<div class="card mt-3 mb-2">
				  <div class="card-header bg-success text-white">
				    Daftar  Nama Peserta
				  </div>
				  <div class="card-body">
				  	
				    <table class="table table-bordered table-striped">
				    	<tr>
				    		<th>No.</th>
				    		<th>Nim</th>
				    		<th>Nama</th>
				    		<th>Alamat</th>
				    		<th>Program Studi</th>
				    		<th>Aksi</th>

				    	</tr>
				    	
				    	<?php
				    		$no = 1;
					    	$tampil = mysqli_query($koneksi, "SELECT * from tmhs order by id_mhs asc");
							while($data = mysqli_fetch_array($tampil)) :

				    	?>

				    	<tr>
				    		<td><?=$no++;?></td>
				    		<td><?=$data ['nim']?></td>
				    		<td><?=$data ['nama']?></td>
				    		<td><?=$data ['alamat']?></td>
				    		<td><?=$data ['prodi']?></td>
				    		<td>
				    			<a href="index.php?hal=edit&id=<?=$data['id_mhs']?>" class="btn btn-warning"> Edit </a>
				    			<a href="index.php?hal=hapus&id=<?=$data['id_mhs']?>" 
				    			onclick="return confirm('Apakah ingin menghapus data ?')" class="btn btn-danger"> Hapus </a>
				    		</td>
				    	</tr>

				    <?php endwhile; // penutup perulangan while ?>

				    </table>
				  </div>
				</div>
		</div>
		<!-- akhir  card tabel -->





<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>



				
			<!-- Awal Footer -->
			<footer class="bg-dark p-5 mt-2">
				<div class="container-fluid">
					<div class="row">
						<div class="col md-6 text-center">
						<a href="#" style="text-decoration: none">
							<img src="../assets/logo2.png" style="width: 50px">
							<span class="pd-5 text-white"> Copyright @2021  |  Create  by MitchellNet<a href="#" class=" text-decoration-none text-white fw-bold"> </span>
						</a>	
						</div>				
				</div>
				</div>
			</footer>

			<!-- Akhir Footer -->
							
		


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

   </body>
</html>