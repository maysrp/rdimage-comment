<?php
	$id=isset($_GET['id'])?$_GET['id']:"";
	$no=base64_decode($id);
	//$no="./base64/001.JPG.64";
	 if(!is_file($no)){
	 	header("Location:index.html");
	 }
	$name=md5($no);
	
	$dir=str_replace("/base64/","/image/",$no);
	$length=strlen($dir);
	$dir=substr($dir,0,$length-3);
	$info=getimagesize($dir);
	if($info){
		$mime=$info['mime'];
		$img=file_get_contents($no);
		$data="data:".$mime.";base64,".$img;
	}else{
		header("Location:index.html");
	}

?>
<!DOCTYPE html>
<html>
<head>
	<title>图片:<?php echo $name ?></title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.0/css/bootstrap.min.css">
        <script src="https://cdn.bootcss.com/jquery/1.11.1/jquery.min.js"></script>
        <script src="https://cdn.bootcss.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
	<meta charset="utf-8">
</head>
<body class="container">
	<div class="row" style="margin: 30px;">
		<h2><a href="index.html">每日一图</a></h2>
	</div>
	<div class="row text-center" >
		<h3>图片:<?php echo $name ?></h3>
		<div class="text-center row">
			<img src="<?php echo $data ?>" width="100%">
		</div>
	</div>
	<div class="row comment">
		
<div id="cloud-tie-wrapper" class="cloud-tie-wrapper"></div>
<script src="https://img1.cache.netease.com/f2e/tie/yun/sdk/loader.js"></script>
<script>
var cloudTieConfig = {
  url: document.location.href, 
  sourceId: "",
  productKey: "3cb7af11669242babf7e8fafca356c3f",
  target: "cloud-tie-wrapper"
};
var yunManualLoad = true;
Tie.loader("aHR0cHM6Ly9hcGkuZ2VudGllLjE2My5jb20vcGMvbGl2ZXNjcmlwdC5odG1s", true);
</script>


	</div>
	<div class="row">
		<h3><a href="index.html">返回首页</a></h3>
	</div>
	<div class="row footer">
		<P class="text-muted">图片全部来自网络若侵权请发邮件到admin[at]nyanya.tv,我们会及时删除。</P>
	</div>
</body>
</html>