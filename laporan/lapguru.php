<?php
include('../koneksi.php');
$sql="SELECT guru.*, mata_pelajaran.Nama_matapelajaran
FROM guru LEFT JOIN mata_pelajaran ON guru.Id_matapelajaran = mata_pelajaran.Id_matapelajaran";

?>

<link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css">

<?php include("header.php");?>
<center>
  <h4 class="style1">Laporan Data Guru</h4>
  </center>
<hr>
<a href="#" onClick="window.print();">Cetak</a>
<p>&nbsp;</p>
<p>&nbsp;</p>
<table  width="100%" border="4" cellspacing="0" cellpadding="0" class="table table-bordered">
<thead>
<th width="5%" align="center" valign="top"><span class="style5">NIP</span></th>
<th width="12%" align="center" valign="top"><span class="style5">Nama Guru</span></th>
<th width="10%" align="center" valign="top"><span class="style5">Jenis Kelamin</span></th>
<th width="13%" align="center" valign="top"><span class="style5">Tempat Lahir</span></th>
<th width="9%" align="center" valign="top"><span class="style5">Tanggal Lahir</span></th>
<th width="7%" align="center" valign="top"><span class="style5">Agama</span></th>
<th width="10%" align="center" valign="top"><span class="style5">Jabatan</span></th>
<th width="10%" align="center" valign="top"><span class="style5">Bidang Studi</span></th>
<th width="8%" align="center" valign="top"><span class="style5">TMT Guru</span></th>
<th width="14%" align="center" valign="top"><span class="style5">Alamat</span></th>
</thead>
<?php 
$q=mysql_query($sql);
while($rs=mysql_fetch_array($q))
{
?>
<tr>
<td align="center" valign="top"><span class="style5">
  <?= $rs['NIP'];?>
</span></td>
<td align="center" valign="top"><span class="style5">
  <?= $rs['Nama_guru'];?>
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
  <?= $rs['Agama'];?>
</span></td>
<td align="center" valign="top"><span class="style5">
  <?= $rs['Jabatan'];?>
</span></td>
<td align="center" valign="top"><span class="style5">
  <?= $rs['Nama_matapelajaran'];?>
</span></td>
<td align="center" valign="top"><span class="style5">
  <?= $rs['TMT_guru'];?>
</span></td>
<td align="center" valign="top"><span class="style5">
  <?= $rs['Alamat'];?>
</span></td>
</tr>
<?php } ?>
</table>
<?php include("footer.php");?>
