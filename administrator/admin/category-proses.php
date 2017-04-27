<?php
  include "koneksi.php";

  if(isset($_POST['simpan'])){
    $query = "select MAX(RIGHT(kd_kat,4)) as max_id from category ORDER BY kd_kat";
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
    $nama_cat		= mysql_real_escape_string($_POST['nama_cat']);

    if(is_numeric($nama_cat)){
			?>
				<script>
		        	alert("Nama hanya mengandung huruf");
		        	document.location="form_category.php";
		    	</script>
			<?php
		}
    else{
      $input = mysql_query("INSERT INTO category VALUES('Cat$idfix', '$nama_cat')") or die(mysql_error());

      if($input){
			?>
				<script>
		        	alert("Category berhasil diinput");
		        	document.location="index.php";
		    	</script>
			<?php			//Pesan jika proses tambah sukses

			}else{
				?>
				    <script>
		             alert("Category gagal diinput");
		             document.location="form_category.php";
		    	  </script>
			  <?php				//Pesan jika proses tambah gagal
			}
    }
  }

?>
