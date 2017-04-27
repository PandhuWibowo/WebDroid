<?php
include "koneksi.php";
if(isset($_GET['id'])) {

    $kd_tutor = $_GET['id'];

    //DELETE QUERY START
    $query1 = "delete from contents_administrator where kd_tutor='$kd_tutor'";
    $sql1 = mysql_query($query1);

    if($sql1){
  	?>
  		<script>
          	alert("Tutorial telah dihapus");
          	document.location="table-transaksi.php";
      	</script>
  	<?php			//Pesan jika proses tambah sukses

  	}else{
  		?>
  		<script>
          	alert("Maaf, Tutorial masih ada");
          	document.location="table-transaksi.php";
      	</script>
  	<?php				//Pesan jika proses tambah gagal
  	}
    //DELETE QUERY END
}
?>
