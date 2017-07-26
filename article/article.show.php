<?php 
	require_once('connect.php');
	$id = intval($_GET['id']);
	$sql = "select * from article where id=$id";
	$query = mysqli_query($link, $sql);
	if($query && mysqli_num_rows($query)) {
		$rows = mysqli_fetch_assoc($query);
	}else {
		echo '文章飞到外星球去啦~';
		exit;
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="renderer" content="webkit">
	<meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
	<title>文章详情</title>
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<div class="header">
		<div class="header_content clearfix">
			<span class="logo"><img src="images/html5.ico" width="50" height="50" alt=""></span>
		</div>
	</div>
	<div class="content_body">
		<h1 class="article_title"><?php echo $rows['title'] ?></h1>
		<div class="article_info"><span class="u">作者：<?php echo $rows['author'] ?></span>发布时间：<span class="t"><?php echo $rows['dateline'] ?></span></div>
		<div class="entry">
			<?php echo $rows['content'] ?>
		</div>
	</div>
</body>
</html>