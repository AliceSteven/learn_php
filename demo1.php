<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<style type="text/css">
	table{border-collapse: collapse;}
</style>
<script type="text/javascript">
	
	// var date = new Date();
	// alert(date)

</script>
<body>
	<?php
	
		echo "服务器时间".date('Y-m-d  H:i:s');

		$bool = true;
		$str = 'string';
		$number = 100;

		var_dump($bool);
		var_dump($str);
		var_dump($number);

		$a = 10;
		$b = $a--;
		echo $b;

		$link = mysqli_connect('localhost', 'root', 'root') or die('数据库连接失败！');

	?>
	<table border="1" align="center" width="600">
		<?php
			$out = 0;
			while ($out < 10) {
				$bgColor = $out%2 == 0 ? '#ffffff' : '#dddddd';
				echo "<tr bgColor=".$bgColor.">";
				$in = 0;
				while ( $in < 10) {
					echo "<td align='center'>".($out*10+$in)."</td>";
					$in++;
				}
				echo "</tr>";
				$out++;
			}

		?>
	</table>

	<?php
		for ($i=1; $i <= 9 ; $i++) { 
			for ($j=1; $j <= $i ; $j++) { 
				echo "<span>$j x $i = ".$j*$i."</span>&nbsp;&nbsp;";
			}
			echo "<br>";
		}

	?>
	<br>
	<br>
	<?php
		for ($i=9; $i >=1 ; $i--) { 
			for ($j=$i; $j >= 1 ; $j--) { 
				echo "<span>$j x $i = ".$j*$i."</span>&nbsp;&nbsp;";
			}
			echo "<br>";
		}

	?>
	

</body>
</html> 
