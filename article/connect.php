<?php 
	require_once('config.php');
	//连库
	$link = mysqli_connect(HOST, USERNAME, PASSWORD, DB_NAME);
	if (!$link) {
		die('数据库连接失败！');
	}
	mysqli_query($link, "set character set utf8");

	mysqli_query($link, "set names utf8");


	//选库
	mysqli_select_db($link, "article" );
?>