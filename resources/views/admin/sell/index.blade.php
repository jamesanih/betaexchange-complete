@extends('layouts.admin_master')

@section('content')
<!--header end here-->
<!--about start here-->
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Sell E-Currency</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-md-12">
                  <div class="tabs-framed">

  <ul class="tabs clearfix">

  <li style="padding: 5px;" class="active"><a data-toggle="tab" href="#home">Bitcoins</a></li>
  <li style="padding: 5px;"><a data-toggle="tab" href="#menu2">Perfect Money</a></li>
 
</ul>
<div class="tab-content">
  <div id="home" class="tab-pane fade in active">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Bitcoins
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                <table width="100%" class="table table-striped table-bordered table-hover" id="bitcoin">
                                <thead>
                                    <tr>
                                        <th width="10%">Date</th>
                                        <th>Account Name</th>
                                        <th>Account No</th>
                                        <th>Bank Name</th>
                                        <th>Email</th>
                                        <th>Units</th>
                                        <th>Price</th>
                                        <th>Total</th>
                                        <th>Reference Number</th>
                                        <th>Status</th>
                                        <th>Fund Alert</th>
                                        <th width="5%"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (count($bitcoins))
                             @foreach ($bitcoins as $bitcoin)
                    <tr>
                         <td>
                          {!! $bitcoin->created_at->todatestring() !!}
                        </td>
                        <td>
                          {!! $bitcoin->account_name !!}
                        </td>

                        <td>
                          {!! $bitcoin->account_no !!}
                        </td>
                        <td>
                          {!! $bitcoin->bank_name !!}
                        </td>
                         <td>
                          {!! $bitcoin->email !!}
                        </td>
                        <td>
                          {!! $bitcoin->unit !!}
                        </td>
                        <td>
                          {!! $bitcoin->price !!}
                        </td>
                        <td>
                          {!! $bitcoin->total !!}
                        </td>
                        <td>
                          {!! $bitcoin->ref_no !!}
                        </td>
                        <td>
                          {!! $bitcoin->status !!}
                        </td>
                        <td>
                          {!! $bitcoin->funding_alert !!}
                        </td>
                        <td>
                          <a  role='button' data-edit-id='{!! $bitcoin->id !!}' class='btn btn-primary editBtn' >
                            <i class='fa fa-edit'></i>
                          </a>
                        </td> 
                       
                    </tr>

                @endforeach
                         
                           @endif

                                </tbody>
                            </table>
                         
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    </div>
                      <div id="menu2" class="tab-pane fade">
                                          <div class="panel panel-default">
                        <div class="panel-heading">
                            Perfect Money
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                <table width="100%" class="table table-striped table-bordered table-hover" id="perfect">
                                <thead>
                                    <tr>
                                        <th width="10%">Date</th>
                                        <th>Account Name</th>
                                        <th>Account No</th>
                                        <th>Bank Name</th>
                                        <th>Email</th>
                                        <th>Units</th>
                                        <th>Price</th>
                                        <th>Total</th>
                                        <th>Reference Number</th>
                                        <th>Status</th>
                                        <th>Fund Alert</th>
                                        <th width="5%"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (count($perfects))
                             @foreach ($perfects as $perfect)
                    <tr>
                         <td>
                          {!! $perfect->created_at->todatestring() !!}
                        </td>
                        <td>
                          {!! $perfect->account_name !!}
                        </td>

                        <td>
                          {!! $perfect->account_no !!}
                        </td>
                        <td>
                          {!! $perfect->bank_name !!}
                        </td>
                         <td>
                          {!! $perfect->email !!}
                        </td>
                        <td>
                          {!! $perfect->unit !!}
                        </td>
                        <td>
                          {!! $perfect->price !!}
                        </td>
                        <td>
                          {!! $perfect->total !!}
                        </td>
                        <td>
                          {!! $perfect->ref_no !!}
                        </td>
                        <td>
                          {!! $bitcoin->status !!}
                        </td>
                        <td>
                          {!! $perfect->funding_alert !!}
                        </td>
                        <td>
                          <a  role='button' data-edit-id='{!! $perfect->id !!}' class='btn btn-primary editBtn2' >
                            <i class='fa fa-edit'></i>
                          </a>
                        </td> 
                       
                    </tr>

                @endforeach
                         
                           @endif

                                </tbody>
                            </table>
                         
                        </div>
                        <!-- /.panel-body -->
                    </div>
                      </div>
                    </div>
                    <!-- /.panel -->
                </div>
              </div>
                <!-- /.col-lg-12 -->
            </div>


            <!-- /.row -->
        </div>

<div class="modal fade" id="addUpdate_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog"  id="addUpdate_modal_body">
    </div>
</div>

@endsection
@section('script')
    <script type="text/javascript">
        $(function () {

                $.ajaxSetup({ cache: false });
                function bindForm(dialog) {
                    $("form", dialog).submit(function () {
                        $.ajax({
                            url: this.action,
                            type: this.method,
                            data: new FormData(this),
                            contentType: false,
                            processData: false,
                            success: function (result) {
                                if (result.success) {
                                    $('#addUpdate_modal').modal("hide");
                                    // Refresh:
                                    location.reload();

                                } else {

                                    $('#addUpdate_modal_body').html(result);
                                    bindForm();
                                }
                            }, error: function (request, status, error) {
                                alert(error.Message);
                            }
                        });
                        return false;
                    });
                }


                //Load the modal for purchase bitcoin
                $(".editBtn").click(function () {

                  $("#addUpdate_modal_body").load("/administrator/sell/" + $(this).data("edit-id")+"/edit",function(responseTxt, statusTxt, xh)
                    {
                        $("#addUpdate_modal").modal({
                              backdrop: 'static',
                              keyboard: true
                        }, "show");
                        bindForm(this);
                    });
                  return false;
                 });


                //Load the modal for purchase PM
                $(".editBtn2").click(function () {

                  $("#addUpdate_modal_body").load("/administrator/sell/" + $(this).data("edit-id"),function(responseTxt, statusTxt, xh)
                    {
                        $("#addUpdate_modal").modal({
                              backdrop: 'static',
                              keyboard: true
                        }, "show");
                        bindForm(this);
                    });
                  return false;
                 });

              $('#bitcoin').DataTable({
                            "paging": true,
                            "lengthChange": true,
                            "searching": true,
                            "ordering": true,
                             "responsive":true,
                            "info": true,
                            "autoWidth": true,
                            "order": [[0, "desc"]],
                            dom: 'Bfltip',
                            buttons: [
                                'copy', 'csv', 'excel', 'pdf', 'print'
                            ]
                        });


                $('#perfect').DataTable({
                      "paging": true,
                      "lengthChange": true,
                      "searching": true,
                      "ordering": true,
                       "responsive":true,
                      "info": true,
                      "autoWidth": true,
                      "order": [[0, "desc"]],
                      dom: 'Bfltip',
                      buttons: [
                          'copy', 'csv', 'excel', 'pdf', 'print'
                      ]
                  });

        });

        </script>
@stop