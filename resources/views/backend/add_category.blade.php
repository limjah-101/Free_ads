@extends('backend.layout.master')
@section('content')

<div class="content-wrapper">
    <div class="row grid-margin">
        <div class="col-lg-12">
            <div class="card">
                @if($message = Session::get('success'))
                    <span class="alert alert-success">{{ $message }}</span>
                @endif
            <div class="card-body">

                <h4 class="card-title">Add Category</h4>
                
                {{ Form::open(['action' => 'CategoryController@create', 'method' => 'POST', 'enctype' => 'multipart/form-data']) }}
                <fieldset>
                    <div class="form-group">
                        <label for="cname">Name</label>
                        <input id="cname" class="form-control" name="category_name" minlength="2" type="text" required>
                    </div>
                   
                    {{ Form::submit('Add Category', ['class' => 'btn btn-primary']) }}
                </fieldset>
                {{ Form::close() }}
            </div>
            </div>
        </div>
    </div>
</div>
@endsection