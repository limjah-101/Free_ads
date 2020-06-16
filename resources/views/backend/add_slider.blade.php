@extends('backend.layout.master')
@section('content')

<div class="content-wrapper">
    <div class="row grid-margin">
        <div class="col-lg-12">
            <div class="card">
            @if($message = Session::get('success'))
                    <span class="alert alert-success">{{ $message }}</span>
                @endif
                @if(count($errors) > 0)
                    <div class="alert alert-danger" role="alert">                            
                            @foreach($errors->all() as $error)
                            <span class="text-white">{{ $error }}</span>
                            @endforeach                            
                    </div>
                @endif
            <div class="card-body">
                <h4 class="card-title">Ajouter des Sliders</h4>

                {{ Form::open(['action' => 'SliderController@create', 'method' => 'POST', 'enctype' => 'multipart/form-data']) }}
                <form class="cmxform" id="commentForm" method="get" action="#">
                <fieldset>
                    <div class="form-group">
                        <label for="cname">Titre</label>
                        <input id="cname" class="form-control" name="title" minlength="2" type="text" required>
                    </div>
                    <div class="form-group">
                        <label for="cname">Sous Titre</label>
                        <input id="cname" class="form-control" name="subtitle" minlength="2" type="text" required>
                    </div>
                    <div class="form-group">
                        {{ Form::label('Image', 'Image', ['class' => 'cname']) }}
                        {{ Form::file('image', ['class' => 'form-control']) }}                       
                    </div>
                    <div class="form-group">
                        <label for="cname">Status</label>
                        <input id="cname"  type="checkbox" name="status" value="1" require>
                    </div>
                                        
                    {{ Form::submit('Ajouter', ['class' => 'btn btn-primary']) }}
                </fieldset>
                {{Form::close()}}
                </form>
            </div>
            </div>
        </div>
    </div>
</div>
@endsection