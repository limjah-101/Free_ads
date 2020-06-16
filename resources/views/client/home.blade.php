@extends('client.layout.master')

@section('title')
	Free Ads | Accueil
@endsection

@section('content')

	<?php
		$sliders = DB::table('sliders')->where('status', 1)->get();
	?>
    <section id="home-section" class="hero">
		<div class="home-slider owl-carousel">

			@if($sliders)
		  		@foreach($sliders as $slider)
					<div class="slider-item" style="background-image: url(storage/cover_images/{{ $slider->images }});">
						<div class="overlay"></div>
						<div class="container">
						<div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">
							<div class="col-md-12 ftco-animate text-center">
							<h1 class="mb-2">{{ $slider->title }}</h1>
							<h2 class="subheading mb-4">{{ $slider->subtitle }}</h2>
							<p><a href="/shop" class="btn btn-primary">Voir les produits</a></p>
							</div>
						</div>
						</div>
					</div>
				@endforeach
			@endif	      
	    </div>
    </section>

    <section class="ftco-section">
		<div class="container">
			<div class="row no-gutters ftco-services">
				<div class="col-md-3 text-center d-flex align-self-stretch ftco-animate">
					<div class="media block-6 services mb-md-0 mb-4">
					<div class="icon bg-color-1 active d-flex justify-content-center align-items-center mb-2">
							<span class="flaticon-shipped"></span>
					</div>
					<div class="media-body">
						<h3 class="heading">Simple & rapide</h3>
						<span>Livraison offerte dès 50&euro; d'achat</span>
					</div>
					</div>      
				</div>
				<div class="col-md-3 text-center d-flex align-self-stretch ftco-animate">
					<div class="media block-6 services mb-md-0 mb-4">
					<div class="icon bg-color-2 d-flex justify-content-center align-items-center mb-2">
							<span class="flaticon-diet"></span>
					</div>
					<div class="media-body">
						<h3 class="heading">produits locaux</h3>
						<span>pour diminuer l'empreinte écologique</span>
					</div>
					</div>    
				</div>
				<div class="col-md-3 text-center d-flex align-self-stretch ftco-animate">
					<div class="media block-6 services mb-md-0 mb-4">
					<div class="icon bg-color-3 d-flex justify-content-center align-items-center mb-2">
							<span class="flaticon-award"></span>
					</div>
					<div class="media-body">
						<h3 class="heading">solidarité</h3>
						<span>avec les producteurs locaux</span>
					</div>
					</div>      
				</div>
				<div class="col-md-3 text-center d-flex align-self-stretch ftco-animate">
					<div class="media block-6 services mb-md-0 mb-4">
					<div class="icon bg-color-4 d-flex justify-content-center align-items-center mb-2">
							<span class="flaticon-customer-service"></span>
					</div>
					<div class="media-body">
						<h3 class="heading">aux juste prix</h3>
						<span>pour une bio accessible </span>
					</div>
					</div>      
				</div>
			</div>
		</div>
	</section>

		<section class="ftco-section ftco-category ftco-no-pt">
			<div class="container">
				<div class="row">
					<div class="col-md-8">
						<div class="row">
							<div class="col-md-6 order-md-last align-items-stretch d-flex">
								<div class="category-wrap-2 ftco-animate img align-self-stretch d-flex" style="background-image: url(client/images/category.jpg);">
									<div class="text text-center">
										<h2>Légumes</h2>
										<p>Protéger la santé de tous</p>
										<p><a href="#" class="btn btn-primary">Acheté</a></p>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="category-wrap ftco-animate img mb-4 d-flex align-items-end" style="background-image: url(client/images/category-1.jpg);">
									<div class="text px-3 py-1">
										<h2 class="mb-0"><a href="/product/fruits">Fruits</a></h2>
									</div>
								</div>
								<div class="category-wrap ftco-animate img d-flex align-items-end" style="background-image: url(client/images/category-2.jpg);">
									<div class="text px-3 py-1">
										<h2 class="mb-0"><a href="/product/légumes">légumes</a></h2>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="col-md-4">
						<div class="category-wrap ftco-animate img mb-4 d-flex align-items-end" style="background-image: url(client/images/category-3.jpg);">
							<div class="text px-3 py-1">
								<h2 class="mb-0"><a href="/product/jus">Jus de fruits</a></h2>
							</div>		
						</div>
						<div class="category-wrap ftco-animate img d-flex align-items-end" style="background-image: url(client/images/category-4.jpg);">
							<div class="text px-3 py-1">
								<h2 class="mb-0"><a href="/product/sec">Produits secs</a></h2>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>

    <section class="ftco-section">
    	<div class="container">
			<div class="row justify-content-center mb-3 pb-3">
				<div class="col-md-12 heading-section text-center ftco-animate">
					<span class="subheading">Les produits de saison</span>
					<h2 class="mb-4">Nos produits</h2>
					<p>Chez Free Ads pas de fraises en décembre ou des litchis de Madagascar en juin !</p>
				</div>
        	</div>   		
    	</div>
    	<div class="container">
    		<div class="row">
				<?php $products = DB::table('products')->where('product_status', 1)->get() ?>
				@if($products)
				@foreach($products as $product)
					<div class="col-md-6 col-lg-3 ftco-animate">
							<div class="product">
								<a href="#" class="img-prod"><img class="img-fluid" src="storage/cover_images/{{ $product->product_image }}" alt="Colorlib Template">
									<span class="status">30%</span>
									<div class="overlay"></div>
								</a>
								<div class="text py-3 pb-4 px-3 text-center">
									<h3><a href="#">{{ $product->product_name }}</a></h3>
									<div class="d-flex">
										<div class="pricing">
											<p class="price"><span class="mr-2 price-dc"></span><span class="price-sale">{{ $product->product_price }} &euro; le Kg</span></p>
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
											<a href="#" class="heart d-flex justify-content-center align-items-center ">
												<span><i class="ion-ios-heart"></i></span>
											</a>
										</div>
									</div>
								</div>
							</div>
					</div>
				@endforeach
				@endif    			
    		</div>
    	</div>
    </section>
		
	<section class="ftco-section img" style="background-image: url(client/images/bg_3.jpg);">
    	<div class="container">
			<div class="row justify-content-end">
				<div class="col-md-6 heading-section ftco-animate deal-of-the-day ftco-animate">
					<span class="subheading">Les produits de saison</span>
					<h2 class="mb-4">L'offre de la semaine</h2>
					<p>Produits frais provenant directement des agriculteurs locaux.</p>
					<h3><a href="#">Épinard</a></h3>
					<span class="price"><a href="#">Seulement à 3.99&euro; le Kilo</a></span>
					<div id="timer" class="d-flex mt-5">
						<div class="time" id="days"></div>
						<div class="time pl-3" id="hours"></div>
						<div class="time pl-3" id="minutes"></div>
						<div class="time pl-3" id="seconds"></div>
					</div>
				</div>
        	</div>   		
    	</div>
    </section>

    <section class="ftco-section testimony-section">
      <div class="container">
        <div class="row justify-content-center mb-5 pb-3">
          <div class="col-md-7 heading-section ftco-animate text-center">
          	<!-- <span class="subheading">Testimony</span> -->
            <h2 class="mb-4">Les clients satisfaits parles</h2>
            <!-- <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in</p> -->
          </div>
        </div>
        <div class="row ftco-animate">
          <div class="col-md-12">
            <div class="carousel-testimony owl-carousel">
              <div class="item">
                <div class="testimony-wrap p-4 pb-5">
                  <div class="user-img mb-5" style="background-image: url(client/images/person_1.jpg)">
                    <span class="quote d-flex align-items-center justify-content-center">
                      <i class="icon-quote-left"></i>
                    </span>
                  </div>
                  <div class="text text-center">
                    <p class="mb-5 pl-4 line">5 ans de course régulière chez Free Ads, jamais eu de mauvaise surprise.</p>
                    <p class="name">Phillipe Moreau</p>
                    <span class="position">Marketing Manager</span>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="testimony-wrap p-4 pb-5">
                  <div class="user-img mb-5" style="background-image: url(client/images/person_2.jpg)">
                    <span class="quote d-flex align-items-center justify-content-center">
                      <i class="icon-quote-left"></i>
                    </span>
                  </div>
                  <div class="text text-center">
                    <p class="mb-5 pl-4 line">Livraison rapide, très efficace. Répond parfaitement à nos attentes</p>
                    <p class="name">Gilbert Avres</p>
                    <span class="position">Développeur PHP</span>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="testimony-wrap p-4 pb-5">
                  <div class="user-img mb-5" style="background-image: url(client/images/person_3.jpg)">
                    <span class="quote d-flex align-items-center justify-content-center">
                      <i class="icon-quote-left"></i>
                    </span>
                  </div>
                  <div class="text text-center">
                    <p class="mb-5 pl-4 line">Produits toujours frais, de très bonnes qualités et surtout des produits locaux.</p>
                    <p class="name">John Doe</p>
                    <span class="position">UI Designer</span>
                  </div>
                </div>
              </div>
              
            </div>
          </div>
        </div>
      </div>
    </section>

	<!-- <section class="ftco-section ftco-partner">
    	<div class="container">
    		<div class="row">
    			<div class="col-sm ftco-animate">
    				<a href="#" class="partner"><img src="client/images/partner-1.png" class="img-fluid" alt="Colorlib Template"></a>
    			</div>
    			<div class="col-sm ftco-animate">
    				<a href="#" class="partner"><img src="client/images/partner-2.png" class="img-fluid" alt="Colorlib Template"></a>
    			</div>
    			<div class="col-sm ftco-animate">
    				<a href="#" class="partner"><img src="client/images/partner-3.png" class="img-fluid" alt="Colorlib Template"></a>
    			</div>
    			<div class="col-sm ftco-animate">
    				<a href="#" class="partner"><img src="client/images/partner-4.png" class="img-fluid" alt="Colorlib Template"></a>
    			</div>
    			<div class="col-sm ftco-animate">
    				<a href="#" class="partner"><img src="client/images/partner-5.png" class="img-fluid" alt="Colorlib Template"></a>
    			</div>
    		</div>
    	</div>
    </section> -->

	
@endsection