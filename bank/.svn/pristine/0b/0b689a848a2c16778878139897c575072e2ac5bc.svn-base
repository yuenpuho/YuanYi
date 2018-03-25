<style>
    label.layui-form-label{width:120px;}
    div.layui-input-block{margin-left:150px;}
    div.layui-form-item .layui-input-inline{width:274px}
</style>
<form class="layui-form" action="">
    <input type="hidden" name="cid" value="<?php if (isset($company['cid'])) {echo $company['cid'];} ?>">

    <div class="layui-form-item">
        <label class="layui-form-label">简称</label>
        <div class="layui-input-inline">
            <input type="text" name="shortname" lay-verify="required" placeholder="请输入" autocomplete="off"
                <?php if (isset($company['shortname'])) {echo 'value="'. $company['shortname'] .'"';} ?> class="layui-input">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">全称</label>
        <div class="layui-input-block">
            <input type="text" name="fullname" lay-verify="required" placeholder="请输入" autocomplete="off"
                <?php if (isset($company['fullname'])) {echo 'value="'. $company['fullname'] .'"';} ?> class="layui-input">
        </div>
    </div>
    <div class="layui-form-item">
        <div class="layui-inline">
            <label class="layui-form-label">工商注册号</label>
            <div class="layui-input-inline">
                <input type="text" name="reg_No" lay-verify="number" placeholder="请输入" autocomplete="off"
                    <?php if (isset($company['reg_No'])) {echo 'value="'. $company['reg_No'] .'"';} ?> class="layui-input">
            </div>
        </div>
        <div class="layui-inline">
            <label class="layui-form-label">纳税人识别号</label>
            <div class="layui-input-inline">
                <input type="text" name="taxpayer_ID" lay-verify="number" placeholder="请输入" autocomplete="off"
                    <?php if (isset($company['taxpayer_ID'])) {echo 'value="'. $company['taxpayer_ID'] .'"';} ?> class="layui-input">
            </div>
        </div>
    </div>
    <div class="layui-form-item">
        <div class="layui-inline">
            <label class="layui-form-label">组织机构代码证</label>
            <div class="layui-input-inline">
                <input type="text" name="certificate_No" lay-verify="number" placeholder="请输入" autocomplete="off"
                    <?php if (isset($company['certificate_No'])) {echo 'value="'. $company['certificate_No'] .'"';} ?> class="layui-input">
            </div>
        </div>
        <div class="layui-inline">
            <label class="layui-form-label">统一社会信用代码</label>
            <div class="layui-input-inline">
                <input type="text" name="credit_No" lay-verify="number" placeholder="请输入" autocomplete="off"
                    <?php if (isset($company['credit_No'])) {echo 'value="'. $company['credit_No'] .'"';} ?> class="layui-input">
            </div>
        </div>
    </div>
    <div class="layui-form-item">
        <div class="layui-inline">
            <label class="layui-form-label">成立日期</label>
            <div class="layui-input-inline">
                <input type="text" name="establishment_date" id="date_1" lay-verify="date" placeholder="yyyy-MM-dd"
                    <?php if (isset($company['establishment_date'])) {echo 'value="'. $company['establishment_date'] .'"';} ?> autocomplete="off" class="layui-input">
            </div>
        </div>
        <div class="layui-inline">
            <label class="layui-form-label">核准日期</label>
            <div class="layui-input-inline">
                <input type="text" name="approved_date" id="date_2" lay-verify="date" placeholder="yyyy-MM-dd"
                    <?php if (isset($company['approved_date'])) {echo 'value="'. $company['approved_date'] .'"';} ?> autocomplete="off" class="layui-input">
            </div>
        </div>
    </div>
    <div class="layui-form-item">
        <div class="layui-inline">
            <label class="layui-form-label">法人代表</label>
            <div class="layui-input-inline">
                <input type="text" name="legal_representative" placeholder="请输入" autocomplete="off"
                    <?php if (isset($company['legal_representative'])) {echo 'value="'. $company['legal_representative'] .'"';} ?> class="layui-input">
            </div>
        </div>
        <div class="layui-inline">
            <label class="layui-form-label">注册资本</label>
            <div class="layui-input-inline">
                <input type="text" name="reg_capital" placeholder="请输入" autocomplete="off" class="layui-input"
                    <?php if (isset($company['reg_capital'])) {echo 'value="'. $company['reg_capital'] .'"';} ?>>
            </div>
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">企业类型</label>
        <div class="layui-input-block">
            <input type="text" name="company_type" placeholder="请输入" autocomplete="off" class="layui-input"
                <?php if (isset($company['company_type'])) {echo 'value="'. $company['company_type'] .'"';} ?>>
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">工商登记机关</label>
        <div class="layui-input-block">
            <input type="text" name="authority" placeholder="请输入" autocomplete="off" class="layui-input"
                <?php if (isset($company['authority'])) {echo 'value="'. $company['authority'] .'"';} ?>>
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">注册地址</label>
        <div class="layui-input-block">
            <input type="text" name="reg_address" placeholder="请输入" autocomplete="off" class="layui-input"
                <?php if (isset($company['reg_address'])) {echo 'value="'. $company['reg_address'] .'"';} ?>>
        </div>
    </div>
    <div class="layui-form-item">
        <div class="layui-inline">
            <label class="layui-form-label">营业期限</label>
            <div class="layui-input-inline">
                <input type="text" name="from" id="date_3" lay-verify="date" placeholder="yyyy-MM-dd" autocomplete="off"
                    <?php if (isset($company['from'])) {echo 'value="'. $company['from'] .'"';} ?> class="layui-input">
            </div>
            <div class="layui-form-mid">至</div>
            <div class="layui-input-inline">
                <input type="text" name="to" id="date_4" lay-verify="date" placeholder="yyyy-MM-dd" autocomplete="off"
                    <?php if (isset($company['to'])) {echo 'value="'. $company['to'] .'"';} ?> class="layui-input">
            </div>
        </div>
    </div>
    <div class="layui-form-item layui-form-text">
        <label class="layui-form-label">经营范围</label>
        <div class="layui-input-block">
            <textarea name="business_scope" placeholder="请输入经营范围" class="layui-textarea"><?php if (isset($company['business_scope'])) {echo $company['business_scope'];} ?></textarea>
        </div>
    </div>

    <div class="layui-form-item">
        <div class="layui-input-block">
            <button class="layui-btn" lay-submit lay-filter="submit">立即提交</button>
            <button type="reset" class="layui-btn layui-btn-primary">重置</button>
        </div>
    </div>
</form>

<script>
    layui.use(['form', 'laydate'], function(){
        var $ = layui.jquery,
            form = layui.form,
            laydate = layui.laydate;

        /**
         * 执行一个laydate实例，初始化日期控件
         */
        laydate.render({elem: '#date_1'});
        laydate.render({elem: '#date_2'});
        laydate.render({elem: '#date_3'});
        laydate.render({elem: '#date_4'});

        // 监听提交
        form.on('submit(submit)', function(data){
            $.post(
                '<?php echo $actUrl; ?>',
                data.field,
                function (result) {
                    if (result.status == 1) {
                        layer.msg(result.message, {icon: 1});
                    } else {
                        layer.msg(result.message, {icon: 5});
                    }
                },
                'json'
            );

            return false;
        });
    });
</script>