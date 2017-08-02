<?php
	header("Content-Type:text/html; charset=utf8");
	require_once('upload.func.php');
	$fileInfo = $_FILES['myFile'];
	$allowExt = array('jpeg', 'jpg', 'gif', 'png', 'txt');
	$newName = upload_file($fileInfo, 'upload', $allowExt, 2097152 ,false);
	echo $newName;
?>