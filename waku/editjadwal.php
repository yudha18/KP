   <?php
   $id=$_GET['id'];
   $sql="SELECT jadwal.*, kelas.Kelas, mata_pelajaran.Nama_matapelajaran, guru.Nama_guru
FROM ((jadwal LEFT JOIN kelas ON jadwal.Id_kelas = kelas.Id_kelas) LEFT JOIN mata_pelajaran ON jadwal.Id_matapelajaran = mata_pelajaran.Id_matapelajaran) LEFT JOIN guru ON jadwal.NIP = guru.NIP";
 
   $p=mysql_query($sql." Where Kd_jadwal='".$id."'");
   $rs=mysql_fetch_array($p);
   ?>
    <form class="form-horizontal" method="post">
    <div class="control-group">
    <label for="inputEmail" class="control-label"><strong>Tahun ajaran</strong></label>
    <div class="controls">
    <input type="text" id="inputEmail" value="<?= $rs['Thn_ajaran'];?>" name="thn" placeholder="Tahun Ajaran">
    </div>
    </div>  
   <div class="control-group">
    <label for="inputEmail" class="control-label"><strong>Semester</strong></label>
    <div class="controls">
    <select name="semester">
    <option value="<?= $rs['Semester'];?>"><?= $rs['Semester'];?></option><br>
	<option disabled>-</option>
    <option value="ganjil">Ganjil</option>
    <option value="genap">Genap</option>
    </select>
    </div>
    </div> 
    <div class="control-group">
    <label  for="inputEmail" class="control-label"><strong>Kelas</strong></label>
    <div class="controls">
    <?php
	$tambah='<option value="'.$rs['Id_kelas'].'">'.$rs['Kelas'].'</option><option disabled>-</option>';
	echo combodata('kelas','kelas','Id_kelas','Kelas','',$tambah);
	?>
    </div>
    </div>
   <div class="control-group">
    <label  for="inputEmail" class="control-label"><strong>Mata Pelajaran</strong></label>
    <div class="controls">
    
    <?php 
	$tambah='<option value="'.$rs['Id_matapelajaran'].'">'.$rs['Nama_matapelajaran'].'</option><option disabled>-</option>';
	echo combodata('matpel','mata_pelajaran','Id_matapelajaran','Nama_matapelajaran','',$tambah); 
	?>
    </div>
    </div>
    <div class="control-group">
    <label  for="inputEmail" class="control-label"><strong>Guru</strong></label>
    <div class="controls">
    <?php
	$tambah='<option value="'.$rs['NIP'].'">'.$rs['Nama_guru'].'</option><option disabled>-</option>';
	echo combodata('guru','guru','NIP','Nama_guru','',$tambah);
	?>
    </div>
    </div>
    <div class="control-group">
    <label for="inputEmail" class="control-label"><strong>Hari</strong></label>
    <div class="controls">
    <input type="text" id="inputEmail" value="<?= $rs['Hari'];?>" name="hari" placeholder="Hari exp Rabu">
    </div>
    </div> 
    <div class="control-group">
    <label for="inputEmail" class="control-label"><strong>Jam</strong></label>
    <div class="controls">
    <input type="text" id="inputEmail" value="<?= $rs['Jam'];?>" name="jam" placeholder="Jam exp 11:56">
    </div>
    </div> 
    <div class="control-group">
    <div class="controls">    
    <button type="submit" name="submit" class="btn">Ubah</button>
    <button type="button" class="btn btn-inverse" onclick="javascript:history.go(-1)">Batal</button>
    </div>
    </div>
    </form>
    
    <?php
	if(isset($_POST['submit']))
	{
		if($_POST['thn']=="")
		{
			MsgBox('Tahun kosong');		
		}elseif($_POST['hari']=="")
		{
			MsgBox('Hari Kosong');
		}elseif($_POST['jam']=="")
		{
			MsgBox('Jam Kosong');
		}else{
			$v=mysql_query("Select * from jadwal Where Kd_jadwal='".$id."'") or die(mysql_error());
			$vq=mysql_num_rows($v);
			if($vq > 0)
			{				
				if(eksekusi("Update jadwal SET Thn_ajaran='".$_POST['thn']."',Semester='".$_POST['semester']."',Id_Kelas='".$_POST['kelas']."',Id_matapelajaran='".$_POST['matpel']."',NIP='".$_POST['guru']."',Hari='".$_POST['hari']."',Jam='".$_POST['jam']."' Where Kd_jadwal='".$id."'"))
				{
					MsgBox('Berhasil diubah');
					direct('?dir=waku&mod=jadwal');
				}else{
					echo mysql_error();
				}
			}else{
				echo mysql_error();
			}		
		}
	}
	?>