<?php
$id=$_GET['id'];
if(eksekusi("Delete from guru Where NIP='".$id."'"))
{
	MsgBox('Berhasil dihapus');
	direct('?dir=tu&mod=guru');
}
?>