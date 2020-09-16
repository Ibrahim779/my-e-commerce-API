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
                                        <div class="information p-info">
                                            <h4 class="section-edit-title">Order #125458
                                                <a href="{{route('profile.orders.show')}}" class="btn btn-primary edit-resume">
                                                    Show
                                                </a>
                                            </h4>
                                            <ul>
                                                <li>
                                                    <span>Name:</span> ALi Esmail
                                                </li>
                                                <li>
                                                    <span>Address:</span> Damietta
                                                </li>
                                                <li>
                                                    <span>Phone:</span> 01025288758
                                                </li>
                                                <li>
                                                    <span>Order Status:</span> pending
                                                </li>
                                                <li>
                                                    <span>Total:</span>  3000 ج
                                                </li>
                                                <li>
                                                    <span>Payment Status:</span>  الدفع عند الاستلام
                                                </li>
                                            </ul>
                                        </div>
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
