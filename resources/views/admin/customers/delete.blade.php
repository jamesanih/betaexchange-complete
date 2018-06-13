  {!! Form::open(array('url' => '/administrator/customer/'. $user->id)) !!}
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Delete Customer</h4>
      </div> 
      <div class="modal-body"  style="padding-left:50px;padding-right:50px;">
       {!! Form::hidden('_method', 'DELETE') !!}
                                  <h3>Do you really want to Remove this customer?</h3>
      </div>
      <div class="modal-footer">
        <button style="margin-top: 0" type="button" class="btn btn-default" data-dismiss="modal">No</button>
        {!! Form::submit('Yes',['class'=>'btn btn-warning']) !!}
      </div>
      {!! Form::close() !!}