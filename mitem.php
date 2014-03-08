<?php

define("IN_TG",true);
$id = $_GET['id'];

if (!$id) {
    exit("未选中商品");
}

require $_SERVER['DOCUMENT_ROOT'] . "/functions/mysqlFun.php";
_connect();
_select_db();
_set_names();
$sql = "select tg_id,tg_pName,tg_pIns,tg_pOlodPrice,tg_pMainImg,tg_pNewPrice
              from tg_good where tg_id={$id}";
$row = _fetch_array($sql);
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>商品详情</title>
    <meta name="author" content="www.dabinzhou.com">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="format-detection" content="telephone=no">
    <link rel="stylesheet" type="text/css"
          href="/css/mitem.css">
    <style type="text/css"></style>
</head>
<body id="body">
<header>
    <div class="header">
        <a id="tuanDetailBack" href="javascript:backHis()" class="back"><span></span>返回</a>

        <h2 class="fw-normal">
            【<?php echo $row['tg_pName']?>】<?php echo $row['tg_pIns']?> </h2>
        <div class="btn-area-rt">
            <a href="/m.html" class="btn-sear-rt"></a>
        </div>
    </div>
</header>
<div class="ct">
    <div class="view-img">
        <div id="spinner" class="spinner" style="left:50%;margin:-22px -15px;"></div>
        <div style="min-height:140px;max-height:220px;" class="photo txt-cent" id="div_img">
            <img width="220px" height="120px" src="<?php echo $row['tg_pMainImg']?>">
        </div>
    </div>
    <div class="price bg-type">
        <p class="price-p1 posi-re">
            <strong class="red"><span>￥<?php echo $row['tg_pNewPrice']?></span></strong>&nbsp;&nbsp;
            <del class="ft14">￥<?php echo $row['tg_pOlodPrice']?></del>
        </p>
        <div style="margin-right: 60px;margin-top: -9px;margin-bottom: 7px;">
            <span id="startOrder">
            <a href="/mcart.php?id=<?php echo $row['tg_id'] ?>"
             style="text-align: center;display: block;width: 100%;" class="btn-type">立即购买</a>
            </span>
        </div>
        <p></p>

        <p class="price-p2 posi-re">
            <span class="purchaser ft14"><span></span><strong>8</strong>人已购买</span>
                <span id="time" class="time">
											剩余3天以上									</span>
        </p>
    </div>
    <input type="hidden" value="7579740" id="counterTime">

    <p class="p-txt txt3">仅售<?php echo $row['tg_pNewPrice']?>元，享受价值<?php echo $row['tg_pOlodPrice']?>的尊宠贵宾卡一张。面部水上芭蕾3次+顶级…</p>

    <div class="pd10">
        <ul class="lst-type3">
            <li class="lt-li">
                <a class="lt-a" href="#">本单详情 <span class="li-arrow"></span></a>
            </li>
            <li class="lt-li">
                <a class="lt-a" href="#"> 商家简介<span class="li-arrow"></span></a>
            </li>
        </ul>
    </div>
</div>
<footer>
    <div class="to-top"><a href="#top"><span></span>回顶部</a></div>
    <div class="footer">
        <div>
            <a href="/muser-login.php" style="padding-right: 10px;">登录</a><span class="new-bar2">|</span><a
                href="/muser-register.php" style="padding-left: 10px;">注册</a>
        </div>
        <a href="/m.html" style="padding-right: 10px;">触屏版</a> | <a
            href="#" style="padding-left: 10px;">电脑版</a>

        <div class="gray">Copyright © 2013 Xiangabaoyan <a target="_blank" href="#">鲁ICP备13022210号</a>
        </div>
    </div>
</footer>
</body>
<script>
    function backHis() {
        history.back();
    }
    function showOrHide(id) {
        var tardiv = $("#" + id);
        if (tardiv.css("display") == "none") {
            tardiv.css("display", "block");
        } else {
            tardiv.css("display", "none");
        }
    }
</script>
</html>