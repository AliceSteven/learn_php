<?php 
	require_once('../connect.php');
	$sql = "select * from article order by id ASC";
	$query = mysqli_query($link, $sql);
	if($query&&mysqli_num_rows($query)) {
		while($row = mysqli_fetch_assoc($query)) {
			$data[] = $row;
		}
	}else {
		$data = array();
	}

?>

<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="renderer" content="webkit">
	<meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
	<title>发布文章</title>
	<link rel="stylesheet" href="../css/style.css">
	<link rel="icon" href="../images/html5.ico">
</head>
<body>
	<div class="container clearfix">
		<div class="headline">
			<h3>文章发布管理系统</h3>
		</div>
		<div class="aside">
			<ul class="aside_menu">
				<li><a href="article.add.php">文章发布</a></li>
				<li><a href="article.manage.php">文章管理</a></li>
			</ul>
		</div>
		<div class="content">
			<h4 class="title">文章管理</h4>
			<form action="article.del.handle.php" id="" name="" method="get">
				<table class="article_table">
					<tbody>
						<tr>
							<td width="100">编号</td>
							<td>标题</td>
							<td width="100">操作</td>
						</tr>
						<?php 
							if(!empty($data)) {
								foreach($data as $value) {	
						?>
						<tr>
							<td><?php echo $value['id'] ?></td>
							<td><?php echo $value['title'] ?></td>
							<td>
								<a class="btn btn-del" href="article.del.handle.php?id=<?php echo $value['id'] ?>">删除</a>
								<a class="btn btn-mod" href="article.modify.php?id=<?php echo $value['id'] ?>">修改</a>
							</td>
						</tr>
						<?php 
								} 
							}
						?>
					</tbody>
				</table>
			</form>
		</div>
	</div>
</body>
</html>