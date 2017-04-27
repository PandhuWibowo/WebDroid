<?php
include "koneksi.php";
if(isset($_GET['id'])) {

    $kd_mod = $_GET['id'];

    //DELETE QUERY START
    $query1 = "delete from moderator where kd_mod='$kd_mod'";
    $sql1 = mysql_query($query1);

    if($sql1){
  	?>
  		<script>
          	alert("Moderator telah dihapus");
          	document.location="table-moderator.php";
      	</script>
  	<?php			//Pesan jika proses tambah sukses

  	}else{
  		?>
  		<script>
          	alert("Maaf, Moderator masih ada");
          	document.location="table-moderator.php";
      	</script>
  	<?php				//Pesan jika proses tambah gagal
  	}
    //DELETE QUERY END
}
?>
