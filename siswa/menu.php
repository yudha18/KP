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
}
a:active {
    color: #ffffff;
}
a {
    font-weight: bold;
}
-->
</style><div class="alert alert-info" style="height:630px; background-color:#000080; color: #ffffff">
<ul class="nav nav-list">
    Selamat Datang <strong><?php echo $_SESSION['login_username'];?></strong><br><br>	
	<li class="nav-header"><h4 style="color:#ffffff">Sistem</h4></li>
    <li><a href="?dir=tu&mod=index">Home</a></li>
    <li><a href="?dir=sistem&mod=password">Tukar Password</a></li>
    <li><a href="?dir=&mod=logout">Log Out</a></li><br>
    <li class="nav-header"><h4 style="color:#ffffff">Laporan</h3></li> <br>
    <li><a href="?dir=siswa&mod=lapnilaisiswa">Laporan Nilai</a></li> 
    <li><a href="?dir=waku&mod=lapjadwal">Laporan Jadwal</a></li>
    <li><a href="?dir=waku&mod=laprekapnilaisiswa">Rekap Nilai Siswa</a></li>
               
</ul>
</div>