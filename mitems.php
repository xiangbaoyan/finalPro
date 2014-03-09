<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>商品分类</title>
    <meta name="author" content="www.dabinzhou.com">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="format-detection" content="telephone=no">
    <link rel="stylesheet" type="text/css" href="css/mitems.css">
    <style>
        ul li {
            cursor: pointer;
        }
    </style>
</head>
<body>
<header>
    <div class="header">
        <div class="btn-area-lt">
            <a class="btn-sear" href="/m.html"></a>
        </div>
        <h2>
            商品分类
        </h2>

        <div class="btn-area-rt">
            <a class="btn-sear-rt" href="/m.html"></a>
        </div>
    </div>
</header>
<div class="ct posi-re" id="wldiv">
    <div class="shade" id="shade" style="display: none"></div>
    <div class="tab-tuan">
        <ul class="tab-lst">
            <li class="tl-li">
                <a id="groupall" class="tl-li-a"> 分类 <span class="icon"></span></a>
                <!-- 点击tab时列表 -->
                <div id="onegroup" style="display: none" class="tab-chd-lst">
                    <div class="posi-re">

                        <span class="arrow"></span>
                        <ul id="ulone" class="lst-type fl">
                            <li style="width:145px" class="lt-li"><a name="" class="lt-a txt-3c"
                                                                     href="#">全部</a></li>
                            <li style="width:145px" class="lt-li"><a name="meiguodapian" class="lione lt-a txt-3c">美国大片
                                </a></li>
                        </ul>

                        <!-- 2级类目加 lst-type-chd  -->
                        <ul class="lst-type  lst-type-chd fl" style="display: none; width: 150px;" id="ultwo"
                            ></ul>
                    </div>
                </div>
                <!-- //点击tab时列表 -->
            </li>

            <li id="lisort" class="tl-li">
                <a class="tl-li-a" id="asort" href="javascript:void(0);">默认排序<span class="icon"></span></a>

                <div class="tab-chd-lst tab-thr" id="divdsort" style="left: 60%; display: none;">
                    <div class="posi-re">
                        <span class="arrow"></span>
                        <ul class="lst-type sortItem">
                            <li class="lt-li"><a name="sortByTime" class="lt-a txt-3c">最新</a></li>
                            <li class="lt-li"><a name="sortByPrice" class="lt-a txt-3c">价格</a></li>
                            <li class="lt-li"><a class="lt-a txt-3c">销量</a></li>
                            <li class="lt-li"><a class="lt-a txt-3c">默认排序</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </li>

        </ul>
    </div>

    <div id="insertPlace">

    </div>
    <div class="paging tc">
        <!--   class     pagedis (不可用) next(可用)-->
        <a class="pageLast" href="#">上一页</a><span class="page_num"><span id="curPage"></span>/<span id="pageSum"></span></span>
        <a class="pageNext" onclick="return false">下一页<span></span></a>
    </div>
    <div id="err"></div>
</div>
<footer>
    <div class="to-top"><a href="#top"><span></span>回顶部</a></div>
    <div class="footer">
        <div>
            <a href="/muser-login.php" style="padding-right: 10px;">登录</a><span class="new-bar2">|</span><a
                href="/muser-register.php" style="padding-left: 10px;">注册</a>
        </div>
        <a href="/m.html" style="padding-right: 10px;">触屏版</a> | <a
            href="http://www.dabinzhou.com" style="padding-left: 10px;">电脑版</a>

        <div class="gray">Copyright © 2013 Xiangbaoyan <a target="_blank" href="#">鲁ICP备13022210号</a>
        </div>
    </div>
</footer>
</body>
<script src="js/jquery.min.js"></script>
<script src="js/jquery.cookie.js"></script>
<!--类别选择按钮-->
<script>
    var shade = $("#shade");        //css初始dis 为none，激活为block
    var linkFenlei = $("#groupall"); //激活状态为添加class on
    var listFenlei = $("#onegroup"); //css初始dis 为none，激活为block

    var linkPaixu = $("#asort");
    var listPaixu = $("#divdsort");
    //添加箭头的是 <span class="li-arrow"></span>
    var flag = false;
    linkFenlei.click(function () {
        flag = !flag;
        if (flag == true) {
            shade.css("display", "block");

            linkFenlei.addClass("on");
            listFenlei.css("display", "block");

            linkPaixu.removeClass("on");
            listPaixu.css("display", "none");
        } else {
            shade.css("display", "none");

            linkFenlei.removeClass("on");
            listFenlei.css("display", "none");

            linkPaixu.removeClass("on");
            listPaixu.css("display", "none");
        }

    });

    linkPaixu.click(function () {
        flag = !flag;
        if (flag == true) {
            shade.css("display", "block");

            linkPaixu.addClass("on");
            listPaixu.css("display", "block");

            linkFenlei.removeClass("on");
            listFenlei.css("display", "none");
        } else {
            shade.css("display", "none");

            linkPaixu.removeClass("on");
            listPaixu.css("display", "none");

            linkFenlei.removeClass("on");
            listFenlei.css("display", "none");
        }

    });

    $("#ulone li").each(function () {

        $(this).click(function () {
            $("#ulone li span").remove();
            $(this).find("a").append("<span class='li-arrow'></span>");
        });
    });

    $(".lst-type li").each(function () {

        $(this).click(function () {
            $(".lst-type li span").remove();
            $(this).find("a").append("<span class='li-arrow'></span>");
        });
    });
