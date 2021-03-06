<style>
    .company{float:left}
    .company span{margin-left:15px;}
</style>
<table class="layui-table">
    <thead>
        <tr>
            <th>简称</th>
            <th>全称</th>
            <th>贷款的公司</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($list as $item) { ?>
        <tr>
            <td><?php echo $item['shortname']; ?></td>
            <td>
                <?php echo $item['fullname']; ?>
                <span class="edit layui-btn layui-btn-mini" data-url="<?php echo $base_url . 'bank/edit/' . $item['bid']; ?>">
                    编辑
                </span>
            </td>
            <td>
                <?php if (isset($item['companies'])) {
                    $mTop = (count($item['companies']) - 1) * 20 / 2;
                ?>
                <div class="company">
                    <?php foreach ($item['companies'] as $val) { ?>
                    <p><?php echo $val['cname']; ?></p>
                    <?php } ?>
                </div>
                <div class="company" style="margin-top:<?php echo $mTop; ?>px">
                    <span data-url="<?php echo $base_url . 'mapping/relievecompany/' . $item['bid']; ?>"
                        class="layui-btn layui-btn-mini layui-btn-danger">解除</span>
                </div>
                <?php } ?>
            </td>
        </tr>
    <?php } ?>
    </tbody>
</table>

<div id="paging" style="text-align:center;margin-top:30px"></div>
<script>
    layui.use(['element', 'paging'], function(){
        var $ = layui.jquery,
            paging = layui.paging,
            iframe = window.window.frameElement,
            navEdit = $('.layui-nav-child dd span:eq(3)', parent.document),
            bankList = $('.layui-nav-child dd span:eq(0)', parent.document),
            navRelieve = $('.layui-nav-child dd span:eq(4)', parent.document);

        /**
         * 监听编辑（银行）按钮（注意：由于元素时动态添加的，需要采用事件委托或代理方式绑定）
         */
        $("tbody").on("click", ".edit", function () {
            navEdit.attr('data-url', $(this).data('url'));
            navEdit.click();
        });

        /**
         * 监听解除（关联的公司）按钮
         */
        $("tbody").on("click", ".layui-btn-danger", function () {
            navRelieve.attr('data-url', $(this).data('url'));
            navRelieve.click();
        });

        /**
         * 分页功能
         */
        var option = {
            'type' : 1,
            'iframe' : iframe,
            'navDom' : bankList,
            'container' : $('tbody'),
            'editUrl' : "<?php echo $base_url . 'bank/edit/'; ?>",
            'total' : "<?php echo $total; ?>",
            'dataUrl' : "<?php echo $base_url . 'bank/bankList/'; ?>",
            'relieveUrl' : "<?php echo $base_url . 'mapping/relievecompany/'; ?>"
        };

        paging.init(option);
        paging.show();
    });
</script>