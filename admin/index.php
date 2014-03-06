<html>
<head>
    <title>主页</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/style-metro.css">
    <link rel="stylesheet" href="css/style-responsive.css">
    <link rel="stylesheet" href="css/default.css">
    <link rel="stylesheet" href="css/custom.css">
</head>

<!-- BEGIN BODY -->
<body>
<!-- BEGIN HEADER -->
<div class="navbar navbar-inverse navbar-fixed-top">
    <!-- BEGIN TOP NAVIGATION BAR -->
    <!-- BEGIN LOGO -->
    <a class="navbar-brand" href="index.php">
        <img src="images/logo.png" alt="logo"/>
    </a>
    <!-- END LOGO -->
    <!-- BEGIN RESPONSIVE MENU TOGGLER -->
    <a href="javascript:;" style="float: right;margin-right: 5px;padding-top: 10px"
       class="navbar-btn collapsed" data-toggle="collapse" data-target=".nav-collapse">
        <img src="images/menu-toggler.png" alt=""/>
    </a>
    <!-- END RESPONSIVE MENU TOGGLER -->
</div>
<!-- END TOP NAVIGATION BAR -->
<!-- END HEADER -->

<!-- BEGIN CONTAINER -->

<div class="page-container">

    <!-- BEGIN SIDEBAR1 -->

    <div class="page-sidebar nav-collapse">
        <!-- BEGIN SIDEBAR MENU1 -->
        <ul class="page-sidebar-menu" style="margin-top: 50px">
            <li>
                <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
                <div class="sidebar-toggler hidden-phone"></div>
                <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
            </li>
            <li>
                <!-- BEGIN RESPONSIVE QUICK SEARCH FORM -->
                <form class="sidebar-search">
                    <div class="input-box">
                        <a href="javascript:;" class="remove"></a>
                        <input type="text" placeholder="搜索..."/>
                        <input type="button" class="submit" value=" "/>
                    </div>
                </form>
                <!-- END RESPONSIVE QUICK SEARCH FORM -->
            </li>
            <li class="start">
                <a class="ajaxify start" href="manaUsers.php">
                    <i class="icon-home"></i>
                    <span class="title">控制面板</span>
                    <span class="selected"></span>
                </a>
            </li>

            <li class="">

                <a href="">

                    <i class="icon-cogs"></i>

                    <span class="title">页面内容控制</span>

                    <span class="selected"></span>

                    <span class="arrow open"></span>

                </a>

                <ul class="sub-menu">

                    <li>

                        <a class="ajaxify" href="siteCon.php">

                            主页内容控制

                        </a>

                    </li>
                </ul>

            </li>

        </ul>

        <!-- END SIDEBAR MENU1 -->

    </div>

    <!-- END SIDEBAR1 -->

    <!-- BEGIN PAGE -->

    <div class="page-content">

        <!-- BEGIN PAGE CONTAINER-->

        <div class="container-fluid">

            <!-- BEGIN STYLE CUSTOMIZER -->

            <div class="color-panel hidden-phone">

                <div class="color-mode-icons icon-color"></div>

                <div class="color-mode-icons icon-color-close"></div>

                <div class="color-mode">

                    <p>主题颜色</p>

                    <ul class="inline">

                        <li class="color-black current color-default" data-style="default"></li>

                        <li class="color-blue" data-style="blue"></li>

                        <li class="color-brown" data-style="brown"></li>

                        <li class="color-purple" data-style="purple"></li>

                        <li class="color-grey" data-style="grey"></li>

                        <li class="color-white color-light" data-style="light"></li>

                    </ul>

                    <label>

                        <span>布局</span>

                        <select class="layout-option m-wrap small">

                            <option value="fluid" selected>流动式</option>

                            <option value="boxed">盒式</option>

                        </select>

                    </label>

                    <label>

                        <span>头部</span>

                        <select class="header-option m-wrap small">

                            <option value="fixed" selected>固定</option>

                            <option value="default">默认</option>

                        </select>

                    </label>

                    <label>

                        <span>侧边栏</span>

                        <select class="sidebar-option m-wrap small">

                            <option value="fixed">固定</option>

                            <option value="default" selected>默认</option>

                        </select>

                    </label>

                    <label>

                        <span>底部</span>

                        <select class="footer-option m-wrap small">

                            <option value="fixed">固定</option>

                            <option value="default" selected>默认</option>

                        </select>

                    </label>

                </div>

            </div>

            <!-- END BEGIN STYLE CUSTOMIZER -->

            <div class="page-content-body">

            </div>

        </div>

        <!-- HERE WILL BE LOADED AN AJAX CONTENT -->

    </div>

    <!-- BEGIN PAGE -->

</div>

<!-- END CONTAINER -->

<!-- BEGIN FOOTER -->

<div class="footer">
    <div class="footer-inner">
        2014 &copy; 后台制作 by XiangBaoyan.
    </div>
    <div class="footer-tools">
			<span class="go-top">
			<i class="icon-angle-up"></i>
			</span>
    </div>
</div>

<!-- END FOOTER -->
<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<!-- BEGIN CORE PLUGINS -->
<script src="js/jquery.min.js" type="text/javascript"></script>
<script src="js/bootstrap.min.js" type="text/javascript"></script>
<!--[if lt IE 9]>
<script src="js/excanvas.min.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->
<script src="js/jquery.blockui.min.js" type="text/javascript"></script>
<script src="js/jquery.cookie.min.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<script src="js/app.js"></script>
<script>
    jQuery(document).ready(function () {
        App.init();
        $('.page-sidebar .ajaxify.start').click() // load the content for the dashboard page.
    });
</script>
<!-- END JAVASCRIPTS -->
<!-- END BODY -->
</body>
</html>