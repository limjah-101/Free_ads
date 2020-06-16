@extends('backend.layout.master')
@section('content')

<div class="content-wrapper">
    <div class="row grid-margin">
        <div class="col-lg-12">
            
                <h4 class="card-title">Edit Category</h4>
                
                {{ Form::open(['action' => 'CategoryController@update', 'method' => 'POST', 'enctype'=>'multipart/form-data']) }}
                <fieldset>
                    <div class="form-group">
                        <label for="cname">Name</label>
                        <input 
                            value="{{ $category->category_name }}"
                            id="cname" 
                            class="form-control" 
                            name="category_name" 
                            minlength="2" 
                            type="text" 
                            required>
                        <input 
                            value="{{ $category->id }}"
                            id="cname" 
                            class="form-control" 
                            name="category_id" 
                            minlength="2" 
                            type="hidden" >
                    </div>
                   
                    {{ Form::submit('Update Category', ['class' => 'btn btn-primary']) }}
                </fieldset>
                {{ Form::close() }}
            </div>
            </div>
        </div>
    </div>
</div>
@endsection