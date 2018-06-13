<script>
    $('#submit').click(function() {
        $('#submit').text("Please Wait...");
        $('#submit').prop('disabled', 'disabled');
        $('#submit').submit();
    });
</script>

<div class="modal-content">
@if(isset($user))
     {!! Form::model($user, array('route' => array('customer.update', $user->id), 'method' => 'PUT')) !!}
@else
    {!! Form::open(array('url' => '/administrator/customer')) !!}
@endif

        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">{!! $page_title !!} Customer</h4>
        </div>
        <div class="modal-body">
          <div class="tabs-framed">
          <ul class="tabs clearfix">
  <li class="active"><a data-toggle="tab" href="#home">Basic Details</a></li>
  <li style="padding: 5px;"><a data-toggle="tab" href="#menu1">Next of Kin</a></li>
  <li><a data-toggle="tab" href="#menu2">Bank Details</a></li>
</ul>
<div class="tab-content">
  <div id="home" class="tab-pane fade in active">

              <div class="form-group">
                  <label for="id">ID:</label>
                  <input type="text" name="id" value="{{ $user->id }}" class="form-control input-lg" readonly="true">
              </div> 

              <div class="form-group">
                  <label for="date">Date</label>
                  <input type="text" name="date" value="{{ $user->created_at->todatestring() }}" class="form-control input-lg" readonly="true">
              </div>  

              <div class="form-group">
                  <label for="time">Time</label>
                  <input type="text" name="time" value="{{ $user->created_at->totimestring() }}" class="form-control input-lg" readonly="true">
              </div>  


             <div class="form-group">
                <label for="first_name">First Name:</label>
        {!! Form::text('first_name', Input::old('first_name'),['class' => 'form-control input-lg','required' => "true",'placeholder' => "Enter First Name",
        'tabindex'=>'1','readonly'=>'true']) !!}
                    <span class="text-danger"></span>
                  </div>      
                 <div class="form-group">
                    <label for="middle_name">Middle Name:</label>
    {!! Form::text('middle_name', Input::old('middle_name'),['class' => 'form-control input-lg','placeholder' => "Enter Middle Name",'required' => "true",
        'tabindex'=>'2','readonly'=>'true']) !!}
                    
                    <span class="text-danger"></span>
                </div>
             <div class="form-group">
            <label for="last_name">Last Name:</label>
            {!! Form::text('last_name', Input::old('last_name'),['class' => 'form-control input-lg','required' => "true",'placeholder' => "Enter Last Name",
        'tabindex'=>'3','readonly'=>'true']) !!}
                            <span class="text-danger"></span>
                           

             </div>


        <div class="form-group">
            <label for="email">Email Address:</label>
           {!! Form::email('email', Input::old('email'),['class' => 'form-control input-lg','required' => "true",'placeholder' => "Enter Email Address",
        'tabindex'=>'4','readonly'=>'true']) !!}
                            <span class="text-danger"></span>
                            <span id="emailstatus"></span>

        </div>

        <div class="form-group">
            <label for="phone_no">Phone No:</label>
            <input type="text" name="phone_no" value="{{ $user->phone_no}}" class="form-control input-lg" readonly="true">
        </div> 

        <div class="form-group">
            <label for="current_status">Account Status:</label>
            <input type="text" name="current_status" value="{{ $user->activation_status}}" class="form-control input-lg" readonly="true">
        </div> 

         <div class="form-group" style="margin-top: 25px;"> 
            <label for="activation_status"></label>
            {!! Form::select('activation_status',$status, Input::old('activation_status'),['class' => ' btn btn-default btn-lg',
             'required' => "true",'tabindex'=>"5"]) !!}
         </div>

  </div>

  <div id="menu1" class="tab-pane fade">
                <div class="form-group">
                <label for="nfirst_name">First Name:</label>
                   <input type="text" name="nfirst_name" value="{{ empty($next_of_kin) ? "Nil" : $next_of_kin->first_name }}" class="form-control input-lg" readonly="true">
                  </div>      
                 <div class="form-group">
                    <label for="nmiddle_name">Middle Name:</label>
    <input type="text" name="nmiddle_name" value="{{ empty($next_of_kin) ? "Nil" : $next_of_kin->middle_name }}" class="form-control input-lg" readonly="true">
                  </div>  

               
             <div class="form-group">
            <label for="nlast_name">Last Name:</label>
            <input type="text" name="nlast_name" value="{{ empty($next_of_kin) ? "Nil" : $next_of_kin->last_name }}" class="form-control input-lg" readonly="true">
                  </div> 
                  <div class="form-group">
            <label for="nphone_no">Phone No:</label>
            <input type="text" name="nphone_no" value="{{ empty($next_of_kin) ? "Nil" : $next_of_kin->phone_no }}" class="form-control input-lg" readonly="true">
                  </div>  
                  <div class="form-group">
            <label for="relationship">Relationship:</label>
            <input type="text" name="relationship" value="{{ empty($next_of_kin) ? "Nil" : $next_of_kin->relationship }}" class="form-control input-lg" readonly="true">
                  </div>   
            
  </div>
  <div id="menu2" class="tab-pane fade">

                    <div class="form-group">
                <label for="nfirst_name">First Name:</label>
                   <input type="text" name="nfirst_name" value="{{ empty($user->account_detail) ? "Nil" : $user->account_detail->account_first_name }}" class="form-control input-lg" readonly="true">
                  </div>      
                 <div class="form-group">
                    <label for="nmiddle_name">Middle Name:</label>
    <input type="text" name="nmiddle_name" value="{{ empty($user->account_detail) ? "Nil" : $user->account_detail->account_middle_name }}" class="form-control input-lg" readonly="true">
                  </div>  

               
             <div class="form-group">
            <label for="nlast_name">Last Name:</label>
            <input type="text" name="nlast_name" value="{{ empty($user->account_detail) ? "Nil" : $user->account_detail->account_last_name }}" class="form-control input-lg" readonly="true">
                  </div>
                   <div class="form-group">
                    <label for="bank_name">Bank Name:</label>
    <input type="text" name="bank_name" value="{{ empty($user->account_detail) ? "Nil" : $user->account_detail->bank_name }}" class="form-control input-lg" readonly="true">
                  </div>  
                   <div class="form-group">
                    <label for="account_no">Account No:</label>
    <input type="text" name="account_no" value="{{ empty($user->account_detail) ? "Nil" : $user->account_detail->account_no }}" class="form-control input-lg" readonly="true">
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
