<?php
define("IN_TG", true);
$id = @$_GET['id'];
$carArr = unserialize(@$_COOKIE['cart']);;

require $_SERVER['DOCUMENT_ROOT'] . "/functions/mysqlFun.php";
_connect();
_select_db();
_set_names();
if ($id) {
    $sql = "select tg_pName,tg_pIns,tg_pNewPrice
          from tg_good where tg_id={$id}";
    $row = _fetch_array($sql);
    if ($row) {
        //在登陆的时候已经设定了cart
        if (!@$carArr[$id]) {
            $carArr[$id]['count'] = 0;
        }
        $carArr[$id]['count'] = $carArr[$id]['count'] + 1;
        $carArr[$id]['ins'] = $row['tg_pIns'];
        $carArr[$id]['name'] = $row['tg_pName'];
        $carArr[$id]['price'] = $row['tg_pNewPrice'];
        $carArr[$id]['totalPrice'] = $carArr[$id]['count'] * $carArr[$id]['price'];
        setcookie('cart', serialize($carArr), time() + 86000);
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
<?php if (@$_COOKIE['cart']) { ?>
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
                    <?php
                    foreach ($carArr as $key => $value) {
                        ?>
                        <tr class="deal_cart_row ">
                            <td class="deal-buy-desc">
                                <div class="cart-icon f_l" style="margin-bottom:10px;">
                                    <a href="#">【<?php echo @$carArr[$key]['name'] ?>
                                        】<?php echo @$carArr[$key]['ins'] ?></a></div>

                            </td>

                            <td class="deal-buy-quantity">
                                <input type="text" style="ime-mode: disabled; width:50px; margin-left:25px;"
                                       id="deal-buy-quantity-input"
                                       value="<?php echo $carArr[$key]['count'] ?>"
                                       goodId="<?php echo $key ?>"
                                       name="quantity" maxlength="4" class="input-text f-input">
                            </td>

                            <td class="deal-buy-price" style="padding-left: 29px;">
                                ￥<span><?php echo $carArr[$key]['price'] ?></span>
                            </td>

                            <td class="deal-buy-total" style="padding-left: 29px;">
                                ￥<?php echo $carArr[$key]['price'] * $carArr[$key]['count'] ?>
                            </td>
                            <td class="deal-buy-del" style="padding-left: 20px;"><a onclick="del_cart(4027)"
                                                                                    href="javascript:void(0);">删除</a>
                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
                <table class="cart-table">
                    <tbody>
                    <tr class="order-total">
                        <td class="tl">
                            <input type="button" value="清空购物车" class="s_buy_btn" onclick="clear_cart();">
                        </td>
                        <td class="deal-cart-total tr">
                            <strong class="total-cart-tip">商品实际合计（未包含运费）</strong> <strong
                                id="deal-buy-total-t">￥<span id="allPrice"></span></strong>
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
} else {
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
<script src="/js/jquery.min.js"></script>
<script src="/js/jquery.cookie.js"></script>
<script>
    function backHis() {
        history.back();
    }
    function submit_cart(){
        if(!$.cookie("username")){
            location.href = "muser-login.php";
        }else{
            $.post("dealOrder.php",{action:'saveOrder'},function(data){
                if(data=="ok"){
                    alert("成功生成订单");
                }
            });
        }
    }

//    清空购物车
    function clear_cart(){
        $.removeCookie("cart");
        location.reload();
    }

    /*
     显示总价
     */

    showTotalPrice();
    function showTotalPrice() {
        $.post("dealOrder.php", {action: 'getTotal'}, function (data) {
            $("#allPrice").html(data);
        })
    }

    /*
     修改数量
     */
    $(".deal_cart_row").each(function () {
        $(this).find("#deal-buy-quantity-input").change(function () {
            var newCount = parseInt($(this).val());
            var id = $(this).attr("goodId");
            var price = $(this).parent().siblings(".deal-buy-price").find("span").html();
            price = parseInt(price);
            var totalPrice = newCount * price;
            $(this).parent().siblings('.deal-buy-total').html(
                "￥" + totalPrice
            );
            $.post("dealOrder.php", {action: 'saveC', id: id, newCount: newCount, totalPrice: totalPrice},
                function (data) {
                    if (data == 'ok') {
                        showTotalPrice();
                    } else {
                        alert("此次修改数量没有成功");
                    }
                }
            );
        });
    });


</script>