<?php 
	require_once('../connect.php');
	$id = $_GET['id'];
	$query = mysqli_query($link, "select * from article where id=$id");
	$data = mysqli_fetch_assoc($query);
?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="renderer" content="webkit">
	<meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
	<title>发布文章</title>
	<link rel="stylesheet" href="../css/style.css">
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
			<h4 class="title">修改文章</h4>
			<form action="article.modify.handle.php" id="form1" name="form1" method="post">
				<input type="hidden" name="id" value="<?php echo $data['id'] ?>">
				<div class="rows">
					<span>标题</span>
					<div class="row-left">
						<input type="text" name="title" class="default_input" value="<?php echo $data['title'] ?>" />
					</div>
				</div>
				<div class="rows">
					<span>作者</span>
					<div class="row-left">
						<input type="text" name="author" class="default_input" value="<?php echo $data['author'] ?>">
					</div>
				</div>
				<div class="rows">
					<span>简介</span>
					<div class="row-left">
						<textarea name="description" id="" class="default_text"><?php echo $data['description'] ?></textarea>
					</div>
				</div>
				<div class="rows">
					<span>内容</span>
					<div class="row-left">
						<textarea name="content" id="" class="content_text"><?php echo $data['content'] ?></textarea>
					</div>
				</div>
				<button type="submit" class="publish_btn">修改</button>
			</form>
		</div>
	</div>
</body>
</html>