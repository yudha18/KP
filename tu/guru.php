<button class="btn btn-success" onclick="window.location='?dir=tu&mod=addguru'">Tambah Guru</button><br />
<form method="post">
Cari berdasarkan
<select name="key">
<option value="NIP">NIP</option>
<option value="Agama">Agama</option>
<option value="JK">Jenis Kelamin</option>
<option value="Nama_guru">Nama Guru</option>
</select>
<input type="text" name="cari" />
<input type="submit" class="btn btn-info" name="search" value="Cari" />
</form>
<?php
if(isset($_POST['search']))
{
	$sq1guru="Select count(nip) as numrows from guru Where ".$_POST['key']." LIKE '%".$_POST['cari']."%'";
	$sq2guru="SELECT guru.*, mata_pelajaran.Nama_matapelajaran
FROM guru LEFT JOIN mata_pelajaran ON guru.Id_matapelajaran = mata_pelajaran.Id_matapelajaran Where ".$_POST['key']." LIKE '%".$_POST['cari']."%'";
	$_SESSION['sq1guru']=$sq1guru;
	$_SESSION['sq2guru']=$sq2guru;
}
?>
<?php
inc_app('paging');
$page = (isset($_REQUEST['page']) && !empty($_REQUEST['page']))?$_REQUEST['page']:1;
$per_page = 10; 
$adjacents  = 10;
$offset = ($page - 1) * $per_page;
$sql1="";
$sql2="";
if(isset($_SESSION['sq1guru']))
{
	$sql1=$_SESSION['sq1guru'];
	$sql2=$_SESSION['sq2guru'];
}else{
	$sql1="Select count(nip) as numrows from guru";
	$sql2="SELECT guru.*, mata_pelajaran.Nama_matapelajaran
FROM guru LEFT JOIN mata_pelajaran ON guru.Id_matapelajaran = mata_pelajaran.Id_matapelajaran";
}
$qCount=mysql_query($sql1) or die(mysql_error());
$row     = mysql_fetch_array($qCount);
$numrows = $row['numrows']; 
$total_pages = ceil($numrows/$per_page);
$querydata = mysql_query($sql2." LIMIT $offset,$per_page") or die(mysql_error());
?>
<span class="span11">
<table width="100%" border="5" cellspacing="0" cellpadding="0" class="table table-striped">
  <tr>
    <td><strong>NIP</strong></td>
     <td><strong>Nama Guru</strong></td>
     <td><strong>Jenis Kelamin</strong></td> 
     <td><strong>Agama</strong></td>
	 <td><strong>Jabatan</strong></td>
     <td><strong>Mata Pelajaran</strong></td>
	 <td><strong>Aksi</strong></td>
  </tr>
  <?php
  
  while($s=mysql_fetch_array($querydata))
  {
	  
  ?>
  <tr>
    <td><?php echo $s['NIP']; ?></td>
     <td><?php echo $s['Nama_guru']; ?></td>
     <td><?php echo $s['JK']; ?></td>
     <td><?php echo $s['Agama']; ?></td>   
	 <td><?php echo $s['Jabatan']; ?></td>
     <td><?php echo $s['Nama_matapelajaran']; ?></td> 
     <td>
     <a href="?dir=tu&mod=editguru&id=<?php echo $s['NIP'];?>"><i class="icon-edit"></i>Edit</a>
     <a href="?dir=tu&mod=hapusguru&id=<?php echo $s['NIP'];?>" onclick="return confirm('Yakin hapus data ini?');"><i class="icon-remove"></i>Hapus</a>
     </td>
  </tr>
  <?php
  }
  ?>
</table>
<?php

echo paginate("?dir=tu&mod=guru&", $page, $total_pages, $adjacents);
?>
</span>