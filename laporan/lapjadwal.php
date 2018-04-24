<?php
include('../koneksi.php');
$kelas=$_GET['kelas'];
$tahun=$_GET['tahun'];
$smes=$_GET['smes'];
$sql="SELECT jadwal.*, mata_pelajaran.Nama_matapelajaran, guru.Nama_guru, kelas.Kelas
FROM ((jadwal LEFT JOIN mata_pelajaran ON jadwal.Id_matapelajaran = mata_pelajaran.Id_matapelajaran) LEFT JOIN guru ON jadwal.NIP = guru.NIP) LEFT JOIN kelas ON jadwal.Id_kelas = kelas.Id_kelas Where kelas.Kelas='".$kelas."' and jadwal.Thn_ajaran='".$tahun."' and jadwal.Semester='".$smes."'";

?>

<link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css">
<?php include("header.php");?>
<center>
  <h4 class="style1">Laporan Jadwal Pelajaran</h4>
  </center>
<hr>
<strong>
<span class="style5">Kelas &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: 
<?= $kelas;?>
<br />
Tahun Ajaran : 
<?= $tahun;?>
<br>
Semester &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: 
<?= $smes;?>
</span><br>
</strong><br>
<a href="#" onClick="window.print();">Cetak</a>
<p>&nbsp;</p>
<p>&nbsp;</p>
<table  width="100%" border="4" cellspacing="0" cellpadding="0" class="table table-bordered">
<thead>
<th align="center" valign="top"><span class="style5">Kelas</span></th>
<th align="center" valign="top"><span class="style5">Hari</span></th>
<th align="center" valign="top"><span class="style5">Jam</span></th>
<th align="center" valign="top"><span class="style5">Bidang Studi</span></th>
<th align="center" valign="top"><span class="style5">Nama Guru</span></th>
</thead>
<?php 
$q=mysql_query($sql) or die(mysql_error());
while($rs=mysql_fetch_array($q))
{
?>
<tr>
<td align="center" valign="top"><span class="style5">
  <?= $rs['Kelas'];?>
</span></td>
<td align="center" valign="top"><span class="style5">
  <?= $rs['Hari'];?>
</span></td>
<td align="center" valign="top"><span class="style5">
  <?= $rs['Jam'];?>
</span></td>
<td align="center" valign="top"><span class="style5">
  <?= $rs['Nama_matapelajaran'];?>
</span></td>
<td align="center" valign="top"><span class="style5">
  <?= $rs['Nama_guru'];?>
</span></td>
</tr>
<?php } ?>
</table>
<?php include("footer.php");?>
