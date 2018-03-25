<form class="layui-form" action="">
    <input type="hidden" name="bid" value="<?php if (isset($bank['bid'])) {echo $bank['bid'];} ?>">
    <div class="layui-form-item">
        <label class="layui-form-label">简称</label>
        <div class="layui-input-inline">
            <input type="text" name="shortname" lay-verify="required" placeholder="请输入" autocomplete="off"
                <?php if (isset($bank['shortname'])) {echo 'value="'. $bank['shortname'] .'"';} ?> class="layui-input">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">全称</label>
        <div class="layui-input-block">
            <input type="text" name="fullname" lay-verify="required" placeholder="请输入" autocomplete="off"
                <?php if (isset($bank['fullname'])) {echo 'value="'. $bank['fullname'] .'"';} ?> class="layui-input">
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
    layui.use('form', function(){
        var $ = layui.jquery,
            form = layui.form;

        // 监听提交
        form.on('submit(submit)', function (data) {
            $.post(
                '<?php echo $actUrl; ?>',
                data.field,
                function (result) {
                    if (result.status == 1) {
                        layer.msg(result.message, {icon: 1});
                    } else {
                        layer.msg(result.message, {icon: 2});
                    }
                },
                'json'
            );

            return false;
        });
    });
</script>