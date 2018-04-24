   <?php
   $id=$_GET['id'];
   $p=mysql_query("SELECT kelas.*, guru.Nama_guru
FROM kelas LEFT JOIN guru ON kelas.NIP_walikelas = guru.NIP Where Id_kelas='".$id."'");
   $rs=mysql_fetch_array($p);
   ?>
    <form class="form-horizontal" method="post">
    <div class="control-group">
    <label for="inputEmail" class="control-label"><strong>Nama Kelas</strong></label>
    <div class="controls">
    <input type="text" id="inputEmail" name="nama" value="<?php echo $rs['Kelas'];?>" placeholder="Nama Kelas">
    </div>
    </div>
    <div class="control-group">
    <label  for="inputEmail" class="control-label"><strong>Tahun Ajaran</strong></label>
    <div class="controls">
    <input type="text" id="inputEmail" name="tahun" value="<?php echo $rs['Thn_ajaran'];?>" placeholder="Tahun Ajaran">
    </div>
    </div>
   <div class="control-group">
    <label for="inputEmail" class="control-label"><strong>Semester</strong></label>
    <div class="controls">
    <select name="semester">
    <option value="Ganjil">Ganjil</option>
    <option value="Genap">Genap</option>
    </select>
    </div>
    </div>
    <div class="control-group">
    <label  for="inputEmail" class="control-label"><strong>Nama Walikelas</strong></label>
    <div class="controls">
    <?php
	$tambah='<option value="'.$rs['NIP_walikelas'].'">'.$rs['Nama_guru'].'</option><option disabled>-</option>';
	echo combodata('nip','guru','NIP','Nama_guru');
	?>
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
		if($_POST['nama']=="")
		{
			MsgBox('Nma kosong');
		}elseif($_POST['tahun']=="")
		{
			MsgBox('Tahun Kosong');
		}elseif($_POST['semester']=="")
		{
			MsgBox('semester Kosong');
		}else{
			if(jika_ada('kelas','Id_kelas',$id)==false)
			{
				MsgBox('Kode Kelas ini belum ada');
			}else{
				if(eksekusi("Update kelas SET `Kelas`='".$_POST['nama']."',`Thn_ajaran`='".($_POST['tahun'])."',`Semester`='".$_POST['semester']."',`NIP_walikelas`='".$_POST['nip']."' 
				Where Id_kelas='".$_GET['id']."'"))
				{
					MsgBox('Berhasil diubah');
					direct('?dir=tu&mod=kelas');
				}else{
					echo mysql_error();
				}
			}
		}
	}
	?>