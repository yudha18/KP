<h3>Data Absensi Siswa</h3>
<form method="post">
<strong>Cari berdasarkan</strong>
<select name="key">
<option value="NIS">NIS</option>
<option value="nama">Nama Siswa</option>
</select>
<input type="text" name="cari" />
<input type="submit" class="btn btn-info" name="search" value="Cari" />
</form>
<?php
if(isset($_POST['search']))
{
	$sq1="Select count(NIS) as numrows from siswa Where ".$_POST['key']." LIKE '%".$_POST['cari']."%'";
	$sq2="SELECT siswa.*, kelas.Kelas,kelas.Thn_ajaran,kelas.Semester
FROM siswa LEFT JOIN kelas ON siswa.Id_kelas = kelas.Id_kelas Where ".$_POST['key']." LIKE '%".$_POST['cari']."%'";
	$_SESSION['sq1']=$sq1;
	$_SESSION['sq2']=$sq2;
}
?>
<?php
$sql1="";
$sql2="";
if(isset($_SESSION['sq1']))
{
	$sql1=$_SESSION['sq1'];
	$sql2=$_SESSION['sq2'];
}else{
	$sql1="Select count(NIS) as numrows from siswa";
	$sql2="SELECT siswa.*, kelas.Kelas,kelas.Thn_ajaran,kelas.Semester
FROM siswa LEFT JOIN kelas ON siswa.Id_kelas = kelas.Id_kelas";
}
inc_app('paging');
$page = (isset($_REQUEST['page']) && !empty($_REQUEST['page']))?$_REQUEST['page']:1;
$per_page = 20; 
$adjacents  = 20;
$tglskrg=date("Y-m-d");
$offset = ($page - 1) * $per_page;
$qCount=mysql_query($sql1);
$row     = mysql_fetch_array($qCount);
$numrows = $row['numrows']; 
$total_pages = ceil($numrows/$per_page);
$querydata = mysql_query($sql2." LIMIT $offset,$per_page");
?>
<span class="span9">
<table width="100%" border="5" cellspacing="0" cellpadding="0" class="table table-striped">
  <tr>
    <td><div align="center"><strong>NIS</strong></div></td>
     <td><div align="center"><strong>Nama Siswa</strong></div></td>
     <td><div align="center"><strong>Jenis Kelamin</strong></div></td> 
     <td><div align="center"><strong>Agama</strong></div></td>
     <td><div align="center"><strong>Kelas</strong></div></td>
     <td><div align="center"><strong>Status</strong></div></td>
     <td><div align="center"><strong>Aksi</strong></div></td>
  </tr>
  <?php
  
  while($s=mysql_fetch_array($querydata))
  {
	  
  ?>
  <tr>
    <td><?php echo $s['NIS']; ?></td>
     <td><?php echo $s['Nama']; ?></td>
     <td><?php echo $s['JK']; ?></td>
     <td><?php echo $s['Agama']; ?></td> 
     <td><?php echo $s['Kelas']; ?></td>
     <td>
     <?php
	 $qa=mysql_query("Select status from absensi_siswa Where NIS='".$s['NIS']."' and tanggal='".$tglskrg."'");
	 $rca=mysql_fetch_array($qa);
	 echo $rca['status'];
	 ?>     </td>   
      <td>
     <a href="?dir=guru&mod=editabsensisiswa&status=absen&kelas=<?php echo $s['Id_kelas'];?>&tanggal=<?php echo $tglskrg;?>&tahun=<?php echo $s['Thn_ajaran'];?>&smes=<?php echo $s['Semester'];?>&id=<?php echo $s['NIS'];?>"><i class="icon-edit"></i>Absen</a>    <a href="?dir=guru&mod=editabsensisiswa&status=sakit&kelas=<?php echo $s['Id_kelas'];?>&tanggal=<?php echo $tglskrg;?>&tahun=<?php echo $s['Thn_ajaran'];?>&smes=<?php echo $s['Semester'];?>&id=<?php echo $s['NIS'];?>"><i class="icon-edit"></i>Sakit</a>
     <a href="?dir=guru&mod=editabsensisiswa&status=izin&kelas=<?php echo $s['Id_kelas'];?>&tanggal=<?php echo $tglskrg;?>&tahun=<?php echo $s['Thn_ajaran'];?>&smes=<?php echo $s['Semester'];?>&id=<?php echo $s['NIS'];?>"><i class="icon-edit"></i>Izin</a>     </td> 
  </tr>
  <?php
  }
  ?>
</table>
<?php
echo paginate("?dir=guru&mod=absensisiswa&", $page, $total_pages, $adjacents);
?>
</span>