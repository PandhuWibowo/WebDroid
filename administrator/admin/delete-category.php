<?php
include "koneksi.php";
if(isset($_GET['id'])) {

    $kd_kat = $_GET['id'];

    //DELETE QUERY START
    $query1 = "delete from category where kd_kat='$kd_kat'";
    $sql1 = mysql_query($query1);

    if($sql1){
  	?>
  		<script>
          	alert("Kategori telah dihapus");
          	document.location="table_kat-minat.php";
      	</script>
  	<?php			//Pesan jika proses tambah sukses

  	}else{
  		?>
  		<script>
          	alert("Maaf, Kategori masih ada");
          	document.location="table_kat-minat.php";
      	</script>
  	<?php				//Pesan jika proses tambah gagal
  	}
    //DELETE QUERY END
}
?>
