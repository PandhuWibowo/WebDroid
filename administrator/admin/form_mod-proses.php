<?php
//mulai proses tambah data
//inlcude atau memasukkan file koneksi ke database
include "koneksi.php";
//cek dahulu, jika tombol tambah di klik
if(isset($_POST['daftar'])){
	//AUTONUMBER START
	$query = "select MAX(RIGHT(kd_mod,4)) as max_id from moderator ORDER BY kd_mod";
	$sql = mysql_query($query);
	$hasil = mysql_fetch_array($sql);
	$maxid = 0;
	$maxid = $hasil['max_id'];
	$maxid++;
	switch (strlen($maxid)) {
			case 1 :
					$idfix = "000" . $maxid;
					break;
			case 2 :
					$idfix = "00" . $maxid;
					break;
			case 3 :
					$idfix = "0" . $maxid;
					break;
			default :
					$idfix = $maxid;
					break;
	};

	//AUTONUMBER END

	//jika tombol tambah benar di klik maka lanjut prosesnya
	$username		= mysql_real_escape_string($_POST['username']);
	$nama		= mysql_real_escape_string($_POST['nm_lkp']);
	$tmp_lahir	= mysql_real_escape_string($_POST['tmp_lahir']);
	$tgl_lahir	= mysql_real_escape_string($_POST['tgl_lahir']);
	$jenkel = mysql_real_escape_string($_POST['jenkel']);
	$email	= mysql_real_escape_string($_POST['email']);//membuat variabel $nama dan datanya dari inputan Nama Lengkap	//membuat variabel $kelas dan datanya dari inputan dropdown Kelas
	$no_hand	= mysql_real_escape_string($_POST['no_hand']);
	$alamat	= mysql_real_escape_string($_POST['alamat']);
	$password = mysql_real_escape_string($_POST['password']);
	$konpass = mysql_real_escape_string($_POST['konf_pass']);
	$instagram = mysql_real_escape_string($_POST['instagram']);
	$facebook = mysql_real_escape_string($_POST['facebook']);
	$twitter = mysql_real_escape_string($_POST['twitter']);
	$g_plus = mysql_real_escape_string($_POST['g_plus']);
	$cat_info = mysql_real_escape_string($_POST['cat_info']);

	//$lokasi_file = $_FILES['gambar']['tmp_name'];
        //$tipe_file = $_FILES['gambar']['type'];
        //$nama_file = $_FILES['gambar']['name'];
        //$ukuran_gambar = $_FILES['gambar']['size'];//Ukuran file maksimal 2Mb
        //$ukuran = 20000;
        //$direktori = "simpan/gambar/$nama_file";
		//membuat variabel $jurusan dan datanya dari inputan dropdown Jurusan

		//memulai validasi untuk masing - masing textbox
		//Cek apabila ID sama di database
		/*$cekuser = mysql_num_rows(mysql_query("select Id_murid from tbl_murid where Id_murid = '$ids' "));
		if($cekuser > 0){
			?>
				<script>
		        	alert("ID Anda sudah di gunakan, silahkan ganti ID Anda");
		        	document.location="registermurid.php";
		    	</script>
			<?php
		}*/
		//Cek apabila textbox ada yang kosong
		/*if(empty($ids) or empty($nama) or empty($email) or empty($jenkel) or empty($tgl_lahir) or empty($status_pendidikan) or empty($phone) or empty($alamat) or empty($pass))
		{
			?>
				<script>
		        	alert("Semua harus diisi");
		        	document.location="registermurid.php";
		    	</script>
			<?php
		}*/
		//Cek apabila ID murid kurang atau lebih dari 5 digit

		//Konfirmasi password harus sama
		if ($password != $konpass) {
			?>
				<script>
		        	alert("Password yang Anda pakai harus benar");
		        	document.location="form-layout.php";
		    	</script>
			<?php
		}
		//Cek apabila nama ada angkanya
		elseif(is_numeric($nama)){
			?>
				<script>
		        	alert("Nama hanya mengandung huruf");
		        	document.location="form-layouts.php";
		    	</script>
			<?php
		}
		//Cek apabila email salah format
		elseif (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
			?>
				<script>
		        	alert("Email tidak valid");
		        	document.location="form-layouts.php";
		    	</script>
			<?php
		}
		//Cek No.Handphone dan ID murid hanya boleh angka
		elseif (!is_numeric($no_hand)) {
			?>
				<script>
		        	alert("Nomor handphone atau Id Murid hanya boleh angka");
		        	document.location="form-layouts.php";
		    	</script>
			<?php
		}
		//Insert data apabila benar dan sesuai semua
		else{
			//if(!empty($lokasi_file)){
				//move_uploaded_file($lokasi_file,$direktori);
				//if($tipe_file == "image/jpeg" || $tipe_file == "image/jpg" ||$tipe_file == "image/png"){
                                   //if($ukuran_gambar <= $ukuran){
                                        //Masukkan Query Insert
                                        $input = mysql_query("INSERT INTO moderator VALUES('Mod$idfix', '$username', '$nama', '$tmp_lahir', '$tgl_lahir', '$email', '$no_hand','$alamat','$password','$konpass', NOW(),'$jenkel','$cat_info','$instagram','$facebook','$twitter','$g_plus')") or die(mysql_error());

			//jika query input sukses
			if($input){
			?>
				<script>
		        	alert("Selamat Anda sudah menjadi bagian kami");
		        	document.location="index.php";
		    	</script>
			<?php			//Pesan jika proses tambah sukses

			}else{
				?>
				<script>
		        	       alert("Maaf,  Anda belum menjadi bagian kami");
		        	       document.location="form-layouts.php";
		    	        </script>
			        <?php				//Pesan jika proses tambah gagal
			}
                                   /*}
                                   //Else untuk ukuran gambar
                                   else{
                                        ?>
				          <script>
		        	                  alert("Maaf,  Ukuran gambar hanya 2Mb");
		        	                  document.location="registermurid.php";
		    	                  </script>
			                <?php
                                   }

                                }else{
                                     ?>
				       <script>
		        	              alert("Maaf,  extension hanya .jpeg/.jpg/.png");
		        	              document.location="registermurid.php";
		    	               </script>
			              <?php
                                }

		}else{	//jika tidak terdeteksi tombol tambah di klik
			//redirect atau dikembalikan ke halaman tambah
			echo '<script>window.history.back()</script>';
		}*/
		}

	//melakukan query dengan perintah INSERT INTO untuk memasukkan data ke database

	}
?>
