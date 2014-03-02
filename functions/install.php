<?php
    define("IN_TG",true);
    require $_SERVER['DOCUMENT_ROOT']."/functions/commonFun.php";
    require BASE_DIR."/functions/mysqlFun.php";

    //创建用户表,首先写明字段，
    $arr = ['username','password','uniqid','active','sex','level','reg_time',
        'last_time','login_ip','login_count'];
    //创建网站模块表
    $html = ['title','slogan'];

    _connect();
    creDataBase();
    _select_db();
    _set_names();
    creUserTable($arr);
    creHtmlTable($html);

    $sql  = "insert into tg_html (tg_id,tg_title,tg_slogan)
                    values (1,'<?php echo $title ?>','团结奋进，努力进取') ";

    _query($sql);

    _close();


