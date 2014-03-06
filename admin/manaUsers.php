<?php
    define("IN_TG",true);
    require $_SERVER['DOCUMENT_ROOT']."/functions/mysqlFun.php";

    _connect();
    _select_db();
    _set_names();
    $sql = "select tg_username,tg_level,tg_reg_time from tg_user";
    $result = _query($sql);
?>
<div style="margin-top: 50px">
    <ul class="page-breadcrumb breadcrumb">
        <li>
            <i class="fa fa-home"></i>
            <a href="index.php">
                后台主页
            </a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <i class="fa fa-edit"></i>
            <a href="#">
                用户管理
            </a>
        </li>
    </ul>
    <div class="portlet box blue">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-user"></i>Xiangbaoyan
            </div>
            <div class="tools">
                <button class="btn red-stripe">
                    <i class="fa fa-eraser"></i>
                    删除用户</button>
            </div>
        </div>
        <div class="portlet-body">
            <table class="table table-hover">
                <tbody>
                <tr>
                    <td>
                       用户级别
                    </td>
                    <td>
                        管理员
                    </td>
                </tr>
                <tr>
                <td>
                    注册日期
                </td>
                <td>
                    管理员
                </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
