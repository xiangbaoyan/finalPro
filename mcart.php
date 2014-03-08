<?php
$id = $_GET['id'];
$carArr = [];
if ($id) {
    require $_SERVER['DOCUMENT_ROOT'] . "/functions/mysqlFun.php";
    _connect();
    _select_db();
    _set_names();
    $sql = "select tg_pName,tg_pIns,tg_pNewPrice
              from tg_good where tg_id={$id}";
    $row = _fetch_array($sql);
    if ($row) {
        //在登陆的时候已经设定了cart
        $carArr = unserialize($_COOKIE['cart']);
        if (!$carArr[$id]) {
            $carArr[$id]['count'] = 0;
        }
        $carArr[$id]['count'] = $carArr[$id]['count'] + 1;
        $carArr[$id]['ins'] = $row['tg_pIns'];
        $carArr[$id]['price'] = $row['tg_pNewPrice'];

        setcookie('cart',$carArr,time()+86000);
    } else {
        echo "<script>alert('未找到该商品');history.back();</script>";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>购物车</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="format-detection" content="telephone=no">
    <link rel="stylesheet" type="text/css" href="/css/mcart4.css"/>
</head>
<body id="body">
<header>
    <div class="header">
        <a id="tuanDetailBack" href='javascript:backHis()' class="back"><span></span>返回</a>

        <h2 class="fw-normal">
            购物车 </h2>

        <div class="btn-area-rt">
            <a href="m.html" class="btn-sear-rt"></a>
        </div>
    </div>
</header>

<?php
if ($_COOKIE['cart']) {

    foreach ($carArr as $key=>$value){

        ?>
        <div class="t-virtual t-entity">

            <div class="mc">
                <div id="cart_list">
                    <table class="cart-table">
                        <tbody>
                        <tr>
                            <th class="deal-buy-desc" width="30%">项目</th>
                            <th class="deal-buy-quantity" width="20%">数量</th>
                            <th class="deal-buy-price" width="16%">价格</th>
                            <th class="deal-buy-total" width="16%">总价</th>
                            <th width="18%">删除</th>

                        </tr>
                        <tr class="deal_1442 deal_cart_row">
                            <td class="deal-buy-desc">
                                <div class="cart-icon f_l" style="margin-bottom:10px;">
                                    <a href="#">【渤海国际】后海清吧</a></div>

                            </td>

                            <td class="deal-buy-quantity">
                                <input type="text" style="ime-mode: disabled; width:50px; margin-left:25px;"
                                       onblur="modify_cart(4027,this);" id="deal-buy-quantity-input" value="1"
                                       name="quantity" maxlength="4" class="input-text f-input">
                            </td>

                            <td class="deal-buy-price" style="padding-left: 29px;">
                                ￥100
                            </td>

                            <td class="deal-buy-total" style="padding-left: 29px;">
                                ￥100
                            </td>
                            <td class="deal-buy-del" style="padding-left: 20px;"><a onclick="del_cart(4027)"
                                                                                    href="javascript:void(0);">删除</a>
                            </td>
                        </tr>
                        <tr class="deal_1432 deal_cart_row" rel="cart_1432_">
                            <td class="deal-buy-desc">
                                <div class="cart-icon f_l" style="margin-bottom:10px;"><a href="/goods/id-1432.html"
                                                                                          target="_blank"
                                                                                          title="仅1380元享1980元沁园家用厨房双出水直饮RO-185E反渗透净水器">
                                        <!-- <img src="http://s1.dabinzhou.com/public/attachment/201401/24/09/52e1c51c955b6_50x50.jpg" alt="仅1380元享1980元沁园家用厨房双出水直饮RO-185E反渗透净水器" /> --></a>
                                    <a href="/goods/id-1432.html" target="_blank"
                                       title="仅1380元享1980元沁园家用厨房双出水直饮RO-185E反渗透净水器">【吉泰阳光、碧林花园】沁园家用净水器</a></div>

                            </td>

                            <td class="deal-buy-quantity">
                                <input type="text" style="ime-mode: disabled; width:50px; margin-left:25px;"
                                       onblur="modify_cart(4028,this);" id="deal-buy-quantity-input" value="1"
                                       name="quantity" maxlength="4" class="input-text f-input">
                            </td>

                            <td class="deal-buy-price" style="padding-left: 29px;">
                                ￥1380
                            </td>

                            <td class="deal-buy-total" style="padding-left: 29px;">
                                ￥1380
                            </td>
                            <td class="deal-buy-del" style="padding-left: 20px;"><a onclick="del_cart(4028)"
                                                                                    href="javascript:void(0);">删除</a>
                            </td>
                        </tr>
                        <tr class="deal_1445 deal_cart_row" rel="cart_1445_">
                            <td class="deal-buy-desc">
                                <div class="cart-icon f_l" style="margin-bottom:10px;"><a href="/goods/id-1445.html"
                                                                                          target="_blank"
                                                                                          title="仅售38元，享受价值1280元的尊宠贵宾卡一张。面部水上芭蕾3次+顶级头疗3次+颈椎理疗3次">
                                        <!-- <img src="http://s1.dabinzhou.com/public/attachment/201403/05/09/531678e73b4c8_50x50.jpg" alt="仅售38元，享受价值1280元的尊宠贵宾卡一张。面部水上芭蕾3次+顶级头疗3次+颈椎理疗3次" /> --></a>
                                    <a href="/goods/id-1445.html" target="_blank"
                                       title="仅售38元，享受价值1280元的尊宠贵宾卡一张。面部水上芭蕾3次+顶级头疗3次+颈椎理疗3次">【渤海国际】丽都国际美容整形</a></div>

                            </td>

                            <td class="deal-buy-quantity">
                                <input type="text" style="ime-mode: disabled; width:50px; margin-left:25px;"
                                       onblur="modify_cart(4029,this);" id="deal-buy-quantity-input" value="2"
                                       name="quantity" maxlength="4" class="input-text f-input">
                            </td>

                            <td class="deal-buy-price" style="padding-left: 29px;">
                                ￥38
                            </td>

                            <td class="deal-buy-total" style="padding-left: 29px;">
                                ￥76
                            </td>
                            <td class="deal-buy-del" style="padding-left: 20px;"><a onclick="del_cart(4029)"
                                                                                    href="javascript:void(0);">删除</a>
                            </td>
                        </tr>


                        </tbody>
                    </table>
                    <table class="cart-table">
                        <tbody>
                        <tr class="order-total">
                            <td class="tl">
                                <input type="button" value="清空购物车" class="s_buy_btn" onclick="clear_cart();">
                            </td>
                            <td class="deal-cart-total tr">
                                <strong class="total-cart-tip">商品实际合计（未包含运费）</strong> <strong id="deal-buy-total-t">￥1556</strong>
                            </td>

                        </tr>
                        </tbody>
                    </table>
                </div>
                <div style="padding-left:" class="form-submit">
                    &nbsp;&nbsp;

                    <input type="button" onclick="submit_cart();" value="提交订单" name="buy" class="formbutton"
                           style="margin:10px auto 0;">
                </div>

            </div>
        </div>
    <?php
        }
    }else {
    ?>
    <div class="t-virtual t-entity">
        <div class="mc">
            <div class="blank"></div>
            <div class="nogoodsbg">
                <div class="nogoodsimg"><img src="/images/nogoods.jpg"></div>
                <div class="nogoodstxt"><p class="empty">您的购物车还是空的。</p>

                    <p class="color_blue">您还没有添加任何商品。马上去 [ <a href="m.html">挑选商品</a> ]，或者去 [ <a
                            href="#">我的收藏夹</a> ] 看看。
                        <br></p><br><br><br><br></div>
                <div class="blank"></div>
            </div>
        </div>
    </div>
<?php
}
?>



<div style="margin-top:-15px"></div>
<footer>
    <div class="to-top"><a href="#top"><span></span>回顶部</a></div>

    <div class="footer">
        <div>
            <a href="muser-login.php" style="padding-right: 10px;">登录</a><span class="new-bar2">|</span><a
                href="muser-register.php" style="padding-left: 10px;">注册</a>

        </div>
        <a href="m.php" style="padding-right: 10px;">触屏版</a> | <a href="index.htm" style="padding-left: 10px;">电脑版</a>

        <div class="gray">Copyright &copy; 2013 Xiangbaoyn <a href="#">鲁ICP备13022210号</a>
        </div>
    </div>
</footer>
</body>
<script>
    function backHis() {
        history.back();
    }
