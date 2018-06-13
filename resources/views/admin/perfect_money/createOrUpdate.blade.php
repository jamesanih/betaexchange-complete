
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
@if(isset($perfect))
     {!! Form::model($perfect, array('route' => array('perfect-money.update', $perfect->id), 'method' => 'PUT')) !!}
@else
    {!! Form::open(array('url' => '/administrator/perfect-money')) !!}
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
          <input type="text" name="date" value="{{ $perfect->created_at->todatestring() }}" class="form-control input-lg" readonly="true">
      </div>  

      <div class="form-group">
          <label for="time">Time</label>
          <input type="text" name="time" value="{{ $perfect->created_at->totimestring() }}" class="form-control input-lg" readonly="true">
      </div>  

                    <div class="form-group">
                <label for="nfirst_name">Units:</label>
                   <input type="text" name="nfirst_name" value="{{ $perfect->unit}}" class="form-control input-lg" readonly="true">
                  </div>      
                 <div class="form-group">
                    <label for="nmiddle_name">Total:</label>
    <input type="text" name="nmiddle_name" value="{{ $perfect->total}}" class="form-control input-lg" readonly="true">
                  </div>  

               
             <div class="form-group">
            <label for="nlast_name">Account Name:</label>
            <input type="text" name="nlast_name" value="{{ $perfect->account_name}}" class="form-control input-lg" readonly="true">
                  </div>
          <div class="form-group">
            <label for="nlast_name2">Account No:</label>
            <input type="text" name="nlast_name2" value="{{ $perfect->account_no}}" class="form-control input-lg" readonly="true">
                  </div>
                   <div class="form-group">
                    <label for="bank_name">Payment Method:</label>
    <input type="text" name="bank_name" value="@if ($perfect->method==1)
                             {!! "Internet Bank Transfer"  !!}
                         @endif
                        @if ($perfect->method==2)
                             {!! "Bank Deposit"  !!}
                         @endif
                          @if ($perfect->method==3)
                             {!! "Short Code"  !!}
                         @endif" class="form-control input-lg" readonly="true">
                  </div>  
                   <div class="form-group">
                    <label for="account_no">Ref No:</label>
    <input type="text" name="account_no" value="{{ $perfect->ref_no}}" class="form-control input-lg" readonly="true">
                  </div> 

      @if(!empty($perfect->first_name) || !empty($perfect->middle_name) || !empty($perfect->last_name) ||!empty($perfect->email) || !empty($perfect->phone_no))
          <div class="form-group">
              <label for="first_name2">First Name:</label>
              <input type="text" name="first_name2" value="{{ $perfect->first_name }}" class="form-control input-lg" readonly="true" >
          </div>

          <div class="form-group">
              <label for="middle_name2">Middle Name:</label>
              <input type="text" name="middle_name2" value="{{ $perfect->middle_name }}" class="form-control input-lg" readonly="true" >
          </div>

          <div class="form-group">
              <label for="last_name2">Last Name:</label>
              <input type="text" name="last_name2" value="{{ $perfect->last_name }}" class="form-control input-lg" readonly="true" >
          </div>

          <div class="form-group">
              <label for="email2">Email Address:</label>
              <input type="email" name="email2" value="{{ $perfect->email }}" class="form-control input-lg" readonly="true" >
          </div>

          <div class="form-group">
              <label for="phone_no2">Phone No:</label>
              <input type="text" name="phone_no2" value="{{ $perfect->phone_no }}" class="form-control input-lg" readonly="true">
          </div> 
      @endif

          <div class="form-group">
              <label for="order_status">Order Status:</label>
              <input type="text" name="order_status" value="{{ $perfect->status }}" class="form-control input-lg" readonly="true">
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
</div>
</div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" id="submit" class="btn btn-primary">{!! $page_action !!}</button>

        </div>
   {!! Form::close() !!}
</div>
