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
                    <div class="panel-heading">Post a Topic/Question</div>

                    <div class="panel-body">
                     <form class="form-horizontal" method="POST" action="{{url('category/{id}/save')}}">
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('topic_subject') ? ' has-error' : '' }}">
                            <label class="control-label col-sm-2" for="topic_content">Enter Here:</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" rows="5" id="topic_content" name="topic_content" required></textarea></div>
                                <input type="text" name="topic_id" value="{{ $topic_id }}" hidden>
                                @if ($errors->has('topic_subject'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('topic_subject') }}</strong>
                                    </span>
                                @endif                  
                            </div>
                            <input type="text" name="html" value="1" hidden>
                            <div class="form-group"> 
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-success">Post</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection
