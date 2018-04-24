<form method="post">
<input type="hidden" name="nis" value="<?= $_GET['id'];?>"/>
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
	direct('laporan/lapnilaisiswa.php?tahun='.$_POST['thn'].'&smes='.$_POST['smes'].'&id='.$_POST['nis'].'',"");
}
?>