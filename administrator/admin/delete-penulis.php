<?php
include "koneksi.php";
if(isset($_GET['id'])) {

    $kd_pen = $_GET['id'];

    //DELETE QUERY START
    $query1 = "delete from penulis where kd_pen='$kd_pen'";
    $sql1 = mysql_query($query1);

    if($sql1){
  	?>
  		<script>
          	alert("Penulis telah dihapus");
          	document.location="table-data.php";
      	</script>
  	<?php			//Pesan jika proses tambah sukses

  	}else{
  		?>
  		<script>
          	alert("Maaf, Penulis masih ada");
          	document.location="table-data.php";
      	</script>
  	<?php				//Pesan jika proses tambah gagal
  	}
    //DELETE QUERY END
}
?>
