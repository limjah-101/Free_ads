@extends('backend.layout.master')
@section('content')

<div class="main-panel">
    <div class="content-wrapper">
        <div class="card">
            @if($message = Session::get('success'))
                <span class="alert alert-success">{{ $message }}</span>
            @endif
            <div class="card-body">
                <?php
                    $inc = 1;
                    $categories = DB::table('categories')->get();
                ?>

                <h4 class="card-title">TOUTES LES CATEGORIES</h4>
                <div class="row">
                    <div class="col-12">
                        <div class="table-responsive">
                            <table id="order-listing" class="table">
                                <thead>
                                <tr>
                                    <th>ID's</th>
                                    <th>LISTE DES CATEGORIES</th>
                                    <th>ACTIONS</th>                        
                                </tr>
                                </thead>
                                <tbody> 
                                @if($categories)                  
                                    @foreach($categories as $category)
                                    <tr>
                                        <td>{{ $inc++ }}</td>
                                        <td>{{ $category->category_name }}</td>                                            
                                        <td>                                                                        
                                            <a href="{{ URL::to('/admin/edit-category/' . $category->id) }}" class="btn btn-outline-secondary">Modif</a>
                                            <a href="{{ URL::to('/admin/delete-category/' . $category->id) }}" class="btn btn-outline-danger">Suppr</a>
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
</div>
@endsection