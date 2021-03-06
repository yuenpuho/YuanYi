<form class="layui-form" action="">
    <input type="hidden" name="bid" value="<?php if (isset($bank['bid'])) {echo $bank['bid'];} ?>">
    <div class="layui-form-item">
        <label class="layui-form-label">银行</label>
        <div class="layui-input-block">
            <?php if (isset($bank['fullname'])) { ?>
                <input type="text" name="fullname" class="layui-input" readonly="readonly" value="<?php echo $bank['fullname']; ?>">
            <?php } else { ?>
            <select name="bank" lay-verify="required" lay-search="">
                <option value="">直接选择或搜索选择</option>
                <?php foreach ($banks as $item) { ?>
                    <option value="<?php echo $item['bid']; ?>"><?php echo $item['fullname']; ?></option>
                <?php } ?>
            </select>
            <?php } ?>
        </div>
    </div>

    <div id="selected" class="layui-form-item">
        <label class="layui-form-label"><?php if (isset($bank['bid'])) {echo '已选公司';} ?></label>
        <div class="layui-input-block">
        <?php if (isset($bank['companies'])) {
        foreach ($bank['companies'] as $item) { ?>
            <input type="checkbox" name="companies[<?php echo $item['cid']; ?>]" value="<?php echo $item['cid']; ?>"
                title="<?php echo $item['cname']; ?>" checked>
        <?php }
        } ?>
        </div>
    </div>

    <?php if (!isset($bank['companies'])) { ?>
    <div class="layui-form-item">
        <label class="layui-form-label">公司</label>
        <div class="layui-input-block">
            <select name="company" lay-filter="company" lay-search="">
                <option value="">直接选择或搜索选择</option>
                <?php foreach ($companies as $item) { ?>
                    <option value="<?php echo $item['cid']; ?>"><?php echo $item['fullname']; ?></option>
                <?php } ?>
            </select>
        </div>
    </div>
    <?php } ?>

    <div class="layui-form-item">
        <div class="layui-input-block">
            <button type="submit" class="layui-btn" lay-submit lay-filter="submit">立即提交</button>
        </div>
    </div>
</form>

<script>
    layui.use('form', function () {
        var $ = layui.jquery,
            form = layui.form,
            selected = $('#selected'),
            sVal = '', sTxt = '', html = '';

        /**
         * 监听选择公司，对显示进行处理
         */
        form.on('select(company)', function (data) {
            sVal = data.value; // 得到被选中的值
            sTxt = data.elem[data.elem.selectedIndex].text; // 得到被选中的文本
            html = "<input type='checkbox' name='companies[" + sVal + "]' value='" + sVal + "' title='" + sTxt + "' checked>";

            selected.children('label').text('已选公司');
            selected.children('div').append(html);

            form.render();
        });

        /**
         * 监听提交
         */
        form.on('submit(submit)', function (data) {
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