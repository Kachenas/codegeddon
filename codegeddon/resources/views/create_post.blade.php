@extends('layouts.app2Layout')

@section('title')
    CODEgeddon
@endsection


@section('content')



<div class="filler">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Answer this Question: {{$post->topic_subject}}</div>
                    <div class="panel-body">
                        <div class="form-group{{ $errors->has('post_content') ? ' has-error' : '' }}">
                            <div class="col-sm-12">
                                <textarea class="form-control" rows="5" id="post_content" name="post_content" required></textarea></div>
                            </div>
                            <input type="text" name="html" value="1" hidden>
                             @if ($errors->has('post_content'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('post_content') }}</strong>
                                    </span>
                                @endif
                            <div class="form-group"> 
                                <div class="col-sm-10">
                                    <button type="submit" id="postAnswer" data-id="{{$post->id}}" class="btn btn-success">Submit Answer</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>



@endsection
