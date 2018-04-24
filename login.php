<marquee scrolldelay="100" truespeed="truespeed" align="left"><h2>Silakan Login Terlebih Dahulu !</h2>
</marquee>
<script type="text/javascript"></script>

<?php
if(isset($_SESSION['login_akses']))
{
	direct('?dir='.$_SESSION['login_akses'].'&mod=index');
}
?>

<div>
    <form class="form-horizontal" method="post">
    <div class="control-group"> 
    <label for="inputEmail" class="control-label"><strong>Username</strong></label>
    <div class="controls">
    <input type="text" id="inputEmail" name="username" placeholder="Username">
    </div>
    </div>
    <div class="control-group">
    <label for="inputPassword" class="control-label"><strong>Password</strong></label>
    <div class="controls">
    <input type="password" id="inputPassword" name="pass" placeholder="Password">
    </div>
    </div>
    <div class="control-group">
    <div class="controls">    
    <button type="submit" name="submit" class="btn">Sign in</button>
    </div>
    </div>
    </form>
</div>

<?php
if(isset($_POST['submit']))
{
	$q=mysql_query("Select * from tuser Where username='".$_POST['username']."' and password='".md5($_POST['pass'])."'");
	$rc=mysql_num_rows($q);
	$rs=mysql_fetch_array($q);
	if($rc > 0)
	{
		$_SESSION['login_username']=$_POST['username'];
		$_SESSION['login_akses']=$rs['Level'];
		direct('?dir='.$_SESSION['login_akses'].'&mod=index');
	}else{
		MsgBox("Username dan Password salah !");
	}
}
?>