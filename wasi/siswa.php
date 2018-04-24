<!----<button class="btn btn-success" onclick="window.location='?dir=tu&mod=addsiswa'">Tambah User</button><br /><!---->
<form method="post">
<strong>Cari berdasarkan</strong>
<select name="key">
<option value="NIS">NIS</option>
<option value="Agama">Agama</option>
<option value="JK">Jenis Kelamin</option>
<option value="kelas.Kelas">Kelas</option>
</select>
<input type="text" name="cari" />
<input type="submit" class="btn btn-info" name="search" value="Cari" />
</form>
<?php
if(isset($_POST['search']))
{
	$sq1="SELECT count(siswa.NIS) as numrows,siswa.*, kelas.Kelas, kelas.Semester, kelas.Thn_ajaran
FROM siswa LEFT JOIN kelas ON siswa.Id_kelas = kelas.Id_kelas Where ".$_POST['key']." LIKE '%".$_POST['cari']."%'";
	$sq2="SELECT siswa.*, kelas.Kelas, kelas.Semester, kelas.Thn_ajaran
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
	$sql1="SELECT count(siswa.NIS) as numrows,siswa.*, kelas.Kelas, kelas.Semester, kelas.Thn_ajaran
FROM siswa LEFT JOIN kelas ON siswa.Id_kelas = kelas.Id_kelas";
	$sql2="SELECT siswa.*, kelas.Kelas, kelas.Semester, kelas.Thn_ajaran
FROM siswa LEFT JOIN kelas ON siswa.Id_kelas = kelas.Id_kelas";
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
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="table table-striped">
  <tr>
    <td>NIS</td>
     <td>Nama Siswa</td>
     <td>Jenis Kelamin</td> 
     <td>Agama</td>
     <td>Kelas</td>
     <td></td>
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
     <a href="?dir=guru&mod=carinilaisiswa&id=<?php echo $s['NIS'];?>"><i class="icon-file"></i>Cetak</a>
     
     </td> 
  </tr>
  <?php
  }
  ?>
</table>
<?php
unset($_SESSION['sq1']);
unset($_SESSION['sq2']);
echo paginate("?dir=tu&mod=siswa&", $page, $total_pages, $adjacents);
?>
</span>