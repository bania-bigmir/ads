@if($ads)
@foreach($ads as $ad)

<div class="card flex-md-row mb-4 box-shadow h-md-250">
    <div class="card-body d-flex flex-column align-items-start">
        <h3 class="mb-0">
            <a class="text-dark" href="{{url($ad->id)}}">{{$ad->title}}</a>
        </h3> 
        <div class="mb-1 text-muted">{{$ad->created_at->format('M d, Y H:i:s')}} by {{$ad->user->username}}</div>
        <p class="card-text mb-auto">{{$ad->description}}</p>
        <div class="btn-group" role="group">            
            <a href="{{url($ad->id)}}" class="btn btn-outline-info">Continue reading</a>            
           
                @if($ad->user->id == Auth::id())
                {!! Form::open(['url' => "/delete/$ad->id",'method' => 'POST']) !!}
                {!!Form::submit('delete',['class' => 'btn btn-outline-danger']);!!}
                {!! Form::close() !!}
                @endif    
                
        </div>
    </div>  
</div>

@endforeach
{{$ads->render()}}
@endif








