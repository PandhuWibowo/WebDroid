<?php
session_start();
ob_start();
include_once("../report/function-tanggal.php");//method tanggal
include_once("../connection/database.php"); //buat koneksi ke database
$id   = $_GET['id']; //kode berita yang akan dikonvert
$sql = $con->query("SELECT * FROM informasi_bayar WHERE id_informasi = '$id'");
                $sql->execute();
                $inBa = $sql->fetchAll();
                
                foreach($inBa as $infoBa){
                    $id_informasi     = $infoBa['id_informasi'];
                    $id_tes   = $infoBa['id_tes'];
                    $id_diskon    = $infoBa['id_diskon'];
                    $jml_bayar  = $infoBa['jml_bayar']; 
                }
?>
<html> <!-- Bagian halaman HTML yang akan konvert -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?php echo $id_tes; ?></title>

</head>
<body>
<bookmark title="Lettre" level="1" ></bookmark>
    <table style="width: 100%; text-align: center; font-size: 14px">
        <tr>
          <td style="width:7%" rowspan="4"><img src="../../ui/images/bsg.jpg" alt="Logo" width="80" height="78"></td>
          <td style="width:93%">LEMBAGA SISTEM </td>
        </tr>
        <tr>
          <td class="style37"><strong>SISTEM APLIKASI ANDA</strong> </td>
        </tr>
        <tr>
          <td class="style38">Kompleks Perkantoran Kudus, Jl. PR. Sukun  Kudus</td>
        </tr>
        <tr>
          <td class="style38">Telp. 081 2299 5054 </td>
        </tr>
        <tr>
            <td colspan="2"><hr/></td>
        </tr>
    </table>
    
<?php
echo "<h1 align='center'>Pembayaran Mahasiswa Baru</h1>";
echo "<h1>".$id_tes."</h1>"; 
echo '<table border="0">
  <tr>
    <td width="100">ID Tes</td>
    <td width="10">:</td>
    <td width="250">'.$id_tes.'</td>
  </tr>
  <tr>
    <td>ID Diskon</td>
    <td>:</td>
    <td>'.$id_diskon.'</td>
  </tr>
  <tr>
    <td>Total Bayar</td>
    <td>:</td>
    <td>Rp.'.number_format($jml_bayar).'</td>
  </tr>

</table>';

echo "<p>data yang tertera di atas adalah mahasiswa universitas ini.</p>";
// echo "<p align='right'>JAKARTA, ".date('d-m-Y')."

// ( Pandhu Wibowo )</p>";
?>
    <nobreak>
    <br>
          <table cellspacing="0" style="width: 100%; text-align: left;">
              <tr>
                  <td style="width:65%;"></td>
                <td style="width:35%; ">
                      <p>Tangerang, <?php echo date('d-M-Y', time()); ?> <br>
                          Staff </p>
                      <p>&nbsp;</p>
                      Pandhu Wibowo<br />
                          <hr/>
                        NIP. 1511502153              
                </td>
              </tr>
          </table>
      </nobreak>
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