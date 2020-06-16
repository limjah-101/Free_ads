@extends('backend.layout.master')
@section('content')

<div class="main-panel">
    <div class="content-wrapper">
        <div class="card">
        @if($message = Session::get('success'))
            <span class="alert alert-success">{{ $message }}</span>
        @endif
        <div class="card-body">
            <h4 class="card-title">Sliders</h4>
            <div class="row">
            <div class="col-12">
                <div class="table-responsive">
                <table id="order-listing" class="table">
                    <thead>
                    <tr>
                        <th>ID #</th>
                        <th>IMAGES</th>
                        <th>TITRE</th>
                        <th>SOUS TITRE</th>
                        <th>STATUS</th>
                        <th>ACTIONS</th>                        
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                        $inc = 1;
                        $sliders = DB::table('sliders')->get();
                    ?>
                    @if($sliders)
                        @foreach($sliders as $slider)
                            <tr>
                                <td>{{ $inc++ }}</td>
                                <td>
                                    <img src="/storage/cover_images/{{ $slider->images }}" alt="">
                                </td>
                                <td>{{ $slider->title }}</td>
                                <td>{{ $slider->subtitle }}</td>                                                                      
                                @if($slider->status == 1)
                                    <td>
                                        <label class="badge badge-info">On</label>
                                    </td>
                                @else
                                    <td>
                                        <label class="badge badge-danger">Off</label>
                                    </td>
                                @endif
                                <td>
                                    <button class="btn btn-outline-primary">Modifier</button>                                    
                                    <a href="{{ URL::to('/admin/delete-slider/' . $slider->id) }}" class="btn btn-outline-danger">Suppr</a>
                                @if($slider->status == 1)                                        
                                    <a href="{{ URL::to('/admin/slider-off/' . $slider->id) }}" class="btn btn-outline-warning">Désactiver</a>
                                                                           
                                @else 
                                    <a href="{{ URL::to('/admin/slider-on/' . $slider->id) }}" class="btn btn-outline-info">Activer</a>                                       
                                    
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