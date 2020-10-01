@extends('layouts.site')
@section('content')
    @include('site.parts.hero', ['title' => __('site.products')])
<section class="ftco-section ftco-degree-bg container">
    <div class="row">
        <div class="col-lg-3 sidebar ftco-animate">
            <div class="sidebar-box">
                <form method="get" action="{{route('search')}}" class="search-form">
                    <div class="form-group">
                        <span class="icon ion-ios-search"></span>
                        <input
                            value="{{request()->search??old('search')}}"
                            name="search" type="text"
                            class="form-control"
                            placeholder="{{__('site.search')}}">
                    </div>
                </form>
            </div>
            <div class="sidebar-box ftco-animate">
                <h3 class="heading">{{__('site.subcategories')}}</h3>
                <ul class="categories">
                    @forelse($subcategories as $subcategory)
                        <li>
                            <a style="margin-right: 40px"
                                href="{{$_category?route('products.categories.getSubcategoryProductsByCategory',
                                      ['category' => $_category, 'subcategory' => $subcategory->id]):route('products.getSubcategoryProducts', $subcategory->id)}}">
                                {{$subcategory->name}}
                                <span>
                                   ( {{\App\Product::whereSubcategoryId($subcategory->id)->count()}} )
                                </span>
                            </a>
                        </li>
                    @empty
                        <li>
                            {{__('site.null')}}
                        </li>
                    @endforelse
                </ul>
            </div>


            <div class="sidebar-box ftco-animate">
                <h3 class="heading">{{__('site.brands')}}</h3>
                <div class="tagcloud">
                    @forelse($brands as $brand)
                        <a href="{{$_category?route('products.categories.getCategoryBrandProducts',
                                      ['category' => $_category, 'brand' => $brand->id]):route('products.getBrandProducts', $brand->id)}}"
                           class="tag-cloud-link">
                            {{$brand->name}}
                        </a>
                    @empty
                        <ul class="categories">
                            <li>
                                {{__('site.null')}}
                            </li>
                        </ul>
                    @endforelse
                </div>
            </div>
        </div>
    <div class=" col-lg-9 ">
        <div class="row justify-content-center">
            <div class="col-md-10 mb-5 text-center">
                <ul class="product-category">
                    <li><a href="{{route('products.index')}}" class="{{$_category??'active'}}">{{__('site.all')}}</a></li>
                    @foreach($categories as $category)
                    <li>
                        <a
                            class="{{isset($_category->id)?($category->id == $_category->id?'active':''):''}}"
                            href="{{route('products.categories.getCategoryProducts', $category->id)}}" >
                            {{$category->name}}
                        </a>
                    </li>
                   @endforeach
                </ul>
            </div>
        </div>
        <div class="row">
            @forelse($products as $product)
                <div class="col-md-6 col-lg-3 ftco-animate">
                    <div class="product">
                        <a href="{{route('products.show', $product->id)}}" class="img-prod">
                            <img style="width:100%;height: 150px" class="img-fluid" src="{{@$product->image->url?(str_contains(@$product->image->url, 'products')?'/storage/'.@$product->image->url:@$product->image->url):asset('assets/site/images/default.png')}}" alt="Colorlib Template">
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
                                    <a href="{{route('cart.store', $product->id)}}" class="buy-now d-flex justify-content-center align-items-center mx-1">
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
                @empty
                        <h4>{{__('site.null')}}</h4>
            @endforelse
            </div>
        <div class="row mt-5">
            <style>
                .page-item.active .page-link{
                    background-color: #febe08;
                    border-color: #febe08;
                }
                .page-link{
                    color: #febe08;
                }
            </style>
            {{$products->links()}}
        </div>
        </div>

    </div>
</section>

@endsection
