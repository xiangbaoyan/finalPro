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
      <div id="err"></div>
    <ul class="pagination" style="min-width: 730px;">
        <li><a id="lastTen"><i class="fa fa-arrow-left"></i>上十页</a></li>
        <li><a id="lastOne"><i class="fa fa-arrow-left"></i>上一页</a></li>
        <?php
        define("IN_TG", true);
        require $_SERVER['DOCUMENT_ROOT'] . "/functions/mysqlFun.php";

        _connect();
        _select_db();
        _set_names();
        //确定总数是多少
        $sql = "select count(tg_id) pageSum from tg_user";
        $row = _fetch_array($sql);
        $pageSum = $row['pageSum'];

        //存放在cookie
        setcookie("pageSum",$pageSum);

        //现在确定一次显示10页，每页5条
        foreach (range(1, $pageSum) as $value) {
            ?>
            <li class="liNum" style="display:none;" mytag="<?php echo $value ?>">
                <a><?php echo $value ?></a></li>
            <?php
        }
        //查询指定数目的记录
        ?>

        <li><a id="nextOne">下一页<i class="fa fa-arrow-right"></i></a></li>
        <li><a id="nextTen">下十页<i class="fa fa-arrow-right"></i></a></li>
    </ul>
    <script src="js/myPagify.js"></script>
<script>
    $(".portlet").each(
        function () {
            var username = $(this).attr("id");
            var that = $(this);
            $(this).find(".delUserBtn").click(
                function () {
                    $.post("dealFuns/dealUser.php",
                        {method: "delUser", username: username}, function (data) {
                            that.remove();
                            alert("删除成功");
                        });
                }
            );

            $(this).find(".promBtn").click(
                function () {
                    var thos = $(this);
                    $.post("dealFuns/dealUser.php",
                        {method: "promUser", username: username}, function (data) {
                            that.find(".userLevel").html(data);
                            if (data == "管理员") {
                                thos.attr("disabled", "disabled");
                            }
                            if (data != "普通用户") {
                                thos.siblings(".deProBtn").removeAttr("disabled");
                            }


                        });
                }
            );

            $(this).find(".deProBtn").click(
                function () {
                    var thos = $(this);
                    $.post("dealFuns/dealUser.php",
                        {method: "deProUser", username: username}, function (data) {
                            that.find(".userLevel").html(data);
                            if (data == "普通用户") {
                                thos.attr("disabled", "disabled");
                                //thos.siblings.find(".promBtn").
                            }
                            if (data != "管理员") {
                                thos.siblings(".promBtn").removeAttr("disabled");
                            }
                        });
                }
            )


        }
    );
</script>