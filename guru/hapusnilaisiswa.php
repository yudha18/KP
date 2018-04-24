<?php
$id=$_GET['id'];
if(eksekusi("Delete from nilai Where NIS='".$id."'"))
{
	MsgBox('Berhasil dihapus');
	direct('?dir=guru&mod=nilaisiswa');
}
?>