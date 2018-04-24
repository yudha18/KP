<button class="btn btn-success" onclick="window.location='?dir=tu&mod=adduser'">Tambah User</button><br />
<p>&nbsp;</p>
<form method="post">
Cari berdasarkan :
<select name="key">
<option value="username">User Name</option>
<option value="Level"> Hak Akses</option>
</select>
&nbsp;
<input type="text" name="cari" />&nbsp;
<input type="submit" name="submit" value="Cari" />
</form>
<?php 
inc_app('paging');
$page = (isset($_REQUEST['page']) && !empty($_REQUEST['page']))?$_REQUEST['page']:1;
$per_page = 20; 
$adjacents  = 20;
$offset = ($page - 1) * $per_page;
$qCount="";
$querydataSQL="";
if(isset($_POST['submit']))
{
$qCount=mysql_query("Select count(username) as numrows from tuser Where ".$_POST['key']." LIKE '%".$_POST['cari']."%'");
$querydataSQL="SELECT * FROM tuser Where ".$_POST['key']." LIKE '%".$_POST['cari']."%'";
}else{
$querydataSQL="SELECT * FROM tuser";
$qCount=mysql_query("Select count(username) as numrows from tuser");
}
$row     = mysql_fetch_array($qCount);
$numrows = $row['numrows']; 
$total_pages = ceil($numrows/$per_page);
$querydata = mysql_query($querydataSQL." LIMIT $offset,$per_page");
?>

<table width="100%" border="5" cellspacing="0" cellpadding="0" class="table table-striped">
  <tr>
    <td><div align="center"><strong>Username</strong></div></td>
     <td><div align="center"><strong>Password</strong></div></td>
     <td><div align="center"><strong>Hak Akses</strong></div></td>
     <td><div align="center"><strong>Aksi</strong></div></td>  
  </tr>
  <?php
  
  while($s=mysql_fetch_array($querydata))
  {
	  
  ?>
  <tr>
    <td><?php echo $s['Username']; ?></td>
     <td><?php echo $s['Password']; ?></td>
     <td>
	 <?php 
	 $lvl=$s['Level'];
	 switch($lvl)
	 {
	 	case "tu":
		echo "Tata Usaha";
		break;
		
		case "siswa":
		echo "Siswa";
		break;
		
		case "guru":
		echo "Guru";
		break;
		
		case "wasi":
		echo "Wakil Kesiswaan";
		break;
		
		case "waku":
		echo "Wakil Kurikulum";
		break;
		
		case "kepsek":
		echo "Kepala Sekolah";
		break;
	 }
	 
	 ?>	 </td>
     <td>
     <a href="?dir=tu&mod=edituser&id=<?php echo $s['Id_user'];?>"><i class="icon-edit"></i>Edit</a>
     <a href="?dir=tu&mod=hapususer&id=<?php echo $s['Id_user'];?>" onclick="return confirm('Yakin hapus data ini?');"><i class="icon-remove"></i>Hapus</a></td>    
  </tr>
  <?php
  }
  ?>
</table>
<?php
echo paginate("?dir=tu&mod=user&", $page, $total_pages, $adjacents);
?>
</span>