<?php
define("IN_TG", true);
require $_SERVER['DOCUMENT_ROOT'] . "/functions/commonFun.php";
require BASE_DIR . "/functions/mysqlFun.php";

/*
 * 建立商品表
 */
function creGoodTable()
{
    //建立商品表:
    $sql = "
create table tg_good (

    tg_id         int           unsigned not null auto_increment  comment '//id',
    tg_pName      varchar(20)   not null                          comment '//商品名称',
    tg_pIns       varchar(50)                                     comment '//商品简介',
    tg_pOlodPrice mediumint(8)  unsigned                          comment '//商品原价',
    tg_pNewPrice  mediumint(8)  unsigned                          comment '//商品现价',
    tg_pReaUser   varchar(20)   not null                          comment '//商品发布者',
    tg_pMainImg   varchar(50)                                     comment '//商品主要图片',
    tg_pReaTime   datetime      not null                          comment '//商品发布日期',
    tg_beInTime   tinyint       unsigned                          comment '//商品上架天数'
    PRIMARY KEY (tg_id)

)ENGINE=MyISAM DEFAULT CHARSET=utf8 auto_increment=50;";
    _query($sql);
}

/*
 * 创建商品和用户关系表
 */
function creUserGoodTable()
{
    $sql = "
create table if not exists tg_userGood(

  tg_id         int           unsigned  not null  auto_increment comment '//关系id',
  tg_userName   varchar(20)             not null                 comment '//用户名',
  tg_goodId     int           unsigned  not null                 comment '//商品id',
  tg_buyCount   mediumint(8)  unsigned                           comment '//购买数量',
  tg_comment    varchar(2000)                                    comment '//用户评价',
  tg_comment1   varchar(2000)                                    comment '//用户追评',
  tg_userMark   char(1)                                          comment '//用户评分',
  PRIMARY KEY (tg_id)

)ENGINE=MyISAM default charset = utf8 ;";

    _query($sql);
}

//创建用户表,首先写明字段，
$arr = ['username', 'password', 'uniqid', 'active', 'sex', 'level', 'reg_time',
    'last_time', 'login_ip', 'login_count'];
//创建网站模块表
$html = ['title', 'slogan'];

_connect();
creDataBase();
_select_db();
_set_names();


creUserTable($arr);
creGoodTable();
creUserGoodTable();
creHtmlTable($html);

createTriggerDir();

_close();


