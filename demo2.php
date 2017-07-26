<?php 
	header('Content-type:text/html; charset=utf-8');
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = 'test';

	// try {
	// 	$con = new PDO("mysql:host=$servername; dbname=$dbname", $username, $password);
	// 	echo "数据库连接成功！";
	// }catch(PDOException $e){
	// 	echo $e->getMessage();
	// }


	$link = mysqli_connect($servername, $username, $password, $dbname);
	if (!$link) {
		die('数据库连接失败！');
	}
	$sql = "SELECT id, name FROM test_table3";
	$result = mysqli_query($link, $sql);
	mysqli_query($link, 'SET NAMES UTF8');
	if (mysqli_num_rows($result) > 0) {
		while($row = mysqli_fetch_assoc($result)) {
        echo "id: " . $row["id"]. " - name: " . $row["name"]. "<br>";
    }
	}else {
		echo "没有数据！";
	}
?>	
