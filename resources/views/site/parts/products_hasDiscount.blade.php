<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center mb-3 pb-3">
            <div class="col-md-12 heading-section text-center ftco-animate">
                <span class="subheading">{{__('site.discounts')}}</span>
                <h2 class="mb-4">{{__('site.discount_products')}}</h2>
                <p>{{__('site.discounts_sentence')}}</p>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            @foreach($products_hasDiscount as $product)
                <div class="col-md-6 col-lg-3 ftco-animate">
                    <div class="product">
                        <a href="{{route('products.show', $product->id)}}" class="img-prod">
                            <img style="width:100%;height: 200px" class="img-fluid" src="{{@$product->image->url?(str_contains(@$product->image->url, 'products')?'/storage/'.@$product->image->url:@$product->image->url):asset('assets/site/images/default.png')}}" alt="Colorlib Template">
                            @if($product->discount)
                                <span class="status">{{$product->discount}}%</span>
                            @endif
                            <div class="overlay"></div>
                        </a>
                        <div class="text py-3 pb-4 px-3 text-center">
                            <h3><a href="{{route('products.show', $product->id)}}">{{$product->name}}</a></h3>
                            <div class="d-flex">
                                <div class="pricing">
                                    <p class="price">
                                        @if($product->discount)
                                            <span class="mr-2 price-dc">{{$product->price}} {{__('site.currency')}}</span><span class="price-sale">{{$product->discount_price}} {{__('site.currency')}}</span>
                                        @else
                                            <span>{{$product->price}} {{__('site.currency')}}</span>
                                        @endif
                                    </p>
                                </div>
                            </div>
                            <div class="bottom-area d-flex px-3">
                                <div class="m-auto d-flex">
                                    <a href="{{route('products.show', $product->id)}}" class="add-to-cart d-flex justify-content-center align-items-center text-center">
                                        <span><i class="ion-ios-menu"></i></span>
                                    </a>
                                    <a href="#" class="buy-now d-flex justify-content-center align-items-center mx-1">
                                        <span><i class="ion-ios-cart"></i></span>
                                    </a>
                                    <a href="{{route('wishlist.store', $product->id)}}" class="heart d-flex justify-content-center align-items-center ">
                                        <span><i class="ion-ios-heart"></i></span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
