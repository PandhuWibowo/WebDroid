<?php
session_start();
ob_start();
include_once("function-tanggal.php");//method tanggal
include_once("../connection/database.php"); //buat koneksi ke database
$id   = $_GET['id']; //kode berita yang akan dikonvert
$sql = $con->query("SELECT * FROM cln_mhs WHERE noClnMhs = '$id'");
                $sql->execute();
                $user = $sql->fetchAll();
                
                foreach($user as $users){
                    //$id_tes   = $ujians['id_tes'];
                    $noClnMhs   = $users['noClnMhs'];
                    $jurusan    = $users['jurusan'];
                    //$waktu_tes  = $ujians['waktu_tes']; 
                }
?>
<html> <!-- Bagian halaman HTML yang akan konvert -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?php echo $noClnMhs; ?></title>

</head>
<body>
    
<?php
echo "<h1 align='center'>Calon Mahasiswa Baru</h1>";
//echo "<h1>".$noClnMhs."</h1>"; 
echo '<table border="0">
  <tr>
    <td width="300">No Pendaftaran Calon Mahasiswa</td>
    <td width="10">:</td>
    <td width="250">'.$noClnMhs.'</td>
  </tr>
  <tr>
    <td>Jurusan</td>
    <td>:</td>
    <td>'.$jurusan.'</td>
  </tr>

</table>';

echo "<p>data yang tertera di atas adalah mahasiswa universitas ini.</p>";
echo "<p align='right'>JAKARTA, ".date('d-m-Y')."

( Pandhu Wibowo )</p>";
?>
</body>
</html><!-- Akhir halaman HTML yang akan di konvert -->
<?php
$filename="mhs-".$id.".pdf"; //ubah untuk menentukan nama file pdf yang dihasilkan nantinya
//==========================================================================================================
//Copy dan paste langsung script dibawah ini,untuk mengetahui lebih jelas tentang fungsinya silahkan baca-baca tutorial tentang HTML2PDF
//==========================================================================================================
$content = ob_get_clean();
$content = '<page style="font-family: freeserif">'.nl2br($content).'</page>';
 require_once(dirname(__FILE__).'../../../html2pdf/html2pdf.class.php');
 try
 {
  $html2pdf = new HTML2PDF('P','A4','en', false, 'ISO-8859-15',array(30, 0, 20, 0));
  $html2pdf->setDefaultFont('Arial');
  $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
  $html2pdf->Output($filename);
 }
 catch(HTML2PDF_exception $e) { echo $e; }
?>