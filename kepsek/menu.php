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
	color: #000000;
}
a:active {
	color: #0000FF;
}
-->
</style><div class="alert alert-info" style="height:630px; background-color:#000080">
<ul class="nav nav-list">	
	<li class><h4>Sistem</h3></li>
    Selamat Datang <strong><?php echo $_SESSION['login_username'];?></strong>
    <li><a href="?dir=tu&mod=index">Home</a></li>
    <li><a href="?dir=sistem&mod=password">Ganti Password</a></li>
    <li><a href="?dir=&mod=logout">Log Out</a></li>   
    <li class="nav-header"><h4>Laporan</h3></li>
    <li><a href="laporan/lapguru.php">Laporan Data Guru</a></li>
    <li><a href="?dir=waku&mod=lapabsenguru">Laporan Absensi Guru</a></li>
    <li><a href="?dir=waku&mod=lapjadwal">Laporan Jadwal</a></li>
    <li><a href="?dir=waku&mod=lapbagikelas">Laporan Pembagian Kelas</a></li> 
    <li><a href="?dir=waku&mod=lapabsensiswa">Laporan Absensi Siswa</a></li>
    <li><a href="?dir=wasi&mod=siswa">Laporan Nilai</a></li> 
    <li><a href="?dir=waku&mod=laprekapabsensiswa">Rekap Absen Siswa</a></li>
    <li><a href="?dir=waku&mod=laprekapabsenguru">Rekap Absen Guru</a></li>           
</ul>
</div>