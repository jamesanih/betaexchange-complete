@extends('layouts.admin_master')

@section('content')
<!--header end here-->
<!--about start here-->
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="page-header text-center">Customers</h2>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading ">
                            Customer Details
                        </div>
                        
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="customer">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>First Name</th>
                                        <th>Middle Name</th>
                                        <th>Last Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Verification Status</th>
                                        <th>Verify Code</th>
                                        <th width="5%">Details</th>
                                         <th width="5%"></th>
                                       
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (count($users))
                             @foreach ($users as $user)
                    <tr>
                         <td>
                          {!! $user->id !!}
                        </td>
                        <td>
                          {!! $user->first_name !!}
                        </td>

                        <td>
                          {!! $user->middle_name !!}
                        </td>
                        <td>
                          {!! $user->last_name !!}
                        </td>
                         <td>
                          {!! $user->email !!}
                        </td>
                         <td>
                          {!! $user->phone_no !!}
                        </td>
                         <td>
                         @if ($user->activated==true)
                             {!! "Activated"  !!}
                         @endif
                        @if ($user->activated==false)
                             {!! "Not Activated"  !!}
                         @endif
                        </td>
                         <td>
                          {!! $user->verify_code !!}
                        </td>
        <td><a  role='button' data-edit-id='{!! $user->id!!}' class='btn btn-default editBtn' ><i class='fa fa-edit'></i> Details</a></td>
            <td><a href='#delete_modal' data-delete-id='{!! $user->id!!}' class='btn btn-danger deleteBtn' role='button' data-toggle='modal'><i class='fa fa-trash-o fa-lg'></i></a></td>

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

<!--Delete User-->
<div class="modal fade" id="delete_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" id="delete_content">
            
        </div>
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
 //Load the edit page
        $(".btn_add").click(function () {
        $("#addUpdate_modal_body").load("/administrator/customer/create", function () {
            $("#addUpdate_modal").modal({
                backdrop: 'static',
                keyboard: true
                }, "show");
            bindForm(this);
                });
                return false;
         });


        //Load the edit page
        $(".editBtn").click(function () {

            $("#addUpdate_modal_body").load("/administrator/customer/" + $(this).data("edit-id")+"/edit",function(responseTxt, statusTxt, xh)
                {
                     $("#addUpdate_modal").modal({
                                    backdrop: 'static',
                                    keyboard: true
                                }, "show");
                                bindForm(this);
                });
            return false;
         });
        
        //Handle the delete function
        $(".deleteBtn").click(function () {

            $("#delete_content").load("/administrator/customer/" + $(this).data("delete-id"));
        });


              $('#customer').DataTable({
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