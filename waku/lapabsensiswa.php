<form method="post">
<strong>Nama Siswa &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </strong><?php echo combodata('siswa','siswa','Nama','Nama'); ?><br />
<strong>Kelas &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</strong><?php echo combodata('kelas','kelas','Kelas','Kelas'); ?><br />
<strong>Tahun Ajaran &nbsp;&nbsp;&nbsp;:
<input type="text" name="thn">
<br>
Semester &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong>&nbsp;&nbsp;&nbsp;<strong>&nbsp;:</strong>
<select name="smes">
<option value="Ganjil">Ganjil</option>
<option value="Genap">Genap</option>
</select>
<br>
<input type="submit" name="l" value="Cari">
</form>
<?php
if(isset($_POST['l']))
{
	direct('laporan/absensiswa.php?siswa='.$_POST['siswa'].'&kelas='.$_POST['kelas'].'&tahun='.$_POST['thn'].'&smes='.$_POST['smes'].'',"");
}
?>