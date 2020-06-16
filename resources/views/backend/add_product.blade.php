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
                    <h4 class="card-title">Add Product</h4>
                    
                    {{ Form::open(['action' => 'ProductController@create', 'method' => 'POST', 'enctype' => 'multipart/form-data']) }}

                    <fieldset>
                        <div class="form-group">
                            <label for="cname">Name</label>
                            <input id="cname" class="form-control" name="product_name" minlength="2" type="text" >
                        </div>
                        <div class="form-group">
                            <label for="cemail">Price</label>
                            <input id="cemail" class="form-control" type="number" name="product_price"  min="0" required>
                        </div>
                        <div class="form-group">
                            <label for="curl">Select Category</label>
                            <select name="product_category" id="curl" class="form-control">
                                <?php 
                                    $categories = DB::table('categories')->get();
                                ?>
                                    <option id="curl" class="form-control" value="">Select Category</option>
                                    @foreach($categories as $category)
                                        <option>{{ $category->category_name }}</option>
                                    @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            {{ Form::label('Product_image', 'Product Image', ['class' => 'cname']) }}
                            {{ Form::file('product_image', ['class' => 'form-control']) }}                        
                        </div>
                        <div class="form-group">
                            <label for="cname">Product Status</label>
                            <input id="cname"  type="checkbox" name="product_status" value="1" require>
                        </div>
                                                            
                        {{ Form::submit('Add Product', ['class' => 'btn btn-primary']) }}
                    </fieldset>
                    
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection