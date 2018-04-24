<button class="btn btn-success" onclick="window.location='?dir=tu&mod=addmatpel'">Tambah Mata Pelajaran</button><br />
<form method="post">
Cari berdasarkan
<select name="key">
<option value="Kd_matapelajaran">Kode Bidang Studi</option>
<option value="Nama_matapelajaran">Nama Bidang Studi</option>
<option value="SKBM">SKBM</option>
</select>
<input type="text" name="cari" />
<input type="submit" class="btn btn-info" name="search" value="Cari" />
</form>
<?php
if(isset($_POST['search']))
{
	$sq1matpel="Select count(Id_matapelajaran) as numrows from mata_pelajaran Where ".$_POST['key']." LIKE '%".$_POST['cari']."%'";
	$sq2matpel="SELECT * FROM mata_pelajaran Where ".$_POST['key']." LIKE '%".$_POST['cari']."%'";
	$_SESSION['sq1matpel']=$sq1matpel;
	$_SESSION['sq2matpel']=$sq2matpel;
}
?>
<?php
$sql1="";
$sql2="";
if(isset($_SESSION['sq1matpel']))
{
	$sql1=$_SESSION['sq1matpel'];
	$sql2=$_SESSION['sq2matpel'];
}else{
	$sql1="Select count(Id_matapelajaran) as numrows from mata_pelajaran";
	$sql2="SELECT * FROM mata_pelajaran";
}
inc_app('paging');
$page = (isset($_REQUEST['page']) && !empty($_REQUEST['page']))?$_REQUEST['page']:1;
$per_page = 10; 
$adjacents  = 10;
$offset = ($page - 1) * $per_page;
$qCount=mysql_query($sql1);
$row     = mysql_fetch_array($qCount);
$numrows = $row['numrows']; 
$total_pages = ceil($numrows/$per_page);
$querydata = mysql_query($sql2." LIMIT $offset,$per_page");
?>
<span class="span7">
<table width="100%" border="5" cellpadding="0" cellspacing="0" class="table table-striped">
  <tr>
    <td><div align="center"><strong>Kode Mata Pelajaran</strong></div></td>
     <td><div align="center"><strong>Nama Mata Pelajaran</strong></div></td>
     <td><div align="center"><strong>SKBM</strong></div></td> 
     <td><div align="center"><strong>Aksi</strong></div></td>
  </tr>
  <?php
  
  while($s=mysql_fetch_array($querydata))
  {
	  
  ?>
  <tr>
    <td><?php echo $s['Kd_matapelajaran']; ?></td>
     <td><?php echo $s['Nama_matapelajaran']; ?></td>
     <td><?php echo $s['SKBM']; ?></td>  
     <td>
     <a href="?dir=tu&mod=editmatpel&id=<?php echo $s['Id_matapelajaran'];?>"><i class="icon-edit"></i>Edit</a>
     <a href="?dir=tu&mod=hapusmatpel&id=<?php echo $s['Id_matapelajaran'];?>" onclick="return confirm('Yakin hapus data ini?');"><i class="icon-remove"></i>Hapus</a>
     </td>
  </tr>
  <?php
  }
  ?>
</table>
<?php
echo paginate("?dir=tu&mod=matpel&", $page, $total_pages, $adjacents);
?>
</span>