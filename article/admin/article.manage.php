<?php 
	// require_once('../connect.php');
	// $sql = "select * from article order by id ASC";
	// $query = mysqli_query($link, $sql);
	// if($query&&mysqli_num_rows($query)) {
	// 	while($row = mysqli_fetch_assoc($query)) {
	// 		$data[] = $row;
	// 	}
	// }else {
	// 	$data = array();
	// }
	//1、传入页码
	$page = $_GET["p"];
	$pageSize = 10;
	$showPage = 3;
	//2、根据页码取出数据
	require_once('../connect.php');
	if (isset($page)) {
		$sql = "select * from article order by dateline ASC limit ".($page-1)*10 .",{$pageSize}";
	}else{
		$sql = "select * from article order by dateline ASC limit 0 ,{$pageSize}";
	}
	$query = mysqli_query($link, $sql);
	if($query&&mysqli_num_rows($query)) {
		while($row = mysqli_fetch_assoc($query)) {
			$data[] = $row;
		}
		//释放结果，关闭链接
		mysqli_free_result($query);
	}
	//获取数据总数
	$total_sql = "select count(*) from article";
	$total_result = mysqli_fetch_array(mysqli_query($link, $total_sql));
	$total = $total_result[0];
	//计算页数
	$total_page = ceil($total/$pageSize);
	mysqli_close($link);
	//3、显示数据+分页条
	$page_con = "";
	//计算偏移量
	$pageOffset = ($showPage-1)/2;
	//初始化数据
	if ($page > 1) {
		$page_con .= "<a href='".$_SERVER['PHP_SELF']."?p=1' class='page-prev'>首页</a>";
		$page_con .= "<a href='".$_SERVER['PHP_SELF']."?p=".($page-1)."' class='page-prev'>&lt;Prev</a>";
	}else {
		$page_con .="<a href='javascript:;' class='page-disabled'>首页</a>";
		$page_con .="<a href='javascript:;' class='page-disabled'>&lt;Prev</a>";
	}
	//初始化数据
	$start = 1;
	$end = $total_page;
	if ($total_page > $showPage) {
		if ($page > $pageOffset+1) {
			$page_con .= "<span>···</span>";
		}
		if ($page > $pageOffset) {
			$start = $page - $pageOffset;
			$end = $total_page > $page+$pageOffset ? $page+$pageOffset : $total_page;
		}else {
			$start = 1;
			$end = $total_page > $showPage ? $showPage : $total_page;
		}
		if ($page+$pageOffset > $total_page) {
			$start = $start - ($page+$pageOffset - $end);
		}

	}
	for ($i=$start; $i <= $end ; $i++) { 
		if ($page == $i) {
			$page_con .= "<a href='javascript:;' class='page-on'>{$i}</a>";
		}else{
			$page_con .= "<a href='".$_SERVER['PHP_SELF']."?p=".$i."' class='page-off'>{$i}</a>";
		}
	}

	if ($total_page > $showPage && $total_page > $page+$pageOffset) {
		$page_con .= "<span>···</span>";
	}
	if ($page < $total_page) {
		$page_con .= "<a href='".$_SERVER['PHP_SELF']."?p=".($page+1)."' class='page-next'>Next&gt;</a>";
		$page_con .= "<a href='".$_SERVER['PHP_SELF']."?p=".($total_page)."' class='page-next'>尾页</a>";
	}else {
		$page_con .="<a href='javascript:;' class='page-disabled'>Next&gt;</a>";
		$page_con .="<a href='javascript:;' class='page-disabled'>尾页</a>";
	}
	
	$page_con .="共{$total_page}页，";
	$page_con .="<form action='article.list.php' method='get' class='page-form'>";
	$page_con .="到第<input type='text' class='page-in' name='p'>页，";
	$page_con .="<button type='submit' class='page-btn'>确定</button>";
	$page_con .="</form>";

?>

<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="renderer" content="webkit">
	<meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
	<title>管理文章</title>
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
				<div class="page_container">
					<?php echo $page_con; ?>
				</div>
			</form>
		</div>
	</div>
</body>
</html>