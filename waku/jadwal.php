<button class="btn btn-success" onclick="window.location='?dir=waku&mod=addjadwal'">Tambah Jadwal</button><br />
<?php
inc_app('paging');
$page = (isset($_REQUEST['page']) && !empty($_REQUEST['page']))?$_REQUEST['page']:1;
$per_page = 3; 
$adjacents  = 3;
$offset = ($page - 1) * $per_page;
$qCount=mysql_query("SELECT count(jadwal.Kd_jadwal) as numrows,jadwal.*, kelas.Kelas, mata_pelajaran.Nama_matapelajaran, guru.Nama_guru
FROM ((jadwal LEFT JOIN kelas ON jadwal.Id_kelas = kelas.Id_kelas) LEFT JOIN mata_pelajaran ON jadwal.Id_matapelajaran = mata_pelajaran.Id_matapelajaran) LEFT JOIN guru ON jadwal.NIP = guru.NIP");
$row     = mysql_fetch_array($qCount);
$numrows = $row['numrows']; 
$total_pages = ceil($numrows/$per_page);
$querydata = mysql_query("SELECT jadwal.*, kelas.Kelas, mata_pelajaran.Nama_matapelajaran, guru.Nama_guru
FROM ((jadwal LEFT JOIN kelas ON jadwal.Id_kelas = kelas.Id_kelas) LEFT JOIN mata_pelajaran ON jadwal.Id_matapelajaran = mata_pelajaran.Id_matapelajaran) LEFT JOIN guru ON jadwal.NIP = guru.NIP LIMIT $offset,$per_page");
?>
<span class="span9">
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="table table-striped">
  <tr>
    <td>Tahun Ajaran</td>
     <td>Semester</td>
     <td>Kelas</td>
     <td>Hari</td>
     <td>Jam</td>
     <td>Bidang</td> 
     <td>Guru</td> 
     <td></td>
  </tr>
  <?php
  
  while($s=mysql_fetch_array($querydata))
  {
	  
  ?>
  <tr>
    <td><?php echo $s['Thn_ajaran']; ?></td>
     <td><?php echo $s['Semester']; ?></td>
     <td><?php echo $s['Kelas']; ?></td> 
     <td><?php echo $s['Hari']; ?></td> 
     <td><?php echo $s['Jam']; ?></td> 
     <td><?php echo $s['Nama_matapelajaran']; ?></td>
     <td><?php echo $s['Nama_guru']; ?></td>  
     <td>
     <a href="?dir=waku&mod=editjadwal&id=<?php echo $s['Kd_jadwal'];?>"><i class="icon-edit"></i>Edit</a>
     <a href="?dir=waku&mod=hapusjadwal&id=<?php echo $s['Kd_jadwal'];?>" onclick="return confirm('Yakin hapus data ini?');"><i class="icon-remove"></i>Hapus</a>
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