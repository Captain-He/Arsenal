
<?php

	$conn = @mysql_connect("localhost","root","hhhh") or die("���ݿ����ӳ���");//������Ӧ�����ݿ��ַ���û���������

	mysql_select_db("test",$conn);//��һ�����ݱ����readme.txt��������д����ֶ�

	mysql_query("set names 'GBK'");

?>



