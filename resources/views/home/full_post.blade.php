@extends('layouts.main_master')

@section('content')
<!--header end here-->
<!--about start here-->
<div class="single">
    <div class="container">
        <div class="single-top wow bounceInLeft" data-wow-delay="0.3s">
            
         
                                <!-- Blog item starts -->
                                <div class="blog-two-item">
                                    <!-- blog two Content -->
                                    <div class="blog-two-content">

                                        <!-- Heading -->
                                       <h3><a href="/full_post/{!! $post->id !!}">{!! $post->title !!}</a></h3>
                                      <!-- Blog meta -->
                                        <div class="blog-meta">
                                            <!-- Date -->
                                            <a href="/full_post/{!! $post->id !!}"><i class="fa fa-calendar"></i> &nbsp; {!! $post->publish_date !!}</a> &nbsp; 
                                            <!-- Author -->
                                            <a href="/full_post/{!! $post->id !!}"><i class="fa fa-user"></i> &nbsp; {!!$post->user->first_name !!} {!!$post->user->last_name !!}</a> &nbsp;
                                            <!-- Comments -->
                                <a href="/full_post/{!! $post->id !!}#comment_container"><i class="fa fa-comments"></i> &nbsp; {!! count($post->comments) !!} Comments</a>
                                        </div>
                                               
                                        
                                        <!-- Paragraph -->
                                        <p class="well">{!! $post->content !!}</p>
                                    </div>
                                </div>
                                <!-- Blog item ends -->
                                

                                
                                <!-- Comments section -->
                                <div class="blog-comments" id="comment_container">
            <h4><i class="fa fa-comments color"></i>&nbsp; {!! count($post->comments) !!} Comments</h4>
                                    <hr />
                                    

                              @if (count($post->comments))
                             @foreach ($post->comments as $comment)
                    
                                    <!-- Blog comment item -->
                   <div class="blog-comment-item">
                <div class="comment-author-image">
                    <a href="#">
         <img src="{{ URL::to('images/male.png') }}" alt="profile-picture"  class="img-responsive img-thumbnail" style="width: 50px;" />
                    
                    </a>
                    </div>
                    <div class="comment-details">
                                            <!-- Name -->
                    <h5>{!!$comment->full_name !!}<small>  {!! $comment->created_at !!}</small></h5>
                                            <!-- Paragraph -->
                                            <p>{!! $comment->content !!} </p>
                        </div>
                    </div>
                @endforeach                             
                                    
                        @endif              
                                </div>
                                
                                <br />
                                
                                <!-- Comment Form -->
                                <div class="well">
                                    <!-- Heading -->
                                    <h4><i class="fa fa-comments color"></i>&nbsp; Post Comment</h4><!-- Form -->
                                    <hr />
               {!! Form::open(array('url' => '/post/comment')) !!}
                        <input id="post_id" name="post_id" type="hidden" data-post-id='{!! $post->id !!}' value="{!! $post->id !!}">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
            <input type="text" class="form-control"  value="Re: {!! $post->title !!}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                <input type="text" name="full_name" id="full_name" class="form-control" required="required"  placeholder="Enter your full name">
                                                </div>
                <div class="form-group">
                <input type="email" name="email" id="full_name" class="form-control" placeholder="Enter your emailaddress (optional)">
                                                </div>
                                        <div class="form-group">
                <textarea class="form-control" name="content" id="content" rows="7" placeholder="Enter Message" required="true"></textarea>
                                        </div>
                                        <!-- Button -->
                <button type="submit" class="btn btn-color" id="save">Submit</button>&nbsp;
                <button type="reset" class="btn btn-white">Reset</button>
                                    {!! Form::close() !!}
                                </div>


                 
        </div>
        
        
    </div>      
</div>
<!--about end here-->




@endsection
