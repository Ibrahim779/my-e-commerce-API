@extends('layouts.site')
@section('title', 'Profile | Orders')
@section('css')
    @include('site.profile.includes.links')
@endsection
@section('content')
    @include('site.parts.hero', ['title' => 'Show Order'])
    <div id="app">

        @include('site.profile.includes.breadcrumb', ['title' => 'Order Show'])

        <div style="background: none" class="alice-bg section-padding-bottom">
            <div class="container no-gliters">
                <div class="row no-gliters">
                    <div class="col">
                        <div class="dashboard-container">
                            <div class="dashboard-content-wrapper">
                                <div class="job-view-controller-wrapper">
                                    <div class="job-view-controller">
                                        <div class="controller list active">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-menu"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg>
                                        </div>
                                        <div class="controller grid">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-grid"><rect x="3" y="3" width="7" height="7"></rect><rect x="14" y="3" width="7" height="7"></rect><rect x="14" y="14" width="7" height="7"></rect><rect x="3" y="14" width="7" height="7"></rect></svg>
                                        </div>
                                    </div>
                                    <div class="showing-number">
                                        <span>Showing 2 of 2 Jobs</span>
                                    </div>
                                </div>
                                <div class="job-filter-result">
                                    @forelse($cartItems as $cartItem)
                                    <div class="job-list">
                                        <div class="thumb">
                                            <a href="{{route('products.show', $cartItem->product->id)}}">
                                                <img src="{{@$cartItem->product->image->url?(str_contains(@$cartItem->product->image->url, 'products')?'/storage/'.@$cartItem->product->image->url:@$cartItem->product->image->url):asset('assets/site/images/default.png')}}" class="img-fluid" alt="">
                                            </a>
                                        </div>
                                        <div class="body">
                                            <div class="content">
                                                <h4><a href="{{route('products.show', $cartItem->product->id)}}" >{{$cartItem->product->name}}</a>
                                                </h4>
                                                <div class="info">
                                                    <span class="company">
                                                        <span style="color: #febe08">Price:</span><span>{{$cartItem->product->price}} EGY</span>
                                                    </span>
                                                    <span class="company">
                                                            <span style="color: #febe08">Quantity:</span><span>{{$cartItem->product->quantity}}</span>
                                                    </span>
                                                    <span class="company">
                                                            <span style="color: #febe08">Count:</span><span>{{$cartItem->count}}</span>
                                                    </span>
                                                    <span class="company">
                                                           <span style="color: #febe08">BarCode:</span><span>{{$cartItem->product->bar_code}}</span>
                                                    </span>
                                                    <span class="job-type temporary">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-clock"><circle cx="12" cy="12" r="10"></circle>
                                                                <polyline points="12 6 12 12 16 14">
                                                                </polyline>
                                                            </svg>
                                                            {{$cartItem->created_at->diffforhumans()}}
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                        @empty
                                        <div class="job-list">
                                            Not Found Cart Items
                                        </div>
                                    @endforelse
                                </div>

                            </div>
                            @include('site.profile.includes.sidebar', ['orders' => 'active'])

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    @include('site.profile.includes.scripts')
@endsection
