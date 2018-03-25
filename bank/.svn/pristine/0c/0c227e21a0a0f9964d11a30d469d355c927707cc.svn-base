<style>
    .user{float:left}
    div.switch{margin-bottom:10px}
    div.user{margin:-10px 0 0 10px}
    .clear{clear:both}
    .layui-form-switch{width:53px}
    .layui-form-switch em{width:38px}
    .layui-form-onswitch i{left:44px}
</style>
<table class="layui-table">
    <thead>
        <tr>
            <th>银行简称</th>
            <th>银行全称</th>
            <th>银行员工</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($list as $item) { ?>
        <tr>
            <td><?php echo $item['shortname']; ?></td>
            <td><?php echo $item['fullname']; ?></td>
            <td>
            <?php if (isset($item['users'])) {
                foreach ($item['users'] as $val) { ?>
                <div class="switch">
                    <h3 class="user"><?php echo $val['username']; ?></h3>
                    <div class="user">
                        <form class="layui-form" action="">
                            <input type="checkbox" name="uid_<?php echo $val['userid']; ?>" lay-skin="switch"
                                lay-filter="switch" lay-text="已授权|禁用" value="<?php echo $val['userid']; ?>"
                                <?php if ($val['valid']) { ?>checked <?php } ?>>
                        </form>
                    </div>
                    <p class="clear"></p>
                </div>
            <?php }
            } ?>
            </td>
        </tr>
    <?php } ?>
    </tbody>
</table>

<div id="paging" style="text-align:center;margin-top:30px"></div>
<script>
    layui.use(['element', 'form', 'paging'], function(){
        var $ = layui.jquery,
            form = layui.form,
            paging = layui.paging,
            iframe = window.window.frameElement,
            navDom = $('.layui-nav-child dd span:eq(9)', parent.document);

        form.on('switch(switch)', function(data){
//            console.log(data.elem); //得到checkbox原始DOM对象
//            console.log(data.elem.checked); //开关是否开启，true或者false
//            console.log(data.value); //开关value值，也可以通过data.elem.value得到
//            console.log(data.othis); //得到美化后的DOM对象
        });

        /**
         * 分页功能
         */
        var option = {
            'type' : 3,
            'iframe' : iframe,
            'navDom' : navDom,
            'container' : $('tbody'),
            'editUrl' : "",
            'total' : "<?php echo $total; ?>",
            'dataUrl' : "<?php echo $base_url . 'user/index/'; ?>",
            'relieveUrl' : ""
        };

        paging.init(option);
        paging.show();
    });
</script>