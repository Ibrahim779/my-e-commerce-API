@extends('layouts.site')
@section('content')
    <div class="hero-wrap hero-bread" style="background-image: url({{asset('assets/site/images/bg_1.jpg')}});">
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center">
                <div class="col-md-9 ftco-animate text-center">
                    <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Wishlist</span></p>
                    <h1 class="mb-0 bread">My Wishlist</h1>
                </div>
            </div>
        </div>
    </div>

    <section class="ftco-section ftco-cart">
        <div class="container">
            <div class="row">
                <div class="col-md-12 ftco-animate">
                    <div class="cart-list">
                        <table class="table">
                            <thead class="thead-primary">
                            <tr class="text-center">
                                <th>&nbsp;</th>
                                <th>Product List</th>
                                <th>&nbsp;</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($wishlist as $_wishlist)
                            <tr class="text-center">
                                <td class="product-remove">
                                    <form method="post" action="{{route('wishlist.destroy', $_wishlist->id)}}">
                                        @csrf
                                        @method('DELETE')
                                    <button type="submit">
                                          <span class="ion-ios-close"></span>
                                        </button>

                                    </form>

                                </td>

                                <td class="image-prod">
                                    <a href="{{route('products.show', @$_wishlist->product->id)}}">
                                    <div
                                        class="img" style="background-image:url({{url('storage/'.@$_wishlist->product->image->url)}});">
                                    </div>
                                    </a>
                                </td>

                                <td class="product-name">
                                    <a href="{{route('products.show', @$_wishlist->product->id)}}">
                                    <h3>{{@$_wishlist->product->name}}</h3>
                                    </a>
{{--                                    <p>{{$_wishlist->product->description}}</p>--}}

                                </td>
                                <td class="price">
                                    @if(@$_wishlist->product->discount)
                                        <span style="text-decoration: line-through;">{{@$_wishlist->product->price}} EGY</span>  <span style="color: #ffbe08 ">{{@$_wishlist->product->discount_price}} EGY</span>
                                    @else
                                        <span style="color: #ffbe08 ">{{@$_wishlist->product->price}} EGY</span>
                                    @endif
                                    <span style="color: #bbb;">for {{@$_wishlist->product->quantity}}</span>
                                </td>

                                <td class="quantity">
                                    <div class="input-group mb-3">
                                        <input type="text" name="quantity" class="quantity form-control input-number" value="1" min="1" max="100">
                                    </div>
                                </td>

                                <td class="total">$4.90</td>
                            </tr><!-- END TR-->
                                @empty
                                <tr class="text-center">
                                    <td></td>
                                   <td>
                                       Your WishList Is Empty
                                   </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