</script>
<!--发送ajax请求数据用来显示-->
<script>
    var perNum = 2;

    function showData(curPage, num, pageSum) {
        $("#insertPlace").find(".thumb").each(
            function (i) {
                $(this).css("display", "none");

                if (i >= (curPage - 1) * num && i < curPage * num) {
                    $(this).css("display", "block");
                }

                $("#pageSum").html(pageSum);
                $("#curPage").html(curPage);

                if (curPage == pageSum) {
//                    pageNext pageLast  pagedis (不可用) next(可用)
                    $(".pageNext").addClass("pagedis");
                    $(".pageNext").removeClass("next");
                } else {
                    $(".pageNext").addClass("next");
                    $(".pageNext").removeClass("pagedis");
                }

                if (curPage == 1) {
//                    pageNext pageLast  pagedis (不可用) next(可用)
                    $(".pageLast").addClass("pagedis");
                    $(".pageLast").removeClass("next");
                } else {
                    $(".pageLast").addClass("next");
                    $(".pageLast").removeClass("pagedis");
                }
            }


        );
    }
    $.post("mitemsDeal.php", function (data) {
        shade.css("display", "none");

        linkPaixu.removeClass("on");
        listPaixu.css("display", "none");

        linkFenlei.removeClass("on");
        listFenlei.css("display", "none");

        $("#insertPlace").html(data);
        $.cookie("curPage", 1);
        var pageSum = Math.ceil($.cookie("itemSum") / perNum);
        showData($.cookie("curPage"), perNum, pageSum);
    });
    $("#ulone li a").click(function () {
        var cate = $(this).attr("name");
        $.post("mitemsDeal.php", {cate: cate}, function (data) {
            shade.css("display", "none");

            linkPaixu.removeClass("on");
            listPaixu.css("display", "none");

            linkFenlei.removeClass("on");
            listFenlei.css("display", "none");

            $("#insertPlace").html(data);
            //ul: .lst-type   下的li:box lt-li
            //上一页: .pageLast  下一页 .pageNext
            //确定每页多少条数据  有2条

            //1页从0，1  2页2，1
            $.cookie("curPage", 1);
            var pageSum = Math.ceil($.cookie("itemSum") / perNum);
            showData($.cookie("curPage"), perNum, pageSum);

        });
    });
</script>
<!--jquery 分页-->
<script>

    $(".pageNext").click(function () {
        var pageSum = Math.ceil($.cookie("itemSum") / perNum);
        if ($.cookie("curPage") < pageSum) {
            $.cookie("curPage", parseInt($.cookie("curPage")) + 1);
            var curPage = $.cookie("curPage");
            showData(curPage, 2, pageSum);
        }

    });

    $(".pageLast").click(function () {
        var pageSum = Math.ceil($.cookie("itemSum") / perNum);
        if ($.cookie("curPage") > 1) {
            $.cookie("curPage", parseInt($.cookie("curPage")) - 1);
            var curPage = $.cookie("curPage");
            showData(curPage, 2, pageSum);
        }
    });
</script>

<!--排序-->
<script>
    $(".sortItem li a").click(function(){
        shade.css("display", "none");

        linkPaixu.removeClass("on");
        listPaixu.css("display", "none");

        linkFenlei.removeClass("on");
        listFenlei.css("display", "none");


        var sort = $(this).attr("name");
        $.post("mitemsDeal.php",{sort:sort},function(data){
            $("#insertPlace").html(data);
            $.cookie("curPage", 1);
            var pageSum = Math.ceil($.cookie("itemSum") / perNum);
            showData($.cookie("curPage"), perNum, pageSum);
        })
    });
</script>
</html>