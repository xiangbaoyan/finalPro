<?php
_connect();
_select_db();
_set_names();

require $_SERVER['DOCUMENT_ROOT']."/functions/mysqlFun.php";


$result = @$_POST['result'];
while ($row = _fetch_array_list($result)) {
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

    <div id="err"></div>
<?php
}
?>