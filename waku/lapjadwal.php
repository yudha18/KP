<form method="post">
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
if(isset($_POST['l']))
{
	direct('laporan/lapjadwal.php?kelas='.$_POST['kelas'].'&tahun='.$_POST['thn'].'&smes='.$_POST['smes'].'',"");
}
?>