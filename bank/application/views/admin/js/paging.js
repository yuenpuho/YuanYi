layui.define(['laypage', 'form'], function (exports) {
    var $ = layui.jquery,
        form = layui.form,
        laypage = layui.laypage,

        paging = {
            init: function (option) {
                paging.type = option.type;// 1：银行列表；2：公司列表；3：权限列表
                paging.total = option.total;
                paging.iframe = option.iframe;
                paging.navDom = option.navDom;
                paging.dataUrl = option.dataUrl;
                paging.editUrl = option.editUrl;
                paging.container = option.container;
                paging.relieveUrl = option.relieveUrl;
            },
            show: function () {
                laypage.render({
                    elem: 'paging',
                    count: paging.total,
                    prev: '<i class="layui-icon">&#xe603;</i>',
                    next: '<i class="layui-icon">&#xe602;</i>',
                    layout: ['count', 'prev', 'page', 'next', 'limit', 'skip'],
                    jump: function (obj, first) {
                        paging.current = obj.curr;

                        if (!first) {
                            $.post(
                                paging.dataUrl,
                                {curr: obj.curr, limit: obj.limit},
                                function (result) {
                                    paging.html = '';

                                    paging._setScr();

                                    switch (paging.type) {
                                        case 1 :
                                            paging._order(result);
                                            paging._getBanks(result);
                                            break;
                                        case 2 :
                                            paging._getCompanies(result);
                                            break;
                                        case 3 :
                                            paging._order(result);
                                            paging._getUsers(result);
                                            break;
                                    }

                                    paging.container.empty().html(paging.html);
                                    form.render();
                                },
                                'json'
                            );
                        }
                    }
                });
            },
            /**
             * 从后台返回的JSON数据，会自动排成升序，因此，对JSON数据进行降序排序
             * @param obj
             * @private
             */
            _order: function (obj) {
                paging.keys = Object.keys(obj);
                paging.keys.sort(function (x, y) {
                    return y - x;
                });
            },
            /**
             * 设置iframe的src值，在切换菜单时，好定位到用户查看的页码
             * @private
             */
            _setScr: function () {
                var component = paging.iframe.src.split('#');

                paging.iframe.src = component[0] + '#page=' + paging.current;
                paging.navDom.attr('data-url', paging.iframe.src);
            },
            _getBanks: function (result) {
                var i = 0,
                    keySum = paging.keys.length;

                for (i; i < keySum; i++) {
                    var key = paging.keys[i];

                    paging.html += "<tr>"
                                    + "<td>" + result[key].shortname + "</td>"
                                    + "<td>"
                                        + result[key].fullname + "&nbsp;"
                                        + "<span class='edit layui-btn layui-btn-mini' data-url='" + paging.editUrl + result[key].bid + "'>"
                                            + "编辑"
                                        + "</span>"
                                    + "</td>"
                                    + "<td>";

                    if (result[key].companies) {
                        paging._getVassalCompanies(result[key].companies, result[key].bid);
                    }

                    paging.html += "</td>"
                                + "</tr>";
                }
            },
            _getVassalCompanies: function (companies, bid) {
                var length = companies.length,
                    mTop = (length - 1) * 20 / 2;

                paging.html += "<div class='company'>";

                for (var j = 0; j < length; j++) {
                    paging.html += "<p>" + companies[j].cname + "</p>";
                }

                paging.html += "</div>"
                            + "<div class='company' style='margin-top:" + mTop + "px'>"
                                + "<span data-url='" + paging.relieveUrl + bid + "' class='layui-btn layui-btn-mini layui-btn-danger'>"
                                    + "解除"
                                + "</span>"
                            + "</div>";
            },
            _getCompanies: function (result) {
                var i = 0,
                    length = result.length;

                for (i; i < length; i++) {
                    paging.html += "<tr>"
                                    + "<td>"+ result[i].shortname +"</td>"
                                    + "<td>"
                                        + result[i].fullname + "&nbsp;"
                                        + "<span lay-id='" + result[i].cid + "' class='detailBtn layui-btn layui-btn-mini layui-btn-normal'>"
                                            + "详情"
                                        + "</span>"
                                        + "<span class='layui-btn layui-btn-mini edit' title='编辑公司' data-url='" + paging.editUrl + result[i].cid + "'>"
                                            + "编辑"
                                        + "</span>"
                                        + "<table class='detail' id='cid_" + result[i].cid + "'>"
                                            + "<tr><td>简称</td><td>" + result[i].shortname + "</td></tr>"
                                            + "<tr><td>全称</td><td>" + result[i].fullname + "</td></tr>"
                                            + "<tr><td>工商注册号</td><td>" + result[i].reg_No + "</td></tr>"
                                            + "<tr><td>纳税人识别号</td><td>" + result[i].taxpayer_ID + "</td></tr>"
                                            + "<tr><td>组织机构代码</td><td>" + result[i].certificate_No + "</td></tr>"
                                            + "<tr><td>统一社会信用代码</td><td>" + result[i].credit_No + "</td></tr>"
                                            + "<tr><td>成立日期</td><td>" + result[i].establishment_date + "</td></tr>"
                                            + "<tr><td>核准日期</td><td>" + result[i].approved_date + "</td></tr>"
                                            + "<tr><td>法人代表</td><td>" + result[i].legal_representative + "</td></tr>"
                                            + "<tr><td>企业类型</td><td>" + result[i].company_type + "</td></tr>"
                                            + "<tr><td>工商登记机关</td><td>" + result[i].authority + "</td></tr>"
                                            + "<tr><td>注册资本</td><td>" + result[i].reg_capital + "</td></tr>"
                                            + "<tr><td>注册地址</td><td>" + result[i].reg_address + "</td></tr>"
                                            + "<tr><td>营业期限</td><td>" + result[i].operating_period + "</td></tr>"
                                            + "<tr>"
                                                + "<td colspan='2'>"
                                                    + "<div class='layui-collapse' lay-accordion>"
                                                        + "<div class='layui-colla-item'>"
                                                            + "<h2 class='layui-colla-title'>经营范围</h2>"
                                                            + "<div class='layui-colla-content layui-show'>" + result[i].business_scope + "</div>"
                                                        + "</div>"
                                                    + "</div>"
                                                + "</td>"
                                            + "</tr>"
                                        + "</table>"
                                    + "</td>"
                                    + "<td class='map'>";
                    if (result[i].mapping_cid) {
                        paging.html += "<span class='first layui-badge-dot layui-bg-green'></span>"
                                    + "<span class='second layui-badge-dot layui-bg-green'></span>"
                                    + "<span lay-id='" + result[i].cid + "' class='layui-btn layui-btn-mini layui-btn-danger'>"
                                        + "解除"
                                    + "</span>"
                                    + "<hr class='layui-bg-green'>";
                    }

                    paging.html += "</td>"
                                    + "<td>" + (result[i].eshort ? result[i].eshort : '') + "</td>"
                                    + "<td>" + (result[i].efull ? result[i].efull : '') + "</td>"
                                + "</tr>";
                }
            },
            _getUsers: function (result) {
                var i = 0, j = 0,
                    keySum = paging.keys.length;

                for (i; i < keySum; i++) {
                    var key = paging.keys[i];

                    paging.html += "<tr>"
                                    + "<td>" + result[key].shortname + "</td>"
                                    + "<td>" + result[key].fullname + "</td>"
                                    + "<td>";

                    if (result[key].users) {
                        var users = result[key].users,
                            length = users.length;

                        for (j; j < length; j++) {
                            var checked = "";

                            if (users[j].valid == 1) {
                                checked = "checked";
                            }

                            paging.html += "<div class='switch'>"
                                            + "<h3 class='user'>" + users[j].username + "</h3>"
                                            + "<div class='user'>"
                                                + "<form class='layui-form' action=''>"
                                                    + "<input type='checkbox' name='uid_" + users[j].userid
                                                        + "' lay-skin='switch' lay-filter='switch' lay-text='已授权|禁用' value='"
                                                        + users[j].userid + "' " + checked +">"
                                                + "</form>"
                                            + "</div>"
                                            + "<p class='clear'></p>"
                                         + "</div>"
                        }
                    }

                    paging.html += "</td>"
                                + "</tr>";
                }
            }
        };

    exports('paging', paging);
});