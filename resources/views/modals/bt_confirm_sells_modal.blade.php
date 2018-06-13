<div class="modal-content">

        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">{!! $page_title !!} Sales</h4>
        </div>
        <div class="modal-body">
          <div class="tabs-framed">
          <ul class="tabs clearfix">

  <li style="padding: 5px;" class="active"><a data-toggle="tab" href="#home2">Order Details</a></li>
  <li style="padding: 5px;"><a data-toggle="tab" href="#menu3">Payment Details</a></li>
 
</ul>
<div class="tab-content">
  <div id="home2" class="tab-pane fade in active">

             <div class="form-group">
                <label for="first_name">Account Name:</label>
            <input type="text" name="account_name" value="{!! $sale_details->account_name !!}" class="form-control input-lg" readonly="true" >
                  </div>      
                 <div class="form-group">
                    <label for="middle_name">Account Number:</label>
            <input type="text" name="account_no" value="{!! $sale_details->account_no !!}" class="form-control input-lg" readonly="true" >
                </div>
             <div class="form-group">
            <label for="last_name">Bank Name:</label>
            <input type="text" name="bank_name" value="{!! $sale_details->bank_name !!}" class="form-control input-lg" readonly="true" >
             </div>
              <div class="form-group">
            <label for="last_name">Phone Number:</label>
            <input type="text" name="phone_no" value="{!! $sale_details->phone_no !!}" class="form-control input-lg" readonly="true" >
             </div>


        <div class="form-group">
            <label for="email">Units:</label>
           
 <input type="email" name="unit" value="{!! $sale_details->unit !!}" class="form-control input-lg" readonly="true" >
             

        </div>
        <div class="form-group">
            <label for="phone_no">Price:</label>
            <input type="text" name="phone_no" value="{!! $sale_details->price !!}" class="form-control input-lg" readonly="true">
                  </div> 

                   <div class="form-group">
            <label for="last_name">Total:</label>
            <input type="text" name="total" value="{!! $sale_details->total !!}" class="form-control input-lg" readonly="true" >
             </div>
        
  </div>

  <div id="menu3" class="tab-pane fade">
                     @if (count($conf_details))
                             @foreach ($conf_details as $bitcoin)
                    <div class="form-group">
                <label for="date_sent">Date Sent:</label>
                   <input type="text" name="date_sent" value="{!! $bitcoin->date_sent !!}" class="form-control input-lg" readonly="true">
                  </div>      
                 <div class="form-group">
                    <label for="hash">Hash:</label>
    <input type="text" name="hash" value="{!! $bitcoin->hash !!}" class="form-control input-lg" readonly="true">
                  </div>  

               
             <div class="form-group">
            <label for="wallet_id">Wallet:</label>
            <input type="text" name="nlast_name" value="{!! $bitcoin->wallet_id !!}" class="form-control input-lg" readonly="true">
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

