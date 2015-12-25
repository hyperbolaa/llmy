//common footer script
(function(g){
    g.redirect= function(url){
        location.href = url;
    };

    //delete
    (function(){
        var btn_del=$('.op_icon .btn_del');
        btn_del.on('click', function(){
            var eid=$(this).data('eid'),
                row=$(this).parents('tr'),
                bundle=$(this).parents('ul.op_icon').data('bundle');

            wxi.ui.modal({
                title: '删除对话框',
                msg: '确认删除吗?',
                height: '80px',
                //width:'100%',
                cb: function(){
                    if(bundle==''){
                        wxi.util.tipMsg('','参数错误：缺少bundle');
                        return;
                    }

                    $.get('/admin/'+bundle+ '/'+eid+'/delete', function(d){
                        if(d.success){
                            wxi.util.tipMsg('', '删除成功','',function(){
                                wxi.ui.hideModal();
                                row.remove();
                            });
                        }
                        else{
                            wxi.util.tipMsg('', d.info, '');
                        }

                    }, 'json');
                }
            });

        });
    })();

    //copy
    (function(){
        var btn_copy=$('.op_icon .btn_copy');

        btn_copy.on('click', function(){
            var eid=$(this).data('eid'),
                row=$(this).parents('tr'),
                bundle=$(this).parents('ul.op_icon').data('bundle');

            wxi.ui.modal({
                title: '复制对话框',
                msg: '确认复制该条数据吗?',
                height: '80px',
                //width:'100%',
                cb: function(){
                    if(bundle==''){
                        wxi.util.tipMsg('','参数错误：缺少bundle');
                        return;
                    }

                    $.get('/admin/'+bundle+ '/'+eid+'/copy', function(d){
                        if(d.success){
                            wxi.util.tipMsg('', '复制成功','',function(){
                                wxi.ui.hideModal();
                                window.location.reload();
                            });
                        }
                        else{
                            wxi.util.tipMsg('', d.info, '');
                        }

                    }, 'json');
                }
            });

        });
    })();

    //publish
    (function(){
        var btn_pub = $('.op_icon .btn_pub');
        btn_pub.on('click', function(){
            var eid = $(this).data('eid'),
                bundle = $(this).parents('ul.op_icon').data('bundle');

            wxi.ui.modal({
                title: '发布对话框',
                msg: '确认发布吗?',
                height: '80px',
                cb: function(){
                    if(bundle==''){
                        wxi.util.tipMsg('','参数错误：缺少bundle');
                        return;
                    }
                    $.get('/admin/'+bundle+ '/'+eid+'/publish', function(d){
                        if(d.success){
                            wxi.util.tipMsg('', '发布成功','',function(){
                                wxi.ui.hideModal();
                                window.location.reload();
                            });
                        }else{
                            wxi.util.tipMsg('', d.info, '');
                        }
                    }, 'json');
                }
            });
        });
    })();


    //bs page tooltip
    $('[data-toggle="tooltip"]').tooltip({
        placement: 'bottom',
        trigger: 'hover'
    });


    //选择操作
    $("select").select2();

    //日期格式化
    $('.datepicker').datepicker({
        format: 'yyyy-mm-dd',
        language: 'zh-CN',
        orientation:'bottom',
        autoclose: true
    });

    //日期时间格式化
    $(".form_datetime").datetimepicker({
        format: 'yyyy-mm-dd hh:ii',
        forceParse: true,
        autoclose: true
    });

    //时间区间
    $('.daterange').daterangepicker({
        locale: {
            applyLabel: '确定',
            cancelLabel: '取消',
            fromLabel: '从',
            toLabel: '到',
            weekLabel: 'W',
            customRangeLabel: '自定义',
            //daysOfWeek: moment.weekdaysMin(),
            //monthNames: moment.monthsShort(),
            firstDay: moment.localeData()._week.dow,

            /* 区域化周名为中文 */
            daysOfWeek : ["日", "一", "二", "三", "四", "五", "六"],
            /* 每周从周一开始 */
            //firstDay : 1,
            /* 区域化月名为中文习惯 */
            monthNames : ["1月", "2月", "3月", "4月", "5月", "6月",
                "7月", "8月", "9月", "10月", "11月", "12月"]
        },
        timePicker: true,
        timePickerIncrement: 30,
        format: 'YYYY/MM/DD h:mm A'
    });

    //日期区间
    $('.dateranger').daterangepicker({
        locale: {
            applyLabel: '确定',
            cancelLabel: '取消',
            fromLabel: '从',
            toLabel: '到',
            weekLabel: 'W',
            customRangeLabel: '自定义',
            //daysOfWeek: moment.weekdaysMin(),
            //monthNames: moment.monthsShort(),
            firstDay: moment.localeData()._week.dow,

            /* 区域化周名为中文 */
            daysOfWeek : ["日", "一", "二", "三", "四", "五", "六"],
            /* 每周从周一开始 */
            //firstDay : 1,
            /* 区域化月名为中文习惯 */
            monthNames : ["1月", "2月", "3月", "4月", "5月", "6月",
                "7月", "8月", "9月", "10月", "11月", "12月"]
        },
        format: 'YYYY/MM/DD'
    });

    $('#btn-logout').on('click', function(){
        $.get('/admin/logout', function(d){
            wxi.util.tipMsg('', '退出系统...',800, function(){
                redirect('/admin/login');
            });
        });
    });

    //在输入框增加属性titile   鼠标滑过产生提示
    $(document).tooltip();

})(this);