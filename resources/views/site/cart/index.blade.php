@extends('layouts.site')
@section('content')
  @include('site.parts.hero', ['title' => 'Cart'])
    <section class="ftco-section ftco-cart">
        <div class="container">
            <div class="row">
                <div class="col-md-12 ftco-animate">
                    <div class="cart-list">
                        <table class="table">
                            <thead class="thead-primary">
                            <tr class="text-center">
                                <th>&nbsp;</th>
                                <th>&nbsp;</th>
                                <th>Product name</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
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
                                            <span style="text-decoration: line-through;">{{@$cartItem->product->price}} EGY</span>  <span style="color: #ffbe08 ">{{@$cartItem->product->discount_price}} EGY</span>
                                        @else
                                            <span style="color: #ffbe08 ">{{@$cartItem->product->price}} EGY</span>
                                        @endif
                                        <span style="color: #bbb;">for {{@$cartItem->product->quantity}}</span>
                                    </td>

                                    <td class="quantity">
                                        <form method="post" action="{{route('cart.update', $cartItem->id)}}" class="subscribe-form">
                                            @csrf
                                            @method('PATCH')
                                            <div class="form-group d-flex">
                                                <input value="{{$cartItem->count}}" name="count" type="number" class="form-control" placeholder="Count">
                                                <input type="submit" value="Change" class="submit px-3">
                                            </div>
                                        </form>
                                    </td>

                                    <td style="color: #ffbe08 " class="total">{{$cartItem->count * @$cartItem->product->discount_price}} EGY</td>
                                </tr><!-- END TR-->
                            @empty
                                <tr class="text-center">
                                    <td></td>
                                    <td>
                                        Your Cart Is Empty
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
                        <h3>Continue Shopping</h3>
                        <p>Enter your destination to get a shipping estimate</p>
                    </div>
                    <p><a href="{{route('products.index')}}" class="btn btn-primary py-3 px-4">Continue</a></p>
                </div>
                <div class="col-lg-4 mt-5 cart-wrap ftco-animate">
                    <div class="cart-total mb-3">
                        <h3>Coupon Code</h3>
                        <p>Enter your coupon code if you have one</p>
                        <form method="post" action={{route('applyCoupon')}} class="info">
                            @csrf
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <i class="material-icons">close</i>
                                    </button>
                                    <span>
                                        {{$errors->first()}}
                                    </span>
                                </div>
                            @endif
                            <div class="form-group">
                                <label for="">Coupon code</label>
                                <input name="code" type="text" class="form-control text-left px-3" placeholder="Enter Coupon Code">
                            </div>
                            <button  type="submit" class="btn btn-primary py-3 px-4">Apply Coupon</button>
                        </form>
                    </div>
{{--                    <p><a href="{{route('applyCoupon')}}" class="btn btn-primary py-3 px-4">Apply Coupon</a></p>--}}
                </div>

                <div class="col-lg-4 mt-5 cart-wrap ftco-animate">
                    <div class="cart-total mb-3">
                        <h3>Cart Totals</h3>
                        <p class="d-flex">
                            <span>Subtotal</span>
                            <span>{{$cart_total['sub_total']}} EGY</span>
                        </p>
                        <p class="d-flex">
                            <span>Delivery</span>
                            <span>{{$cart_total['delivery']}} EGY</span>
                        </p>
                        <p class="d-flex">
                            <span>Discount</span>
                            <span>{{$cart_total['discount']}} EGY</span>
                        </p>
                        <hr>
                        <p class="d-flex total-price">
                            <span>Total</span>
                            <span>{{$cart_total['total']}} EGY</span>
                        </p>
                    </div>
                    <p><a href="{{route('checkout.index')}}" class="btn btn-primary py-3 px-4">Proceed to Checkout</a></p>
                </div>
            </div>
        </div>
    </section>
@endsection
