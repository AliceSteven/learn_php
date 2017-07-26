<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
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
		$sql = "SELECT id, name, age FROM db_table";
		$result = mysqli_query($link, $sql);
		mysqli_query($link, 'set names utf8');
		if (mysqli_num_rows($result) > 0) {
			while($row = mysqli_fetch_assoc($result)) {
	        echo "id: " . $row["id"]. " - name: " . $row["name"]. "- age: ". $row["age"]."<br>";
	    }
		}else {
			echo "没有数据！";
		}
	?>	
</body>
</html>