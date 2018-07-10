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
                    <h2>财务管理</h2>
                    <div class="clearfix"></div>
                </div>
                <div>
                    <div class="form-group">

                        <label class="control-label col-md-1 col-sm-1 col-xs-12">类型</label>
                        <div class="col-md-2 col-sm-2 col-xs-12">
                            <select class="form-control" name="type" id="search_type">
                                <option value="0">全部</option>
                                <option value="1">收入</option>
                                <option value="2">支出</option>
                            </select>
                        </div>
                        <label class="control-label col-md-1 col-sm-1 col-xs-12">款项</label>
                        <div class="col-md-2 col-sm-2 col-xs-12">
                            <select class="form-control" name="project" id="search_project">
                                <option value="0">全部</option>
                                @foreach($project as $val)
                                    <option value="{{$val->id}}">{{$val->value}}</option>
                                @endforeach
                            </select>
                        </div>
                        <label class="control-label col-md-1 col-sm-1 col-xs-12">时间范围</label>
                        <div class="col-md-5 col-sm-5 col-xs-12">
                            <input type="text" class="form-control has-feedback-left" id="search_date" name="date" placeholder="请选择时间">
                            <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                            <span id="inputSuccess2Status2" class="sr-only">(success)</span>
                        </div>
                    </div>
                </div>
                <div class="x_content">
                    <table id="datatablelist" class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th>序号</th>
                            <th>类型</th>
                            <th>款项</th>
                            <th>提交人</th>
                            <th>金额</th>
                            <th>时间</th>
                            <th>备注</th>
                            <th>创建时间</th>
                            <th>操作</th>
                        </tr>
                        </thead>


                        <tbody>

                        </tbody>
                        <tfoot>
                        <tr>
                            <th colspan="1" style="text-align:right">总收入:</th>
                            <th colspan="2"></th>
                            <th colspan="1" style="text-align:right">总支出:</th>
                            <th colspan="2"></th>
                            <th colspan="1" style="text-align:right">总营业额:</th>
                            <th colspan="2"></th>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="deletedata" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <form class="form-horizontal form-label-left" method="post" id="formdelete" class="smart-form" action="{{url('finance')}}">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel2">是否删除</h4>
                </div>
                <div class="modal-body">
                    <p>删除此信息后不可恢复</p>
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
                    <h4 class="modal-title" id="myModalLabel">新增收支</h4>
                </div>
                <form class="form-horizontal form-label-left" method="post" id="formdata" class="smart-form" action="{{url('finance')}}">
                <div class="modal-body">

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">金额</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <input type="text" class="form-control" name="money" placeholder="金额" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">款项</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <select class="form-control" name="project">
                                @foreach($project as $val)
                                    <option value="{{$val->id}}">{{$val->value}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">类型</label>
                         <div class="col-md-9 col-sm-9 col-xs-12">
                                <div id="type" class="btn-group" data-toggle="buttons">
                                    <label class="btn btn-default active" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                        <input type="radio" name="type" value="1" checked> &nbsp; 收入 &nbsp;
                                    </label>
                                    <label class="btn btn-default" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                        <input type="radio" name="type" value="2"> 支出
                                    </label>
                                </div>
                         </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">时间</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <input type="text" class="form-control has-feedback-left" id="date" name="date" placeholder="请选择时间">
                            <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                            <span id="inputSuccess2Status2" class="sr-only">(success)</span>
                        </div>
                     </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">备注</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <textarea  class="form-control" name="remarks" id="remarks" ></textarea>
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
        var url="{{url('finance/list')}}";
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
                "order":[[5,'desc']],
                "pageLength":10,
                "ajax":{
                    "url": url
                },
                "columns":[
                    {"data":"number"},
                    {"data":"type_name"},
                    {"data":"project_name"},
                    {"data":"users_name"},
                    {"data":"money"},
                    {"data":"date"},
                    {"data":"remarks"},
                    {"data":"created_at"},
                    {"data":null},
                ],
                "columnDefs": [
                    {
                    "targets": [ 0,1,2,3,6,8],
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
                    $("#mytool").append('<button id="datainit" type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">增加数据</button>&nbsp');
                },
                "footerCallback": function ( row, data, start, end, display ,d) {
                    var api = this.api(), data;
                    s=0;
                    z=0;
                    to=0;

                    if(data.length !=0){
                        s=data[0]['s'];
                        z=data[0]['z'];
                        to=data[0]['s']-data[0]['z'];
                    }

                    // Update footer
                    $( api.column(1).footer() ).html(
                        '￥ '+s
                    );
                    $( api.column(4).footer() ).html(
                        '￥ '+z
                    );

                    $( api.column(7).footer() ).html(
                        '￥ '+to
                    );
                }

            });

            $('#date').daterangepicker({
                singleDatePicker: true,
                locale:datelanguage
            });
            $('#search_date').daterangepicker({
                singleDatePicker: false,
                locale:datelanguage,
                ranges:{
                    '今日': [moment().startOf('day'), moment()],
                    '昨日': [moment().subtract('days', 1).startOf('day'), moment().subtract('days', 1).endOf('day')],
                    '最近7日': [moment().subtract('days', 6), moment()],
                    '最近30日': [moment().subtract('days', 29), moment()]
                }
            });


            $('#search_type').on( 'keyup click', function () {
                table.column(1).search($('#search_type').val()).draw();
            } );
            $('#search_project').on( 'keyup click', function () {
                table.column(2).search($('#search_project').val()).draw();
            } );

            $('#search_date').on( 'change', function () {
                table.column(5).search($('#search_date').val()).draw();
            } );
        } );

        function fromedit(data){
            $("#myModalLabel").text("修改收支");
            $("#formdata").attr('action',"{{url('finance')}}/"+data.id);
            $("input[name='money']").val(data.money);
            $("select[name='project']").val(data.project);
            $("input[name='_method']").val("PUT");
            $("#type").children('label').removeClass('active');
            $("input:radio[name='type']").eq(data.type-1).attr("checked",'checked');
            $("input:radio[name='type']").eq(data.type-1).parent().addClass('active');
            $("#remarks").val(data.remarks);
            $("#myModal").modal("show");
        }

        function fromdelete(id) {
            $("#formdelete").attr('action',"{{url('finance')}}/"+id);
            $("#deletedata").modal("show");
        }


    </script>
@endsection