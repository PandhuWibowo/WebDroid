<?php
  include "koneksi.php";

  if(isset($_POST['simpan'])){
    $query = "select MAX(RIGHT(kd_bhsPem,4)) as max_id from bahasa_pemrograman ORDER BY kd_bhsPem";
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
    $nama_bp		= mysql_real_escape_string($_POST['nama_bp']);

    if(is_numeric($nama_bp)){
			?>
				<script>
		        	alert("Nama hanya mengandung huruf");
		        	document.location="app-email.php";
		    	</script>
			<?php
		}
    else{
      $input = mysql_query("INSERT INTO bahasa_pemrograman VALUES('BaP$idfix', '$nama_bp')") or die(mysql_error());

      if($input){
			?>
				<script>
		        	alert("Category berhasil diinput");
		        	document.location="app-email.php";
		    	</script>
			<?php			//Pesan jika proses tambah sukses

			}else{
				?>
				    <script>
		             alert("Category gagal diinput");
		             document.location="app-email.php";
		    	  </script>
			  <?php				//Pesan jika proses tambah gagal
			}
    }
  }

?>
