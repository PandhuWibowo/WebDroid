<?php
session_start();
ob_start();
include_once("../function-tanggal.php");//method tanggal
include_once("../../connection/database.php"); //buat koneksi ke database
//$id   = $_GET['id']; //kode berita yang akan dikonvert
$sql = $con->query("SELECT * FROM ujian");
                $sql->execute();
                $ujian = $sql->fetchAll();
                
                
?>
<html> <!-- Bagian halaman HTML yang akan konvert -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?php echo $id_tes; ?></title>
  <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css"/>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
      <style type="text/css">

table { vertical-align: top; }
tr    { vertical-align: top; }
td    { vertical-align: top; }
.style37 {
    font-size: 20px;
    font-weight: bold;
}
.style38 {font-size: 12px}
.style14 {font-size: 10px}
</style>
</head>
<body>
    <bookmark title="Lettre" level="1" ></bookmark>
    <table style="width: 100%; text-align: center; font-size: 14px">
        <tr>
          <td style="width:7%" rowspan="4"><img src="../../../ui/images/bsg.jpg" alt="Logo" width="80" height="78"></td>
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
<p>Laporan History Ujian </p>
    <table cellspacing="0" style="width: 100%; border: solid 1px black; background: #E7E7E7; text-align: center; font-size: 10pt;">
        <tr>
            <th style="width: 5%; text-align: left">No</th>
            <th style="width: 19%; text-align: left">ID Tes</th>
            <th style="width: 16%; text-align: left"><span style="width: 10%; text-align: left;">No Calon Mahasiswa</span></th>
            <th style="width: 26%; text-align: left">Tanggal Tes</th>
            <th style="width: 14%; text-align: left">Waktu Tes</th>
        </tr>
    </table>
<?php
    $i = 1;
    foreach($ujian as $ujians){
                    $id_tes   = $ujians['id_tes'];
                    $noClnMhs   = $ujians['noClnMhs'];
                    $tgl_tes    = $ujians['tgl_tes'];
                    $waktu_tes  = $ujians['waktu_tes']; 
    
?>
    <table cellspacing="0" style="width: 100%; border: solid 1px black; background: #F7F7F7; text-align: center; font-size: 10pt;">
        <tr>
            <td style="width: 5%; text-align: left"><?php echo $i; ?></td>
            <td style="width: 19%; text-align: left"><?php echo $id_tes; ?></td>
            <td style="width: 16%; text-align: left"><?php echo $noClnMhs; ?></td>
            <td style="width: 26%; text-align: left"><?php echo TanggalIndo($tgl_tes); ?></td>
            <td style="width: 14%; text-align: left"><?php echo $waktu_tes; ?></td>
        </tr>
    </table>
<?php
    $i++;
    }   
?>
<nobreak><br>
        <table cellspacing="0" style="width: 100%; text-align: left;">
            <tr>
                <td style="width:65%;"></td>
              <td style="width:35%; ">
                    <p>Tangerang, <?php echo date('d-M-Y', time()); ?> <br>
                        Staff </p>
                    <p>&nbsp;</p>
                    Pandhu Wibowo<br />
                        <hr/>
                      NIP. 1511502153              </td>
            </tr>
        </table>
    </nobreak>
</body>
</html><!-- Akhir halaman HTML yang akan di konvert -->
<?php
$filename="History-Ujian.pdf"; //ubah untuk menentukan nama file pdf yang dihasilkan nantinya
//==========================================================================================================
//Copy dan paste langsung script dibawah ini,untuk mengetahui lebih jelas tentang fungsinya silahkan baca-baca tutorial tentang HTML2PDF
//==========================================================================================================
$content = ob_get_clean();
$content = '<page style="font-family: freeserif">'.nl2br($content).'</page>';
 require_once(dirname(__FILE__).'../../../../html2pdf/html2pdf.class.php');
 try
 {
  $html2pdf = new HTML2PDF('P','A4','en', false, 'ISO-8859-15',array(30, 0, 20, 0));
  $html2pdf->setDefaultFont('Arial');
  $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
  $html2pdf->pdf->IncludeJS('print(TRUE)');
  $html2pdf->Output($filename);
 }
 catch(HTML2PDF_exception $e) { echo $e; }
?>