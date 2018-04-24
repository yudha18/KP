<?php
include('../koneksi.php');
include('../fungsi.php');
$thn=$_POST['thn'];
$smes=$_POST['smes'];
$kelas=$_POST['kelas'];
$sql="SELECT absensi_siswa.NIS, siswa.Nama
FROM (absensi_siswa LEFT JOIN siswa ON absensi_siswa.NIS = siswa.NIS) LEFT JOIN kelas ON siswa.Id_kelas = kelas.Id_kelas Where absensi_siswa.Thn_ajaran='".$thn."' and absensi_siswa.Semester='".$smes."' and kelas.Kelas='".$kelas."' group by absensi_siswa.NIS";

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
    <th rowspan="2" align="center" valign="top">NIS</th>
    <th colspan="3" align="center" valign="top">Jumlah Hadir</th>
    </tr>
  <tr>
    <th align="center" valign="top">A</th>
    <th align="center" valign="top">I</th>
    <th align="center" valign="top">S</th>
    </tr>
<?php 
$q=mysql_query($sql);
while($rs=mysql_fetch_array($q))
{
?>
 <tr>
    <td align="center" valign="top"><?= $rs['Nama'];?></td>
    <td align="center" valign="top"><?= $rs['NIS'];?></td>
    <?php
	$custom="and Thn_ajaran='".$thn."' and Semester='".$smes."'";
	?>
    <td align="center" valign="top"><?=jumlahhadir("absensi_siswa","absen","NIS",$rs['NIS'],$custom);?></td>
    <td align="center" valign="top"><?=jumlahhadir("absensi_siswa","izin","NIS",$rs['NIS'],$custom);?></td>
    <td align="center" valign="top"><?=jumlahhadir("absensi_siswa","sakit","NIS",$rs['NIS'],$custom);?></td>
    </tr>
    
<tr>
  
<?php } ?>
</table>
  
 
<?php include("footer.php");?>
