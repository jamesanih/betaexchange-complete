
<div id="delete_pm_modal" class="modal fade" tabindex="-1" role="dialog" aria-labellby="myModalLabel" aria-hidden="true">
  @foreach($sell_pm as $data)
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4>Delete Order</h4>
      </div>
        <div class="modal-body">
         
          Do You Really want canel this Sales
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-xm btn-danger waves-effect" data-dismiss="modal">Close</button>
          <a href="{{route('pm_delete_sell', ['id'=>$data->id])}}" class="btn btn-xm btn-primary waves-effect">Ok</a>
        </div>

             
    </div>
  </div>
  @endforeach
</div>



<div id="delete_modal" class="modal fade" tabindex="-1" role="dialog" aria-labellby="myModalLabel" aria-hidden="true">
  @foreach($modal_user as $data)

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
          <a href="{{route('pm_delete_order', ['id'=>$data->id])}}" class="btn btn-xm btn-primary waves-effect">Ok</a>
        </div>

             
    </div>
  </div>
  @endforeach
</div>

