
<script>
    $('#custom_status').hide();

    $('#payment_options').change(function() {
        if ($(this).val() === '4') {
            if($('#custom_status').css('display') == 'none'){ 
                $('#custom_status').css('display') == 'inline';
                $('#custom_status').show(); 

            } else {
                $('#custom_status').css('display') == 'none';
                $('#custom_status').hide(); 
            }
        }else{
            $('#custom_status').hide();
        }
    });

    $('#submit').click(function() {
        $('#submit').text("Please Wait...");
        $('#submit').attr('disabled', 'disabled');
        $('#submit').submit();
    });
</script>

<div class="modal-content">
@if(isset($bitcoin))
     {!! Form::model($bitcoin, array('route' => array('bitcoin.update', $bitcoin->id), 'method' => 'PUT')) !!}
@else
    {!! Form::open(array('url' => '/administrator/bitcoin')) !!}
@endif

        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">{!! $page_title !!} Order</h4>
        </div>
        <div class="modal-body">
          <div class="tabs-framed">
          <ul class="tabs clearfix">

  <li style="padding: 5px;" class="active"><a data-toggle="tab" href="#home">Basic Details</a></li>
  <li style="padding: 5px;"><a data-toggle="tab" href="#menu2">Order Details</a></li>
  <li style="padding: 5px;"><a data-toggle="tab" href="#menu3">Payment Details</a></li>
 
