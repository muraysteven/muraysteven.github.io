<?php

	//panggil koneksi database
	include "koneksi.php";

	//pengujian jika tombol upload di klik
	if(isset($_POST['bupload']))
	{
		//esktensi file yang boleh diupload
		$ekstensi_diperbolehkan = array('jpg', 'png');
		$nama = $_FILES['file']['name']; //untuk mendapatkan anam file yang diupload
		//nama_file.jpg
		$x = explode('.', $nama);
		$ekstensi = strtolower(end($x));
		$ukuran = $_FILES['file']['size']; //mendapatkan ukuran file yang akan diupload
		$file_tmp = $_FILES['file']['tmp_name']; //untuk mendapatkan temporary file yang akan diupload (tmp)

		//uji jika ekstensi file yang upload sesuai
		if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
			//boleh upload file
			//uji jika ukuran file dibawah 1mb
			if($ukuran <= 1044070){
				//jika ukuran sesuai
				//pidahkan file yang diupload ke folder  file aplikasi
				move_uploaded_file($file_tmp,'../file/'.$nama);

				//simpan data ke dalam database
				$simpan = mysqli_query($koneksi, "INSERT INTO tupload VALUES ('','$nama')");

				if($simpan){
					echo "<script>alert('FILE  BERHASIL DI UPLOAD'); document.location='galeri.php'</script>";
				}else{
					echo "<script>alert('FILE GAGAL DI UPLOAD'); document.location='galeri.php'</script>";
				}

			}else{
				//ukuran tidak sesuai
				echo "<script>alert('UKURAN  FILE TERLALU BESAR, MAX. 1MB'); document.location='galeri.php'</script>";
			}
		}else{
			//ektensi file yang diupload tidak sesuai

			echo "<script>alert('EXTENSI FILE YANG DI UPLOAD TIDAK DIPERBOLEHKAN'); document.location='galeri.php'</script>";
		}

	}

?>
