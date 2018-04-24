<?php
include('../koneksi.php');
include('../fungsi.php');
$kelas=$_POST['kelas'];
$tahun=$_POST['thn'];
$semester=$_POST['smes'];
?>
<link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css">
<center><?php include("header.php");?></center>
<a href="#" onClick="window.print();">Cetak</a>
<table width="100%" border="1">
  <tr>
    <td rowspan="2" align="center">NO</td>
    <td rowspan="2" align="center">NIS</td>
    <td rowspan="2" align="center">NAMA</td>
    <td colspan="16" align="center">MAPEL</td>
    <td align="center">Total Rata-Rata</td>
  </tr>
 
  <tr>
    <?php
	$qmat=mysql_query("Select * from mata_pelajaran");
	$no=0;
	$matpel=array();
	while($rmat=mysql_fetch_array($qmat))
	{
		$matpel[]=$rmat['Id_matapelajaran'];
	$no=$no+1;
	?>
      
        <td align="center"><?= $rmat['Nama_matapelajaran'];?></td>        
      
     <?php } ?>    
    <td align="center">&nbsp;</td>
  </tr>
  <?php
 $rni=mysql_query("SELECT nilai.NIS, siswa.Nama,nilai.rata_rata,nilai.Kd_nilai,nilai_rinci.Id_matapelajaran
FROM ((nilai LEFT JOIN siswa ON nilai.NIS = siswa.NIS) LEFT JOIN kelas ON siswa.Id_kelas = kelas.Id_kelas) LEFT JOIN (mata_pelajaran LEFT JOIN nilai_rinci ON mata_pelajaran.Id_matapelajaran = nilai_rinci.Id_matapelajaran) ON nilai.Kd_nilai = nilai_rinci.Kd_nilai Where kelas.Kelas='".$kelas."' and nilai.Thn_ajaran='".$tahun."' and nilai.Semester='".$semester."' GROUP BY nilai.Kd_nilai");
$urut=0;
	while($rs=mysql_fetch_array($rni))
	{
		$urut=$urut+1;
 ?>
 
  <tr>
    <td><?= $urut;?></td>
    <td><?= $rs['NIS'];?></td>
    <td><?= $rs['Nama'];?></td>
    <?php
	 for ($i = 1; $i <= $no; $i++) { 
	 ?>
      <td><?=ambilraterekap($rs['Kd_nilai'],$i);?></td>       
      
      <?php
	 }
	 ?>
    <td><?= round($rs['rata_rata'],2);?></td>
  </tr>
  <?php } ?>
</table>
<?php include("footer.php");?>