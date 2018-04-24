<?php
include('../koneksi.php');
$id=$_GET['id'];
$thn=$_GET['tahun'];
$smes=$_GET['smes'];
$sql1=mysql_query("SELECT siswa.*, kelas.Kelas, kelas.Semester, kelas.Thn_ajaran
FROM siswa LEFT JOIN kelas ON siswa.Id_kelas = kelas.Id_kelas where siswa.NIS='".$id."'");
$rs2=mysql_fetch_array($sql1) or die(mysql_error());
?>

<link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css">
<style type="text/css">
<!--
.style6 {
	font-size: 14px;
	font-weight: bold;
}
-->
</style>
<?php include("header.php");?>
<center>
  <h4 class="style1">Laporan Nilai Siswa</h4>
  </center>
<hr>
<span class="style5 style6">NIS &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: 
<?= $rs2['NIS'];?>
<br>
Nama Siswa &nbsp;&nbsp;&nbsp;: 
<?= $rs2['Nama'];?>
<br>
Kelas &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: 
<?= $rs2['Kelas'];?>
<br>
Semester &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: 
<?= $rs2['Semester'];?>
<br>
Tahun Ajaran : 
<?= $rs2['Thn_ajaran'];?>
</span><br>
</strong>
<a href="#" onClick="window.print();">Cetak</a>
<p>&nbsp;</p>
<table  width="100%" border="4" cellspacing="0" cellpadding="0" class="table table-bordered">
<thead>
<th align="center" valign="top"><span class="style5">No</span></th>
<th align="center" valign="top"><span class="style5">Bidang Studi</span></th>
<th align="center" valign="top"><span class="style5">SKBM</span></th>
<th align="center" valign="top"><span class="style5">Nilai Ulangan</span></th>
<th align="center" valign="top"><span class="style5">Nilai UTS</span></th>
<th align="center" valign="top"><span class="style5">Nilai UAS</span></th>
<th align="center" valign="top"><span class="style5">Nilai RATA-RATA</span></th>
</thead>
<?php 
$sql="SELECT mata_pelajaran.Nama_matapelajaran, mata_pelajaran.SKBM, nilai_rinci.Nilai_ulangan, nilai_rinci.Nilai_uts, nilai_rinci.Nilai_uas, nilai_rinci.Rata_rata,nilai.Rata_rata as rt2
FROM (nilai RIGHT JOIN nilai_rinci ON nilai.Kd_nilai = nilai_rinci.Kd_nilai) LEFT JOIN mata_pelajaran ON nilai_rinci.Id_matapelajaran = mata_pelajaran.Id_matapelajaran Where nilai.NIS='".$id."' and nilai.Thn_ajaran='".$thn."' and nilai.Semester='".$smes."'";
$q=mysql_query($sql) or die(mysql_error());
$no=0;
while($rs=mysql_fetch_array($q))
{
$no=$no+1;
?>
<tr>
<td><?= $no;?></td>
<td align="center" valign="top"><span class="style5">
  <?= $rs['Nama_matapelajaran'];?>
</span></td>
<td align="center" valign="top"><span class="style5">
  <?= $rs['SKBM'];?>
</span></td>
<td align="center" valign="top"><span class="style5">
  <?= $rs['Nilai_ulangan'];?>
</span></td>
<td align="center" valign="top"><span class="style5">
  <?= $rs['Nilai_uts'];?>
</span></td>
<td align="center" valign="top"><span class="style5">
  <?= $rs['Nilai_uas'];?>
</span></td>
<td align="center" valign="top"><span class="style5">
  <?= round($rs['Rata_rata'],2);?>
</span></td>
</tr>

<?php } ?>
<tr>
  <td colspan="5" align="center" valign="top"><span class="style5"><strong>TOTAL RATA-RATA</strong></span></td>
  <td align="center" valign="top"><span class="style5">
    <?php
  $t=mysql_query("Select Rata_rata from nilai Where NIS='".$_GET['id']."'");
  $p=mysql_fetch_array($t);
  echo round ($p['Rata_rata'],2);
  ?>
  </span></td>
</tr>
</table>
<?php include("footer3.php");?>
