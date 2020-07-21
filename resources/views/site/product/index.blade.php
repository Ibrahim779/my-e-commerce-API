@extends('layouts.site')
@section('content')
<div class="hero-wrap hero-bread" style="background-image: url({{asset('assets/site/images/bg_1.jpg')}});">
    <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
            <div class="col-md-9 ftco-animate text-center">
                <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Products</span></p>
                <h1 class="mb-0 bread">Products</h1>
            </div>
        </div>
    </div>
</div>
<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 mb-5 text-center">
                <ul class="product-category">
                    <li><a href="{{route('products.index')}}" class="active">All</a></li>
                    @foreach($categories as $category)
                    <li><a href={{route('products.categories.getCategoryProducts', $category->id)}}>{{$category->name}}</a></li>
                   @endforeach
                </ul>
            </div>
        </div>
        <div class="row">
            @foreach($products as $product)
                <div class="col-md-6 col-lg-3 ftco-animate">
                    <div class="product">
                        <a href="{{route('products.show', $product->id)}}" class="img-prod">
                            <img class="img-fluid" src="{{url('storage/'.@$product->image->url)}}" alt="Colorlib Template">
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
                                            <span class="mr-2 price-dc">{{$product->price}} EGY</span><span class="price-sale">{{$product->discount_price}} EGY</span>
                                        @else
                                            <span>{{$product->price}} EGY</span>
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
                                    <a href="#" class="heart d-flex justify-content-center align-items-center ">
                                        <span><i class="ion-ios-heart"></i></span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
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
