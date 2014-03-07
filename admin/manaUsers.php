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

    <ul class="pagination">
        <li><a href=""><i class="fa fa-arrow-left"></i>上十页</a></li>
        <li><a href=""><i class="fa fa-arrow-left"></i>上一页</a></li>
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

        //现在确定一次显示10页，每页5条


        //查询指定数目的记录
        ?>

        <li><a href="">下一页<i class="fa fa-arrow-right"></i></a></li>
        <li><a href="">下十页<i class="fa fa-arrow-right"></i></a></li>
    </ul>
    <?php
    while ($row = _fetch_array_list($result)){
    ?>
    <div class="portlet box blue" id="<?php echo $row['tg_username'] ?>">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-user"></i><?php
                echo $row['tg_username'];
                ?>
            </div>
            <div class="tools" style="padding-bottom: 5px">
                <button class="promBtn btn red"
                    <?php
                    if (($row['tg_level'] == 5)) echo "disabled";
                    ?> >
                    <i class="fa fa-hand-o-up"></i>
                    提升权限
                </button>
                <button class="deProBtn btn green
                <?php
                if (($row['tg_level'] == 0)) echo "disabled";
                ?> >">
                    <i class="fa fa-hand-o-down"></i>
                    降低权限
                </button>
                <button class="delUserBtn btn black">
                    <i class="fa fa-times-circle"></i>
                    删除用户
                </button>
            </div>
        </div>
        <div class="portlet-body">
            <table class="table table-hover">
                <tbody>
                <tr>
                    <td>
                        用户级别
                    </td>
                    <td class="userLevel">
                        <?php
                        echo levelToName($row['tg_level']);
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        注册日期
                    </td>
                    <td>
                        <?php
                        echo $row['tg_reg_time'];
                        ?>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div id="err"></div>
<?php
}
?>
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