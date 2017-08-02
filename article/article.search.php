<?php
	require_once('connect.php');
	$key = $_GET['key'];
	$sql = "select * from article where title like '%$key%' order by dateline DESC";
	$query = mysqli_query($link, $sql);
	if($query&&mysqli_num_rows($query)) {
		while($row = mysqli_fetch_assoc($query)) {
			$data[] = $row;
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="renderer" content="webkit">
	<meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
	<title>文章列表</title>
	<link rel="stylesheet" href="css/style.css">
	<link rel="icon" href="images/html5.ico">
</head>
<body>
	<div class="header">
		<div class="header_content clearfix">
			<span class="logo"><img src="images/html5.ico" width="50" height="50" alt=""></span>
		</div>
	</div>
	<div class="main_body">
		<div class="main_content">
			<?php 
				if(empty($data)) {
					echo "<p class='none'>文章空空如也，请去后台添加吧~</p>";
				}else {
					foreach($data as $value){
			?>
			<div class="items">
				<a href="article.show.php?id=<?php echo $value['id'] ?>" class="big_title"><?php echo $value['title'] ?></a>
				<p class="item_row">作者：<span class="author_name"><?php echo $value['author'] ?></span>发布时间：<span class="publish_time"><?php echo date("Y-m-d H:i:s", $value['dateline']); ?></span></p>
				<p class="describe"><?php echo $value['description'] ?></p>
			</div>
			<?php 
					}
				}
			?>
		</div>
		<div class="right_side">
			<h2 class="search_title">Search</h2>
			<form action="article.search.php" method="get">
				<div class="search_form">
					<input type="text" name="key" class="s" placeholder="请输入关键字检索">
					<button type="submit" class="sub_btn">搜索</button>
				</div>
			</form>
		</div>
	</div>
</body>
</html>