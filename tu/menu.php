<style type="text/css">
<!--
a:link {
    color: #ffffff;
}
body,td,th {
    color: #000000;
}
a:visited {
    color: #ffffff;
}
a:hover {
    color: #000000;
    background:-moz-linear-gradient(top,#B4F6FF 5px,#63D0FE 10px,#58B0E7 10px);
}
a:active {
    color: #ffffff;
}
a {
    font-weight: bold;
}
-->
-->
</style><div class="alert alert-info" style="height:1000px; background-color:#000080; color:#ffffff;">
<ul class="nav nav-list">	
    Selamat Datang <strong><?php echo $_SESSION['login_username'];?></strong><br><br>
	<li class="nav-header"><h4 style="color: #ffffff">SISTEM</h4></li><br>
    <li><a href="?dir=tu&mod=index">Home</a></li>
    <li><a href="?dir=sistem&mod=password">Ganti Password</a></li>
    <li><a href="?dir=&mod=logout">Log Out</a></li><br>
    <li class="nav-header"><h4 style="color: #ffffff">Manajemen Sekolah</h4></li><br>
    <li><a href="?dir=tu&mod=user">Data User</a></li>
    <li><a href="?dir=tu&mod=guru">Data Guru</a></li>
    <li><a href="?dir=tu&mod=siswa">Data Siswa</a></li>
    <li><a href="?dir=tu&mod=matpel">Mata Pelajaran</a></li>
    <li><a href="?dir=tu&mod=kelas">Kelas</a></li><br>
    <li class="nav-header"><h4 style="color: #ffffff">Manajemen Absensi</h4></li><br>
    <li><a href="?dir=tu&mod=absensiguru">Absensi Guru</a></li><br>
    <li class="nav-header"><h4 style="color: #ffffff">Laporan</h4></li><br>
    <li><a href="laporan/lapguru.php">Laporan Data Guru</a></li>
    <li><a href="?dir=waku&mod=lapabsenguru">Laporan Absensi Guru</a></li>
    <li><a href="?dir=waku&mod=lapjadwal">Laporan Jadwal</a></li>
    <li><a href="?dir=waku&mod=lapbagikelas">Laporan Pembagian Kelas</a></li> 
    <li><a href="?dir=waku&mod=laprekapabsenguru">Rekap Absen Guru</a></li>
</ul>
</div>