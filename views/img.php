

<?php

	session_start();

	//������λ�����

	$pattern = '1234567890ABCDEFGHIJKLOMNOPQRSTUVWXYZ';

	for($i = 0; $i < 4; $i++) 

	{

        $code .= $pattern{mt_rand(0, 35)};

	}

	$_SESSION['pic'] = $code;//����������浽session

	$im = imagecreatetruecolor(60,20);//����һ�ſ�60��20���ص�ͼƬ

	$bg = imagecolorallocate($im,222,222,222);//����ͼƬ�ı�����ɫ

	imagefill($im,0,0,$bg);//���뱳����ɫ

	$ft = imagecolorallocate($im,23,122,234);//����������ɫ

	$xian = imagecolorallocate($im,83,186,103);//��������ɫ

	

	$dian = imagecolorallocate($im,205,229,92);//������ɫ

	//imagefill($im,0,0,$dian);

	imageline($im,10,5,50,rand(0,20),$xian);//����һ������

	

	for($i = 0;$i < 100;$i++)//ʹ��forѭ�������ƶ�����

	{

		imagesetpixel($im,rand(10,50),rand(5,40),$dian);

	}

	imagestring($im,6,10,0,$code,$ft);

	//���ͼƬ

	header("Content-type:image/jpeg");

	ob_clean();

	imagejpeg($im);

