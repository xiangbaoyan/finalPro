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

    <?php
    define("IN_TG", true);
    require $_SERVER['DOCUMENT_ROOT'] . "/functions/mysqlFun.php";

    _connect();
    _select_db();
    _set_names();
    $sql = "select tg_username,tg_level,tg_reg_time from tg_user";
    $result = _query($sql);

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
                <button class="delUserBtn btn red-stripe">
                    <i class="fa fa-eraser"></i>
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
                    <td>
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
<?php
}
?>

<script>
   $(".portlet").each(
       function(){
           var username = $(this).attr("id");
           $(this).find(".delUserBtn").click(
              function(){
                  $.post("dealFuns/dealUser.php",
                      {method:"delUser",username:username},function(data){
                      alert(data);
                  });
              }
           )
       }
   );
</script>