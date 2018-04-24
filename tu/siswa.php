<button class="btn btn-success" onclick="window.location='?dir=tu&mod=addsiswa'">Tambah Siswa</button><br />
<form method="post">
Cari berdasarkan
<select name="key">
<option value="NIS">NIS</option>
<option value="nama">Nama</option>
<option value="Agama">Agama</option>
<option value="JK">Jenis Kelamin</option>
<option value="Kelas">Kelas</option>
</select>
<input type="text" name="cari" />
<input type="submit" class="btn btn-info" name="search" value="Cari" />
</form>
<?php
if(isset($_POST['search']))
{
	$sq1siswa="Select count(NIS) as numrows ,kelas.Kelas
FROM siswa LEFT JOIN kelas ON siswa.Id_kelas = kelas.Id_kelas Where ".$_POST['key']." LIKE '%".$_POST['cari']."%'";
	$sq2siswa="SELECT siswa.*, kelas.Kelas
FROM siswa LEFT JOIN kelas ON siswa.Id_kelas = kelas.Id_kelas Where ".$_POST['key']." LIKE '%".$_POST['cari']."%'";
	$_SESSION['sq1siswa']=$sq1siswa;
	$_SESSION['sq2siswa']=$sq2siswa;
}
?>
<?php
$sql1="";
$sql2="";
if(isset($_SESSION['sq1siswa']))
{
	$sql1=$_SESSION['sq1siswa'];
	$sql2=$_SESSION['sq2siswa'];
}else{
	$sql1="Select count(NIS) as numrows ,kelas.Kelas
FROM siswa LEFT JOIN kelas ON siswa.Id_kelas = kelas.Id_kelas";
	$sql2="SELECT siswa.*, kelas.Kelas
FROM siswa LEFT JOIN kelas ON siswa.Id_kelas = kelas.Id_kelas";
}
inc_app('paging');
$page = (isset($_REQUEST['page']) && !empty($_REQUEST['page']))?$_REQUEST['page']:1;
$per_page = 10; 
$adjacents  = 10;
$offset = ($page - 1) * $per_page;
$qCount=mysql_query($sql1) or die(mysql_error());
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
     <a href="?dir=tu&mod=editsiswa&id=<?php echo $s['NIS'];?>"><i class="icon-edit"></i>Edit</a>
     <a href="?dir=tu&mod=hapussiswa&id=<?php echo $s['NIS'];?>" onclick="return confirm('Yakin hapus data ini?');"><i class="icon-remove"></i>Hapus</a>
     </td> 
  </tr>
  <?php
  }
  ?>
</table>
<?php

echo paginate("?dir=tu&mod=siswa&", $page, $total_pages, $adjacents);
?>
</span>