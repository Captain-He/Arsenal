<?php	
header('Content-type:text/html;charset=utf-8');
//设置时区
date_default_timezone_set('PRC');
//载入上传类
include './upload.class.php';
//载入IndexController
include './IndexController.php';

//实例化
$controller = new IndexController;
$action = isset($_GET['a']) ? $_GET['a'] : 'index';
$controller->$action();
