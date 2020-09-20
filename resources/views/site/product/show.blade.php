@extends('layouts.site')
@section('content')
    @include('site.parts.hero', ['title' => __('site.single_product')])
    <section class="ftco-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 mb-5 ftco-animate">

                    <a href="{{@$product->image->url?(str_contains(@$product->image->url, 'products')?'/storage/'.@$product->image->url:@$product->image->url):asset('assets/site/images/default.png')}}" class="image-popup"><img src="{{@$product->image->url?(str_contains(@$product->image->url, 'products')?'/storage/'.@$product->image->url:@$product->image->url):asset('assets/site/images/default.png')}}" class="img-fluid" alt="Colorlib Template"></a>
                </div>
                <div style="text-align: initial;" class="col-lg-6 product-details pl-md-5 ftco-animate">
                    <h4>{{$product->name}}</h4>
{{--                    <div class="rating d-flex">--}}
{{--                        <p class="text-left mr-4">--}}
{{--                            <a href="#" class="mr-2">5.0</a>--}}
{{--                            <a href="#"><span class="ion-ios-star-outline"></span></a>--}}
{{--                            <a href="#"><span class="ion-ios-star-outline"></span></a>--}}
{{--                            <a href="#"><span class="ion-ios-star-outline"></span></a>--}}
{{--                            <a href="#"><span class="ion-ios-star-outline"></span></a>--}}
{{--                            <a href="#"><span class="ion-ios-star-outline"></span></a>--}}
{{--                        </p>--}}
{{--                        <p class="text-left mr-4">--}}
{{--                            <a href="#" class="mr-2" style="color: #000;">100 <span style="color: #bbb;">Rating</span></a>--}}
{{--                        </p>--}}
{{--                        <p class="text-left">--}}
{{--                            <a href="#" class="mr-2" style="color: #000;">500 <span style="color: #bbb;">Sold</span></a>--}}
{{--                        </p>--}}
{{--                    </div>--}}
                    @if($product->discount)
                    <div style="background: #ffbe08; width:50px;text-align: center">
                        <span style="color:white;">{{$product->discount}}%</span>
                    </div>
                    @endif
                    <p>
                    @if($product->discount)
                            <span style="text-decoration: line-through;">{{$product->price}} {{__('site.currency')}}</span>  <span style="color: #ffbe08 ">{{$product->discount_price}} {{__('site.currency')}}</span>
                    @else
                        <span style="color: #ffbe08 ">{{$product->price}} {{__('site.currency')}}</span>
                    @endif
                            <span style="color: #bbb;">{{__('site.quantity')}} {{$product->quantity}}</span>
                    </p>
                    <p>
                        {{$product->description}}
                    </p>
                    <div class="row mt-4">
{{--                        <div class="col-md-6">--}}
{{--                            <div class="form-group d-flex">--}}
{{--                                <div class="select-wrap">--}}
{{--                                    <div class="icon"><span class="ion-ios-arrow-down"></span></div>--}}
{{--                                    <select name="" id="" class="form-control">--}}
{{--                                        <option value="">Small</option>--}}
{{--                                        <option value="">Medium</option>--}}
{{--                                        <option value="">Large</option>--}}
{{--                                        <option value="">Extra Large</option>--}}
{{--                                    </select>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
                        <div class="w-100"></div>
                            @if($product->is_published && $product->count)
                            <div class="input-group col-md-6 d-flex mb-3">
                                <form method="post" action="{{route('cart.store', $product->id)}}" class="subscribe-form">
                                    @csrf
                                    <div style="margin-bottom: 60px;" class="form-group d-flex">
                                        <input max="{{$product->count}}" value="{{$product->count?1:0}}" name="count" type="number" class="form-control" placeholder="Count">
                                    </div>
                                    <button type="submit" class="btn btn-primary py-3 px-4 code">{{__('site.add_to_cart')}}</button>
                                    <style>
                                        button.code{
                                            background: #febe08 !important;
                                            border: 1px solid  #febe08 !important ;
                                            color: white !important;
                                            text-align: center !important;
                                            padding-bottom: 38px !important;
                                        }
                                        .code:hover{
                                            background: white !important;
                                            color: #febe08 !important;
                                        }
                                    </style>
                                </form>
                            </div>
                           @else
                            <div class="input-group col-md-6 d-flex mb-3">
                                <p><a style="color: #D0021B;" class="btn btn-primary py-2 px-4">{{__('site.unpublished')}}</a></p>
                            </div>
                           @endif
                        <div class="w-100"></div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center mb-3 pb-3">
                <div class="col-md-12 heading-section text-center ftco-animate">
                    <span class="subheading">{{__('site.products')}}</span>
                    <h2 class="mb-4">{{__('site.relate_products')}}</h2>
                    <p>{{__('site.relate_products_sentence')}}</p>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                @foreach($related_products as $product)
                    <div class="col-md-6 col-lg-3 ftco-animate">
                        <div class="product">
                            <a href="{{route('products.show', $product->id)}}" class="img-prod">
                                <img style="width: 300px;height: 200px" class="img-fluid" src="{{@$product->image->url?(str_contains(@$product->image->url, 'products')?'/storage/'.@$product->image->url:@$product->image->url):asset('assets/site/images/default.png')}}" alt="Colorlib Template">
                                @if($product->discount)
                                    <span class="status">{{$product->discount}}%</span>
                                @endif
                                <div class="overlay"></div>
                            </a>
                            <div class="text py-3 pb-4 px-3 text-center">
                                <h3><a href="#">{{$product->name}}</a></h3>
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
                                        <a href="#" class="add-to-cart d-flex justify-content-center align-items-center text-center">
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
@endsection

