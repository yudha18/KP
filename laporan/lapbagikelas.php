<?php
include('../koneksi.php');
$kelas=$_GET['kelas'];
$tahun=$_GET['tahun'];
$smes=$_GET['smes'];
$sql="SELECT siswa.*
FROM siswa LEFT JOIN kelas ON siswa.Id_kelas = kelas.Id_kelas 
Where kelas.Kelas='".$kelas."' and kelas.Thn_ajaran='".$tahun."' and kelas.Semester='".$smes."'";
$q=mysql_query("SELECT kelas.*, guru.Nama_guru
FROM kelas LEFT JOIN guru ON kelas.NIP_walikelas = guru.NIP Where kelas.Kelas='".$kelas."' and kelas.Thn_ajaran='".$tahun."' and kelas.Semester='".$smes."'");
$rr=mysql_fetch_array($q);
?>

<link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css">
<style type="text/css">
<!--
.style1 {
	font-family: Arial, Helvetica, sans-serif;
	font-weight: bold;
	font-size: 16px;
}
.style6 {font-size: 24px}
-->
</style>
<?php include("header.php");?>
<center>
  <h4><span class="style6 style5 style6">Laporan Pembagian Kelas </span></h4>
</center>
<hr>
<strong>
<span class="style5">Kelas &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:
<?= $kelas;?>
<br>
Tahun Ajaran : 
<?= $tahun;?>
<br>
Semester &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:
<?= $smes;?>
<br>
Wali Kelas &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:
<?= $rr['Nama_guru'];?>
</span><br>
</strong>
<a href="#" onClick="window.print();">Cetak</a>
<p>&nbsp;</p>
<p>&nbsp;</p>
<table  width="890%" border="4" cellspacing="0" cellpadding="0" class="table table-bordered">
<thead>
<th align="center" valign="top"><span class="style5">NIS</span></th>
<th align="center" valign="top"><span class="style5">Nama Siswa</span></th>
<th align="center" valign="top"><span class="style5">Jenis Kelamin</span></th>
<th align="center" valign="top"><span class="style5">Tempat Lahir</span></th>
<th align="center" valign="top"><span class="style5">Tanggal Lahir</span></th>
<th align="center" valign="top"><span class="style5">Nama Ayah</span></th>
<th align="center" valign="top"><span class="style5">Nama Ibu</span></th>
<th align="center" valign="top"><span class="style5">Alamat</span></th>
<th align="center" valign="top"><span class="style5">Telepon</span></th>
</thead>
<?php 
$q=mysql_query($sql);
while($rs=mysql_fetch_array($q))
{
?>
<tr>
<td align="center" valign="top"><span class="style5">
  <?= $rs['NIS'];?>
</span></td>
<td align="center" valign="top"><span class="style5">
  <?= $rs['Nama'];?>
</span></td>
<td align="center" valign="top"><span class="style5">
  <?= $rs['JK'];?>
</span></td>
<td align="center" valign="top"><span class="style5">
  <?= $rs['Tmpt_lahir'];?>
</span></td>
<td align="center" valign="top"><span class="style5">
  <?= $rs['Tgl_lahir'];?>
</span></td>
<td align="center" valign="top"><span class="style5">
  <?= $rs['Nm_ayah'];?>
</span></td>
<td align="center" valign="top"><span class="style5">
  <?= $rs['Nm_ibu'];?>
</span></td>
<td align="center" valign="top"><span class="style5">
  <?= $rs['Alamat'];?>
</span></td>
<td align="center" valign="top"><span class="style5">
  <?= $rs['Telp'];?>
</span></td>
</tr>
<?php } ?>
</table>
<p>&nbsp;</p>
<p>&nbsp;</p>

<?php include("footer2.php");?>
