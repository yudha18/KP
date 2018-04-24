<form class="form-horizontal" method="post">
    
   <div class="control-group">
    <label  for="inputEmail" class="control-label"><strong>Mata Pelajaran</strong></label>
    <div class="controls">
    <?php echo combodata('matpel','mata_pelajaran','Id_matapelajaran','Nama_matapelajaran'); ?>
    </div>
  </div>
   
    <div class="control-group">
    <label for="inputEmail" class="control-label"><strong>Nilai Ulangan</strong></label>
    <div class="controls">
    <input type="text" id="inputEmail" name="Nilai_ulangan">
    </div>
  </div>
    <div class="control-group">
    <label for="inputEmail" class="control-label"><strong>Nilai UTS</strong></label>
    <div class="controls">
    <input type="text" id="inputEmail" name="Nilai_uts">
    </div>
  </div>
    <div class="control-group">
    <label for="inputEmail" class="control-label"><strong>Nilai UAS</strong></label>
    <div class="controls">
    <input type="text" id="inputEmail" name="Nilai_uas">
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
		$rata=($_POST['Nilai_ulangan']+$_POST['Nilai_uts']+$_POST['Nilai_uas'])/3;
		$r=mysql_query("Select * from nilai_rinci Where Kd_nilai='".$_GET['id']."' and Id_matapelajaran='".$_POST['matpel']."'");
		$rr=mysql_num_rows($r);
		if($rr > 0)
		{
		$q=mysql_query("update nilai_rinci SET Nilai_ulangan='".$_POST['Nilai_ulangan']."',Nilai_uts='".$_POST['Nilai_uts']."',Nilai_uas='".$_POST['Nilai_uas']."',Rata_rata='".$rata."' Where Kd_nilai='".$_GET['id']."' and Id_matapelajaran='".$_POST['matpel']."'") or die(mysql_error());
		if($q)
		{
			MsgBox("Sukses diubah");
			direct('?dir=guru&mod=nilaisiswa');
		}
		}else{
		$q=mysql_query("Insert into nilai_rinci (`Kd_nilai`,`Id_matapelajaran`,`Nilai_ulangan`,`Nilai_uts`,`Nilai_uas`,`Rata_rata`) values ('".$_GET['id']."','".$_POST['matpel']."','".$_POST['Nilai_ulangan']."','".$_POST['Nilai_uts']."','".$_POST['Nilai_uas']."','".$rata."')") or die(mysql_error());
		if($q)
		{
			MsgBox("Sukses ditambahkan");
			direct('?dir=guru&mod=nilaisiswa');
		}
		}
	}
	?>