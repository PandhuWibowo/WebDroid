<?php
  include "koneksi.php";

  if(isset($_POST['update'])){
    $kd_kat = mysql_real_escape_string($_POST['kd_cat']);
    $nama_cat		= mysql_real_escape_string($_POST['nama_cat']);

    if(is_numeric($nama_cat)){
			?>
				<script>
		        	alert("Nama hanya mengandung huruf");
		        	document.location="form-category_Update.php";
		    	</script>
			<?php
		}
    else{
      $input = mysql_query("UPDATE category SET nama_cat='$nama_cat' WHERE kd_kat='$kd_kat'") or die(mysql_error());

      if($input){
			?>
				<script>
		        	alert("Category berhasil diupdate");
		        	document.location="table_kat-minat.php";
		    	</script>
			<?php			//Pesan jika proses tambah sukses

			}else{
				?>
				    <script>
		             alert("Category gagal diinput");
		             document.location="form-category_Update.php";
		    	  </script>
			  <?php				//Pesan jika proses tambah gagal
			}
    }
  }

?>
