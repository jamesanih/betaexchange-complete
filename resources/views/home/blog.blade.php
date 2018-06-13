@extends('layouts.main_master')

@section('content')

<!--header end here-->
<!--features strat here-->
<div class="features">
	<div class="container">
    

                        <table id="dataTable1">
       
                      <tbody>
 <!-- Blog item starts --> @if (count($posts))
                             @foreach ($posts as $post)
                              <tr>
                        <td>
                             <hr>
                                <div class="blog-one-item">
                                    <!-- blog One Img -->
                                    <div class="blog-one-img">

                                    </div>
                                    <!-- blog One Content -->
                                    <div class="blog-one-content">
                                        <!-- Heading -->
                <h3><a href="/full_post/{!! $post->id !!}">{!! $post->title !!}</a></h3>
                                        <!-- Blog meta -->
                                        <div class="blog-meta">
                                            <!-- Date -->
                                            <a href="/{!! $post->id !!}"><i class="fa fa-calendar"></i> &nbsp; {!! $post->published_date !!}</a> &nbsp; 
                                            <!-- Author -->
                <a href="/full_post/{!! $post->id !!}"><i class="fa fa-user"></i> &nbsp; {!!$post->user->first_name !!} {!!$post->user->last_name !!}</a> &nbsp;
                                            <!-- Comments -->
                      <a href="/full_post/{!! $post->id !!}"><i class="fa fa-comments"></i> &nbsp; {!! count($post->comments) !!} Comments</a>
                                        </div>
                                        <!-- Paragraph -->
                                        <p class="well">{!! substr($post->content, 0, 1000); !!}
                                        <br><a href="/full_post/{!! $post->id !!}"><strong>Read More</strong></a></p>
                                    </div>
                                </div>
                            </td>
                       
                    </tr>


                                                @endforeach
                         
                           @endif
                           </tbody>
                           </table>
    

	</div>
    
    </div>
    
    

    
    

        
        
        
	</div>



@endsection
