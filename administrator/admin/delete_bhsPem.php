<?php
include "koneksi.php";
if(isset($_GET['id'])) {

    $kd_bhsPem = $_GET['id'];

    //DELETE QUERY START
    $query1 = "delete from bahasa_pemrograman where kd_bhsPem='$kd_bhsPem'";
    $sql1 = mysql_query($query1);

    if($sql1){
  	?>
  		<script>
          	alert("Bahasa Pemrograman telah dihapus");
          	document.location="app-email.php";
      	</script>
  	<?php			//Pesan jika proses tambah sukses

  	}else{
  		?>
  		<script>
          	alert("Maaf, Bahasa Pemrograman masih ada");
          	document.location="app-email.php";
      	</script>
  	<?php				//Pesan jika proses tambah gagal
  	}
    //DELETE QUERY END
}
?>
