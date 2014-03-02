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
if (@$_GET['action'] == "login") {
//验证并保存注册数据到临时变量$clean;
    $clean =serverCheckFun(["username", "password", "code"]);
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
    loginUser($clean);
    _close();
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" type="text/css" href="css/muser-login.css"/>
    <script src="/js/jquery.min.js"></script>
</head>
<body id="body">
<a name="top"></a>
<header>
    <div class="new-header">
        <a href="javascript:backHis();" class="new-a-back"><span>返回</span></a>

        <h2>登录</h2>
        <a href="javascript:showOrHide('jdkey')" id="btnJdkey" class="new-a-jd"><span>向宝彦</span></a>
    </div>
    <div class="new-jd-tab" style="display:none" id="jdkey">
        <div class="new-tbl-type">
            <a href="m.php" class="new-tbl-cell">
                <span class="icon">首页</span>

                <p style="color:#6e6e6e;">首页</p>
            </a>
            <a href="category/all.php" class="new-tbl-cell">
                <span class="icon2">分类搜索</span>

                <p style="color:#6e6e6e;">分类搜索</p>
            </a>
            <a href="mcart.php" id="html5_cart" class="new-tbl-cell">
                <span class="icon3">购物车</span>

                <p style="color:#6e6e6e;">购物车</p>
            </a>
            <a href="muser-login.php" class="new-tbl-cell">
                <span class="icon4">我的向宝彦</span>

                <p style="color:#6e6e6e;">我的向宝彦</p>
            </a>
        </div>
    </div>
</header>

<div class="new-ct">

    <div class="new-login" style="padding: 50px 32px;">
        <form method="post" action="muser-login.php?action=login" name="page_login_form"
              id="page_login_form">

            <div class="new-txt-err"><?php if (isset($errData)) echo $errData; ?></div>
            <div class="new-txt-err" id="err" style="display:none;"></div>


            <span class="new-input-span new-mg-b10"><input type="text" value="" class="f-input ipttxt"
                                                           name="username" size="30" tabindex="1"
                                                           style="width:100%;height:100%;"></span>
            <span class="new-input-span new-mg-b10"><input type="password" value="" class="f-input ipttxt"
                                                           id="login-password" name="password" tabindex="2"
                                                           style="width:100%;height:100%;"></span>

            <span class="new-input-span new-input-span-v1 new-mg-b10">
			    <input type="text" value="" class="f-input ipttxt"
                       name="captcha" size="30"
                       style="width:100%;height:100%;">
		    </span>
            <img src="code.php" onclick="this.src='code.php?'+Math.random();"
                 style="width: 110px;float: right;position: relative;top: -50px" alt="captcha"/>


            <input type="checkbox" id="autologin" name="auto_login" value="1" tabindex="3"><span class="new-a-txt3"
                                                                                                 style="margin-top: -30px;padding-left:15px;">下次自动登录？</span>
            <input type="submit" class="login-submit-btn" id="user-login-submit" name="commit" value="登录">
        </form>
        <div class="new-lg-sec new-mg-t15" style="margin-top:5px;">
            <a rel="nofollow" href="muser-register.php" class="new-fl">免费注册</a>

        </div>

    </div>
</div>
<footer>
    <div class="new-footer">
        <div class="new-f-login">
            <a href="muser-login.php" style="padding-right: 10px;">登录</a><span class="new-bar2">|</span><a
                href="muser-register.php" style="padding-left: 10px;">注册</a>
            <span class="new-back-top"><a href="#top">回到顶部</a></span>
        </div>
        <div class="new-f-section"><a href="m.php" class="on">触屏版</a><a
                id="toPcHome">电脑版</a></div>
        <div class="new-f-section2">Copyright &copy; 2012-2013 向宝彦 dabinzhou.com 版权所有</div>
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
</script>
</html>