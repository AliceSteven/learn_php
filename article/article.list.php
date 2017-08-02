<?php
	// require_once('connect.php');
	// $key = $_GET['key'];
	// $sql = "select * from article where title like '%$key%' order by dateline DESC";
	// $query = mysqli_query($link, $sql);
	// if($query&&mysqli_num_rows($query)) {
	// 	while($row = mysqli_fetch_assoc($query)) {
	// 		$data[] = $row;
	// 	}
	// }
	//1、传入页码
	$page = $_GET["p"];
	$pageSize = 5;
	$showPage = 3;
	//2、根据页码取出数据
	require_once('connect.php');
	$sql = "select * from article  order by dateline DESC limit ".($page-1)*5 .",{$pageSize}";
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
		$page_con .= "<a href='".$_SERVER['PHP_SELF']."?p=1' class='page-off'>首页</a>";
		$page_con .= "<a href='".$_SERVER['PHP_SELF']."?p=".($page-1)."' class='page-prev'>&lt;Prev</a>";
	}
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
		$page_con .= "<a href='".$_SERVER['PHP_SELF']."?p=".$i."' class='page-next'>{$i}</a>";
	}
	if ($page < $total_page) {
		$page_con .= "<a href='".$_SERVER['PHP_SELF']."?p=".($page+1)."' class='page-next'>Next&gt;</a>";
		$page_con .= "<a href='".$_SERVER['PHP_SELF']."?p=".($total_page)."' class='page-next'>尾页</a>";
	}
	
	$page_con .="共{$total_page}页";
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
			<div class="page_container">
				<?php echo $page_con; ?>
			</div>
		</div>
		<div class="right_side">
			<h2 class="search_title">Search</h2>
			<form action="article.search.php" method="get">
				<div class="search_form">
					<input type="text" name="key" class="s" placeholder="请输入关键字检索">
					<button type="submit" class="sub_btn">搜索</button>
				</div>
			</form>
			<!--280*150广告位-->
			<a href="https://www.baidu.com" target="_blank" class="adver"><img src="images/advertising.png" alt=""></a>
			<a href="https://www.baidu.com" target="_blank" class="adver"><img src="images/advertising.png" alt=""></a>
		</div>
	</div>
</body>
</html>