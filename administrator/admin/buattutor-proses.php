<?php
session_start();
//mulai proses tambah data
//inlcude atau memasukkan file koneksi ke database
include "koneksi.php";
//cek dahulu, jika tombol tambah di klik
if(isset($_POST['publish'])){
	//AUTONUMBER START
	$query = "select MAX(RIGHT(kd_tutor,4)) as max_id from contents_administrator ORDER BY kd_tutor";
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
	$jTutor		= addslashes(strip_tags(mysql_real_escape_string($_POST['judul_tutor'])));
  $username = mysql_real_escape_string($_SESSION['username']);
	$jBahasa		= mysql_real_escape_string($_POST['bhs_pem']);
	$nCat	= mysql_real_escape_string($_POST['nama_cat']);
	$iTutor	= addslashes(mysql_real_escape_string($_POST['isi_tutor']));
	$iTutor2 = htmlentities($iTutor);
	$iTutor3 = htmlspecialchars($iTutor2);
	$cInfo = mysql_real_escape_string($_POST['cat_info']);
	$nPenulis	= addslashes(strip_tags(mysql_real_escape_string($_POST['nama_penulis'])));
	$insPenulis = mysql_real_escape_string($_POST['instagram']);
	$facePenulis = mysql_real_escape_string($_POST['facebook']);
	$twitter = mysql_real_escape_string($_POST['twitter']);
	$g_plus = mysql_real_escape_string($_POST['g_plus']);
	$github_code = mysql_real_escape_string($_POST['github_code']);
	$you_code = mysql_real_escape_string($_POST['you_code']);
	$pdf = mysql_real_escape_string($_POST['pdf_dokumentasi']);
	$other_download = mysql_real_escape_string($_POST['other_download']);
	$email = mysql_real_escape_string($_POST['email']);//membuat variabel $nama dan datanya dari inputan Nama Lengkap	//membuat variabel $kelas dan datanya dari inputan dropdown Kelas
	//$no_hand	= mysql_real_escape_string($_POST['no_hand']);
	//$alamat	= mysql_real_escape_string($_POST['alamat']);
	//$password = mysql_real_escape_string($_POST['password']);
	//$konpass = mysql_real_escape_string($_POST['konf_pass']);

	$lokasi_file = $_FILES['gambar']['tmp_name'];
        $tipe_file = $_FILES['gambar']['type'];
        $nama_file = $_FILES['gambar']['name'];
        $ukuran_gambar = $_FILES['gambar']['size'];//Ukuran file maksimal 2Mb
        //$ukuran = 20000;
        $direktori = "gambar/$nama_file";
		//membuat variabel $jurusan dan datanya dari inputan dropdown Jurusan

			if(!empty($lokasi_file)){
				move_uploaded_file($lokasi_file,$direktori);
				if($tipe_file == "image/jpeg" || $tipe_file == "image/jpg" ||$tipe_file == "image/png"){
                                   //if($ukuran_gambar <= $ukuran){
                                        //Masukkan Query Insert
																				$input = mysql_query("INSERT INTO contents_administrator VALUES('ConP$idfix', '$username', '$jTutor', '$jBahasa', '$nCat', '$iTutor3', '$cInfo','$nPenulis', NOW(),'$email','$nama_file','$insPenulis','$facePenulis','$twitter','$g_plus'
																				,'$github_code','$you_code','$other_download','$pdf')") or die(mysql_error());

													//jika query input sukses
													if($input){
													?>
													<script>
													alert("Tutorial berhasil ditambahkan");
													document.location="index.php";
													</script>
													<?php			//Pesan jika proses tambah sukses

													}else{
													?>
													<script>
													alert("Maaf,  Tutorial gagal ditambahkan");
													document.location="form-buattutor.php";
													</script>
													<?php
													}
			//}
			}
			else{
			    ?>
													<script>
													alert("Gambar hanya bisa .jpg, atau .png");
													document.location="form-buattutor.php";
													</script>
													<?php
													}
			
		}
		else{	//jika tidak terdeteksi tombol tambah di klik

			//redirect atau dikembalikan ke halaman tambah
			echo '<script>window.history.back()</script>';

		}
	}
?>
