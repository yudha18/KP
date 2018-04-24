<button class="btn btn-success" onclick="window.location='?dir=tu&mod=addkelas'">Tambah Kelas</button><br />
<form method="post">
Cari berdasarkan
<select name="key">
<option value="Kelas">Kelas</option>
<option value="Thn_ajaran">Tahun Ajaran</option>
<option value="NIP_walikelas">NIP Wali Kelas</option>
<option value="Semester">Semester</option>
</select>
<input type="text" name="cari" />
<input type="submit" class="btn btn-info" name="search" value="Cari" />
</form>
<?php
if(isset($_POST['search']))
{
	$sq1kelas="Select count(Id_kelas) as numrows from kelas Where ".$_POST['key']." LIKE '%".$_POST['cari']."%'";
	$sq2kelas="SELECT kelas.*, guru.Nama_guru
FROM kelas LEFT JOIN guru ON kelas.NIP_walikelas = guru.NIP Where ".$_POST['key']." LIKE '%".$_POST['cari']."%'";
	$_SESSION['sq1kelas']=$sq1kelas;
	$_SESSION['sq2kelas']=$sq2kelas;
}
?>
<?php
$sql1="";
$sql2="";
if(isset($_SESSION['sq1kelas']))
{
	$sql1=$_SESSION['sq1kelas'];
	$sql2=$_SESSION['sq2kelas'];
}else{
	$sql1="Select count(Id_kelas) as numrows from kelas";
	$sql2="SELECT kelas.*, guru.Nama_guru
FROM kelas LEFT JOIN guru ON kelas.NIP_walikelas = guru.NIP";
}
inc_app('paging');
$page = (isset($_REQUEST['page']) && !empty($_REQUEST['page']))?$_REQUEST['page']:1;
$per_page = 3; 
$adjacents  = 3;
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
    <td><div align="center"><strong>Nama Kelas</strong></div></td>
     <td><div align="center"><strong>Tahun Ajaran</strong></div></td>
     <td><div align="center"><strong>Semester</strong></div></td>
     <td><div align="center"><strong>Wali Kelas</strong></div></td> 
     <td><div align="center"><strong>Aksi</strong></div></td>
  </tr>
  <?php
  
  while($s=mysql_fetch_array($querydata))
  {
	  
  ?>
  <tr>
    <td><?php echo $s['Kelas']; ?></td>
     <td><?php echo $s['Thn_ajaran']; ?></td>
     <td><?php echo $s['Semester']; ?></td> 
     <td><?php echo $s['Nama_guru']; ?></td>  
     <td>
     <a href="?dir=tu&mod=editkelas&id=<?php echo $s['Id_kelas'];?>"><i class="icon-edit"></i>Edit</a>
     <a href="?dir=tu&mod=hapuskelas&id=<?php echo $s['Id_kelas'];?>" onclick="return confirm('Yakin hapus data ini?');"><i class="icon-remove"></i>Hapus</a>
     </td>
  </tr>
  <?php
  }
  ?>
</table>
<?php

echo paginate("?dir=tu&mod=kelas&", $page, $total_pages, $adjacents);
?>
</span>