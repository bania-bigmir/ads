@if(isset($ad))
<div class="blog-main"> 
    
    <div class="jumbotron">
        <h2 class="blog-post-title">{{$ad->title}}</h2>
        <p class="blog-post-meta">{{$ad->created_at->format('M d, Y H:i:s')}} by {{$ad->user->username}}</p>
        <p class="lead">{{$ad->description}}</p>
    </div>
    
    <div class="row">        
        <div class="col-md-3">
            
            <a href="{{(url()->previous() != url('/edit/'.$ad->id).'?' and (url()->previous() != url('/edit'))) ?  url()->previous() : route('home') }}" class="btn btn-outline-info">Return</a>
        </div>
        
        @if($ad->user->id == Auth::id())
        <div class="col-md-3">
            {!! Form::open(['url' => "/edit/$ad->id",'method' => 'get']) !!}
            {!!Form::submit('Edit',['class' => 'btn btn-outline-warning']);!!}
            {!! Form::close() !!}
        </div>        
        <div class="col-md-3">
            {!! Form::open(['url' => "/delete/$ad->id",'method' => 'POST']) !!}
            {!!Form::submit('Delete',['class' => 'btn btn-outline-danger']);!!}
            {!! Form::close() !!}
        </div>        
        @endif 
        
    </div>
</div>
@endif
