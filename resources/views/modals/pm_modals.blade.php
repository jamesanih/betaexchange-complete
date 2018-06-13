

       <form method="post" action="{{route('confirm_pm')}}" role="form" enctype="multipart/form-data" id="confirm_buy_bitcoin">
          {{csrf_field()}}
      <div class="modal-content">
        <div class="modal-header">
           <h4>confirm your payment</h4>
        </div>
        <div class="modal-body">
          
            
              <div class="form-group">
                   <label>Date</label>
                  <input type="date" class="form-control" placeholder="Payment Date(d-m-y)" name="date" id="date">
              </div>



              <div class="form-group">
                   <label>Transfer Details</label>
                  <input type="text" class="form-control" name="details_no" id="details_no" placeholder="eg:memo/teller_no/transfer-ref_no">
              </div>

              <div class="form-group">
                  <label>Amount Paid</label>
                  <input type="text" class="form-control" name="amount_paid" id="amount_paid" placeholder="Amount paid">
              </div>

              <div class="form-group">
                  <label>Depositor Name</label>
                <input type="text" class="form-control" name="depositor_name" id="depositor_name" placeholder="eg:john eze">
              </div>

              <input type="hidden" name="purchase_id" value="{{$pm->id}}">
            
          
          <div class="form-group">
            <label>Upload Receipt(2mb JPG,PNG,PDF format only)</label>
            <input type="file" name="receipt_dir">
          </div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal" style="margin-top: 0">Close</button>
          <input type="submit" name="confirm_btn" value="OK" class="btn btn-primary">
        </div>


      </div>
    </form>
    
   

