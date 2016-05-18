<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php
	error_reporting(0); 
	include("conn.php");
	$email = $_POST['email'];//取得用户输入的email
	$psd = $_POST['psd'];//取得用户输入的密码
	$sql = "SELECT nicheng,users,pass FROM deng WHERE users = '$email'";//SQL查询
	$query = mysql_query($sql);//执行SQL语句
	$row = mysql_fetch_array($query);
	$user = $row[users];//将查询的结果赋值
	$pass = $row[pass];//将查询的结果赋值	
	$name = $row[nicheng];
	if(isset($_POST['denglu']))//当用户点击登录按钮时
	{
		if($user == $email && $pass == $psd)//验证用户名和密码是否一致
		{
			echo $name.'登陆成功';
			echo '<div/>';
			echo'<a href="../photoWall/index.php">点击进入照片墙</a> ';
			echo '<div/>';
			echo '<a href="tianqii.html">点击查询天气状况</a>';
			
			
			//用户名和密码一致，跳转到指定页面
		}
		else
		{
			echo "<script>alert('帐户名或密码错误！');history.go(-1)</script>";//用户名和密码不一致，跳转到当前页面重新输入
		}
	}	
?> 

</body>
</html>
