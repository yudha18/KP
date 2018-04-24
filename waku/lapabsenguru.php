<form method="post">
Nama Guru
<?php echo combodata('guru','guru','Nama_guru','Nama_guru'); ?><br />
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
	direct('laporan/absensiguru.php?guru='.$_POST['guru'].'&tahun='.$_POST['thn'].'&smes='.$_POST['smes'].'',"");
}
?>