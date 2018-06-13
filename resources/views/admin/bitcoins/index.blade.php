@extends('layouts.admin_master')

@section('content')
<!--header end here-->
<!--about start here-->
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header text-center">Bitcoin</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Bitcoins
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                <table width="100%" class="table table-striped table-bordered table-hover" id="bitcoin">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Units</th>
                                        <th>Total</th>
                                        <th>Wallet</th>
                                        <th>Method</th>
                                        <th>Date</th>
                                        <th>Reference No</th>
                                        <th>Status</th>
                                        <th width="5%"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (count($bitcoins))
                             @foreach ($bitcoins as $bitcoin)
                    <tr>
                         <td>
                          {!! $bitcoin->id !!}
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
                          {!! $bitcoin->created_at !!}
                        </td>
                         <td>
                          {!! $bitcoin->ref_no !!}
                        </td>
                         <td>
                            {!! $bitcoin->status !!}
                        </td>
                        <td><a  role='button' data-edit-id='{!! $bitcoin->id!!}' class='btn btn-primary editBtn' ><i class='fa fa-edit'></i></a></td>
                    </tr>

                @endforeach
                         
                           @endif

                                </tbody>
                            </table>
                         
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
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


        //Load the edit bitcoin modal
        $(".editBtn").click(function () {

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



        });

        </script>
@stop