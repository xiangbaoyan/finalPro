<?php
/**
 * 服务器验证代码
 */
define("IN_TG", true);
require $_SERVER["DOCUMENT_ROOT"] . "/functions/commonFun.php";
require $_SERVER["DOCUMENT_ROOT"] . "/functions/serverCheckFun.php";
/*
 * $errData 变量存放着错误信息
 *
 * 把这段复制到相应位置
 * <?php if(isset($errData))echo $errData; ?>
 *
 * form 的action 要改成 login?action=login;
 */
if (@$_GET['action'] == "register") {
//验证并保存注册数据到临时变量$clean;
    $clean = serverCheckFun(["username", "password", "repassword", "code", "uniqid"]);
} else {
    $_SESSION['uniqid'] = $uniqid = _sha1_uniqid();
}
/*
 * 把下面代码复制到form 下，防止表单验证
 * <input type="hidden" name="uniqid" value="<?php echo $uniqid ?>" />
 */
?>
<?php
/**
 * 注册代码
 */
if ($errData == "" && !empty($clean)) {
    require $_SERVER["DOCUMENT_ROOT"] . "/functions/mysqlFun.php";
    _connect();
    _set_names();
    _select_db();
    registUser($clean);
    _close();
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" type="text/css" href="css/muser-register.css"/>
    <script src="/js/jquery.min.js"></script>
</head>
<body id="body">
<a name="top"></a>
<header>
    <div class="new-header">
        <a href="javascript:backHis();" class="new-a-back"><span>返回</span></a>

        <h2>手机快速注册</h2>
        <a href="javascript:showOrHide('jdkey')" id="btnJdkey" class="new-a-jd"><span>大滨州键</span></a>
    </div>
    <div class="new-jd-tab" style="display:none" id="jdkey">
        <div class="new-tbl-type">
            <a href="activePage/m.php" class="new-tbl-cell">
                <span class="icon">首页</span>

                <p style="color:#6e6e6e;">首页</p>
            </a>
            <a href="mtuan/id-0.php" class="new-tbl-cell">
                <span class="icon2">团购分类</span>

                <p style="color:#6e6e6e;">团购分类</p>
            </a>
            <a href="mcart.php" id="html5_cart" class="new-tbl-cell">
                <span class="icon3">购物车</span>

                <p style="color:#6e6e6e;">购物车</p>
            </a>
            <a href="muser-login.php" class="new-tbl-cell">
                <span class="icon4">我的大滨州</span>

                <p style="color:#6e6e6e;">我的大滨州</p>
            </a>
        </div>
    </div>
</header>
<div class="new-ct bind">
    <form action="/muser-register.php?action=register" method="post" name="myform" id="form">
        <input type="hidden" name="uniqid" value="<?php if (isset($uniqid)) echo $uniqid; ?>"/>

        <div class="new-pay-pw">
            <div class="new-set-info">
                <div id="nameNull" class="new-txt-err"> <?php if (isset($errData)) echo $errData; ?></div>
        <span class="new-input-span new-mg-b10">
            <input type="text" class="new-input" name="username" id="username" placeholder="请输入用户名"/>
		</span>
        <span class="new-input-span new-mg-b10">
			<input type="password" class="new-input" name="password" id="password" placeholder="请输入用户密码"/>
		</span>
        <span class="new-input-span new-mg-b10">
			<input type="password" class="new-input" name="repassword" id="repassword" placeholder="请确认用户密码"/>
		</span>
        <span class="new-input-span new-input-span-v1 new-mg-b10">
			<input type="text" class="new-input" name="captcha" id="captcha" placeholder="请输入验证码"/>
            <a id="sub_btn" href="#" class="new-get-btn">
                <img src="code.php" onclick="this.src='code.php?'+Math.random();" alt="captcha"/>
            </a>
		</span>
                <input type="submit" class="new-abtn-type new-mg-t15" style="width: 100%" id="submitMobile"
                       value="注册并登陆"/>
            </div>

        </div>
    </form>
</div>
<footer>
    <div class="new-footer">
        <div class="new-f-login">
            <a href="muser-login.php" style="padding-right: 10px;">登录</a><span class="new-bar2">|</span><a
                href="muser-register.php" style="padding-left: 10px;">注册</a>
            <span class="new-back-top"><a href="#top">回到顶部</a></span>
        </div>
        <div class="new-f-section"><a href="activePage/m.php" class="on">触屏版</a></div>
        <div class="new-f-section2">Copyright &copy; 2012-2013 大滨州 dabinzhou.com 版权所有</div>
    </div>
</footer>
</body>
<script>
    formCheckAndSub('form', 'nameNull');
    //必须规范form表单名称为email，password,repassword,username,
    function formCheckAndSub(formId, errId) {

        $("#" + formId).submit(function () {
            var flag = true;
            $("#" + errId).html("");
            $("#" + formId + " input").each(function () {
                if ($(this).attr("name") == "email") {
                    if (!checkEmail($(this).val())) {
                        alert("woyun");
                        $("#" + errId).html("邮件填写错误").css("display", "block");
                        flag = false;
                    }
                } else if ($(this).attr("name") == "password") {
                    if (!checkPassword($(this).val())) {
                        $("#" + errId).html($("#" + errId).html() + "<br>密码填写错误,有效长度为6到12位").css("display", "block");
                        flag = false;
                    }
                } else if ($(this).attr("name") == "username") {
                    if (!checkUsername($(this).val())) {
                        $("#" + errId).html($("#" + errId).html() + "<br>用户名填写错误,有效长度为6到20位").css("display", "block");
                        flag = false;
                    }
                } else if ($(this).attr("name") == "repassword") {
                    if ($(this).val() != $("#" + formId + " input[name=" + "'password']").val()) {
                        $("#" + errId).html($("#" + errId).html() + "<br>两次输入的密码不一致").css("display", "block");
                        flag = false;
                    }
                }
            });
            if (flag == true) {
                return true
            }
            //如果上面没有错就显示，但是无论如何都要执行到下面
            return false;
        });
    }
    function checkEmail(str) {

        var myReg = /^[-_A-Za-z0-9]+@([_A-Za-z0-9]+\.)+[A-Za-z0-9]{2,3}$/;
        if (myReg.test(str)) {
            return true;
        }
        return false;
    }
    function checkPassword(str) {
        var myReg = /\w{6,40}/;
        if (myReg.test(str)) {
            return true;
        }
        return false;
    }

    function checkUsername(str) {
        var myReg = /\w{6,20}/;
        if (myReg.test(str)) {
            return true;
        }
        return false;
    }
    function backHis() {
        location.href = "/activePage/m.php";
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