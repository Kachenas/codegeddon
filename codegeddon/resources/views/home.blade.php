@extends('layouts.app2Layout')

@section('title')
    CODEgeddon
@endsection


@section('content')

<div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
            <div class="panel panel-default">
                <div class="panel-heading">Welcome, {{ Auth::user()->firstName }}</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    Registered on:  {{ Auth::user()->updated_at }} <br>
                    Registered :  {{ Auth::user()->updated_at->diffForHumans() }}
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
            <div class="panel-heading">Let's get Going</div>

                <div class="panel-body">
                    <a href="{{url('/create')}}"><button class="btn btn-success">Create a New Category</button></a>

                </div>
        </div>
    </div>
</div>



<div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">

                 @foreach ($categories as $category)
                <!-- {{$i='0'}} -->
            <div class="panel panel-default">
               
                <div class="panel-heading clearfix">
                    <div class="pull-left"><span class="glyphicon glyphicon-modal-window" aria-hidden="true"></span><a href='{{url("/category/$category->id")}}'>{{$category->category_name}}
               
               @foreach($category->show_topics as $x)
               @if($x->topic_cat == $category->id)
               <!-- {{$i++}} -->
               @endif
               @endforeach
               <br></a></div><div class="pull-right"><span class="for-show-post label label-success badge">{{$i}}</span> topic</div></div>
                
                <div class="panel-body">
                  
                            
                   <div class="well well-lg">
                        {{$category->category_description}}
                        
                   </div>                                   
                    
                </div>
            </div>
                
                
                @endforeach
        </div>
        <!-- start of second column -->
        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
            <div class="panel panel-default">
                <div class="panel-heading">Please Read</div>
                <div class="panel-body">            
                        <a href="#" data-toggle="modal" data-target="#modalBulletin">Bulletin</a><br>
                        <a href="#" data-toggle="modal" data-target="#modalGuide">Guide</a><br>
                        <a href="#" data-toggle="modal" data-target="#modalContest">Contest</a><br>
                    </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal For Bulletin -->
<div id="modalBulletin" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Bulletins</h4>
      </div>
      <div class="modal-body">
        <p>Kindly read this bulletins for latests events!</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<!-- Modal For Guides -->
<div id="modalGuide" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Guides</h4>
      </div>
      <div class="modal-body">
        <p>PLEASE TAKE TIME TO READ</p>
        <p>1. Please don't post unrelated topics to the site. The site is made for beginners,professional who 
        have some problem abuot their code and needs advice or solutions to their problem</p>
        <p>2. All people started being a noob at something so we should respect other questions,BUT please be sure to research
        first.</p>
        <P>3. Please search and check other topics that may be related to avoid posting same questions twice.</P>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<!-- Modal For Contest -->
<div id="modalContest" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Contests</h4>
      </div>
      <div class="modal-body">
        <p>Will be posting a contest winner soon!</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>




@endsection
