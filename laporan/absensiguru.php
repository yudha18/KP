<?php
include('../koneksi.php');
$thn=$_GET['tahun'];
$smes=$_GET['smes'];
$guru=$_GET['guru'];
$sql="SELECT absensi_guru.tanggal,jadwal.Thn_ajaran, jadwal.Semester, absensi_guru.NIP, guru.Nama_guru, absensi_guru.status
FROM (absensi_guru LEFT JOIN jadwal ON absensi_guru.Kd_jadwal = jadwal.Kd_jadwal) LEFT JOIN guru ON absensi_guru.NIP = guru.NIP Where jadwal.Thn_ajaran='".$thn."' and jadwal.Semester='".$smes."' and guru.Nama_guru='".$guru."'";

?>

<link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css">

<style type="text/css">
<!--
.style6 {font-size: 24px}
-->
</style>
<?php include("header.php");?>
<center>
  <h4><span class="style6 style5 style6">Laporan Absensi Guru </span></h4>
</center>
<hr>
<strong>
<span class="style5">Nama Guru &nbsp;&nbsp;&nbsp;&nbsp;: 
<?= $guru;?>
<br />
Tahun Ajaran &nbsp;: 
<?= $thn;?>
<br>
Semester &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: 
<?= $smes;?>
</span><br>
</strong><br>
<a href="#" onClick="window.print();">Cetak</a>
<p>&nbsp;</p>
<table  width="100%" border="4" cellspacing="0" cellpadding="0" class="table table-bordered">
<thead>
<th align="center" valign="top"><span class="style5">Tanggal</span></th>
<th align="center" valign="top"><span class="style5">NIP</span></th>
<th align="center" valign="top"><span class="style5">Nama Guru/Pegawai</span></th>
<th align="center" valign="top"><span class="style5">Keterangan Hadir</span></th>
</thead>
<?php 
$q=mysql_query($sql);
while($rs=mysql_fetch_array($q))
{
?>
<tr>
<td align="center" valign="top"><?= $rs['tanggal'];?></td>
<td align="center" valign="top"><?= $rs['NIP'];?></td>
<td align="center" valign="top"><?= $rs['Nama_guru'];?></td>
<td align="center" valign="top"><?= $rs['status'];?></td>
</tr>
<?php } ?>
</table>
<?php include("footer.php"); ?>

