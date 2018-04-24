    <form class="form-horizontal" method="post">
    <div class="control-group">
    <label for="inputEmail" class="control-label"><strong>Username</strong></label>
    <div class="controls">
    <input type="text" id="inputEmail" name="username" placeholder="Username">
    </div>
    </div>
    <div class="control-group">
    <label  for="inputEmail" class="control-label"><strong>Password</strong></label>
    <div class="controls">
    <input type="password" id="inputEmail" name="password" placeholder="Password">
    </div>
    </div>
    <div class="control-group">
    <label for="inputPassword" class="control-label"><strong>Hak Akses</strong></label>
    <div class="controls">
   <select name="akses">
   <option value="tu">Tata Usaha</option>
   <option value="guru">Guru</option>
   <option value="siswa">Siswa</option>
   <option value="waku">Wakil Kurikulum</option>
   <option value="wasi">Wakil Kesiswaan</option>
   <option value="kepsek">Kepala Sekolah</option>
   </select>
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
		if($_POST['username']=="")
		{
			MsgBox('Username kosong');
		}elseif($_POST['password']=="")
		{
			MsgBox('Password Kosong');
		}else{
			if(jika_ada('tuser','Username',$_POST['username']))
			{
				MsgBox('User ini sudah ada');
			}else{
				if(eksekusi("Insert into tuser (`username`,`password`,`Level`) value('".$_POST['username']."','".md5($_POST['password'])."','".$_POST['akses']."')"))
				{
					MsgBox('Berhasil ditambahkan');
					direct('?dir=tu&mod=user');
				}else{
					MsgBox('Gagal ditambahkan');
				}
			}
		}
	}
	?>