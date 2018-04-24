<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Sistem Informasi Akademik SMK 1 Pleret</title>
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="css/jquery-ui.css" rel="stylesheet" type="text/css" />
<script src="js/jquery.js"></script>
    <script src="js/jquery-ui.js"></script>
    <style type="text/css">
<!--
.style1 {color: #000000}
.style2 {color: #ffffff}
a:link {
	color: #ffffff;
    font-weight: bold;
}
a:visited {
	color: #ffffff;
}
a:hover {
	color: #000000;
    background:-moz-linear-gradient(top,#B4F6FF 5px,#63D0FE 10px,#58B0E7 10px);
}
a:active {
	color: #000000;
}
.style5 {
	font-family: "Times New Roman", Times, serif;
	font-weight: bold;
	font-size: 16px;
	color: #FFFFFF;
}
.style6 {font-family: "Times New Roman", Times, serif}
.style7 {color: #FFFFFF}
-->
    </style>
</head>

<body style="background-color:#CCCCCC">
<div class="row-fluid" style="background-color:#000080;color:#FFF">
    <div class="container-fluid">
    <div class="row-fluid">
    <div class="span2">
    <img src="img/smk.png" />    </div>
    <div class="span8">
    <h1 align="center" class="style7"><span class="style6">Sistem Informasi Akademik</span> <br>
      <span class="style6">SMK NEGERI 1 PLERET</span></h1>
    <p align="center" class="style1"><span class="style5">Jl. Imogiri Timur Km 09 Jati, Wonokromo, Pleret, Bantul, Yogyakarta  Kode Pos 55791 Telp. (0274) 4399846, 4399847 Fax. 02744399847 Email : smkn1pleret@gmail.com. Website : www.smkn1pleret.sch.id</span></p>
    </div>
	 <div class="span2">
    <img src="img/smkbisa.png" />    </div>
    </div>
    </div>
    
</div>
<p>&nbsp;</p>
       <div class="container-fluid">
       
    <div class="row-fluid">
    
    <div class="span2">
    <?php
	if(isset($_SESSION['login_akses']))
	{
		include($_SESSION['login_akses'].'/menu.php');
	}else{
	?>
    <div class="alert alert-info" style="height:540px; background-color:#000080">
    <ul class="nav nav-list">
              <li class="nav-header"><h3 class="style7">Menu</h3>
              </li>
              <li><a href="index.php">Home</a></li>
              <li><a href="?dir=&mod=login">Login</a></li>                         
    </ul>
    </div>
    <?php
	}
	?>
    </div>
    <div class="span10" >