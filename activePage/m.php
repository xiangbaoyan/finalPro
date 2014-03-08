<?php
define('IN_TG',true);
require $_SERVER['DOCUMENT_ROOT'] . "/functions/mysqlFun.php";

$name = @$_POST['name'];
$con = @$_POST['con'];

_connect();
_select_db();
_set_names();

//更新操作
if ($name && $con) {
    if ($name == 'title') {
        echo $name;
        $sql = "update tg_html
                   set tg_title='{$con}'
                 where tg_id=1";
        _query($sql);
    }

    if ($name == 'slogan') {
        echo $name;
        $sql = "update tg_html
                   set tg_slogan='{$con}'
                 where tg_id=1";
        _query($sql);
    }

}


//查询生成静态页面

$sql =  "select tg_title,tg_slogan from tg_html where tg_id = 1";
$row = _fetch_array($sql);
$title =  $row['tg_title'];
$slogan = $row['tg_slogan'];
ob_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" type="text/css" href="../css/m.css"/>
</head>
<body style="width: 320px; margin: 0 auto;">

<div class="new-jd-logo">
    <div style="font-size:24px; padding-top:10px; height:35px; color:#c91623;"><?php echo $title ?>
        <font style="font-size:14px;"><?php echo $slogan?></font></div>
    <div class="new-hlogo-btn">
        <img src="/users/avatar.png"  id="userAva"
             style="width: 25px;display:none;position: absolute;top:10px;left: 3px" alt=""/>
        <a href="muser-login.php" class="new-m-myjd"><span><?php echo $title ?></span></a>
        <a href="mcart.php" id="html5_cart" class="new-m-cart"><span>购物车</span></a>
    </div>
</div>


<div class="new-header">
    <form id="ssform" action="#" method="post">
        <div class="new-srch-box" style="margin-right: 10px;">
            <input name="keyWord" id="keyWord" type="text" size="16" maxlength="20" required autofocus
                   autocomplete="off" class="new-srch-input" placeholder="请输入#" style="color:#999999;"
                   value="">
            <a href="#" class="new-s-srch" onclick='#'><span></span></a>
        </div>
    </form>
</div>


<div class="new-tab-type5">
    <div class="new-tbl-type">
        <a href="mcate/id-0.php" class="new-tbl-cell"><span class="new-icon1"><span></span><br>商城分类</span></a><a
            href="mtuan/id-0.php" class="new-tbl-cell"><span class="new-icon2"><span></span><br>团购分类</span></a><a
            href="index.php" class="new-tbl-cell"><span class="new-icon3"><span></span><br>我的关注</span></a><a
            href="muser-login.php" class="new-tbl-cell"><span class="new-icon4"><span></span><br><?php echo $title ?></span></a>
    </div>
</div>


<div class="box_top">精选团购</div>

<?php
    $sql = "select tg_pName,tg_pIns,tg_pOlodPrice,tg_pMainImg,tg_pNewPrice
              from tg_good
          order by tg_id
              desc
             limit 5";
    $result = _query($sql);

    while($row = _fetch_array_list($result)){
        ?>

        <div class="thumb">
            <ul class="lst-type">
                <li class="box lt-li">
                    <a class="lt-a" href="#">
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



<div class="new-footer">
    <div class="new-f-login">
        <a href="muser-login.php" id="loginBtn" style="padding-right: 10px;">登录</a><span class="new-bar2">|</span><a
            href="muser-register.php" style="padding-left: 10px;">注册</a>
        <span class="new-back-top"><a href="#top">回到顶部</a></span>
    </div>
    <div class="new-f-section"><a href="m.php" class="on">触屏版</a><a
            id="toPcHome">电脑版</a></div>
    <div class="new-f-section2">Copyright &copy; 2012-2013 向宝彦 xiangbaoyan 版权所有</div>
</div>
</body>
<script src="/js/jquery.min.js"></script>
<script src="/js/jquery.cookie.js"></script>
<script>
    if($.cookie("username")){
        $("#userAva").css("display","block").siblings(".new-m-myjd").attr("href","");
        $("#loginBtn").html("退出").attr("href","").click(function(){
            $.removeCookie("username");
            $.removeCookie("uniqid");
            location.reload();
        })
    }
</script>
</html>
<?php
$data = ob_get_clean();
file_put_contents($_SERVER['DOCUMENT_ROOT'].'/m.html', $data);
?>
