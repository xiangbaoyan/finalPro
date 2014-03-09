<?php
define("IN_TG", true);
require $_SERVER['DOCUMENT_ROOT'] . "/functions/mysqlFun.php";

$category = @$_POST['cate'];

_connect();
_select_db();
_set_names();

if ($category) {
    $sql = "select * from tg_good where tg_cate = '{$category}'";
    setcookie("sql", $sql, time() + 3000);
} else {
    $sql = "select * from tg_good ";
    setcookie("sql", $sql, time() + 3000);

}

$sort = @$_POST['sort'];
if ($sort) {
    $sql = $_COOKIE["sql"];
    if ($sort == 'sortByTime') {
        $sql .= 'order by tg_pReaTime';
    }
    if ($sort == 'sortByPrice') {
        $sql .= 'order by tg_pNewPrice';

    }
}

$result = _query($sql);
$i = 0;
while ($row = _fetch_array_list($result)) {
    ?>
    <div class="thumb">
        <ul class="lst-type">
            <li class="box lt-li">
                <a class="lt-a" href="#">
                    <p class="thumb-img" style="width:150px;">
                        <img width="144" height="100" alt="photo"
                             src="<?php echo $row['tg_pMainImg'] ?>"><br>
                    </p>
                            <span class="thumb-cont" style="display:block;padding:5px 8px 0 0px">
							<span style="height:40px;font-size:14px;margin-top: -8px;">
								【<?php echo $row['tg_pName'] ?>
                                】<?php echo $row['tg_pIns'] ?>          					</span>

                            	<span style="margin-top:-8px;" mode="nowrap">
                                	<strong style="font-size:15px;">￥<?php echo $row['tg_pNewPrice'] ?></strong>
                                </span>
								<span style="margin-top: -6px;" mode="nowrap">
                                	<del style="font-size:12px;">￥<?php echo $row['tg_pOlodPrice'] ?></del>
                                </span>

								<p style="font-size:14px;margin-top: -8px;" class="buy txt2">
                                    <span></span><strong>0</strong>人已购买</p>
								</span>
                    <span class="li-arrow"></span>
                </a>
            </li>
        </ul>
    </div>
    <?php
    $i++;
}
setcookie("itemSum", $i);
?>
