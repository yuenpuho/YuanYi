layui.define('element', function (exports) {
    var $ = layui.jquery,
        element = layui.element,
        contentDOM = $('.layui-tab-content');

    /**
     * iframe 高度自适应
     */
    $(window).resize(function () {
        contentDOM.height($(this).height() - 88);

        contentDOM.find('iframe').each(function () {
            $(this).height(contentDOM.outerHeight());
        });
    }).resize();

    /**
     * 收起或展开导航栏
     */
    $('.layui-nav-shrink').click(function () {
        var sideWidth = $('.layui-header').width();

        if (sideWidth === 200) {
            $('.layui-logo').hide();
            $('.layui-body').css({left: '0'});
            $('.layui-header, .layui-side').css({width: '0'});
            $('.layui-nav-shrink').attr('title', '展开').css({left: '0'}).children('span')
                .css({borderRight: 0, borderLeft: '6px solid #a6a5a5'});
        } else {
            $('.layui-logo').show();
            $('.layui-body').css({left: '200px'});
            $('.layui-header, .layui-logo, .layui-side').css({width: '200px'});
            $('.layui-nav-shrink').attr('title', '收起').css({left: '200px'}).children('span')
                .css({borderRight: '6px solid #a6a5a5', borderLeft: 0});
        }
    });

    /**
     * 监测导航点击事件
     */
    $('.layui-nav-child dd span').each(function (index) {
        $(this).on('click', function () {
            // 高亮显示当前导航
            $(this).parent('dd').addClass('layui-this').siblings('dd').removeClass('layui-this');

            // 新增一个Tab项（判断tab个数，防止重复）
            if ($(".layui-tab-title li[lay-id='" + index + "']").length == 0) {
                element.tabAdd('tab-nav', {
                    id: index.toString(),// 必须转成字符串，否则当 index = 0 时，设置lay-id会报错
                    title: $(this).data('title'),
                    content: "<iframe id='tab-content-" + index + "' src='" + $(this).data('url') + "'></iframe>"
                });
            } else {
                // 让 iframe 重新请求刷新数据（注意，使用layui的 obj.data(xx) 不能获得最新属性值，要使用jQuery的obj.attr(xx)）
                var url = $(this).attr('data-url'),
                    component = url.split('#'),
                    length = component.length;

                // 由于分页控件使用了url 的 hash(#)，导致无法重载，添加数据之后，无法获取最新显示数据。
                // 所以在第一页时，去除hash值，好重载页面，获取最新数据
                if (length == 1 || component[1].replace('page=', '') > 1) {
                    $('#tab-content-' + index).attr('src', url);
                }

                if (length == 2 && component[1].replace('page=', '') == 1) {
                    $('#tab-content-' + index).attr('src', component[0]);
                }
            }

            // 切换到指定的Tab项上
            element.tabChange('tab-nav', index);

            // 设置 iframe 的高度
            $('#tab-content-' + index).height(contentDOM.outerHeight());
        });
    });

    /**
     * 监听选项卡切换，让 iframe 重新请求，刷新数据
     */
    element.on('tab(tab-nav)', function (data) {
        var iframe = $('#tab-content-' + data.index),
            url = iframe.attr('src') || $('.layui-nav-child dd span:eq(' + $('.layui-tab-title li.layui-this').attr('lay-id') + ')').data('url'),
            component = url.split('#'),
            length = component.length;

        // 由于分页控件使用了url 的 hash(#)，导致无法重载，添加数据之后，无法获取最新显示数据。
        // 所以在第一页时，去除hash值，好重载页面，获取最新数据
        if (length == 1 || component[1].replace('page=', '') > 1) {
            iframe.attr('src', url);
        }

        if (length == 2 && component[1].replace('page=', '') == 1) {
            iframe.attr('src', component[0]);
        }

        // window.frames[data.index].location.reload();
    });

    /**
     * 注意，这里是模块输出的核心，模块名必须和use时的模块名一致
     */
    exports('navigation', {});
});