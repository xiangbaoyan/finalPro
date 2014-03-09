<?php
define("IN_TG", true);
require $_SERVER['DOCUMENT_ROOT'] . "/functions/mysqlFun.php";
_connect();
_select_db();
_set_names();
$action = @$_POST['action'];
$cartArr = unserialize(@$_COOKIE['cart']);
if ($action == 'saveC') {
    $id = @$_POST['id'];
    $newCount = @$_POST['newCount'];
    $totalPrice = @$_POST['totalPrice'];
    $cartArr[$id]['count'] = $newCount;
    $cartArr[$id]['totalPrice'] = $totalPrice;
    setcookie('cart', serialize($cartArr), time() + 86000);
    echo "ok";
} elseif ($action == 'getTotal') {
    $allPrice = 0;
    if(is_array($cartArr)){
        foreach ($cartArr as $key => $value) {
            $allPrice += @$cartArr[$key]['totalPrice'];
        }
    }
    echo $allPrice;
} elseif ($action == 'saveOrder') {
    $tg_cart = serialize($_COOKIE['cart']);

    foreach ($cartArr as $key => $value) {
        $tg_price = $cartArr[$key]['price'];
        $tg_count = $cartArr[$key]['count'];
        $sql = "insert into tg_order (

                                    tg_buyerName,
                                    tg_buyTime,
                                    tg_cart,
                                    tg_gId,
                                    tg_gPrice,
                                    tg_count)

                          values (
                                    '{$_COOKIE['username']}',
                                    NOW(),
                                    '{$tg_cart}',
                                    '{$key}',
                                    '{$tg_price}',
                                    '{$tg_count}'
                                    )
                          ";
        _query($sql);
        if (_affected_rows() != 1) {
            exit("订单没有生成");
        }

    }

    echo "ok";
} elseif ($action == 'collectThis') {
    $id = @$_POST['id'];
    $sql = "select tg_collect from tg_user where tg_username='{$_COOKIE['username']}'";
    $row = _fetch_array($sql);

    $collects = unserialize($row['tg_collect']);

    $collects[] = $id;
    $collects = array_unique($collects);
    $str = serialize($collects);
    $sql = "update tg_user set tg_collect = '{$str}' where tg_username='{$_COOKIE['username']}'";
    _query($sql);
    if (_affected_rows() == 1) {
        echo "ok";
    } else {
        echo "no";
    }
}


?>
