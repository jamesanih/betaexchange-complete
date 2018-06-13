@extends('layouts.user_master')

@section('content')
<!--header end here-->
<!--about start here-->
<div class="container">
        <div id="page-wrapper">
            @if (Session::has('message'))
                         <div class="alert alert-info text-center"  role="alert" style="margin-top: 20px;">
                             <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                        {{ Session::get('message') }}
                        </div>
                        @endif
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="page-header text-center">Message</h2>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading ">
                            Message
                        </div>
                        
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="customer">
                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Sender Name</th>
                                        <th>subject</th>
                                        <th width="5%">Details</th>
                                         <th width="5%"></th>
                                       
                                    </tr>
                                </thead>
                                <tbody>
                                   @if(count($msg))
                                        @foreach($msg as $msg)
                                            <tr>
                                                <td>{!! $msg->created_at->todatestring() !!}</td>
                                                <td>{!! $msg->sender_name !!}</td>
                                                <td>{!! $msg->subject !!}</td>
                                               <td><a  role='button' data-edit-id='{!! $msg->id!!}' class='btn btn-primary viewBtn' ><i class='fa fa-edit'></i></a></td>
                                                <td><a href='#delete_msg' class='btn btn-danger deleteBtn' role='button' data-toggle='modal'><i class='fa fa-trash-o fa-lg'></i></a></td>
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

</div>
<div class="modal fade" id="view_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog"  id="view_modal_body">
     
    </div>
</div>

@include('modals.msg')

@endsection

@section('script')
   <script type="text/javascript">
        $(function () {

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


        //Load the edit page
        $(".viewBtn").click(function () {

            $("#view_modal_body").load("viewmsg/" + $(this).data("edit-id"),function(responseTxt, statusTxt, xh)
                {
                     $("#view_modal").modal({
                                    backdrop: 'static',
                                    keyboard: true
                                }, "show");
                                bindForm(this);
                });
            return false;
         });



        });

        </script>
@stop