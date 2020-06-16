@extends('backend.layout.master')
@section('content')

<div class="content-wrapper">
    <div class="row grid-margin">
        <div class="col-lg-12">
            <div class="card">
                
                <div class="card-body">
                    <h4 class="card-title">EDITER LE PRODUIT</h4>
                    
                    {{ Form::open(['action' => 'ProductController@update', 'method' => 'POST', 'enctype' => 'multipart/form-data']) }}

                    <fieldset>
                        <input value="{{ $product->id }}" name="product_id" type="hidden">
                        <div class="form-group">
                            <label for="cname">Produit</label>
                            <input value="{{ $product->product_name }}" id="cname" class="form-control" name="product_name" minlength="2" type="text">
                        </div>
                        <div class="form-group">
                            <label for="cemail">Prix</label>
                            <input value="{{ $product->product_price }}" id="cemail" class="form-control" type="number" name="product_price"  min="0" required>
                        </div>
                        <div class="form-group">
                            <label for="curl">Choisir une catégorie</label>
                            <select name="product_category" id="curl" class="form-control" value="{{ $product->product_category }}">
                                <?php 
                                    $categories = DB::table('categories')
                                                    ->where('category_name', '!=', $product->product_category)
                                                    ->get();
                                ?>
                                    <option id="curl" class="form-control" >{{$product->product_category}}</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->category_name }}">{{ $category->category_name }}</option>
                                    @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                        
                            {{ Form::label('Product_image', 'Photo du produit', ['class' => 'cname']) }}
                            {{ Form::file('product_image', ['class' => 'form-control']) }}                        
                        </div>
                        <div class="form-group">
                            <label for="cname">Status</label>
                            <input id="cname"  type="checkbox" name="product_status" value="1">
                        </div>                        
                                                            
                        {{ Form::submit('Modifier', ['class' => 'btn btn-primary']) }}
                    </fieldset>
                    
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection