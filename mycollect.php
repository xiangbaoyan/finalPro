<?php
if(!@$_COOKIE['username']){
    exit("请先登录！");
}
define("IN_TG",true);
require $_SERVER['DOCUMENT_ROOT'] . "/functions/mysqlFun.php";
_connect();
_select_db();
_set_names();
//$sql = "select tg_id,tg_pName,tg_pIns,tg_pOlodPrice,tg_pMainImg,tg_pNewPrice
//              from tg_good where tg_id={$id}";
//$row = _fetch_array($sql);

$sql = "select tg_collect from tg_user where tg_username='{$_COOKIE['username']}'";

$row = _fetch_array($sql);

$ids = unserialize($row['tg_collect']);
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
            我的收藏</h2>
        <div class="btn-area-rt">
            <a href="/m.html" class="btn-sear-rt"></a>
        </div>
    </div>
</header>
<div class="ct">
<?php

    foreach($ids as $id){
        $sql = "select tg_id,tg_pMainImg,tg_pName,tg_pIns,tg_pNewPrice,tg_pOlodPrice from tg_good where tg_id='{$id}'";

        $row = _fetch_array($sql);
        ?>
        <div class="thumb" >
            <ul class="lst-type" style="width: 305px;margin: 0 auto">
                <li class="box lt-li">
                    <a class="lt-a" href="/mitem.php?id=<?php echo $row['tg_id'] ?>">
                        <p class="thumb-img" style="width:150px;">
                            <img width="144" height="100" alt="photo" src="<?php echo $row['tg_pMainImg'] ?>"><br>
                        </p>

                            <span class="thumb-cont" style="display:block;padding:5px 8px 0 0px">
							<span style="height:40px;font-size:14px;margin-top: -8px;">
								【<?php echo $row['tg_pName'] ?>】
                                <?php echo $row['tg_pIns'] ?>
                            </span>

                            	<span style="margin-top:-8px;" mode="nowrap">
                                	<strong style="font-size:15px;">￥<?php echo $row['tg_pNewPrice'] ?></strong>
                                </span>
								<span style="margin-top: -6px;" mode="nowrap">
                                	<del style="font-size:12px;">￥<?php echo $row['tg_pOlodPrice'] ?></del>
                                </span>

								<p style="font-size:14px;margin-top: -8px;" class="buy txt2">
                                    <span></span><strong>0</strong>人已购买</p>
								</span>
                    </a>
                </li>
            </ul>
        </div>
    <?php
    }
?>
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
<script src="/js/jquery.min.js"></script>
<script src="/js/jquery.cookie.js"></script>
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