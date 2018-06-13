@extends('layouts.user_master')

@section('content')
<!--header end here-->
<!--features strat here-->
<div class="features">
    <div class="container">
        <div class="row">

            <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
            @if (session('status'))
                    <div class="alert alert-success">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> {{ session('status') }}
                    </div>
            @endif

            <div style="margin-top: 60px; margin-bottom: 60px" class="jumbotron text-xs-center">
                <h3 class="display-3">Change Password</h3>
                @if ($errors->any())
                  <div class="alert alert-danger">
                      <ul>
                          @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                          @endforeach
                      </ul>
                  </div>
                @endif

                <form role="form" method="POST" action="{{ route('passwordrest') }}">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <input style="width: 200px" type="password" id="old_password" name="old_password" class="form-control" placeholder="Old Password"  required="required">
                        <br>
                        <input style="width: 200px" type="password" id="password" name="password" class="form-control" placeholder="New Password"  required="required"> 
                        <br>
                        <div style="display: flex; flex-direction: row">
                            <input style="width: 200px" type="password" id="password_confirmation" name="password_confirmation" class="form-control" placeholder="Confirm New Password" required="required">
                            <i style="margin-top:15px; margin-left:2px;" id="ok_msg2"></i>
                            <span style="margin-top:15px; margin-left:2px;"  class="text-danger" id="ferror_msg2"></span>
                        </div>
                        
                        <br>
                    </div>
                    <br>
                    <input type="submit" name="submit" value="Submit" class="btn btn-primary" id="submitbtn">
                </form>
            </div>
              
            </div>
       
        </div>
    </div>
</div>

<!--about end here-->
@endsection
@section('script')
    <script>
        $(function() {
            $('#ok_msg2').hide();
            $('#ferror_msg2').hide();

            
        $('#password_confirmation').on('keyup', function() {
            var pass = $('#password').val();
            var conf_pass = $('#password_confirmation').val();
            if(pass != conf_pass) {
                $('#ferror_msg2').show();
                $('#ferror_msg2').html("passwords don't match");
                $('#submitbtn').attr('disabled', true);
            } else {
                $('#ferror_msg2').hide();
                $('#ok_msg2').addClass('fas fa-check');
                $('#ok_msg2').show();
                $('#submitbtn').attr('disabled', false);
            }
        })

            
        })
    </script>
@stop
