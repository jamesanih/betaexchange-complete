@extends('layouts.user_master')

@section('content')
<div class="container">
	<div id="page-wapper">
		<div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Perfect Money</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>

            @if ($errors->any())
    <div class="alert alert-danger col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

            <div class="row">
            	<div class="col-md-12">
            		<div class="tabs-framed">
            			<ul class="tabs clearfix">

  							<li style="padding: 5px;" class="active"><a data-toggle="tab" href="#home">Perfect Money Ordered</a></li>
						    <li style="padding: 5px;"><a data-toggle="tab" href="#menu2">Perfect Money Sold </a></li>
 
						</ul>


						<div class="tab-content">
							<div id="home" class="tab-pane fade in active">
								<div class="panel panel-default">
									<div class="panel-heading">
			                           Perfect Money ordered
			                        </div>
			                        @if (Session::has('message'))
			                         <div class="alert alert-info text-center" role="alert" style="width:50%;" align="center">
			                             <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>

			                        {{ Session::get('message') }}
			                        </div>
			                        @endif
			                        <div class="panel-body">
			                        <table width="100%" class="table table-striped table-bordered table-hover" id="ordered_pm">
			                        	<thead>
			                        		<tr>
			                        			<th>Date</th>
			                        			<th>Ref No</th>
			                        			<th>Account Name</th>
			                        			<th>Account No</th>
			                        			<th>Units</th>
			                        			<th>Total</th>
			                        			<th>Payment Method</th>
		                                        <th>Status</th>
                                        		<th width="5%" id="head_display">Details</th>
                                         		<th width="5%" id="deletebtn"></th>
			                        		</tr>
			                        	</thead>
			                        	<tbody>
			                        		@if(count($pm))
			                        			@foreach($pm as $pm_order)

			                        				<tr>
			                        					<td>{!! $pm_order->created_at->todatestring() !!}</td>
			                        					<td>{!! $pm_order->ref_no !!}</td>
			                        					<td>{!! $pm_order->account_name !!}</td>
			                        					<td>{!! $pm_order->account_no !!}</td>
			                        					<td>{!! $pm_order->unit !!}</td>
			                        					<td>{!! $pm_order->total !!}</td>

			                        					<td>
			                        					@if($pm_order->method == 1)
				                        					Internet Bank Transfer
														@elseif($pm_order->method == 2)
															Bank Deposit
														@elseif($pm_order->method == 3)
															Short Code
														@endif
			                        					</td>                       						
		                        						
		                        						<td>
	                        							@if($pm_order->status == 0)
		                        							Processing
		                        						@else
		                        							Completed
		                        						@endif
		                        						</td>

		                        						<td>
	                        							 @if($pm_order->payment_alert == "not sent")
							                               <a    role='button' data-edit-id='{!! $pm_order->id!!}' class='btn btn-default confirm_payment' data-toggle="modal"><i class='fa fa-edit'></i>confirm payment</a>
								                        @elseif($pm_order->status == "Canceled")
							                                <a  id="canel" role="button"   role='button' class='btn btn-danger' data-toggle="modal" data-edit-id="{!! $pm_order->id !!}">Canelled</a>
								                        @else    
						                                <a  role='button' data-edit-id='{!! $pm_order->id!!}' class='btn btn-default details' ><i class='fa fa-edit '></i>Details</a>
								                        @endif
		                        						</td>
									                    <td id="del">
									                    	@if($pm_order->payment_alert == "not sent")
									                       <a href='#delete_modal' data-delete-id='{!! $pm_order->id!!}' class='btn btn-danger deleteBtn' role='button' data-toggle='modal'><i class='fa fa-trash-o fa-lg'></i></a>
									                       @endif
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


							<!-- second tab -->

							<div class="tab-pane fade" id="menu2">
								<div class="panel panel-default">
									<div class="panel-heading">
										 Perfect money sold
									</div>

									<div class="panel-body">
										 <table width="100%" class="table table-striped table-bordered table-hover" id="sold_pm">
			                        	<thead>
			                        		<tr>
			                        			<th>Date</th>
			                        			<th>Ref No</th>
			                        			<th>Account Name</th>
			                        			<th>Account No</th>
			                        			<th>Bank Name</th>
			                        			<th>Email</th>
			                        			<th>Phone No</th>
			                        			<th>Price</th>
			                        			<th>Units</th>
			                        			<th>Total</th>
			                        			<th width="5%">confirm sale</th>
                                         		<th width="5%" id="delheader"></th>
			                        			
			                        		</tr>
			                        	</thead>
			                        	<tbody>
			                        		@if(count($pm_sold))
			                        			@foreach($pm_sold as $pm)
			                        			<tr>
			                        				<td>{!! $pm->created_at->todatestring() !!}</td>
			                        				<td>{!!$pm->ref_no !!}</td>
			                        				<td>{!! $pm->account_name !!}</td>
			                        				<td>{!! $pm->account_no !!}</td>
			                        				<td>{!! $pm->bank_name !!}</td>
			                        				<td>{!! $pm->email !!}</td>
			                        				<td>{!! $pm->phone_no !!}</td>
			                        				<td>{!! $pm->price !!}</td>
			                        				<td>{!! $pm->unit !!}</td>
			                        				<td>{!! $pm->total !!}</td>
			                        				 <td>
							                            @if($pm->funding_alert == "not sent")
							                               <a role="button" id="confirm_sales_payment"  role='button' class='btn btn-default' data-toggle="modal" data-edit-id="{!! $pm->id !!}"><i class='fa fa-edit'></i>confirm sales</a>
							                            @elseif($pm->status == "Canceled")
							                                <a  id="canel" role="button"   role='button' class='btn btn-danger' data-toggle="modal" data-edit-id="{!! $pm->id !!}">Canelled</a>
							                            @else    
							                                <a  role="button" id=""  role='button' data-edit-id='{!! $pm->id !!}' class='btn btn-default details2' ><i class='fa fa-edit'></i>Details</a>
							                           @endif
                         							</td>

                         							 <td id="del">
							                            @if($pm->funding_alert == "not sent")
							                                  <a href='#delete_pm_modal' class='btn btn-danger deleteBtn' role='button' data-toggle='modal'><i class='fa fa-trash-o fa-lg'></i></a>
							                            @endif
                        							</td>
			                        			</tr>
			                        			@endforeach
			                        		@endif
			                        	</tbody>
			                        </table>
									</div>
								</div>
							</div>

							
							<!-- end of second tab -->
						</div>
						<!-- end of tab content -->

            		</div>
            		<!-- end of tabs frames -->
            	</div>
            	<!-- col -->
            </div>
            <!-- row -->
	</div>

