@extends('layouts.site')
@section('content')
  @include('site.parts.hero', ['title' => __('site.cart')])
    <section class="ftco-section ftco-cart">
        <div class="container">
            <div class="row">
                <div class="col-md-12 ftco-animate">
                    <div class="cart-list">
                        <table class="table">
                            <thead class="thead-primary">
                            <tr class="text-center">
                                <th>&nbsp;</th>
                                <th>{{__('site.product_image')}}</th>
                                <th>{{__('site.product_name')}}</th>
                                <th>{{__('site.price')}}</th>
                                <th>{{__('site.count')}}</th>
                                <th>{{__('site.total')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($cartItems as $cartItem)
                                <tr class="text-center">
                                    <td class="product-remove">
                                        <form method="post" action="{{route('cart.destroy', $cartItem->id)}}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit">
                                                <span class="ion-ios-close"></span>
                                            </button>

                                        </form>

                                    </td>

                                    <td class="image-prod">
                                        <a href="{{route('products.show', @$cartItem->product->id)}}">
                                            <div
                                                class="img" style="background-image:url({{@$cartItem->product->image->url?(str_contains(@$cartItem->product->image->url, 'products')?'/storage/'.@$cartItem->product->image->url:@$cartItem->product->image->url):asset('assets/site/images/default.png')}});">
                                            </div>
                                        </a>
                                    </td>

                                    <td class="product-name">
                                        <a href="{{route('products.show', @$cartItem->product->id)}}">
                                            <h3>{{@$cartItem->product->name}}</h3>
                                        </a>
                                        {{--                                    <p>{{$_wishlist->product->description}}</p>--}}

                                    </td>
                                    <td class="price">
                                        @if(@$cartItem->product->discount)
                                            <span style="text-decoration: line-through;">{{@$cartItem->product->price}} {{__('site.currency')}}</span>  <span style="color: #ffbe08 ">{{@$cartItem->product->discount_price}} {{__('site.currency')}}</span>
                                        @else
                                            <span style="color: #ffbe08 ">{{@$cartItem->product->price}} {{__('site.currency')}}</span>
                                        @endif
                                        <span style="color: #bbb;">{{__('site.quantity')}} {{@$cartItem->product->quantity}}</span>
                                    </td>

                                    <td class="quantity">
                                        <form method="post" action="{{route('cart.update', $cartItem->id)}}" class="subscribe-form">
                                            @csrf
                                            @method('PATCH')
                                            <div class="form-group d-flex">
                                                <input value="{{$cartItem->count}}" name="count" type="number" class="form-control" placeholder="Count">
                                                <input type="submit" value="{{__('site.change')}}" class="submit px-3">
                                            </div>
                                        </form>
                                    </td>

                                    <td style="color: #ffbe08 " class="total">{{$cartItem->count * @$cartItem->product->discount_price}} {{__('site.currency')}}</td>
                                </tr><!-- END TR-->
                            @empty
                                <tr class="text-center">
                                    <td></td>
                                    <td>
                                        {{__('site.empty')}}
                                    </td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row justify-content-end">
                <div class="col-lg-4 mt-5 cart-wrap ftco-animate">
                    <div class="cart-total mb-3">
                        <h3>{{__('site.continue_shopping')}}</h3>
                        <p>{{__('site.continue_shopping_sentence')}}</p>
                    </div>
                    <p><a href="{{route('products.index')}}" class="btn btn-primary py-3 px-4">{{__('site.continue_shopping')}}</a></p>
                </div>
                <div class="col-lg-4 mt-5 cart-wrap ftco-animate">
                    <div class="cart-total mb-3">
                        <h3>{{__('site.coupon')}}</h3>
                        <p>{{__('site.coupon_sentence')}}</p>
                        <form method="post" action={{route('applyCoupon')}} class="info">
                            @csrf
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <i class="material-icons">{{__('site_close')}}</i>
                                    </button>
                                    <span>
                                        {{$errors->first()}}
                                    </span>
                                </div>
                            @endif
                            <div class="form-group">
                                <label for="">{{__('site.coupon')}}</label>
                                <input name="code" type="text" class="form-control text-left px-3" placeholder="{{__('site.coupon_input')}}">
                            </div>
                            <button type="submit" class="btn btn-primary py-3 px-4 code">{{__('site.coupon_button')}}</button>
                            <style>
                                button.code{
                                    border: 1px solid  #febe08 !important ;
                                    color: white !important
                                }
                                .code:hover{
                                    color: #febe08 !important;
                                }
                            </style>
                        </form>
                    </div>
                </div>

                <div class="col-lg-4 mt-5 cart-wrap ftco-animate">
                    <div class="cart-total mb-3">
                        @include('site.cart.parts.total')
                    </div>
                    <p><a href="{{route('checkout.index')}}" class="btn btn-primary py-3 px-4">{{__('site.checkout_proceed')}}</a></p>
                </div>
            </div>
        </div>
    </section>
@endsection