</ul>
<div class="tab-content">
  <div id="home" class="tab-pane fade in active">
      @if(empty($user))
          <div class="form-group">
              User details no longer exists in the database.
          </div>
      @else
          <div class="form-group">
              <label for="first_name">First Name:</label>
              <input type="text" name="first_name" value="{{ $user->first_name }}" class="form-control input-lg" readonly="true" >
          </div>

          <div class="form-group">
              <label for="middle_name">Middle Name:</label>
              <input type="text" name="middle_name" value="{{ $user->middle_name }}" class="form-control input-lg" readonly="true" >
          </div>

          <div class="form-group">
              <label for="last_name">Last Name:</label>
              <input type="text" name="last_name" value="{{ $user->last_name }}" class="form-control input-lg" readonly="true" >
          </div>

          <div class="form-group">
              <label for="email">Email Address:</label>
              <input type="email" name="email" value="{{ $user->email }}" class="form-control input-lg" readonly="true" >
          </div>

          <div class="form-group">
              <label for="phone_no">Phone No:</label>
              <input type="text" name="phone_no" value="{{ $user->phone_no }}" class="form-control input-lg" readonly="true">
          </div> 
      @endif
  </div>

  <div id="menu2" class="tab-pane fade">

      <div class="form-group">
          <label for="date">Date</label>
          <input type="text" name="date" value="{{ $bitcoin->created_at->todatestring() }}" class="form-control input-lg" readonly="true">
      </div>  

      <div class="form-group">
          <label for="time">Time</label>
          <input type="text" name="time" value="{{ $bitcoin->created_at->totimestring() }}" class="form-control input-lg" readonly="true">
      </div>  

      @if(!empty($bitcoin->first_name) || !empty($bitcoin->middle_name) || !empty($bitcoin->last_name) ||!empty($bitcoin->email) || !empty($bitcoin->phone_no))
          <div class="form-group">
              <label for="first_name2">First Name:</label>
              <input type="text" name="first_name2" value="{{ $bitcoin->first_name }}" class="form-control input-lg" readonly="true" >
          </div>

          <div class="form-group">
              <label for="middle_name2">Middle Name:</label>
              <input type="text" name="middle_name2" value="{{ $bitcoin->middle_name }}" class="form-control input-lg" readonly="true" >
          </div>

          <div class="form-group">
              <label for="last_name2">Last Name:</label>
              <input type="text" name="last_name2" value="{{ $bitcoin->last_name }}" class="form-control input-lg" readonly="true" >
          </div>

          <div class="form-group">
              <label for="email2">Email Address:</label>
              <input type="email" name="email2" value="{{ $bitcoin->email }}" class="form-control input-lg" readonly="true" >
          </div>

          <div class="form-group">
              <label for="phone_no2">Phone No:</label>
              <input type="text" name="phone_no2" value="{{ $bitcoin->phone_no }}" class="form-control input-lg" readonly="true">
          </div> 
      @endif

      <div class="form-group">
          <label for="nfirst_name">Units:</label>
          <input type="text" name="nfirst_name" value="{{ $bitcoin->unit }}" class="form-control input-lg" readonly="true">
      </div> 

      <div class="form-group">
          <label for="nmiddle_name">Total:</label>
          <input type="text" name="nmiddle_name" value="{{ $bitcoin->total }}" class="form-control input-lg" readonly="true">
      </div>  

      <div class="form-group">
          <label for="nlast_name">Wallet:</label>
          <input type="text" name="nlast_name" value="{{ $bitcoin->wallet_id }}" class="form-control input-lg" readonly="true">
      </div>

      <div class="form-group">
      <label for="bank_name">Payment Method:</label>
          <input type="text" name="bank_name" value="@if ($bitcoin->method==1)
          {!! "Internet Bank Transfer"  !!}
          @endif

          @if ($bitcoin->method==2)
              {!! "Bank Deposit"  !!}
          @endif

          @if ($bitcoin->method==3)
              {!! "Short Code"  !!}
          @endif" class="form-control input-lg" readonly="true">
      </div>  

      <div class="form-group">
          <label for="account_no">Ref No:</label>
          <input type="text" name="account_no" value="{{ $bitcoin->ref_no }}" class="form-control input-lg" readonly="true">
      </div> 

      <div class="form-group">
          <label for="order_status">Order Status:</label>
          <input type="text" name="order_status" value="{{ $bitcoin->status }}" class="form-control input-lg" readonly="true">
      </div> 

      <div class="form-group" style="margin-top: 25px;"> 
          <label for="status">Process Order:</label>
          {!! Form::select('status',$payment_status, Input::old('status'),['class' => ' btn btn-default btn-lg',
          'required' => "true",'tabindex'=>"5", 'id'=>"payment_options"]) !!}
      </div>

      <div class="form-group" style="margin-top: 25px;">
          <input style="width:300px; height:35px" type="text" id="custom_status" name="custom_status">
      </div>
  </div>

  <div id="menu3" class="tab-pane fade">
    @if(!empty($alert_details[0]))
        <div class="form-group">
            <label for="date_sent">Date Sent:</label>
            <input type="text" name="date_sent" value="{{ $alert_details[0]->date_sent }}" class="form-control input-lg" readonly="true" >
        </div>
        <div class="form-group">
            <label for="transfer_details">Transfer Details:</label>
            <input type="text" name="transfer_details" value="{{ $alert_details[0]->transfer_details }}" class="form-control input-lg" readonly="true" >
        </div>
        <div class="form-group">
            <label for="amount_paid">Amount Paid:</label>
            <input type="text" name="amount_paid" value="{{ $alert_details[0]->amount_paid }}" class="form-control input-lg" readonly="true" >
        </div>
        <div class="form-group">
            <label for="depositor_name">Depositor:</label>
            <input type="text" name="depositor_name" value="{{ $alert_details[0]->depositor_name }}" class="form-control input-lg" readonly="true" >
        </div>
        <div class="form-group">
            <label for="receipt">Receipt:</label>
            <img style="width: 100%; max-height: 250PX" src="{{ asset('receipt_uploads/'.$alert_details[0]->receipt_dir) }}" alt="receipt">
        </div>
        <div class="form-group">
            <a href="{{ asset('/receipt_uploads') }}/{{ $alert_details[0]->receipt_dir }}" download="true">
                {{ $alert_details[0]->receipt_dir }}
            </a>
        </div>
    @else
        <div class="form-group">
            Payment alert has not been sent.
        </div>
    @endif
  </div>

</div>

</div>
<div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    <button type="submit" id="submit" class="btn btn-primary">{!! $page_action !!}</button>
</div>
   {!! Form::close() !!}
</div>
</div>