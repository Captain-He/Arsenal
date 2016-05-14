<?php	
class Upload{
	//允许上产的类型
	private $allowType;
	//保存错误属性
	private $error;
	//允许上传大小
	private $size;
	//上传路径
	private $path;
	//构造方法
	public function __construct($allowType=NULL,$size=NULL,$path=NULL){
		$this->allowType = is_null($allowType) ? array('jpg','png','gif') : $allowType;
		$this->size = is_null($size) ? 2000000 : $size;
		$this->path = is_null($path) ? './Upload' : $path;
	}
	
	
	//上传方法
	public function up(){
		//1.重组数组,为了单文件和多文件都可以上传
		$arr = $this->resetArr();
		//2.筛选合格的进行上传
		foreach ($arr as $k => $v) {
			if(!$this->filter($v)){
				return false;
			}

		}
		//3.进行移动上传
		$pathArr = array();
		foreach ($arr as $k => $v) {
			$pathArr[] = $this->move($v);
		}
		return $pathArr;
	}
	
	/**
	 * 重组数组
	 */
	private function resetArr(){
		$temp = array();
		foreach ($_FILES as $k => $v) {
			if(is_array($v['name'])){
				foreach ($v['name'] as $key => $value) {
					$temp[] = array(
						'name'=>$value,
						'type'=>$v['type'][$key],
						'tmp_name'=>$v['tmp_name'][$key],
						'error'=>$v['error'][$key],
						'size'=>$v['size'][$key],
					);
				}
			}else{
				$temp[] = $v;
			}
		}
		return $temp;
	}
	/**
	 * 筛选
	 */
	private function filter($v){
		//获得上传文件的类型
		$type = strtolower(ltrim(strrchr($v['name'], '.'),'.'));
		switch (true) {
			case !in_array($type, $this->allowType):
				$this->error = '格式不允许';
				return false;
				break;
			case !is_uploaded_file($v['tmp_name']):
				$this->error = '不是合法的上传文件';
				return false;
			case $v['size'] > $this->size:
				$this->error = '上传文件大小不被允许';
				return false;
			case $v['error'] == 1:
				$this->error = '大小超过了php.ini中 上传的最大限制值';
				return false;
			case $v['error'] == 2:
				$this->error = '大小超过了HTML表单中MAX_FILE_SIZE的值';
				return false;
			case $v['error'] == 3;
				$this->error = '只有部分文件被上传';
				return false;
			case $v['error'] == 4;
				$this->error = '没有文件被上传';
				return false;
			default:
				return true;
		}
	}
	/**
	 * 移动上传
	 */
	private function move($v){
		//获得类型
		$type = ltrim(strrchr($v['name'], '.'),'.');
		//重新组合文件名
		$fillName = time() . mt_rand(1, 99999) . '.' . $type;
		//创建上传目录
		is_dir($this->path) || mkdir($this->path,0777,true);
		//组合全路径
		$fullPath = $this->path . '/' . $fillName;
		//移动上传
		move_uploaded_file($v['tmp_name'], $fullPath);
		return $fullPath;
	}
}
//$upload = new Upload();
//$arr = $upload->up();
//var_dump($arr);
//include './template/upload.html';
?>