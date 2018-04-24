<h3>Data Absensi Guru</h3>
<h3><?php echo tanggal_skrg();?></h3><br />
<?php
inc_app('paging');
$hariskrg=nama_hari();
$tglskrg=date("Y-m-d");
$page = (isset($_REQUEST['page']) && !empty($_REQUEST['page']))?$_REQUEST['page']:1;
$per_page = 10; 
$adjacents  = 10;
$offset = ($page - 1) * $per_page;
$qCount=mysql_query("SELECT count(jadwal.NIP) as numrows ,jadwal.NIP, guru.Nama_guru, mata_pelajaran.Nama_matapelajaran, jadwal.Hari, jadwal.Jam, absensi_guru.status,absensi_guru.Semester,jadwal.Kd_jadwal,jadwal.Thn_ajaran,jadwal.Semester
FROM (((jadwal LEFT JOIN absensi_guru ON jadwal.Kd_jadwal = absensi_guru.Kd_jadwal) LEFT JOIN kelas ON jadwal.Id_kelas = kelas.Id_kelas) LEFT JOIN mata_pelajaran ON jadwal.Id_matapelajaran = mata_pelajaran.Id_matapelajaran) LEFT JOIN guru ON jadwal.NIP = guru.NIP
 Where jadwal.Hari='".$hariskrg."'") or die(mysql_error());
$row     = mysql_fetch_array($qCount);
$numrows = $row['numrows']; 
$total_pages = ceil($numrows/$per_page);
$querydata = mysql_query("SELECT jadwal.NIP, guru.Nama_guru, mata_pelajaran.Nama_matapelajaran, jadwal.Hari, jadwal.Jam, absensi_guru.status,absensi_guru.Semester,jadwal.Kd_jadwal,jadwal.Thn_ajaran,jadwal.Semester
FROM (((jadwal LEFT JOIN absensi_guru ON jadwal.Kd_jadwal = absensi_guru.Kd_jadwal) LEFT JOIN kelas ON jadwal.Id_kelas = kelas.Id_kelas) LEFT JOIN mata_pelajaran ON jadwal.Id_matapelajaran = mata_pelajaran.Id_matapelajaran) LEFT JOIN guru ON jadwal.NIP = guru.NIP
 Where jadwal.Hari='".$hariskrg."'
 LIMIT $offset,$per_page") or die(mysql_error());
?>
<span class="span9">
<table width="100%" border="5" cellspacing="0" cellpadding="0" class="table table-striped">
  <tr>
    <td><div align="center"><strong>NIP</strong></div></td>
     <td><div align="center"><strong>Nama Guru</strong></div></td>   
     <td><div align="center"><strong>Mata Pelajaran</strong></div></td>
     <td><div align="center"><strong>Semester</strong></div></td>
     <td><div align="center"><strong>Tahun Ajaran</strong></div></td>
     <td><div align="center"><strong>Hari</strong></div></td>
     <td><div align="center"><strong>Jam</strong></div></td>
     <td><div align="center"><strong>Status</strong></div></td>
	 <td><div align="center"><strong>Aksi</strong></div></td>
  </tr>
  <?php
  
  while($s=mysql_fetch_array($querydata))
  {
	  
  ?>
  <tr>
    <td><?php echo $s['NIP']; ?></td>
     <td><?php echo $s['Nama_guru']; ?></td>   
     <td><?php echo $s['Nama_matapelajaran']; ?></td> 
     <td><?php echo $s['Semester']; ?></td>
     <td><?php echo $s['Thn_ajaran']; ?></td>
     <td><?php echo $s['Hari']; ?></td>
     <td><?php echo $s['Jam']; ?></td>
     <td>
     <?php	
	 echo $s['status'];
	 ?>     </td>
     <td>
     <a href="?dir=tu&mod=editabsensiguru&status=absen&kdjadwal=<?php echo $s['Kd_jadwal'];?>&tanggal=<?php echo $tglskrg;?>&tahun=<?php echo $s['Thn_ajaran'];?>&smes=<?php echo $s['Semester'];?>&id=<?php echo $s['NIP'];?>"><i class="icon-edit"></i>Absen</a>    <a href="?dir=tu&mod=editabsensiguru&status=sakit&kdjadwal=<?php echo $s['Kd_jadwal'];?>&tanggal=<?php echo $tglskrg;?>&tahun=<?php echo $s['Thn_ajaran'];?>&smes=<?php echo $s['Semester'];?>&id=<?php echo $s['NIP'];?>"><i class="icon-edit"></i>Sakit</a>
     <a href="?dir=tu&mod=editabsensiguru&status=izin&kdjadwal=<?php echo $s['Kd_jadwal'];?>&tanggal=<?php echo $tglskrg;?>&tahun=<?php echo $s['Thn_ajaran'];?>&smes=<?php echo $s['Semester'];?>&id=<?php echo $s['NIP'];?>"><i class="icon-edit"></i>Izin</a>     </td>
  </tr>
  <?php
  }
  ?>
</table>
<?php
echo paginate("?dir=tu&mod=guru&", $page, $total_pages, $adjacents);
?>
</span>