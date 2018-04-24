<button class="btn btn-success" onclick="window.location='?dir=guru&mod=addnilai'">Tambah Siswa</button><br />
<p>&nbsp;</p>
<form method="post">
NIS
<input type="text" name="nis"><br>
Nama
<input type="text" name="nama"><br>
Kelas
<?php echo combodata('kelas','kelas','Kelas','Kelas'); ?><br />
Tahun Ajaran
<input type="text" name="thn"><br>
Semester
<select name="smes">
<option value="Ganjil">Ganjil</option>
<option value="Genap">Genap</option>
</select><br>

<input type="submit" name="l" value="Cari">
</form>
<?php
$sql1="";
$aql2="";
if(isset($_POST['l']))
{
	$sql1="SELECT count(nilai.Kd_nilai) as numrows,nilai.NIS, siswa.Nama, nilai.Thn_ajaran, nilai.Semester, kelas.Kelas, nilai.Rata_rata, guru.Nama_guru
FROM ((nilai LEFT JOIN siswa ON nilai.NIS = siswa.NIS) LEFT JOIN guru ON nilai.NIP = guru.NIP) LEFT JOIN kelas ON siswa.Id_kelas = kelas.Id_kelas Where nilai.Thn_ajaran='".$_POST['thn']."' and nilai.Semester='".$_POST['smes']."' and nilai.NIS='".$_POST['nis']."' and siswa.Nama='".$_POST['nama']."'";
	$sql2="SELECT nilai.Kd_nilai, nilai.NIS, siswa.Nama, nilai.Thn_ajaran, nilai.Semester, kelas.Kelas, nilai.Rata_rata, guru.Nama_guru
FROM ((nilai LEFT JOIN siswa ON nilai.NIS = siswa.NIS) LEFT JOIN guru ON nilai.NIP = guru.NIP) LEFT JOIN kelas ON siswa.Id_kelas = kelas.Id_kelas Where nilai.Thn_ajaran='".$_POST['thn']."' and nilai.Semester='".$_POST['smes']."' and nilai.NIS='".$_POST['nis']."' and siswa.Nama='".$_POST['nama']."'";
}else{
	$sql1="SELECT count(nilai.Kd_nilai) as numrows,nilai.NIS, siswa.Nama, nilai.Thn_ajaran, nilai.Semester, kelas.Kelas, nilai.Rata_rata, guru.Nama_guru
FROM ((nilai LEFT JOIN siswa ON nilai.NIS = siswa.NIS) LEFT JOIN guru ON nilai.NIP = guru.NIP) LEFT JOIN kelas ON siswa.Id_kelas = kelas.Id_kelas;
";
	$sql2="SELECT nilai.Kd_nilai, nilai.NIS, siswa.Nama, nilai.Thn_ajaran, nilai.Semester, kelas.Kelas, nilai.Rata_rata, guru.Nama_guru
FROM ((nilai LEFT JOIN siswa ON nilai.NIS = siswa.NIS) LEFT JOIN guru ON nilai.NIP = guru.NIP) LEFT JOIN kelas ON siswa.Id_kelas = kelas.Id_kelas";
}
?>
<?php
inc_app('paging');
$page = (isset($_REQUEST['page']) && !empty($_REQUEST['page']))?$_REQUEST['page']:1;
$per_page = 10; 
$adjacents  = 10;
$offset = ($page - 1) * $per_page;
$qCount=mysql_query($sql1) or die(mysql_error());
$row     = mysql_fetch_array($qCount);
$numrows = $row['numrows']; 
$total_pages = ceil($numrows/$per_page);
$querydata = mysql_query($sql2." LIMIT $offset,$per_page") or die(mysql_error());
?>
<span class="span11">
<table width="100%" border="5" cellspacing="0" cellpadding="0" class="table table-striped">
  <tr>
    <td><div align="center"><strong>NIS</strong></div></td>
     <td><div align="center"><strong>Nama Siswa</strong></div></td>
     <td><div align="center"><strong>Tahun Ajaran</strong></div></td> 
     <td><div align="center"><strong>Semester</strong></div></td>
     <td><div align="center"><strong>Kelas</strong></div></td>
     <td><div align="center"><strong>Rata-rata</strong></div></td>
     <td><div align="center"><strong>Wali Kelas</strong></div></td>
     <td><div align="center"><strong>Aksi</strong></div></td>
  </tr>
<?php
  
  while($s=mysql_fetch_array($querydata))
  {
	  
   ?>
  <tr>
    <td><?php echo $s['NIS']; ?></td>
     <td><?php echo $s['Nama']; ?></td>
     <td><?php echo $s['Thn_ajaran']; ?></td>
     <td><?php echo $s['Semester']; ?></td> 
     <td><?php echo $s['Kelas']; ?></td> 
     
     <td><?php echo rata2($s['Kd_nilai']);?></td> 
     <td><?php echo $s['Nama_guru']; ?></td>  
      <td>
     <a href="?dir=guru&mod=nilairinci&id=<?php echo $s['Kd_nilai'];?>"><i class="icon-edit"></i>Tambah Nilai</a>     </td> 
  </tr>
  <?php
  }
  ?>
</table>
<?php
echo paginate("?dir=tu&mod=siswa&", $page, $total_pages, $adjacents);
?>
</span>