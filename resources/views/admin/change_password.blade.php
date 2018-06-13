@extends('layouts.admin_master')

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

                <form role="form" method="POST" action="{{ url('/administrator/change-password') }}">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <input style="width: 200px" type="password" id="old_password" name="old_password" class="form-control" placeholder="Old Password"  required="required">
                        <br>
                        <input style="width: 200px" type="password" id="password" name="password" class="form-control" placeholder="New Password"  required="required"> 
                        <br>
                        <input style="width: 200px" type="password" id="password_confirmation" name="password_confirmation" class="form-control" placeholder="Confirm New Password" required="required">
                        <br>
                        <input style="width: 200px" type="password" id="secret_pin" name="secret_pin" class="form-control" placeholder="Enter Secret Pin" maxlength="4" required="required">
                    </div>
                    <br>
                    <input type="submit" name="submit" value="Submit" class="btn btn-primary">
                </form>
            </div>
              
            </div>
       
        </div>
    </div>
</div>

<!--about end here-->
@endsection
