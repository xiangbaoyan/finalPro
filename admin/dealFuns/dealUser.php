<?php
    define("IN_TG",true);
    require $_SERVER['DOCUMENT_ROOT'].'/functions/mysqlFun.php';
    require $_SERVER['DOCUMENT_ROOT'].'/functions/delDir.php';

    
_connect();
_select_db();
_set_names();

    $username = @$_POST['username'];
    $method = @$_POST['method'];
    if($method = "delUser"){
        $sql = "delete from tg_user where tg_username = '{$username}'";
        _query($sql);
        if(_affected_rows()==1){
            $sql = "select tg_userDir from tg_user where tg_username ='{$username}'";
            $row = _fetch_array($sql);
            $desDir = $_SERVER['DOCUMENT_ROOT'].$row['tg_userDir'];
            delDir($desDir);
            echo "删除成功";
        }
    }
?>