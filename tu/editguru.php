     <script>
	 $(function() {
$("#datepicker").datepicker({        
		 dateFormat: "yy-mm-dd",
    });
});
$(function() {
$("#datepicker2").datepicker({        
		 dateFormat: "yy-mm-dd",
    });
});
</script>
<?php
   $id=$_GET['id'];
   $p=mysql_query("SELECT guru.*, mata_pelajaran.Nama_matapelajaran
FROM guru LEFT JOIN mata_pelajaran ON guru.Id_matapelajaran = mata_pelajaran.Id_matapelajaran Where NIP='".$id."'");
   $rs=mysql_fetch_array($p);
   ?>
    <form class="form-horizontal" method="post">
    <div class="control-group">
    <label for="inputEmail" class="control-label"><strong>NIP</strong></label>
    <div class="controls">
    <input type="text" id="inputEmail" readonly="readonly" name="nip" value="<?php echo $rs['NIP'];?>" placeholder="Nomor Induk Pegawai">
    </div>
    </div>
    <div class="control-group">
    <label  for="inputEmail" class="control-label"><strong>Nama Guru</strong></label>
    <div class="controls">
    <input type="text" class="input-xxlarge" value="<?php echo $rs['Nama_guru'];?>" id="inputEmail" name="nama" placeholder="Nama Guru">
    </div>
    </div>
   <div class="control-group">
    <label  for="inputEmail" class="control-label"><strong>Tempat Lahir</strong></label>
    <div class="controls">
    <input type="text" id="inputEmail" name="tempat" value="<?php echo $rs['Tmpt_lahir'];?>" placeholder="Tempat Lahir">
    <strong>Tanggal Lahir
    <input type="text" id="datepicker" name="tgl" value="<?php echo $rs['Tgl_lahir'];?>" placeholder="Tanggal Lahir">
    </strong> </div>
    </div>
    <div class="control-group">
    <label  for="inputEmail" class="control-label"><strong>Jenis Kelamin</strong></label>
    <div class="controls">
    <select name="jk">
    <option value="<?php echo $rs['JK'];?>"><?php echo $rs['JK'];?></option>
    <option disabled>-</option>
    <option value="Pria">Pria</option>
    <option value="Wanita">Wanita</option>
    </select>
    </div>
    </div>
    <div class="control-group">
    <label  for="inputEmail" class="control-label"><strong>Agama</strong></label>
    <div class="controls">
    <select name="agama">
    <option value="<?php echo $rs['Agama'];?>"><?php echo $rs['Agama'];?></option>
    <option disabled>-</option>
    <option value="Islam">Islam</option>
    <option value="Kristen">Kristen</option>
    <option value="Hindu">Hindu</option>
    <option value="Budha">Budha</option>
    </select>
    </div>
    </div>
	<div class="control-group">
    <label  for="inputEmail" class="control-label"><strong>Jabatan</strong></label>
    <div class="controls">
    <select name="agama">
    <option value="<?php echo $rs['Jabatan'];?>"><?php echo $rs['Jabatan'];?></option>
    <option disabled>-</option>
    <option value="Kepala Sekolah">Kepala Sekolah</option>
    <option value="Wakil Kurikulum">Wakil Kurikulum</option>
    <option value="Wakil Kesiswaan">Wakil Kesiswaan</option>
    <option value="Guru">Guru</option>
    </select>
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
    <label  for="inputEmail" class="control-label"><strong>TMT GURU</strong></label>
    <div class="controls">
    <input type="text" id="datepicker2" value="<?php echo $rs['TMT_guru'];?>" name="tgl2" placeholder="TMT">
    </div>
    </div>
    <div class="control-group">
    <label for="inputEmail" class="control-label"><strong>Alamat</strong></label>
    <div class="controls">
    <input type="text" class="input-xxlarge" value="<?php echo $rs['Alamat'];?>" id="inputEmail" name="alamat" placeholder="Alamat Lengkap">
    </div>
    </div>
    <div class="control-group">
    <label  for="inputEmail" class="control-label"><strong>Telepon</strong></label>
    <div class="controls">
    <input type="text"  id="inputEmail" name="tlp" value="<?php echo $rs['Telp'];?>" placeholder="Telepon">
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
		if($_POST['nip']=="")
		{
			MsgBox('NIP kosong');
		}elseif($_POST['nama']=="")
		{
			MsgBox('Nama Kosong');
		}elseif($_POST['nama']=="")
		{
			MsgBox('Nama Kosong');
		}elseif($_POST['tempat']=="")
		{
			MsgBox('Tempat Lahir Kosong');
		}elseif($_POST['tgl']=="")
		{
			MsgBox('Tanggal Lahir Kosong');
		}elseif($_POST['tgl2']=="")
		{
			MsgBox('TMT Guru Kosong');
		}elseif($_POST['alamat']=="")
		{
			MsgBox('Alamat Kosong');
		}elseif($_POST['tlp']=="")
		{
			MsgBox('Telepon Kosong');
		}else{
			if(jika_ada('guru','nip',$_POST['nip'])==false)
			{
				MsgBox('NIP ini belum ada');
			}else{
				$sql="Update `guru` SET `Nama_guru`='".$_POST['nama']."', `Tmpt_lahir`='".$_POST['tempat']."', `Tgl_lahir`='".$_POST['tgl']."',`JK`= '".$_POST['jk']."', `Agama`='".$_POST['agama']."', `Jabatan`='".$_POST['jb']."', `Id_matapelajaran`= '".$_POST['matpel']."', `TMT_guru`='".$_POST['tgl2']."', `Alamat`='".$_POST['alamat']."', `Telp`='".$_POST['tlp']."' Where `NIP`='".$_POST['nip']."'";
				if(eksekusi($sql))
				{
					MsgBox('Berhasil diubah');
					direct('?dir=tu&mod=guru');
				}else{
					echo mysql_error();
				}
			}
		}
	}
	?>