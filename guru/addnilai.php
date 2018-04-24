
<form class="form-horizontal" method="post">
   
     <div class="control-group">
    <label for="inputEmail" class="control-label"><strong>Tahun Ajaran</strong></label>
    <div class="controls">
    <input type="text" id="inputEmail" name="thn">
    </div>
  </div>
    <div class="control-group">
    <label for="inputEmail" class="control-label"><strong>Semester</strong></label>
    <div class="controls">
    <select name="smes">
    <option value="Ganjil">Ganjil</option>
    <option value="Genap">Genap</option>
    </select>
    </div>
  </div>
    <div class="control-group">
    <label for="inputEmail" class="control-label"><strong>NIS Siswa</strong></label>
    <div class="controls">
    <input type="text" name="nis" />
    </div>
  </div>
     <div class="control-group">
    <label for="inputEmail" class="control-label"><strong>Wali Kelas</strong></label>
    <div class="controls">
    <?php echo combodata("nip","guru","NIP","Nama_guru");?>
    </div>
  </div>
    <div class="control-group">
    <div class="controls">    
    <button type="submit" name="submit" class="btn">Tambah</button>
    </div>
    </div>
</form>
	<?php
	if(isset($_POST['submit']))
	{
		$q=mysql_query("Insert into nilai (`Thn_ajaran`,`Semester`,`NIS`,`NIP`) values ('".$_POST['thn']."','".$_POST['smes']."','".$_POST['nis']."','".$_POST['nip']."')");
		if($q)
		{
			MsgBox("Berhasil tambah data");
			direct('?dir=guru&mod=nilaisiswa');
		}
	}
	?>