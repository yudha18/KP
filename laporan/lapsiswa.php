<?php
include('../koneksi.php');
$kelas=$_GET['kelas'];
$sql="SELECT siswa.*
FROM siswa LEFT JOIN kelas ON siswa.Id_kelas = kelas.Id_kelas Where kelas.Kelas='".$kelas."'";

?>

<link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css">

<?php include("header.php"); ?>
<center><h2>Laporan Pembagian Kelas</h2></center>
<hr>
<strong>Kelas : <?= $kelas;?><br></strong>
<a href="#" onClick="window.print();">Cetak</a>
<p>&nbsp;</p>
<p>&nbsp;</p>
<table  width="100%" border="0" cellspacing="0" cellpadding="0" class="table table-bordered">
<thead>
<th align="center" valign="top">NIS</th>
<th align="center" valign="top">Nama Siswa</th>
<th align="center" valign="top">Jenis Kelamin</th>
<th align="center" valign="top">Tempat Lahir</th>
<th align="center" valign="top">Tanggal Lahir</th>
<th align="center" valign="top">Nama Ayah</th>
<th align="center" valign="top">Nama Ibu</th>
<th align="center" valign="top">Alamat</th>
<th align="center" valign="top">Telepon</th>
</thead>
<?php 
$q=mysql_query($sql);
while($rs=mysql_fetch_array($q))
{
?>
<tr>
<td align="center" valign="top"><?= $rs['NIS'];?></td>
<td align="center" valign="top"><?= $rs['Nama'];?></td>
<td align="center" valign="top"><?= $rs['JK'];?></td>
<td align="center" valign="top"><?= $rs['Tmpt_lahir'];?></td>
<td align="center" valign="top"><?= $rs['Tgl_lahir'];?></td>
<td align="center" valign="top"><?= $rs['Nm_ayah'];?></td>
<td align="center" valign="top"><?= $rs['Nm_ibu'];?></td>
<td align="center" valign="top"><?= $rs['Alamat'];?></td>
<td align="center" valign="top"><?= $rs['Telp'];?></td>
</tr>
<?php } ?>
</table>
<?php include("footer2.php"); ?>
