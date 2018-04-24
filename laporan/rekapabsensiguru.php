<?php
include('../koneksi.php');
include('../fungsi.php');
$thn=$_POST['thn'];
$smes=$_POST['smes'];
$sql="SELECT absensi_guru.NIP, guru.Nama_guru
FROM (absensi_guru LEFT JOIN guru ON absensi_guru.NIP = guru.NIP)  Where absensi_guru.Thn_ajaran='".$thn."' and absensi_guru.Semester='".$smes."' group by absensi_guru.NIP";

?>

<link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css">

<style type="text/css">
<!--
.style6 {font-weight: bold; font-size: 24px;}
-->
</style>
<?php include("header.php");?>
<center>
  <h4><span class="style6 style5 style6">Laporan Absensi Siswa </span></h4>
</center>
<hr>

<a href="#" onClick="window.print();">Cetak</a>
<p>&nbsp;</p>
<table  width="100%" border="4" cellspacing="0" cellpadding="0" class="table table-bordered">
<tr>
    <th rowspan="2" align="center" valign="top">Nama</th>
    <th rowspan="2" align="center" valign="top">NIP</th>
    <th colspan="3" align="center" valign="top">Jumlah Hadir</th>
    </tr>
  <tr>
    <th align="center" valign="top">A</th>
    <th align="center" valign="top">I</th>
    <th align="center" valign="top">S</th>
    </tr>
<?php 
$q=mysql_query($sql) or die(mysql_error());
while($rs=mysql_fetch_array($q))
{
?>
 <tr>
    <td align="center" valign="top"><?= $rs['Nama_guru'];?></td>
    <td align="center" valign="top"><?= $rs['NIP'];?></td>
    <?php
	$custom="and Thn_ajaran='".$thn."' and Semester='".$smes."'";
	?>
    <td align="center" valign="top"><?=jumlahhadir("absensi_guru","absen","NIP",$rs['NIP'],$custom);?></td>
    <td align="center" valign="top"><?=jumlahhadir("absensi_guru","izin","NIP",$rs['NIP'],$custom);?></td>
    <td align="center" valign="top"><?=jumlahhadir("absensi_guru","sakit","NIP",$rs['NIP'],$custom);?></td>
    </tr>
    
<tr>
  
<?php } ?>
</table>
  
 
<?php include("footer.php");?>
