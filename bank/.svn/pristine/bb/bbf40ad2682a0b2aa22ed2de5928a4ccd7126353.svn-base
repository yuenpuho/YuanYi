<style>
    label.layui-form-label{width:120px;}
    div.layui-input-block{margin-left:150px;}
    div.layui-form-item .layui-input-inline{width:274px}
</style>
<form class="layui-form" action="">
    <div class="layui-form-item">
        <label class="layui-form-label">银行</label>
        <div class="layui-input-block">
            <select name="bank" lay-verify="required" lay-search="">
                <option value="">直接选择或搜索选择</option>
                <?php foreach ($banks as $item) { ?>
                <option value="<?php echo $item['bid']; ?>"><?php echo $item['fullname']; ?></option>
                <?php } ?>
            </select>
        </div>
    </div>

    <div id="selected" class="layui-form-item">
        <label class="layui-form-label"></label>
        <div class="layui-input-block"></div>
    </div>

    <div class="layui-form-item">
        <label class="layui-form-label">银行员工</label>
        <div class="layui-input-block">
            <select name="user" lay-filter="user" lay-search="">
                <option value="">直接选择或搜索选择</option>
                <?php foreach ($users as $item) { ?>
                <option value="<?php echo $item['userid']; ?>"><?php echo $item['userid'] . ' : ' . $item['username']; ?></option>
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
            form = layui.form,
            selected = $('#selected'),
            sVal = '',
            sTxt = '',
            html = '';

        /**
         * 监听选择银行员工，对显示进行处理
         */
        form.on('select(user)', function(data){
            sVal = data.value; // 得到被选中的值
            sTxt = data.elem[data.elem.selectedIndex].text; // 得到被选中的文本
            html = "<input type='checkbox' name='users[" + sVal + "]' title='" + sTxt + "' checked>";

            selected.children('label').text('已选用户');
            selected.children('div').append(html);

            form.render();
        });

        // 监听提交
        form.on('submit(submit)', function(data){
//            layer.alert(JSON.stringify(data.field), {
//                title: '最终的提交信息'
//            });
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