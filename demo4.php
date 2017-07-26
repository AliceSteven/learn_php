<?php 
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = 'db_test';

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
	mysqli_query($link, "set character set utf8");
	$sql = "SELECT * FROM db_table";
	$result = mysqli_query($link, $sql);
	mysqli_query($link, 'set names utf8');
	// $arr = mysqli_fetch_object($result);
	// while ($arr = mysqli_fetch_object($result)) {
	// 	echo $arr->id. "-".$arr->name."-" .$arr->age;
	// 	echo "<br>";
	// }

	// if (mysqli_query($link, "update db_table set age=22 where id=1")){
	// 	echo "修改成功！修改的条数为：";
	// 	echo mysqli_affected_rows($link);
	// }else {
	// 	echo "修改失败！";
	// };
	
	mysqli_query($link, 'INSERT INTO db_table (id, name, age) VALUES (NULL, \'李元芳\', 25)');
	if (mysqli_query($link, 'INSERT INTO db_table (id, name, age) VALUES (NULL, \'李元芳\', 25)')) {
		echo "数据插入成功，插入的数据条数为：";
		echo mysqli_affected_rows($link);
	}else {
		echo "插入失败！";
	}

?>