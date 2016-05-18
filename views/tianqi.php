<!DOCTYPE html>
<html>
<head>
    <title>天气查询</title>
   <?php
    error_reporting(0); 
   $nam = $_POST[cityname]; 
      class tianqi
   {
    public function qi($name)
    {
       
    $ch = curl_init();
    $url = "http://apis.baidu.com/apistore/weatherservice/cityname?cityname=$name";
    $header = array(
        'apikey:59cea956bc89f0429cc0b331b4e9f12d',
    );
    // 添加apikey到header
    curl_setopt($ch, CURLOPT_HTTPHEADER  , $header);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    // 执行HTTP请求
    curl_setopt($ch , CURLOPT_URL , $url);
    $res = curl_exec($ch);
    $city = json_decode($res);    
        return $city;
        }
    }
   $sas = new tianqi();
   $re = $sas->qi($nam);

?>
</head>
<body>
<?php
var_dump($re);

?>
</body>
</html>
