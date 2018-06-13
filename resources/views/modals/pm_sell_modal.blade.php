 <form method="post" action="{{route('confirm_sell_pm')}}" role="form" id="confirm_sell_bitcoin">
          {{csrf_field()}}
      <div class="modal-content">
        <div class="modal-header">
           <h4>confirm your payment</h4>
        </div>
        <div class="modal-body">
          
            
              <div class="form-group">
                   <label>Date Sent</label>
                  <input type="date" class="form-control" placeholder="Payment Date(d-m-y)" name="date_sent" id="date_sent">
              </div>

              <input type="text" name="purchase_id" value="{!! $sold_pm->id !!}">

              <div class="form-group">
                   <label>Batch Number</label>
                  <input type="text" class="form-control" name="batch_number" id="batch_number" placeholder="">
              </div>

              <div class="form-group">
                  <label>Amount sent</label>
                  <input type="text" class="form-control" name="amount_sent" id="amount_sent" placeholder="Amount sent">
              </div>

              <div class="form-group">
                  <label>Wallet ID</label>
                <input type="text" class="form-control" name="wallet_id" id="wallet_id" placeholder="Enter your Wallet ID">
              </div>
              
             <!--  -->
            
          
          
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal" style="margin-top: 0">Close</button>
          <input type="submit" name="confirm_btn" value="OK" class="btn btn-primary">
        </div>


      </div>
    </form>
    



