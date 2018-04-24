<?php
session_start();
date_default_timezone_set('Asia/Jakarta');
include("fungsi.php");
include("koneksi.php");
include('header.php');
if(isset($_GET['dir']) || isset($_GET['mod']))
{
	$mod=$_GET['mod'];
	$dir=$_GET['dir'];
	
	include($dir."/".$mod.".php");
		
}else{
	include('home.php');
}
include('footer.php');
?>