<?php
	$id=isset($_GET['id'])?$_GET['id']:"";
	$no=base64_decode($id);
	//$no="./base64/001.JPG.64";
	 if(!is_file($no)){
	 	//header("Location:index.html");
	 	return;
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
		echo $data;
	}else{
		//header("Location:index.html");
		return;
	}

?>