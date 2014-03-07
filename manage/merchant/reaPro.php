<div style="margin-top: 50px">
    <ul class="page-breadcrumb breadcrumb">
        <li>
            <i class="fa fa-home"></i>
            <a href="merchantGuy.php">
                后台主页
            </a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <i class="fa fa-legal"></i>
            <a href="#">
                发布商品:
            </a>
        </li>
    </ul>


    <div class="portlet">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-shopping-cart"></i>商品详细信息
            </div>
        </div>
        <div class="portlet-body">
            <div id="err" style="color:red;margin-left: 20px;font-size: 18px"></div>
            <form class="form form-horizontal" id="form">
                <div class="form-group">
                    <label class="control-label col-sm-2">商品名称:<span class="aster">*</span></label>
                    <div class="col-sm-7">
                        <input type="text" name="prodName" class="form-control"/>
                    </div>
                    <div class="col-sm-2" style="padding-top:5px">
                        <span style="display: inline-block">建议10个字以内</span>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-sm-2">商品描述:<span class="aster">*</span></label>
                    <div class="col-sm-7">
                        <input type="text" name="prodIns" class="form-control"/>
                    </div>
                    <div class="col-sm-2" style="padding-top:5px">
                        <span style="display: inline-block">建议10个字以内</span>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-sm-2">商品原价(只写数字):<span class="aster">*</span></label>
                    <div class="col-sm-7">
                        <input type="text" name="prodOldPri" class="form-control"/>
                    </div>
                    <div class="col-sm-2" style="padding-top:5px">
                        <span style="display: inline-block">建议10个字以内</span>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-sm-2">商品现价(只写数字):<span class="aster">*</span></label>
                    <div class="col-sm-7">
                        <input type="text" name="prodNewPri" class="form-control"/>
                    </div>
                    <div class="col-sm-2" style="padding-top:5px">
                        <span style="display: inline-block">建议10个字以内</span>
                    </div>
                </div>
                <div class="form-group">
                    <input type="submit" value="发布" class="btn green form-control"/>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    formCheckAndSub('form', 'err');
    //必须规范form表单名称为email，password,repassword,username,
    function formCheckAndSub(formId, errId) {

        $("#" + formId).submit(function () {
            var flag = true;
            $("#" + errId).html("");
            $("#" + formId + " input").each(function () {
                if ($(this).attr("name") == "prodName") {
                    if (!checkName($(this).val())) {
                        $("#" + errId).html("商品名称长度不合要求，需要在3到20个字符");
                        flag = false;
                    }
                }else if ($(this).attr("name") == "prodIns") {
                    if (!checkName($(this).val())) {
                        $("#" + errId).html("商品描述长度不合要求，需要在3到20个字符");
                        flag = false;
                    }
                }else if ($(this).attr("name") == "prodOldPri") {
                    if (!checkName($(this).val())) {
                        $("#" + errId).html("商品原价格长度不合要求，需要在3到20个字符");
                        flag = false;
                    }
                }else if ($(this).attr("name") == "prodNewPri") {
                    if (!checkName($(this).val())) {
                        $("#" + errId).html("商品新价格长度不合要求，需要在3到20个字符");
                        flag = false;
                    }
                }
            });
            if (flag == true) {
                return true
            }
            //如果上面没有错就显示，但是无论如何都要执行到下面
            return false;
        });
    }

    function checkName(str) {
        var myReg = /\w{3,20}/;
        if (myReg.test(str)) {
            return true;
        }
        return false;
    }
</script>
