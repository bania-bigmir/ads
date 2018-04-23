@if(count($ads)>0)
<div class="page-header"><h2>List of ads</h2></div>
@foreach($ads as $ad)

<div class="card flex-md-row mb-4 box-shadow h-md-250">
    <div class="card-body d-flex flex-column align-items-start">
        <h3 class="mb-0">
            <a class="text-dark" href="{{url($ad->id)}}">{{$ad->title}}</a>
        </h3> 
        <div class="mb-1 text-muted">{{$ad->created_at->format('M d, Y H:i:s')}} by {{$ad->user->username}}</div>
        <p class="card-text mb-auto">{{$ad->description}}</p>
        <div class="row">
            <div class="col-md-6">
                <a href="{{url($ad->id)}}" class="btn btn-outline-info">Continue reading</a>            
            </div>

            @if($ad->user->id == Auth::id())
            <div class="col-md-3">
                {!! Form::open(['url' => "/edit/$ad->id",'method' => 'get']) !!}
                {!!Form::submit('edit',['class' => 'btn btn-outline-warning']);!!}
                {!! Form::close() !!}
            </div>
            <div class="col-md-3">
                {!! Form::open(['url' => "/delete/$ad->id",'method' => 'POST']) !!}
                {!!Form::submit('delete',['class' => 'btn btn-outline-danger']);!!}
                {!! Form::close() !!}
            </div>
            @endif    

        </div>
    </div>  
</div>

@endforeach
{{$ads->render()}}
@else
<h1><small>There are no ads yet. Be the first to create it</small></h1>
@endif








