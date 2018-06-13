<div class="modal-content">

    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">{!! $page_title !!} Order</h4>
    </div>
    <div class="modal-body">
      <div class="tabs-framed">
      <ul class="tabs clearfix">

<li style="padding: 5px;" class="active"><a data-toggle="tab" href="#homeorder">Order Details</a></li>
<li style="padding: 5px;"><a data-toggle="tab" href="#menu">Payment Details</a></li>

</ul>
<div class="tab-content">
<div id="homeorder" class="tab-pane fade in active">

    <div class="form-group">
        <label for="ref_no">Reference Number:</label>
            <input type="text" name="ref_no" value="{!! $sold_pm->ref_no !!}" class="form-control input-lg" readonly="true" >
    </div>  


    <div class="form-group">
        <label for="ref_no">Account Name:</label>
            <input type="text" name="ref_no" value="{!! $sold_pm->account_name !!}" class="form-control input-lg" readonly="true" >
    </div>  

    <div class="form-group">
        <label for="ref_no">Account Number:</label>
            <input type="text" name="ref_no" value="{!! $sold_pm->account_no !!}" class="form-control input-lg" readonly="true" >
    </div>  

    <div class="form-group">
        <label for="ref_no">Bank Name:</label>
            input type="text" name="ref_no" value="{!! $sold_pm->bank_name !!}" class="form-control input-lg" readonly="true" >
    </div>  

    <div class="form-group">
        <label for="ref_no">Phone Number:</label>
            <input type="text" name="ref_no" value="{!! $sold_pm->phone_no !!}" class="form-control input-lg" readonly="true" >
    </div>  

    <div class="form-group">
        <label for="units">Units:</label>
            <input type="text" name="units" value="{!! $sold_pm->unit !!}" class="form-control input-lg" readonly="true" >
    </div>


    <div class="form-group">
        <label for="ref_no">Price:</label>
            <input type="text" name="ref_no" value="{!! $sold_pm->price !!}" class="form-control input-lg" readonly="true" >
    </div>  

    <div class="form-group">
        <label for="total">Total:</label>
            <input type="text" name="total" value="{!! $sold_pm->total !!}" class="form-control input-lg" readonly="true" >
    </div>
    
    
</div>

<div id="menu" class="tab-pane fade">
    @if (count($conf_details))
            @foreach ($conf_details as $pm)
                <div class="form-group">
                    <label for="date_sent">Date Sent:</label>
                        <input type="text" name="date_sent" value="{!! $pm->date_sent !!}" class="form-control input-lg" readonly="true">
                </div>      
                <div class="form-group">
                    <label for="details_no">Batch Number:</label>
                        <input type="text" name="details_no" value="{!! $pm->batch_number !!}" class="form-control input-lg" readonly="true">
                </div>  


                <div class="form-group">
                    <label for="amount_paid">Amount Sent:</label>
                        <input type="text" name="amount_paid" value="{!! $pm->amount_sent !!}" class="form-control input-lg" readonly="true">
                </div>

                <div class="form-group">
                    <label for="depositor_name">Wallet ID:</label>
                        <input type="text" name="depositor_name" value="{!! $pm->wallet_id !!}" class="form-control input-lg" readonly="true">
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

