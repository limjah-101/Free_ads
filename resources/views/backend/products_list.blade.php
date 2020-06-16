@extends('backend.layout.master')
@section('content')

<div class="main-panel">
    <div class="content-wrapper">
        <div class="card">
            @if($message = Session::get('success'))
                <span class="alert alert-success">{{ $message }}</span>
            @endif
            <div class="card-body">                
                <h4 class="card-title">PRODUCTS</h4>
                <div class="row">
                    <div class="col-12">
                        <div class="table-responsive">
                            <table id="order-listing" class="table">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>PHOTO</th>
                                    <th>NOM</th>
                                    <th>PRIX</th>
                                    <th>CATEGORIE</th>
                                    <th>STATUS</th>  
                                    <th>ACTIONS</th>                        
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                    $inc = 1;
                                    $products = DB::table('products')->get();
                                ?>
                                @if($products)
                                    @foreach($products as $product)
                                        <tr>
                                            <td>{{ $inc++ }}</td>
                                            <td>
                                                <img src="/storage/cover_images/{{ $product->product_image }}" alt="">
                                            </td>
                                            <td>{{ $product->product_name }}</td>
                                            <td>{{ $product->product_price }} &euro;</td>
                                            <td>{{ $product->product_category }}</td>                                        
                                            @if($product->product_status == 1)
                                                <td>
                                                    <label class="badge badge-info">On</label>
                                                </td>
                                            @else
                                                <td>
                                                    <label class="badge badge-danger">Off</label>
                                                </td>
                                            @endif
                                            <td>
                                                
                                                <a href="{{ URL::to('/admin/edit-product/' . $product->id) }}" class="btn btn-outline-secondary">Modif</a>
                                                <a href="{{ URL::to('/admin/delete-product/' . $product->id) }}" class="btn btn-outline-danger">Suppr</a>
                                            @if($product->product_status == 1)                                        
                                                <a href="{{ URL::to('/admin/product-off/' . $product->id) }}" class="btn btn-outline-warning">Désactiver</a>
                                            @else                                        
                                                <a href="{{ URL::to('/admin/product-on/' . $product->id) }}" class="btn btn-outline-info">Activer</a>                              
                                            @endif
                                            </td>
                                        </tr> 
                                    @endforeach 
                                @endif                  
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- content-wrapper ends -->
    <!-- partial:../../partials/_footer.html -->        
</div>
@endsection