@extends('layouts.site')
@section('title', 'Profile | Orders')
@section('css')
    @include('site.profile.includes.links')
@endsection
@section('content')
    @include('site.parts.hero', ['title' => __('site.orders')])
    <div id="app">

        @include('site.profile.includes.breadcrumb', ['title' => __('site.orders')])

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
                                            <h4 style="text-align: center;" class="section-edit-title">{{__('site.order')}} #{{$order->id}}
                                                <a href="{{route('profile.orders.show', $order->id)}}" class="btn btn-primary edit-resume">
                                                    {{__('site.show')}}
                                                </a>
                                            </h4>
                                            <ul>
                                                <li>
                                                    <span>{{__('site.name')}}:</span> {{$order->name}}
                                                </li>
                                                <li>
                                                    <span>{{__('site.phone')}}:</span> {{$order->phone}}
                                                </li>
                                                <li>
                                                    <span>{{__('site.email')}}:</span> {{$order->email}}
                                                </li>
                                                <li>
                                                    <span>{{__('site.city')}}:</span> {{$order->city->name}}
                                                </li>
                                                <li>
                                                    <span>{{__('site.address')}}:</span> {{$order->address}}
                                                </li>
                                                <li>
                                                    <span>{{__('site.order_status')}}:</span> {{__('site.'.$order->status)}}
                                                </li>
                                                <li>
                                                    <span>{{__('site.total')}}:</span>  {{$order->total_price}} ج
                                                </li>
                                                <li>
                                                    <span>{{__('site.payment_status')}}:</span> {{__('site.'.$order->payment_status)}}
                                                </li>
                                                <li>
                                                    <span>{{__('site.date')}}:</span> {{$order->created_at}}
                                                </li>
                                            </ul>
                                        </div>
                                            @empty
                                            <div class="information p-info">
                                                {{__('site.empty')}}
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
