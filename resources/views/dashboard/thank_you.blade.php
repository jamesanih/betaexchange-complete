@extends('layouts.main_master')

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
                    <h3 class="display-3">Thank You for Your Order!</h3>
                    <p class="lead"><strong>Please check your email</strong> for further instructions on how to complete the transaction.</p>
                    <hr>
                    <p class="lead">
                      <a class="btn btn-primary btn-sm" href="/" role="button">Continue to homepage</a>
                    </p>
                </div>
              
            </div>
       
        </div>
    </div>
</div>

<!--about end here-->
@endsection
