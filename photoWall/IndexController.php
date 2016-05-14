<?php	
class IndexController{
	
	
	
	/**
	 * 首页
	 */
	public function index(){
		$data = include './data.php';
		//var_dump($data);
		//载入模板文件
		include './template/index.html';
	}
	/**
	 * 上传页
	 */
	public function upload(){
		$data = include './data.php';
		if(!empty($_FILES)){
			$upload = new Upload();
			$path = $upload->up();
			//var_dump($path);
			foreach ($path as $k => $v) {
				$data[] = array('pic'=>$v,'time'=>time());
			}
			//var_dump($data);
			$str = var_export($data,true);
			$str = <<<str
<?php
return {$str};
?>
str;
			file_put_contents('./data.php', $str);
			echo '<script>alert("上传成功");location.href="index.php"</script>';
		}
		//载入模板
		include './template/upload.html';
	}
}
