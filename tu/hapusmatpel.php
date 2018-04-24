<?php
$id=$_GET['id'];
if(eksekusi("Delete from mata_pelajaran Where Id_matapelajaran='".$id."'"))
{
	MsgBox('Berhasil dihapus');
	direct('?dir=tu&mod=matpel');
}
?>