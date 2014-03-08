<?php


$proName = @$_POST['prodName'];

$proIns = @$_POST['prodIns'];

$prodOldPri = @$_POST['prodOldPri'];

$prodNewPri = @$_POST['prodNewPri'];

$prodImg = @$_FILES['prodImg']['tmp_name'];

//查询这个用户的目录文件夹,存放图片
//$sql = "select tg_userDir from tg_user where  tg_username = '{$_COOKIE['username']}'";
//$row = _fetch_array($sql);
//$userDir =  $_SERVER['DOCUMENT_ROOT'].$row['tg_userDir'];






echo $proName."<br>";
echo $proIns."<br>";
echo $prodOldPri."<br>";
echo $prodNewPri."<br>";
echo $prodImg."<br>";


