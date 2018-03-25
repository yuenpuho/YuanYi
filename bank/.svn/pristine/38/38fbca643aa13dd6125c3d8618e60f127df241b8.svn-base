<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html>
<head>
    <title>电控宝-后台管理系统</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <link rel="stylesheet" href="<?php echo $theme_url; ?>js/layui-v2.1.4/css/layui.css?v=<?php echo VERSIONS; ?>" />
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo $base_url; ?>favicon.ico" />
</head>
<body>
<div class="layui-layout layui-layout-admin">
    <div class="layui-header">
        <h1 class="layui-logo">电控宝-后台管理系统</h1>
    </div>

    <!-- 左侧导航区域（start） -->
    <div class="layui-side layui-bg-black">
        <div class="layui-side-scroll">
            <ul class="layui-nav layui-nav-tree">
                <li class="layui-nav-item layui-nav-itemed">
                    <a href="javascript:void(0);"><i class="layui-icon">&#xe630;</i> 银行设置</a>

                    <dl class="layui-nav-child">
                        <dd class="layui-this">
                            <span data-title="银行列表" data-url="<?php echo $base_url . 'bank/bankList/'; ?>">
                                <i class="layui-icon">&#xe649;</i> 银行列表
                            </span>
                        </dd>
                        <dd>
                            <span data-title="添加银行" data-url="<?php echo $base_url . 'bank/add/'; ?>">
                                <i class="layui-icon">&#xe654;</i> 添加银行
                            </span>
                        </dd>
                        <dd>
                            <span data-title="选择公司" data-url="<?php echo $base_url . 'mapping/mapcompany/'; ?>">
                                <i class="layui-icon">&#xe627;</i> 选择公司
                            </span>
                        </dd>
                        <dd><span data-title="编辑银行" style="display:none"></span></dd>
                        <dd><span data-title="解除公司" style="display:none"></span></dd>
                    </dl>
                </li>

                <li class="layui-nav-item">
                    <a href="javascript:void(0);"><i class="layui-icon">&#xe61d;</i> 公司设置</a>

                    <dl class="layui-nav-child">
                        <dd>
                            <span data-title="公司列表" data-url="<?php echo $base_url . 'company/index/'; ?>">
                                <i class="layui-icon">&#xe649;</i> 公司列表
                            </span>
                        </dd>
                        <dd>
                            <span data-title="添加公司" data-url="<?php echo $base_url . 'company/add/'; ?>">
                                <i class="layui-icon">&#xe654;</i> 添加公司
                            </span>
                        </dd>
                        <dd>
                            <span data-title="关联eemsii的公司" data-url="<?php echo $base_url . 'mapping/mapeemsiicompany/'; ?>">
                                <i class="layui-icon">&#xe627;</i> 关联eemsii公司
                            </span>
                        </dd>
                        <dd><span data-title="编辑公司" style="display:none"></span></dd>
                    </dl>
                </li>

                <li class="layui-nav-item">
                    <a href="javascript:void(0);"><i class="layui-icon">&#xe857;</i> 权限管理</a>

                    <dl class="layui-nav-child">
                        <dd>
                            <span data-title="禁用权限" data-url="<?php echo $base_url . 'user/index/'; ?>">
                                <i class="layui-icon">&#xe64f;</i> 禁用权限
                            </span>
                        </dd>
                        <dd>
                            <span data-title="开通银行员工权限" data-url="<?php echo $base_url . 'mapping/mapuser/'; ?>">
                                <i class="layui-icon">&#xe613;</i> 开通银行员工权限
                            </span>
                        </dd>
                    </dl>
                </li>
            </ul>
        </div>

        <div class="layui-nav-shrink" title="收起"><span></span></div>
    </div>
    <!-- 左侧导航区域（end） -->

    <div class="layui-body">
        <div class="layui-tab layui-tab-brief" lay-filter="tab-nav" lay-allowClose="true">
            <ul class="layui-tab-title">
                <li lay-id="0" class="layui-this">银行列表</li>
            </ul>

            <div class="layui-tab-content">
                <div class="layui-tab-item layui-show">
                    <iframe id="tab-content-0" src="<?php echo $base_url . 'bank/bankList/'; ?>"></iframe>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="<?php echo $theme_url; ?>js/layui-v2.1.4/layui.js?v=<?php echo VERSIONS; ?>"></script>
<script>
    layui.config({
        base: '<?php echo $theme_url; ?>js/'
    }).use('navigation');
</script>
</body>
</html>