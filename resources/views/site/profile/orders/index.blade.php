@extends('layouts.site')
@section('title', 'Profile | Orders')
@section('css')
    @include('site.profile.includes.links')
@endsection
@section('content')
    @include('site.parts.hero', ['title' => 'Orders'])
    <div id="app">

        @include('site.profile.includes.breadcrumb', ['title' => 'Orders'])

        <div style="background: none" class="alice-bg section-padding-bottom">
            <div class="container no-gliters">
                <div class="row no-gliters">
                    <div class="col">
                        <div class="dashboard-container">
                            <div id="vueApp" class="dashboard-content-wrapper">
                                <div class="about-details details-section dashboard-section" style="padding: 0px;">
                                    <div class="information-and-contact">
                                        @forelse($orders as $order)
                                        <div class="information p-info">
                                            <h4 class="section-edit-title">Order #{{$order->id}}
                                                <a href="{{route('profile.orders.show', $order->id)}}" class="btn btn-primary edit-resume">
                                                    Show
                                                </a>
                                            </h4>
                                            <ul>
                                                <li>
                                                    <span>Name:</span> {{$order->name}}
                                                </li>
                                                <li>
                                                    <span>Phone:</span> {{$order->phone}}
                                                </li>
                                                <li>
                                                    <span>Email:</span> {{$order->email}}
                                                </li>
                                                <li>
                                                    <span>City:</span> {{$order->city->name}}
                                                </li>
                                                <li>
                                                    <span>Address:</span> {{$order->address}}
                                                </li>
                                                <li>
                                                    <span>Order Status:</span> {{$order->status}}
                                                </li>
                                                <li>
                                                    <span>Total:</span>  {{$order->total_price}} ج
                                                </li>
                                                <li>
                                                    <span>Payment Status:</span> {{$order->payment_status}}
                                                </li>
                                                <li>
                                                    <span>Date:</span> {{$order->created_at}}
                                                </li>
                                            </ul>
                                        </div>
                                            @empty
                                            <div class="information p-info">
                                                Not Found Orders
                                            </div>
                                        @endforelse
                                    </div>
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
