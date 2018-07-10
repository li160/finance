@extends('layouts.web')
@section('css')
    <!-- iCheck -->
    <link href="{{ asset('vendors/iCheck/skins/flat/green.css') }}" rel="stylesheet">
    <!-- Datatables -->
    <link href="{{ asset('vendors/datatables.net-bs/css/dataTables.bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css') }}" rel="stylesheet">
    <!-- bootstrap-daterangepicker -->
    <link href="{{ asset('vendors/bootstrap-daterangepicker/daterangepicker.css') }}" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="{{ asset('build/css/custom.min.css') }}" rel="stylesheet">
@endsection

@section('content')

    <div class="clearfix"></div>

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>用户管理</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <table id="datatablelist" class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th>序号</th>
                            <th>账号</th>
                            <th>姓名</th>
                            <th>邮箱</th>
                            <th>创建时间</th>
                            <th>操作</th>
                        </tr>
                        </thead>


                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="deletedata" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <form class="form-horizontal form-label-left" method="post" id="formdelete" class="smart-form" action="{{url('user')}}">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel2">是否删除</h4>
                </div>
                <div class="modal-body">
                    <p>删除此用户后不可恢复</p>
                </div>
                    <input type="hidden" name="_method" value="DELETE">
                    {{ csrf_field() }}
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
                    <button type="submit" class="btn btn-primary">删除</button>
                </div>

                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">新增用户</h4>
                </div>
                <form class="form-horizontal form-label-left" method="post" id="formdata" class="smart-form" action="{{url('user')}}">
                <div class="modal-body">

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">账户</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <input type="text" class="form-control" name="name" placeholder="账户" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">昵称</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <input type="text" class="form-control" name="nickname" placeholder="姓名" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">邮箱</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <input type="email" class="form-control" name="email" placeholder="邮箱" >
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">密码</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <input type="text" class="form-control" name="password" placeholder="密码" >
                        </div>
                    </div>
                    <input type="hidden" name="_method" value="POST">
                    {{ csrf_field() }}
                </div>
                <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                        <button type="submit" class="btn btn-primary" >保存</button>
                </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <!-- iCheck -->
    <script src="{{ asset('vendors/iCheck/icheck.min.js') }}"></script>
    <!-- Datatables -->
    <script src="{{ asset('vendors/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{ asset('vendors/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
    <script src="{{ asset('vendors/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js') }}"></script>
    <script src="{{ asset('vendors/datatables.net-buttons/js/buttons.flash.min.js') }}"></script>
    <script src="{{ asset('vendors/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('vendors/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js') }}"></script>
    <script src="{{ asset('vendors/datatables.net-keytable/js/dataTables.keyTable.min.js') }}"></script>
    <script src="{{ asset('vendors/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js') }}"></script>
    <script src="{{ asset('vendors/datatables.net-scroller/js/dataTables.scroller.min.js') }}"></script>
    <script src="{{ asset('vendors/jszip/dist/jszip.min.js') }}"></script>
    <script src="{{ asset('vendors/pdfmake/build/pdfmake.min.js') }}"></script>
    <script src="{{ asset('vendors/pdfmake/build/vfs_fonts.js') }}"></script>

    <!-- bootstrap-daterangepicker -->
    <script src="{{ asset('vendors/moment/min/moment.min.js') }}"></script>
    <script src="{{ asset('vendors/bootstrap-daterangepicker/daterangepicker.js') }}"></script>


    <!-- Custom Theme Scripts -->
    <script src="{{ asset('build/js/custom.min.js') }}"></script>
    <script type="text/javascript">
        var url="{{url('user/list')}}";
        var language={
            "sProcessing": "处理中...",
            "sLengthMenu": "显示 _MENU_ 项结果",
            "sZeroRecords": "没有匹配结果",
            "sInfo": "显示第 _START_ 至 _END_ 项结果，共 _TOTAL_ 项",
            "sInfoEmpty": "显示第 0 至 0 项结果，共 0 项",
            "sInfoFiltered": "(由 _MAX_ 项结果过滤)",
            "sInfoPostFix": "",
            "sSearch": "搜索:",
            "sUrl": "",
            "sEmptyTable": "表中数据为空",
            "sLoadingRecords": "载入中...",
            "sInfoThousands": ",",
            "oPaginate": {
                "sFirst": "首页",
                "sPrevious": "上页",
                "sNext": "下页",
                "sLast": "末页"
            },
            "oAria": {
                "sSortAscending": ": 以升序排列此列",
                "sSortDescending": ": 以降序排列此列"
            }
        };
        var datelanguage={
            format: 'YYYY-MM-DD',
            applyLabel: '确定',
            cancelLabel: '取消',
            fromLabel: '起始时间',
            toLabel: '结束时间',
            separator: ' ~ ',
            customRangeLabel: '自定义',
            daysOfWeek: ['日', '一', '二', '三', '四', '五', '六'],
            monthNames: ['一月', '二月', '三月', '四月', '五月', '六月',
                '七月', '八月', '九月', '十月', '十一月', '十二月'],
            firstDay: 1
        };
        $(document).ready(function() {

            var table=$('#datatablelist').DataTable({
                "info": false,
                "searching": true,
                "lengthChange": false,
                "language":language,
                "serverSide": true,
                "order":[[4,'asc']],
                "pageLength":10,
                "ajax":{
                    "url": url
                },
                "columns":[
                    {"data":"number"},
                    {"data":"name"},
                    {"data":"nickname"},
                    {"data":"email"},
                    {"data":"created_at"},
                    {"data":null},
                ],
                "columnDefs": [
                    {
                    "targets": [ 0,1,2,3,5],
                    "orderable": false
                    },
                    {
                        "targets":-1,
                        "render": function (nTd, sData, oData, iRow, iCol) {
                             return "<button type='button' class='btn btn-primary' onclick='fromedit("+JSON.stringify(nTd)+")'>编辑</button>" +
                                 "<button type='button'class='btn btn-danger' onclick='fromdelete("+nTd.id+")' >删除</button>";
                        }
                    }
                ],
                "dom": "<'row'<'#mytool.col-xs-6'><'col-xs-6'f>r>" +
                "t" +
                "<'row'<'col-xs-6'i><'col-xs-6'p>>",
                "initComplete": function () {
                    $("#mytool").append('<button id="datainit" type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">增加用户</button>&nbsp');
                },

            });


        } );

        function fromedit(data){
            $("#myModalLabel").text("修改用户");

            $("#formdata").attr('action',"{{url('user')}}/"+data.id);
            $("input[name='name']").val(data.name);
            $("input[name='nickname']").val(data.nickname);
            $("input[name='email']").val(data.email);
            $("input[name='_method']").val("PUT");
            $("#myModal").modal("show");
        }

        function fromdelete(id) {
            $("#formdelete").attr('action',"{{url('user')}}/"+id);
            $("#deletedata").modal("show");
        }


    </script>
@endsection