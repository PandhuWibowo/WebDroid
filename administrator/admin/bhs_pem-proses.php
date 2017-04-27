<?php
  include "koneksi.php";

  if(isset($_POST['update'])){
    $kd_bp = mysql_real_escape_string($_POST['kd_bp']);
    $nama_bp		= mysql_real_escape_string($_POST['nama_bp']);

    if(is_numeric($nama_bp)){
			?>
				<script>
		        	alert("Nama hanya mengandung huruf");
		        	document.location="bhs-pem_Update.php";
		    	</script>
			<?php
		}
    else{
      $input = mysql_query("UPDATE bahasa_pemrograman SET nama_bp='$nama_bp' WHERE kd_bhsPem='$kd_bp'") or die(mysql_error());

      if($input){
			?>
				<script>
		        	alert("Category berhasil diupdate");
		        	document.location="app-email.php";
		    	</script>
			<?php			//Pesan jika proses tambah sukses

			}else{
				?>
				    <script>
		             alert("Category gagal diinput");
		             document.location="bhs-pem_Update.php";
		    	  </script>
			  <?php				//Pesan jika proses tambah gagal
			}
    }
  }

?>
