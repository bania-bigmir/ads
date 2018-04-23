<div class="row">
    <div class="col-md-12">
        
        @if(isset($ad))
        <div class="page-header">
        <h2>Edit ad</h2>
        </div>
        {!! Form::model($ad, ['url' => "/edit/$ad->id",'method' => 'put']) !!}
        @else
        <div class="page-header">
        <h2>Create ad</h2>
        </div>
        {!! Form::open(['url' => "/edit",'method' => 'POST']) !!}
        @endif

        {!! Form::label('title','Title') !!}


        {!! Form::text('title',null,['class' => 'form-control','required' => 'required']) !!}

        {!! Form::label('description','Description') !!}

        {!! Form::text('description',null,['class' => 'form-control','required' => 'required']) !!}
        <br/>
        <div class="row">
            @if(!isset($ad))
            <div class="col-md-3">
                {!! Form::submit('Create',['class' => 'btn btn-outline-primary']) !!}
            </div>
            {!! Form::close() !!}

            @else
            <div class="col-md-3">
                {!! Form::submit('Save',['class' => 'btn btn-outline-primary']) !!}
            </div>
            {!! Form::close() !!}
            <div class="col-md-3">
                {!! Form::open(['url' => "/delete/$ad->id",'method' => 'POST']) !!}
                {!!Form::submit('Delete',['class' => 'btn btn-outline-danger']);!!}
                {!! Form::close() !!}
            </div>

            @endif

            <div class="col-md-3">
                <a href="{{url()->previous('/')}}" class="btn btn-outline-info">Return</a>
            </div>
        </div>

    </div>
</div>
