<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="renderer" content="webkit">
	<meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
	<title>发布文章</title>
	<link rel="stylesheet" href="../css/style.css">
	<script type="text/javascript" charset="utf-8" src="../ueditor/ueditor.config.js"></script>
    <script type="text/javascript" charset="utf-8" src="../ueditor/ueditor.all.min.js"> </script>
	<script type="text/javascript" charset="utf-8" src="../ueditor/lang/zh-cn/zh-cn.js"></script>
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
			<h4 class="title">发布文章</h4>
			<form action="article.add.handle.php" id="form1" name="form1" method="post">
				<div class="rows">
					<span>标题</span>
					<div class="row-left">
						<input type="text" name="title" class="default_input" placeholder="请输入文章标题"/>
					</div>
				</div>
				<div class="rows">
					<span>作者</span>
					<div class="row-left">
						<input type="text" name="author" class="default_input" placeholder="请输入作者姓名">
					</div>
				</div>
				<div class="rows">
					<span>简介</span>
					<div class="row-left">
						<textarea name="description" id="" class="default_text" placeholder="请输入文章简介"></textarea>
					</div>
				</div>
				<div class="rows">
					<span>内容</span>
					<div class="row-left">
						<script id="editor" name="content" type="text/plain" style="width:824px; height:500px;"></script>
					</div>
				</div>
				<button type="submit" class="publish_btn">发布</button>
			</form>
		</div>
	</div>
	<script type="text/javascript">
		var ue = UE.getEditor('editor');
	</script>

</body>
</html>