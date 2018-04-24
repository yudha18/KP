<form method="post">
NIS
<input type="text" name="nis"><br>
Tahun Ajaran
<input type="text" name="thn"><br>
Semester
<select name="smes">
<option value="ganjil">Ganjil</option>
<option value="genap">Genap</option>
</select><br>
<input type="submit" name="l" value="Cari">
</form>
<?php
if(isset($_POST['l']))
{
	direct('laporan/lapnilaisiswa.php?id='.$_POST['nis'].'&tahun='.$_POST['thn'].'&smes='.$_POST['smes'].'',"");
}
?>