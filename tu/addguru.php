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
    <form class="form-horizontal" method="post">
    <div class="control-group">
    <label for="inputEmail" class="control-label"><strong>NIP</strong></label>
    <div class="controls">
    <input type="text" id="inputEmail" name="nip" placeholder="Nomor Induk Pegawai">
    </div>
    </div>
    <div class="control-group">
    <label  for="inputEmail" class="control-label"><strong>Nama Guru</strong></label>
    <div class="controls">
    <input type="text" class="input-xxlarge" id="inputEmail" name="nama" placeholder="Nama Guru">
    </div>
    </div>
   <div class="control-group">
    <label  for="inputEmail" class="control-label"><strong>Tempat Lahir</strong></label>
    <div class="controls"><strong>
    <input type="text" id="inputEmail" name="tempat" placeholder="Tempat Lahir">
    Tanggal Lahir
    <input type="text" id="datepicker" name="tgl" placeholder="Tanggal Lahir">
    </strong></div>
    </div>
    <div class="control-group">
    <label  for="inputEmail" class="control-label"><strong>Jenis Kelamin</strong></label>
    <div class="controls">
    <select name="jk">
    <option value="Pria">Pria</option>
    <option value="Wanita">Wanita</option>
    </select>
    </div>
    </div>
    <div class="control-group">
    <label  for="inputEmail" class="control-label"><strong>Agama</strong></label>
    <div class="controls">
    <select name="agama">
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
    <select name="jb">
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
	echo combodata('matpel','mata_pelajaran','Id_matapelajaran','Nama_matapelajaran');
	?>
    </div>
    </div>
    <div class="control-group">
    <label  for="inputEmail" class="control-label"><strong>TMT GURU</strong></label>
    <div class="controls">
    <input type="text" id="datepicker2" name="tgl2" placeholder="TMT">
    </div>
    </div>
    <div class="control-group">
    <label for="inputEmail" class="control-label"><strong>Alamat</strong></label>
    <div class="controls">
    <input type="text" class="input-xxlarge" id="inputEmail" name="alamat" placeholder="Alamat Lengkap">
    </div>
    </div>
    <div class="control-group">
    <label  for="inputEmail" class="control-label"><strong>Telepon</strong></label>
    <div class="controls">
    <input type="text"  id="inputEmail" name="tlp" placeholder="Telepon">
    </div>
    </div>
    <div class="control-group">
    <div class="controls">    
    <button type="submit" name="submit" class="btn btn-success">Tambah</button>
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
			if(jika_ada('guru','nip',$_POST['nip']))
			{
				MsgBox('NIP ini sudah ada');
			}elseif(jika_ada('guru','nama',$_POST['nama']))
			{
				MsgBox('Nama ini sudah ada');
			}else{
				$sql="INSERT INTO `guru` (`NIP`, `Nama_guru`, `Tmpt_lahir`, `Tgl_lahir`, `JK`, `Agama`, `Jabatan`, `Id_matapelajaran`, `TMT_guru`, `Alamat`, `Telp`) VALUES ('".$_POST['nip']."', '".$_POST['nama']."', '".$_POST['tempat']."', '".$_POST['tgl']."', '".$_POST['jk']."', '".$_POST['agama']."', '".$_POST['jb']."', '".$_POST['matpel']."', '".$_POST['tgl2']."', '".$_POST['alamat']."', '".$_POST['tlp']."')";
				if(eksekusi($sql))
				{
					MsgBox('Berhasil ditambahkan');
					direct('?dir=tu&mod=guru');
				}else{
					MsgBox('Gagal ditambahkan');
				}
			}
		}
	}
	?>