<?php
	error_reporting(0);
	$name = $_POST[cityname];
	
    $ch = curl_init();
     $url = "http://apis.baidu.com/apistore/weatherservice/cityname?cityname=".$name;
    $header = array(
        'apikey:59cea956bc89f0429cc0b331b4e9f12d',
    );
    // 添加apikey到header
    curl_setopt($ch, CURLOPT_HTTPHEADER  , $header);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    // 执行HTTP请求
    curl_setopt($ch , CURLOPT_URL , $url);
    $res = curl_exec($ch);
    $json = json_decode($res);

    echo "城市名称：".$json->{'retData'}->city;
    echo '<br>';
    echo "查询日期：".$json->{'retData'}->date;
    echo '<br>';
    echo "查询时间：".$json->{'retData'}->time;
    echo '<br>';
    echo "天气状况：".$json->{'retData'}->weather;
    echo '<br>';
    echo "最高气温：".$json->{'retData'}->l_tmp;
    echo '<br>';
    echo "最低气温：".$json->{'retData'}->h_tmp;
    echo '<br>';
    echo "风况：".$json->{'retData'}->WD;
    echo $json->{'retData'}->WS;
    echo '<br>';
    echo "日出时间：".$json->{'retData'}->sunrise;
    echo '<br>';
    echo "日落时间：".$json->{'retData'}->sunset;
?>
