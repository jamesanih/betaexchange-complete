
<div class="modal-content">
@if(isset($blog))
     {!! Form::model($blog, array('route' => array('blog.update', $blog->id), 'method' => 'PUT')) !!}
@else
    {!! Form::open(array('url' => '/administrator/blog')) !!}
@endif

        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">{!! $page_title !!} Post</h4>
        </div>
        <div class="modal-body">
         
            <div class="form-group">
            {!! Form::label('title', 'Title:') !!}
            {!! Form::text('title', null,['class' => 'form-control','required'=>'required']) !!}
            </div>
           
         <div class="form-group">
          {!! Form::label('content', 'Content:') !!}
          {!! Form::textarea('content', null,['class' => 'form-control','rows'=>'20','cols'=>'80','id'=>'content']) !!}
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">{!! $page_action !!}</button>

        </div>
   {!! Form::close() !!}
</div>
          <script>
      $('#content').summernote({
        toolbar:[
        ['style',['style']],['font',['bold','italic','underline','clear']],
        ['fontname',['fontname']],['fontsize',['fontsize']],
        ['color',['color']],['para',['ul','ol','paragraph']],
        ['height', ['height']],
    ['table', ['table']],
    ['insert', ['link', 'picture', 'hr']],
    ['view', ['fullscreen', 'codeview']],
    ['help', ['help']]
        ],
  height: 300,                 // set editor height
  minHeight: null,             // set minimum height of editor
  maxHeight: null,             // set maximum height of editor
  focus: true,
  fontSizes: ['8','9','10','11','12','14','18','24',
        '36','48','64','82','150']
});
    </script>
     