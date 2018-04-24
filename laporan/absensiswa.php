<?php
include('../koneksi.php');
$thn=$_GET['tahun'];
$smes=$_GET['smes'];
$siswa=$_GET['siswa'];
$kelas=$_GET['kelas'];
$sql="SELECT absensi_siswa.tanggal, absensi_siswa.NIS, siswa.Nama, kelas.Thn_ajaran, kelas.Semester, absensi_siswa.status
FROM (absensi_siswa LEFT JOIN siswa ON absensi_siswa.NIS = siswa.NIS) LEFT JOIN kelas ON absensi_siswa.Id_kelas = kelas.Id_kelas Where kelas.Thn_ajaran='".$thn."' and kelas.Semester='".$smes."' and siswa.Nama='".$siswa."' and kelas.Kelas='".$kelas."'";

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
<span class="style5"><strong> Nama Siswa &nbsp;&nbsp;&nbsp;:
<?= $siswa;?>
<br />
Kelas &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:
<?= $kelas;?>
<br />
Tahun Ajaran : 
<?= $thn;?>
<br>
Semester &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:
<?= $smes;?>
</strong></span><strong><br>
</strong><br>
<a href="#" onClick="window.print();">Cetak</a>
<p>&nbsp;</p>
<table  width="100%" border="4" cellspacing="0" cellpadding="0" class="table table-bordered">
<thead>
<th align="center" valign="top"><span class="style5">Tanggal</span></th>
<th align="center" valign="top"><span class="style5">NIS</span></th>
<th align="center" valign="top"><span class="style5">Nama Siswa</span></th>
<th align="center" valign="top"><span class="style5">Keterangan Hadir</span></th>
</thead>
<?php 
$q=mysql_query($sql);
while($rs=mysql_fetch_array($q))
{
?>
<tr>
<td align="center" valign="top"><?= $rs['tanggal'];?></td>
<td align="center" valign="top"><?= $rs['NIS'];?></td>
<td align="center" valign="top"><?= $rs['Nama'];?></td>
<td align="center" valign="top"><?= $rs['status'];?></td>
</tr>
<?php } ?>
</table>
<?php include("footer2.php");?>