<!-- confirm_sold_payment -->
<div class="modal fade" id="conf_sold_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog"  id="sold_modal_body">
     
    </div>
</div>
<!-- view buy_pm details -->
<div class="modal fade" id="view_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog"  id="view_modal_body">
     
    </div>
</div>

<!-- view conf_sold details -->
<div class="modal fade" id="buy_pm_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog"  id="pm_body">
     
    </div>
</div>

@include('modals.delete_modal')

	
</div>


@endsection
@section('script')
    <script type="text/javascript">
        $(function () {

          if($('#details').length) {
            $('#head_display').html("Details");
            $('#deletebtn').hide();
            $('#del').hide();
          }


           if($('#confirm_payment').length) {
            $('#head_display').html("Confirm Payment");
          }

          if ($('#details2').length) {
          	$('#del_pm').hide();
          	$('#delheader').hide();
          }

          if ($('#canel').length) {
          	$('#del_pm').hide();
          	$('#delheader').hide();
          	 $('#head_display').html("Details");
          	 $('#del').hide();
          }

              $('#ordered_pm').DataTable({
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


                $('#sold_pm').DataTable({
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

		$(".confirm_payment").click(function () {

            $("#view_modal_body").load("confirm_buypm/" + $(this).data("edit-id"),function(responseTxt, statusTxt, xh)
                {
                     $("#view_modal").modal({
                                    backdrop: 'static',
                                    keyboard: true
                                }, "show");
                               // bindForm(this);
                });
            return false;
         });

                // load buy pm details modal
                $(".details").click(function () {

            $("#view_modal_body").load("viewPm/" + $(this).data("edit-id"),function(responseTxt, statusTxt, xh)
                {
                     $("#view_modal").modal({
                                    backdrop: 'static',
                                    keyboard: true
                                }, "show");
                               // bindForm(this);
                });
            return false;
         });


                $("#confirm_sales_payment").click(function () {

            $("#sold_modal_body").load("confirm_sold/" + $(this).data("edit-id"),function(responseTxt, statusTxt, xh)
                {
                     $("#conf_sold_modal").modal({
                                    backdrop: 'static',
                                    keyboard: true
                                }, "show");
                               // bindForm(this);
                });
            return false;
         });


                $(".details2").click(function () {

            $("#pm_body").load("pm_details/" + $(this).data("edit-id"),function(responseTxt, statusTxt, xh)
                {
                     $("#buy_pm_modal").modal({
                                    backdrop: 'static',
                                    keyboard: true
                                }, "show");
                               // bindForm(this);
                });
            return false;
         });




        });

        </script>
@stop