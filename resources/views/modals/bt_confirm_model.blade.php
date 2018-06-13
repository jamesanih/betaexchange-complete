<div class="modal-content">

        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">{!! $page_title !!} Order</h4>
        </div>
        <div class="modal-body">
          <div class="tabs-framed">
          <ul class="tabs clearfix">

  <li style="padding: 5px;" class="active"><a data-toggle="tab" href="#homeorder">Order Details</a></li>
  <li style="padding: 5px;"><a data-toggle="tab" href="#menupayment">Payment Details</a></li>
 
</ul>
<div class="tab-content">
  <div id="homeorder" class="tab-pane fade in active">

             <div class="form-group">
                <label for="ref_no">Reference Number:</label>
            <input type="text" name="ref_no" value="{!! $buy_details->ref_no !!}" class="form-control input-lg" readonly="true" >
                  </div>      
                 <div class="form-group">
                    <label for="wallet_id">Wallet ID:</label>
            <input type="text" name="wallet_id" value="{!! $buy_details->wallet_id !!}" class="form-control input-lg" readonly="true" >
                </div>
             <div class="form-group">
            <label for="units">Units:</label>
            <input type="text" name="units" value="{!! $buy_details->unit !!}" class="form-control input-lg" readonly="true" >
             </div>
              <div class="form-group">
            <label for="total">Total:</label>
            <input type="text" name="total" value="{!! $buy_details->total !!}" class="form-control input-lg" readonly="true" >
             </div>


        <div class="form-group">
            <label for="email">Payment Method:</label>
            @if($buy_details->method == 1)
            <input type="email" name="unit" value="Internet Bank Transfer" class="form-control input-lg" readonly="true" >
                  
             @elseif($buy_details->method == 2)
             <input type="email" name="unit" value="Bank Deposit" class="form-control input-lg" readonly="true" >
                          
              @elseif($buy_details->method == 3)
               <input type="email" name="unit" value="Short Code" class="form-control input-lg" readonly="true" >
              @endif
           
 
             

        </div>
        <div class="form-group">
            <label for="phone_no">Transaction Status:</label>
              <input type="text" name="phone_no" value="{{ $buy_details->status }}" class="form-control input-lg" readonly="true">
            </div> 

                  
        
  </div>

  <div id="menupayment" class="tab-pane fade">
                     @if (count($conf_details))
                             @foreach ($conf_details as $bitcoin)
                    <div class="form-group">
                <label for="date_sent">Date Sent:</label>
                   <input type="text" name="date_sent" value="{!! $bitcoin->date_sent !!}" class="form-control input-lg" readonly="true">
                  </div>      
                 <div class="form-group">
                    <label for="details_no">Memo/teller-no /transfer ref-no:</label>
    <input type="text" name="details_no" value="{!! $bitcoin->transfer_details !!}" class="form-control input-lg" readonly="true">
                  </div>  

               
             <div class="form-group">
            <label for="amount_paid">Amount Paid:</label>
            <input type="text" name="amount_paid" value="{!! $bitcoin->amount_paid !!}" class="form-control input-lg" readonly="true">
                  </div>

                  <div class="form-group">
            <label for="depositor_name">Depositor Name:</label>
            <input type="text" name="depositor_name" value="{!! $bitcoin->depositor_name !!}" class="form-control input-lg" readonly="true">
                  </div>

            <div class="form-group">
            <label for="image">Receipt Uploaded:</label>
            
              <a href="{{asset('/receipt_uploads')}}/{{$bitcoin->receipt_dir}}" download="true"><h4>{{$bitcoin->receipt_dir}}</h4> </a>



            
           
                  </div>


                  @endforeach
                  @endif
                    
                      
  </div>
</div>

        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
  
</div>
</div>

