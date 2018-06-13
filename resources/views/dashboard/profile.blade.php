@extends('layouts.user_master')

@section('content')

<div class="container">
<!--header end here-->
<!--about start here-->
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="page-header text-center"><strong style="font-size: 30px;">Profile</strong></h2>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading ">
                            <strong style="font-size: 22px;">Customer Details</strong>
                        </div>

                        <!-- /.panel-heading -->
                        @if(count($user))
                        	@foreach($user as $user_details)
                        <div class="panel-body">
                            <div style="margin-bottom: 13px; margin-left:20px"><strong style="font-size: 20px;">First name</strong><br><p style="font-size: 17px;">{!! $user_details->first_name !!}</p></div>
                            <div style="margin-bottom: 13px; margin-left:20px"><strong style="font-size: 20px;">Middle name</strong><br><p style="font-size: 17px;">{!! $user_details->middle_name !!}</p></div>
                            <div style="margin-bottom: 13px; margin-left:20px"><strong style="font-size: 20px;">Last name</strong><br><p style="font-size: 17px;">{!! $user_details->last_name !!}</p></div>
                            <div style="margin-bottom: 13px; margin-left:20px"><strong style="font-size: 20px;">Email</strong><br><p style="font-size: 17px;">{!! $user_details->email !!}</p></div>
                            <div style="margin-bottom: 13px; margin-left:20px"><strong style="font-size: 20px;">Phone</strong><br><p style="font-size: 17px;">{!! $user_details->phone_no !!}</p></div>
                            	@if($user_details->activated == 0)
                            <div style="margin-bottom: 13px; margin-left:20px"><strong style="font-size: 20px;">Status</strong><br><button  class="btn btn-success" disabled>Account not Verified</button></div>
                            	@else
                            	<div style="margin-bottom: 13px; margin-left:20px"><strong style="font-size: 20px;">Status</strong><br><button  class="btn btn-success" disabled>Account Verified</button></div>
                            	@endif
                        </div>
                        	@endforeach
                        @endif


                        <div class="panel-heading ">
                            <strong style="font-size: 20px;">Bank Details</strong>
                        </div>
                        <!-- /.panel-heading -->
                        @if(count($account_details))
                        	@foreach($account_details as $details)
                        <div class="panel-body">
                          <div style="margin-bottom: 13px; margin-left:20px"><strong style="font-size: 20px;">Bank name</strong><br><p style="font-size: 17px;">{!! $details->bank_name !!}</p></div>
                          <div style="margin-bottom: 13px; margin-left:20px"><strong style="font-size: 20px;">Account name</strong><br><p style="font-size: 17px;">{!! $details->account_first_name !!} {!! $details->account_last_name !!}</p></div>
                          <div style="margin-bottom: 13px; margin-left:20px"><strong style="font-size: 20px;">Account Number</strong><br><p style="font-size: 17px;">******{!! $account_no !!}</p></div>
                        </div>
                        	@endforeach
                        @endif
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>




            <!-- /.row -->
        </div>


<div class="modal fade" id="addUpdate_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" id="addUpdate_modal_body">

    </div>
</div>

<!--Delete User-->
<div class="modal fade" id="delete_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" id="delete_content">

        </div>
    </div>
</div>


</div>
@endsection
@section('script')


@stop