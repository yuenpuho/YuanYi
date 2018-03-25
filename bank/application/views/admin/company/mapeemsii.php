<style>
    label.layui-form-label{width:120px;}
    div.layui-input-block{margin-left:150px;}
    div.layui-form-item .layui-input-inline{width:274px}
</style>
<form class="layui-form" action="">
    <div class="layui-form-item">
        <label class="layui-form-label">电控宝的公司</label>
        <div class="layui-input-block">
            <select name="company" lay-verify="required" lay-search="">
                <option value="">直接选择或搜索选择</option>
                <?php foreach ($companies as $item) { ?>
                <option value="<?php echo $item['cid']; ?>"><?php echo $item['fullname']; ?></option>
                <?php } ?>
            </select>
        </div>
    </div>

    <div class="layui-form-item">
        <label class="layui-form-label">eemsii的公司</label>
        <div class="layui-input-block">
            <select name="eemsiiCompany" lay-filter="company" lay-search="">
                <option value="">直接选择或搜索选择</option>
                <?php foreach ($eemsiiCompanies as $item) { ?>
                <option value="<?php echo $item['id']; ?>"><?php echo $item['fullname']; ?></option>
                <?php } ?>
            </select>
        </div>
    </div>

    <div class="layui-form-item">
        <div class="layui-input-block">
            <button type="submit" class="layui-btn" lay-submit lay-filter="submit">立即提交</button>
            <button type="reset" class="layui-btn layui-btn-primary">重置</button>
        </div>
    </div>
</form>

<script>
    layui.use('form', function(){
        var $ = layui.jquery,
            form = layui.form;

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