
@extends('client.layout.master')

@section('title')
	Free Ads | Produits
@endsection

 @section('content')
	
    <div class="hero-wrap hero-bread" style="background-image: url( {{ asset('client/images/bg_1.jpg') }} );">
		<div class="container">
			<div class="row no-gutters slider-text align-items-center justify-content-center">
			<div class="col-md-9 ftco-animate text-center">
				<p class="breadcrumbs">
					<span class="mr-2"><a href="{{ URL::to('/') }}">Acceuil</a></span> 
					<span class="text-dark"><?php echo substr($_SERVER['REQUEST_URI'], 9) ?></span>
				</p>
				<h1 class="mb-0 bread">Produits</h1>
			</div>
			</div>
		</div>
    </div>

    <section class="ftco-section">
    	<div class="container">
    		<div class="row justify-content-center">
    			<div class="col-md-10 mb-5 text-center">
				
					<?php $categories = DB::table('categories')->get(); ?>
    				<ul class="product-category">
						<li><a href="{{ URL::to('/shop') }}" class="active">Produits</a></li>
						@if($categories)
							@foreach($categories as $categorie)
								<li><a href="{{ URL::to('/product/' .  $categorie->category_name) }}">{{ $categorie->category_name }}</a></li>	
							@endforeach
						@endif						
    				</ul>
    			</div>
    		</div>
    		<div class="row">
				
				@if($products)
				@foreach($products as $product)
					<div class="col-md-6 col-lg-3 ftco-animate">
						<div class="product">
							<a href="#" class="img-prod">
								<img class="img-fluid" src="/storage/cover_images/{{ $product->product_image }}" alt="Colorlib Template">
								<span class="status">30%</span>
								<div class="overlay"></div>
							</a>
							<div class="text py-3 pb-4 px-3 text-center">
								<h3><a href="#">{{ $product->product_name }}</a></h3>
								<div class="d-flex">
									<div class="pricing">
										<p class="price">
											<?php $reduc = $product->product_price + 2; ?>
											<span class="mr-2 price-dc">&euro;{{ $reduc }}.90</span>
											<span class="price-sale">{{ $product->product_price }}.90&euro; le Kg</span>
										</p>
									</div>
								</div>
								<div class="bottom-area d-flex px-3">
									<div class="m-auto d-flex">
										<a href="#" class="add-to-cart d-flex justify-content-center align-items-center text-center">
											<span><i class="ion-ios-menu"></i></span>
										</a>
										<a href="#" class="buy-now d-flex justify-content-center align-items-center mx-1">
											<span><i class="ion-ios-cart"></i></span>
										</a>
										<!-- <a href="#" class="heart d-flex justify-content-center align-items-center ">
											<span><i class="ion-ios-heart"></i></span>
										</a> -->
									</div>
								</div>
							</div>
						</div>
					</div>   
				@endforeach
				@endif  			
    		</div>
    		<div class="row mt-5">
          <div class="col text-center">
            <div class="block-27">
              <ul>
                <li><a href="#">&lt;</a></li>
                <li class="active"><span>1</span></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>
                <li><a href="#">5</a></li>
                <li><a href="#">&gt;</a></li>
              </ul>
            </div>
          </div>
        </div>
    	</div>
    </section>

	
@endsection