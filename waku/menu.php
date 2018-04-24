<style type="text/css">
<!--
a:link {
	color: #000000;
	font-weight: bold;
}
body,td,th {
	color: #000000;
}
a:visited {
	color: #000000;
}
a:hover {
	color: #0000FF;
}
a:active {
	color: #0000FF;
}
-->
</style><div class="alert alert-info" style="height:740px; background-color:#000080">
<ul class="nav nav-list">	
	<li class="nav-header"><h4>Sistem</h3></li>
    Selamat Datang <strong><?php echo $_SESSION['login_username'];?></strong>
    <li><a href="?dir=tu&mod=index">Home</a></li>
    <li><a href="?dir=sistem&mod=password">Ganti Password</a></li>
    <li><a href="?dir=&mod=logout">Log Out</a></li> 
    <li class="nav-header"><h4>Manajemen Sekolah</h3></li>
    <li><a href="?dir=tu&mod=guru">Data Guru</a></li>
    <li><a href="?dir=tu&mod=siswa">Data Siswa</a></li>
    <li><a href="?dir=tu&mod=matpel">Mata Pelajaran</a></li>
    <li><a href="?dir=waku&mod=jadwal">Data Jadwal</a></li>
    <li class="nav-header"><h4>Absensi</h3></li>
    <li><a href="?dir=tu&mod=absensiguru">Absensi Guru</a></li>
    <li><a href="?dir=guru&mod=absensisiswa">Absensi Siswa</a></li>
	<li class="nav-header"><h4>Manajemen Nilai</h3></li>
    <li><a href="?dir=guru&mod=nilaisiswa">Data Nilai</a></li>  
    <li class="nav-header"><h4>Laporan</h3></li>
    <li><a href="laporan/lapguru.php">Laporan Data Guru</a></li>
	 <li><a href="?dir=waku&mod=lapbagikelas">Laporan Pembagian Kelas</a></li>
    <li><a href="?dir=waku&mod=lapabsenguru">Laporan Absensi Guru</a></li>
    <li><a href="?dir=waku&mod=lapabsensiswa">Laporan Absensi Siswa</a></li>
    <li><a href="?dir=waku&mod=lapjadwal">Laporan Jadwal</a></li>
    <li><a href="?dir=waku&mod=laprekapabsensiswa">Rekap Absen Siswa</a></li>
    <li><a href="?dir=waku&mod=laprekapabsenguru">Rekap Absen Guru</a></li>
    <li><a href="?dir=waku&mod=laprekapnilaisiswa">Rekap Nilai Siswa</a></li>
     
               
</ul>
</div>