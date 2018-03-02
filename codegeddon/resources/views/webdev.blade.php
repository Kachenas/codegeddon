@extends('layouts.app2Layout')

@section('title')
    CODEgeddon
@endsection


@section('content')


<div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-10 col-md-10 col-lg-10">
            <h3>Related topics for this Category</h3>
        </div>
        <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2">
          <div class="panel-heading">Let's get Going</div>
                <div class="panel-body">
                    <a href="/category/{{ $categories->id}}/create/"><button class="btn btn-success">Raise a Topic for this Category</button></a>
                </div>
        </div>
    </div>
</div>
<div class="filler">
  <div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-10 col-md-10 col-lg-10">
             @foreach ($topics as $topic)

             @if($topic->topic_cat == $cat_id)
            <div class="well well-lg">
            <h3>{{$topic->topic_subject}}</h3><br>

            Posted By: {{$topic->user_topic->firstName}}<br>

            Posted Last: {{ $topic->updated_at->diffForHumans() }}<br>

            @if($topic->topic_by == Auth::user()->id)
            <button class="btn btn-primary" data-toggle="modal" data-target="#editModal{{$topic->id}}"><i class="fa fa-btn fa-edit"></i>Edit</button>
            <button class="btn btn-danger" data-toggle="modal" data-target="#deleteModal{{$topic->id}}"><i class="fa fa-btn fa-trash"></i>Delete</button>
            @endif
            <hr>
              <h4>Comments</h4>
              @foreach($posts as $post)
              @if($topic->id == $post->id && $post->id == $post->post_topic)
              <div class="answer">
                <p>{{$post->post_content}}</p>
                <p>Comment By: {{$post->user_post->firstName}}, last {{$post->updated_at->diffForHumans() }}</p>
                @if($post->post_by == Auth::user()->id)
               <button class="btn btn-primary" data-toggle="modal" data-target="#editModalPost{{$post->id}}"><i class="fa fa-btn fa-edit"></i>Edit Comment</button>
                <a href=""><i class="fa fa-btn fa-trash"></i>Delete Comment</a>
                @endif
              </div>
              @endif
              <!-- Modal For Edit Posts-->
           <div id="editModalPost{{$post->id}}" class="modal fade" role="dialog">
              <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Your Comment</h4>
                  </div>
                  <div class="modal-body">
                    <form action="{{ url('/comment/'.$post->id.'/edit')}}" method="POST" class="form-horizontal">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="post_subject" class="col-sm-3 control-label">Edit Comment</label>

                            <div class="col-sm-8">
                                <div class="col-sm-10">
                                <textarea class="form-control" rows="5" id="post_content" name="post_content" value="">{{ $post->post_content }}</textarea>
                                </div>
                            </div>
                        </div>
                        <input type="text" name="post_id" value="{{$post->id}}" hidden>
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-6">
                                <button type="submit" class="btn btn-default">
                                    <i class="fa fa-btn fa-plus"></i>Save
                                </button>
                            </div>
                        </div>
                    </form>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  </div>
                </div>

              </div>
            </div>
              @endforeach
            <hr>
                  <label for="reply"><b>Your Reply</b></label>
                  <textarea class="form-control" rows="5" id="post_content" name="post_content" required></textarea>
                  <button type="submit" id="postAnswer" data-id="{{$topic->id}}" class="btn btn-success">Submit Answer</button>
           </div>
           @endif
           <!-- Modal For Edit Topics-->
           <div id="editModal{{$topic->id}}" class="modal fade" role="dialog">
              <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Edit Topic</h4>
                  </div>
                  <div class="modal-body">
                    <form action="{{ url('/category/'.$topic->id.'/edit')}}" method="POST" class="form-horizontal">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="topic_subject" class="col-sm-3 control-label">Change Question</label>

                            <div class="col-sm-8">
                                <div class="col-sm-10">
                                <textarea class="form-control" rows="5" id="topic_subject" name="topic_subject" value="">{{ $topic->topic_subject }}</textarea>
                                </div>
                            </div>
                        </div>
                        <input type="text" name="category_id" value="{{$cat_id}}" hidden>
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-6">
                                <button type="submit" class="btn btn-default">
                                    <i class="fa fa-btn fa-plus"></i>Save
                                </button>
                            </div>
                        </div>
                    </form>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  </div>
                </div>

              </div>
            </div>
            <!-- Modal for delete topics-->
             <div id="deleteModal{{$topic->id}}" class="modal fade" role="dialog">
              <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Are you sure you want to delete this topic? </h4>
                  </div>
                  <div class="modal-body">
                    <form action="{{ url('/category/'.$topic->id.'/delete')}}" method="GET" class="form-horizontal">
                        {{ csrf_field() }}
                        <div class="form-group">
                        <input type="text" name="category_id" value="{{$cat_id}}" hidden>
                          
                             <div class="container">
                                <div class="row">
                                  <div class="col-sm-6">
                                    {{ $topic->topic_subject }}.
                                  </div>
                                </div>
                             </div>
                                
                                
                        </div>
                        <input type="text" name="category_id" value="{{$cat_id}}" hidden>
                        <div class="form-group">
                            <div class="col-sm-6">
                                <button type="submit" class="btn btn-default">
                                    <i class="fa fa-btn fa-plus"></i>Delete
                                </button>
                            </div>
                        </div>
                    </form>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  </div>
                </div>

              </div>
            </div>
            @endforeach
        </div>        
    </div>
</div>

</div>

<script type="text/javascript">
    $('#postAnswer').click(function() {
            var id = $(this).data('id');
            var comment = $('#post_content').val();
            console.log(comment);
            $.ajax({
                url: '/comment/'+id,
                type: 'POST',
                data: {
                    _token : "{{ csrf_token() }}",
                     comment : comment
                },
                success:function(data) {
                    console.log(data);
                   $('.answer').append('<p>'+data.comment+'</p>');
                }
            });
        });

</script>


@endsection
