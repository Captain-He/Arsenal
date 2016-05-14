
<?php

	$conn = @mysql_connect("localhost","root","hhhh") or die("数据库连接出错！");//输入相应的数据库地址、用户名和密码

	mysql_select_db("test",$conn);//打开一个数据表，请打开readme.txt在这个表中创建字段

	mysql_query("set names 'GBK'");

?>



