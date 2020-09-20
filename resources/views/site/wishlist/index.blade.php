@extends('layouts.site')
@section('content')
    @include('site.parts.hero', ['title' => __('site.wishlist')])

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
                               <th></th>

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
                                @if($_wishlist->product)
                                <td class="image-prod">
                                    <a href="{{route('products.show', @$_wishlist->product->id)}}">
                                    <div
                                        class="img" style="background-image:url({{@$_wishlist->product->image->url?(str_contains(@$_wishlist->product->image->url, 'products')?'/storage/'.@$_wishlist->product->image->url:@$_wishlist->product->image->url):asset('assets/site/images/default.png')}});">
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
                                        <span style="text-decoration: line-through;">{{@$_wishlist->product->price}} {{__('site.currency')}}</span>  <span style="color: #ffbe08 ">{{@$_wishlist->product->discount_price}} {{__('site.currency')}}</span>
                                    @else
                                        <span style="color: #ffbe08 ">{{@$_wishlist->product->price}} {{__('site.currency')}}</span>
                                    @endif
                                    <span style="color: #bbb;">{{__('site.quantity')}} {{@$_wishlist->product->quantity}}</span>
                                </td>
                             @if($_wishlist->product->is_published && $_wishlist->product->count>0)
                                <td class="quantity">
                                    <p><a href="{{route('cart.store', @$_wishlist->product->id)}}" class="btn btn-primary py-2 px-4">{{__('site.add_to_cart')}}</a></p>
                                </td>
                                 @else
                                        <td class="quantity">
                                            <p><a style="color: #D0021B;" class="btn btn-primary py-2 px-4">{{__('site.unpublished')}}</a></p>
                                        </td>
                                 @endif
                            @else
                                    <td></td>
                                    <td>
                                        {{__('dashboard.deleted')}}
                                    </td>
                                @endif
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
        </div>
    </section>
@endsection
