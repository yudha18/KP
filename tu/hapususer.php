<?php
$id=$_GET['id'];
if(eksekusi("Delete from tuser Where Id_user='".$id."'"))
{
	MsgBox('Berhasil dihapus');
	direct('?dir=tu&mod=user');
}
?>