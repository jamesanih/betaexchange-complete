`@extends('layouts.admin_master')

@section('content')
<!--header end here-->
<!--about start here-->
<div id="page-wrapper">
<div class="row">
<div class="col-lg-12">
  <h1 class="page-header">New Orders</h1>
</div>
<!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
<div class="col-md-12">
  <div class="tabs-framed">

  <ul class="tabs clearfix">
    <li style="padding: 5px;" class="active"><a data-toggle="tab" href="#bitcoins">Bitcoins</a></li>
    <li style="padding: 5px;"><a data-toggle="tab" href="#perfect">Perfect Money</a></li>
    <li style="padding: 5px;"><a data-toggle="tab" href="#purchase_bitcoin">Purchase Bitcoin</a></li>
    <li style="padding: 5px;"><a data-toggle="tab" href="#purchase_perfect">Purchase PM</a></li>
  </ul>

    <div class="tab-content">
        <div id="bitcoins" class="tab-pane fade in active">
            <div class="panel panel-default">
                <div class="panel-heading"> Bitcoins </div><!-- /.panel-heading -->
                    <div class="panel-body">
                        <table width="100%" class="table table-striped table-bordered table-hover" id="bitcoin_table">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Units</th>
                                    <th>Total</th>
                                    <th>Wallet</th>
                                    <th>Method</th>
                                    <th>Reference No</th>
                                    <th>Payment Alert</th>
                                    <th>Status</th>
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
                                                {!! $bitcoin->unit !!}
                                            </td>
                                            <td>
                                                {!! $bitcoin->total !!}
                                            </td>
                                            <td>
                                                {!! $bitcoin->wallet_id !!}
                                            </td>
                                            <td>
                                                @if ($bitcoin->method==1)
                                                    {!! "Internet Bank Transfer"  !!}
                                                @endif
                                                @if ($bitcoin->method==2)
                                                    {!! "Bank Deposit"  !!}
                                                @endif
                                                @if ($bitcoin->method==3)
                                                    {!! "Short Code"  !!}
                                                @endif
                                            </td>
                                            <td>
                                                {!! $bitcoin->ref_no !!}
                                            </td>
                                            <td>
                                                {!! $bitcoin->payment_alert !!}
                                            </td>
                                            <td>
                                                {!! $bitcoin->status !!}  
                                            </td>
                                            <td>
                                                <a  role='button' data-edit-id='{!! $bitcoin->id !!}' class='btn btn-primary editBitcoin' >
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
        <div id="perfect" class="tab-pane fade">
            <div class="panel panel-default">
                <div class="panel-heading"> Perfect Money </div><!-- /.panel-heading -->
                <div class="panel-body">
                  <table width="100%" class="table table-striped table-bordered table-hover" id="pefect_money_table">
                      <thead>
                          <tr>
                              <th>Date</th>
                              <th>Units</th>
                              <th>Total</th>
                              <th>Account Name</th>
                              <th>Account No</th>
                              <th>Method</th>
                              <th>Reference No</th>
                              <th>Payment Alert</th>
                              <th>Status</th>
                              <th width="5%"></th>
                          </tr>
                      </thead>
                      <tbody>
                          @if (count($perfect_money))
                              @foreach ($perfect_money as $perfect)
                                  <tr>
                                      <td>
                                          {!! $perfect->created_at->todatestring() !!}
                                      </td>
                                      <td>
                                          {!! $perfect->unit !!}
                                      </td>
                                      <td>
                                          {!! $perfect->total !!}
                                      </td>
                                      <td>
                                          {!! $perfect->account_name !!}
                                      </td>
                                      <td>
                                          {!! $perfect->account_no !!}
                                      </td>
                                      <td>
                                          @if ($perfect->method==1)
                                              {!! "Internet Bank Transfer"  !!}
                                          @endif
                                          @if ($perfect->method==2)
                                              {!! "Bank Deposit"  !!}
                                          @endif
                                          @if ($perfect->method==3)
                                              {!! "Short Code"  !!}
                                          @endif
                                      </td>
                                      <td>
                                          {!! $perfect->ref_no !!}
                                      </td>
                                      <td>
                                          {!! $perfect->payment_alert !!}
                                      </td>
                                      <td>
                                          {!! $perfect->status !!} 
                                      </td>
                                      <td>
                                          <a  role='button' data-edit-id='{!! $perfect->id!!}' class='btn btn-primary editPerfectM' ><i class='fa fa-edit'></i>
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
        <div id="purchase_bitcoin" class="tab-pane fade in">
            <div class="panel panel-default">
                <div class="panel-heading"> Purchase Bitcoins </div> <!-- /.panel-heading -->
                <div class="panel-body">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="purchase_bitcoin_table">
                        <thead>
                            <tr>
                                <th width="10%">Date</th>
                                <th>Account Name</th>
                                <th>Account No</th>
                                <th>Bank Name</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Units</th>
                                <th>Price</th>
                                <th>Total</th>
                                <th>Status</th>
                                <th>Fund Alert</th>
                                <th width="5%"></th>
                            </tr>
                        </thead>
                        <tbody>
                        @if (count($purchase_bitcoins))
                            @foreach ($purchase_bitcoins as $purchase_bitcoin)
                            <tr>
                                <td>
                                    {!! $purchase_bitcoin->created_at->todatestring() !!}
                                </td>
                                <td>
                                    {!! $purchase_bitcoin->account_name !!}
                                </td>
                                <td>
                                    {!! $purchase_bitcoin->account_no !!}
                                </td>
                                <td>
                                    {!! $purchase_bitcoin->bank_name !!}
                                </td>
                                <td>
                                    {!! $purchase_bitcoin->phone_no !!}
                                </td>
                                <td>
                                    {!! $purchase_bitcoin->email !!}
                                </td>
                                <td>
                                    {!! $purchase_bitcoin->unit !!}
                                </td>
                                <td>
                                    {!! $purchase_bitcoin->price !!}
                                </td>
                                <td>
                                    {!! $purchase_bitcoin->total !!}
                                </td>
                                <td>
                                    {!! $purchase_bitcoin->status !!}
                                </td>
                                <td>
                                    {!! $purchase_bitcoin->funding_alert !!}
                                </td>
                                <td>
                                    <a  role='button' data-edit-id='{!! $purchase_bitcoin->id !!}' class='btn btn-primary editPurchaseBit' >
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
        <div id="purchase_perfect" class="tab-pane fade">
            <div class="panel panel-default">
                <div class="panel-heading">Purchase Perfect Money</div><!-- /.panel-heading -->
                <div class="panel-body">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="purchase_perfect_table">
                        <thead>
                            <tr>
                                <th width="10%">Date</th>
                                <th>Account Name</th>
                                <th>Account No</th>
                                <th>Bank Name</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Units</th>
                                <th>Price</th>
                                <th>Total</th>
                                <th>Status</th>
                                <th>Fund Alert</th>
                                <th width="5%"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($purchase_perfect_money))
                                @foreach ($purchase_perfect_money as $purchase_perfect)
                                    <tr>
                                        <td>
                                            {!! $purchase_perfect->created_at->todatestring() !!}
                                        </td>
                                        <td>
                                            {!! $purchase_perfect->account_name !!}
                                        </td>
                                        <td>
                                            {!! $purchase_perfect->account_no !!}
                                        </td>
                                        <td>
                                            {!! $purchase_perfect->bank_name !!}
                                        </td>
                                        <td>
                                            {!! $purchase_perfect->phone_no !!}
                                        </td>
                                        <td>
                                            {!! $purchase_perfect->email !!}
                                        </td>
                                        <td>
                                            {!! $purchase_perfect->unit !!}
                                        </td>
                                        <td>
                                            {!! $purchase_perfect->price !!}
                                        </td>
                                        <td>
                                        {!! $purchase_perfect->total !!}
                                        </td>
                                        <td>
                                            {!! $purchase_perfect->status !!}
                                        </td>
                                        <td>
                                            {!! $purchase_perfect->funding_alert !!}
                                        </td>
                                        <td>
                                            <a  role='button' data-edit-id='{!! $purchase_perfect->id !!}' class='btn btn-primary editPurchasePM' >
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

              $('#bitcoin_table').DataTable({
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


              $('#pefect_money_table').DataTable({
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


              $('#purchase_bitcoin_table').DataTable({
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


              $('#purchase_perfect_table').DataTable({
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
                    });
                }


            //Load the edit bitcoin modal
            $(".editBitcoin").click(function () {

                $("#addUpdate_modal_body").load("/administrator/bitcoin/" + $(this).data("edit-id")+"/edit",function(responseTxt, statusTxt, xh)
                    {
                         $("#addUpdate_modal").modal({
                                        backdrop: 'static',
                                        keyboard: true
                                    }, "show");
                                    bindForm(this);
                    });
                return false;
             });


            //Load the edit perfect money modal
            $(".editPerfectM").click(function () {

                $("#addUpdate_modal_body").load("/administrator/perfect-money/" + $(this).data("edit-id")+"/edit",function(responseTxt, statusTxt, xh)
                  {
                      $("#addUpdate_modal").modal({
                          backdrop: 'static',
                          keyboard: true
                      }, "show");
                      bindForm(this);
                  });
             });

            //Load the modal for purchase bitcoin
            $(".editPurchaseBit").click(function () {

              $("#addUpdate_modal_body").load("/administrator/sell/" + $(this).data("edit-id")+"/edit",function(responseTxt, statusTxt, xh)
                {
                    $("#addUpdate_modal").modal({
                          backdrop: 'static',
                          keyboard: true
                    }, "show");
                    bindForm(this);
                });
             });

            //Load the modal for purchase PM
            $(".editPurchasePM").click(function () {

              $("#addUpdate_modal_body").load("/administrator/sell/" + $(this).data("edit-id"),function(responseTxt, statusTxt, xh)
                {
                    $("#addUpdate_modal").modal({
                          backdrop: 'static',
                          keyboard: true
                    }, "show");
                    bindForm(this);
                });
             });

        });

        </script>
@stop