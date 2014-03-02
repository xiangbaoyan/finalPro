<!DOCTYPE html><!--[if IE 8]> <html lang="en" class="ie8"> <![endif]--><!--[if IE 9]> <html lang="en" class="ie9"> <![endif]--><!--[if !IE]><!--> <html lang="en"> <!--<![endif]--><!-- BEGIN HEAD --><head>	<meta charset="utf-8" />	<title>后台管理</title>	<meta content="width=device-width, initial-scale=1.0" name="viewport" />	<meta content="" name="description" />	<meta content="" name="author" />	<!-- BEGIN GLOBAL MANDATORY STYLES -->	<link href="media/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>	<link href="media/css/bootstrap-responsive.min.css" rel="stylesheet" type="text/css"/>	<link href="media/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>	<link href="media/css/style-metro.css" rel="stylesheet" type="text/css"/>	<link href="media/css/style.css" rel="stylesheet" type="text/css"/>	<link href="media/css/style-responsive.css" rel="stylesheet" type="text/css"/>	<link href="media/css/default.css" rel="stylesheet" type="text/css" id="style_color"/>	<link href="media/css/uniform.default.css" rel="stylesheet" type="text/css"/>	<!-- END GLOBAL MANDATORY STYLES -->	<!-- BEGIN PAGE LEVEL STYLES -->	<link rel="stylesheet" type="text/css" href="media/css/select2_metro.css" />	<!-- END PAGE LEVEL STYLES -->	<link rel="shortcut icon" href="media/image/favicon.ico" /></head><!-- END HEAD --><!-- BEGIN BODY --><body class="page-header-fixed">	<!-- BEGIN HEADER -->	<div class="header navbar navbar-inverse navbar-fixed-top">		<!-- BEGIN TOP NAVIGATION BAR -->		<div class="navbar-inner">			<div class="container-fluid">				<!-- BEGIN LOGO -->				<a class="brand" href="index.php">				<img src="media/image/logo.png" alt="logo" />				</a>				<!-- END LOGO -->				<!-- BEGIN RESPONSIVE MENU TOGGLER -->				<a href="javascript:;" class="btn-navbar collapsed" data-toggle="collapse" data-target=".nav-collapse">				<img src="media/image/menu-toggler.png" alt="" />				</a>          				<!-- END RESPONSIVE MENU TOGGLER -->            			</div>		</div>		<!-- END TOP NAVIGATION BAR -->	</div>	<!-- END HEADER -->	<!-- BEGIN CONTAINER -->	<div class="page-container row-fluid">		<!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->		<div id="portlet-config" class="modal hide">			<div class="modal-header">				<button data-dismiss="modal" class="close" type="button"></button>				<h3>设置</h3>                <img src="assets/img/ajax-loading.gif" id="wait"                     style="width:30px;display:none;margin: auto" alt="waiting"/>			</div>			<div class="modal-body">				<p>工具栏</p>                <div style="text-align: center">                    <span style="font-size: 19px;position:relative;left: -20px"><strong>重新生成服务器页面:</strong></span>                    <button id="clearCache"  class="btn blue">清除缓存</button>                </div>			</div>            <hr>		</div>		<!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->		<!-- BEGIN SIDEBAR1 -->		<div class="page-sidebar nav-collapse collapse">			<!-- BEGIN SIDEBAR MENU1 -->         			<ul class="page-sidebar-menu">				<li>					<!-- BEGIN SIDEBAR TOGGLER BUTTON -->					<div class="sidebar-toggler hidden-phone"></div>					<!-- BEGIN SIDEBAR TOGGLER BUTTON -->				</li>				<li>					<!-- BEGIN RESPONSIVE QUICK SEARCH FORM -->					<form class="sidebar-search">						<div class="input-box">							<a href="javascript:;" class="remove"></a>							<input type="text" placeholder="搜索..." />							<input type="button" class="submit" value=" " />						</div>					</form>					<!-- END RESPONSIVE QUICK SEARCH FORM -->				</li>				<li class="start">					<a class="ajaxify start" href="dashboard.php">					<i class="icon-home"></i> 					<span class="title">控制面板</span>					<span class="selected"></span>					</a>				</li>				<li class="">					<a href="">					<i class="icon-cogs"></i> 					<span class="title">页面内容控制</span>					<span class="selected"></span>					<span class="arrow open"></span>					</a>					<ul class="sub-menu">						<li>							<a class="ajaxify" href="块分析/layout_ajax_content_2.html">							    主页内容控制							</a>						</li>					</ul>				</li>			</ul>			<!-- END SIDEBAR MENU1 -->		</div>		<!-- END SIDEBAR1 -->		<!-- BEGIN PAGE -->		<div class="page-content">			<!-- BEGIN PAGE CONTAINER-->			<div class="container-fluid">				<!-- BEGIN STYLE CUSTOMIZER -->				<div class="color-panel hidden-phone">					<div class="color-mode-icons icon-color"></div>					<div class="color-mode-icons icon-color-close"></div>					<div class="color-mode">						<p>主题颜色</p>						<ul class="inline">							<li class="color-black current color-default" data-style="default"></li>							<li class="color-blue" data-style="blue"></li>							<li class="color-brown" data-style="brown"></li>							<li class="color-purple" data-style="purple"></li>							<li class="color-grey" data-style="grey"></li>							<li class="color-white color-light" data-style="light"></li>						</ul>						<label>							<span>布局</span>							<select class="layout-option m-wrap small">								<option value="fluid" selected>流动式</option>								<option value="boxed">盒式</option>							</select>						</label>						<label>							<span>头部</span>							<select class="header-option m-wrap small">								<option value="fixed" selected>固定</option>								<option value="default">默认</option>							</select>						</label>						<label>							<span>侧边栏</span>							<select class="sidebar-option m-wrap small">								<option value="fixed">固定</option>								<option value="default" selected>默认</option>							</select>						</label>						<label>							<span>底部</span>							<select class="footer-option m-wrap small">								<option value="fixed">固定</option>								<option value="default" selected>默认</option>							</select>						</label>					</div>				</div>				<!-- END BEGIN STYLE CUSTOMIZER -->				<div class="page-content-body">				</div>			</div>			<!-- HERE WILL BE LOADED AN AJAX CONTENT -->		</div>		<!-- BEGIN PAGE -->     	</div>	<!-- END CONTAINER -->	<!-- BEGIN FOOTER -->	<div class="footer">		<div class="footer-inner">			2014 &copy; 后台制作 by XiangBaoyan.		</div>		<div class="footer-tools">			<span class="go-top">			<i class="icon-angle-up"></i>			</span>		</div>	</div>	<!-- END FOOTER -->	<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->	<!-- BEGIN CORE PLUGINS -->	<script src="media/js/jquery-1.10.1.min.js" type="text/javascript"></script>	<script src="media/js/jquery-migrate-1.2.1.min.js" type="text/javascript"></script>	<!-- IMPORTANT! Load jquery-ui-1.10.1.custom.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->	<script src="media/js/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>      	<script src="media/js/bootstrap.min.js" type="text/javascript"></script>	<!--[if lt IE 9]>	<script src="media/js/excanvas.min.js"></script>	<script src="media/js/respond.min.js"></script>  	<![endif]-->        	<script src="media/js/jquery.slimscroll.min.js" type="text/javascript"></script>	<script src="media/js/jquery.blockui.min.js" type="text/javascript"></script>  	<script src="media/js/jquery.cookie.min.js" type="text/javascript"></script>	<script src="media/js/jquery.uniform.min.js" type="text/javascript" ></script>	<!-- END CORE PLUGINS -->	<script type="text/javascript" src="media/js/select2.min.js"></script>	<script src="media/js/app.js"></script>      	<script>		jQuery(document).ready(function() {    		   App.init();		   $('.page-sidebar .ajaxify.start').click() // load the content for the dashboard page.		});        $("#clearCache").click(function(){            $("#wait").css("display","block");            <?php            $dir = $_SERVER['DOCUMENT_ROOT'].'/activePage';            $arr = scandir($dir);            foreach($arr as $file){                if(is_file($dir."/".$file)){                    ?>            $.post("/activePage/<?php echo $file?>");            <?php                }            }             ?>            setTimeout("$('#wait').css('display','none');",1000);        });	</script>	<!-- END JAVASCRIPTS --><script type="text/javascript">  var _gaq = _gaq || [];  _gaq.push(['_setAccount', 'UA-37564768-1']);  _gaq.push(['_setDomainName', 'keenthemes.com']);  _gaq.push(['_setAllowLinker', true]);  _gaq.push(['_trackPageview']);  (function() {    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;    ga.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'stats.g.doubleclick.net/dc.js';    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);  })();</script></body><!-- END BODY --></html>