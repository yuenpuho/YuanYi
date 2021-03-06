<style>
    th.title{text-align:center;font-weight:bold}
    .detail{display:none}
    th.map, td.map{width:250px;border:none;padding:0;}
    .layui-table thead tr.type, td.map{background-color:#ffffff;}
    span.first{margin-left:-4.5px;}
    span.second{margin-left:247px;}
    span.layui-badge-dot, span.layui-btn-danger{position:absolute}
    span.layui-badge-dot{margin-top:6px}
    span.layui-btn-danger{margin-left:105px}
    h2.layui-colla-title{cursor:text}
</style>
<table class="layui-table">
    <thead>
        <tr class="type">
            <th colspan="2" class="title">电控宝的公司</th>
            <th class="map"></th>
            <th colspan="2" class="title">eemsii的公司</th>
        </tr>
        <tr>
            <th>简称</th>
            <th>全称</th>
            <td class="map"></td>
            <th>简称</th>
            <th>全称</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($list as $item) { ?>
        <tr>
            <td><?php echo $item['shortname']; ?></td>
            <td>
                <?php echo $item['fullname']; ?>
                <span lay-id="<?php echo $item['cid']; ?>" class="detailBtn layui-btn layui-btn-mini layui-btn-normal">详情</span>
                <span class="layui-btn layui-btn-mini edit" title="编辑公司" data-url="<?php echo $base_url . 'company/edit/' . $item['cid']; ?>">
                    编辑
                </span>
                <table class="detail" id="cid_<?php echo $item['cid']; ?>">
                    <tr><td>简称</td><td><?php echo $item['shortname']; ?></td></tr>
                    <tr> <td>全称</td><td><?php echo $item['fullname']; ?></td></tr>
                    <tr><td>工商注册号</td><td><?php echo $item['reg_No']; ?></td></tr>
                    <tr><td>纳税人识别号</td><td><?php echo $item['taxpayer_ID']; ?></td></tr>
                    <tr><td>组织机构代码</td><td><?php echo $item['certificate_No']; ?></td></tr>
                    <tr><td>统一社会信用代码</td><td><?php echo $item['credit_No']; ?></td></tr>
                    <tr><td>成立日期</td><td><?php echo $item['establishment_date']; ?></td></tr>
                    <tr><td>核准日期</td><td><?php echo $item['approved_date']; ?></td></tr>
                    <tr><td>法人代表</td><td><?php echo $item['legal_representative']; ?></td></tr>
                    <tr><td>企业类型</td><td><?php echo $item['company_type']; ?></td></tr>
                    <tr><td>工商登记机关</td><td><?php echo $item['authority']; ?></td></tr>
                    <tr><td>注册资本</td><td><?php echo $item['reg_capital']; ?></td></tr>
                    <tr><td>注册地址</td><td><?php echo $item['reg_address']; ?></td></tr>
                    <tr><td>营业期限</td><td><?php echo $item['operating_period']; ?></td></tr>
                    <tr>
                        <td colspan="2">
                            <div class="layui-collapse" lay-accordion>
                                <div class="layui-colla-item">
                                    <h2 class="layui-colla-title">经营范围</h2>
                                    <div class="layui-colla-content layui-show"><?php echo $item['business_scope']; ?></div>
                                </div>
                            </div>
                        </td>
                    </tr>
                </table>
            </td>

            <td class="map">
                <?php if ($item['mapping_cid']) { ?>
                <span class="first layui-badge-dot layui-bg-green"></span>
                <span class="second layui-badge-dot layui-bg-green"></span>
                <span lay-id="<?php echo $item['cid']; ?>" class="layui-btn layui-btn-mini layui-btn-danger">解除</span>
                <hr class="layui-bg-green">
                <?php } ?>
            </td>

            <td><?php echo $item['eshort']; ?></td>
            <td><?php echo $item['efull']; ?></td>
        </tr>
    <?php } ?>
    </tbody>
</table>

<div id="paging" style="text-align:center;margin-top:30px"></div>
<script>
    layui.use(['layer', 'paging'], function(){
        var $ = layui.jquery,
            layer = layui.layer,
            paging = layui.paging,
            iframe = window.window.frameElement,
            companyList = $('.layui-nav-child dd span:eq(3)', parent.document),
            subNav = $('.layui-nav-child dd span:eq(8)', parent.document);

        /**
         * 监听编辑公司按钮
         */
        $("tbody").on("click", ".edit", function () {
            subNav.attr('data-url', $(this).data('url'));
            subNav.click();
        });

        /**
         * 监听公司详情按钮
         */
        $("tbody").on("click", ".detailBtn", function () {
            var cid = $(this).attr('lay-id');

            layer.open({
                type: 1,
                title: '公司详情',
                offset: 'auto',
                id: 'detail_' + cid,
                content: "<table class='layui-table'>" + $('#cid_' + cid).html() + "</table>",
                btn: '关闭',
                shade: 0,
                area: ['900px', '700px'],
                yes: function(){layer.closeAll();}
            });

        });

        /**
         * 分页功能
         */
        var option = {
            'type' : 2,
            'iframe' : iframe,
            'navDom' : companyList,
            'container' : $('tbody'),
            'editUrl' : "<?php echo $base_url . 'company/edit/'; ?>",
            'total' : "<?php echo $total; ?>",
            'dataUrl' : "<?php echo $base_url . 'company/index/'; ?>",
            'relieveUrl' : ""
        };

        paging.init(option);
        paging.show();
    });
</script>