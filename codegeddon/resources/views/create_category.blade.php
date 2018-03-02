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
                    <div class="panel-heading">Create New Category</div>

                    <div class="panel-body">
                     <form class="form-horizontal" method="POST" action="{{url('categories/save')}}">
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('category_name') ? ' has-error' : '' }}">
                            <label class="control-label col-sm-2" for="name_category">Category:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="name_category" name="name_category" required>
                                @if ($errors->has('category_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('category_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('category_description') ? ' has-error' : '' }}">
                            <label class="control-label col-sm-2" for="category_description">Description:</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" rows="5" id="category_description" name="category_description" required></textarea></div>
                                 @if ($errors->has('category_description'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('category_description') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group"> 
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-default">Submit</button>
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
