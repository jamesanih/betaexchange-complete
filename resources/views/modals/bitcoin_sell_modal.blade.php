@foreach($sell_bit as $data)
<div id="delete_bit_modal" class="modal fade" tabindex="-1" role="dialog" aria-labellby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4>Delete Order</h4>
      </div>
        <div class="modal-body">
         
          Do You Really want canel this order
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-xm btn-danger waves-effect" data-dismiss="modal">Close</button>
          <a href="{{route('delete_bitcoin_sell', ['id'=>$data->id])}}" class="btn btn-xm btn-primary waves-effect">Ok</a>
        </div>

             
    </div>
  </div>
</div>

@endforeach

