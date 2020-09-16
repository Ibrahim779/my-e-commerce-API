@extends('layouts.site')
@section('content')
    @include('site.parts.hero', ['title' => 'Checkout'])
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-7 ftco-animate">
                    <form method="post" action="{{route('checkout.store')}}" class="billing-form">
                        @csrf
                        <h3 class="mb-4 billing-heading">Billing Details</h3>
                        <div class="row align-items-end">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="firstname">Full Name</label>
                                    <input value="{{old('name')??auth()->user()->full_name}}" name="name" type="text" class="form-control" placeholder="Enter Your Name">
                                </div>
                            </div>

                            <div class="w-100"></div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="country">City</label>
                                    <div class="select-wrap">
                                        <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                                        <select name="city_id" id="" class="form-control">
                                            <option  value="{{null}}">select city</option>
                                            @foreach($cities as $city)
                                            <option {{$city->id == auth()->user()->city_id|old('city_id')?'selected':''}} value="{{$city->id}}">{{$city->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="w-100"></div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="streetaddress">Street Address</label>
                                    <input value="{{old('address')??auth()->user()->address}}" name="address" type="text" class="form-control" placeholder="House number and street name">
                                </div>
                            </div>
{{--                            <div class="col-md-6">--}}
{{--                                <div class="form-group">--}}
{{--                                    <input type="text" class="form-control" placeholder="Appartment, suite, unit etc: (optional)">--}}
{{--                                </div>--}}
{{--                            </div>--}}
                            <div class="w-100"></div>
                            <div class="w-100"></div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="phone">Phone</label>
                                    <input value="{{old('phone')??auth()->user()->phone}}" name="phone" type="text" class="form-control" placeholder="Enter Your Phone">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="phone">Email</label>
                                    <input value="{{old('email')??auth()->user()->email}}" name="email" type="email" class="form-control" placeholder="Enter Your Email">
                                </div>
                            </div>
                            <div class="w-100"></div>
                            <div class="col-md-12">
                                <div class="form-group mt-4">
                                    <div class="radio">
                                        <label class="mr-3"><input checked value="debt" type="radio" name="payment_status"> الدفع عند الاستلام  </label>
{{--                                        <label><input value="1"  type="radio" name="payment_status"> Ship to different address</label>--}}
                                    </div>
                                </div>
                            </div>
                            <div class="w-100"></div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary py-3 px-4">Place an order</button>
                                </div>
                            </div>

                        </div>
                    </form><!-- END -->
                </div>
                <div class="col-xl-5">
                    <div class="row mt-5 pt-3">
                        <div class="col-md-12 d-flex mb-5">
                            <div class="cart-detail cart-total p-3 p-md-4">
                                <h3 class="billing-heading mb-4">Cart Total</h3>
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
                        </div>
{{--                        <div class="col-md-12">--}}
{{--                            <div class="cart-detail p-3 p-md-4">--}}
{{--                                <h3 class="billing-heading mb-4">Payment Method</h3>--}}
{{--                                <div class="form-group">--}}
{{--                                    <div class="col-md-12">--}}
{{--                                        <div class="radio">--}}
{{--                                            <label><input type="radio" name="optradio" class="mr-2"> Direct Bank Tranfer</label>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="form-group">--}}
{{--                                    <div class="col-md-12">--}}
{{--                                        <div class="radio">--}}
{{--                                            <label><input type="radio" name="optradio" class="mr-2"> Check Payment</label>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="form-group">--}}
{{--                                    <div class="col-md-12">--}}
{{--                                        <div class="radio">--}}
{{--                                            <label><input type="radio" name="optradio" class="mr-2"> Paypal</label>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="form-group">--}}
{{--                                    <div class="col-md-12">--}}
{{--                                        <div class="checkbox">--}}
{{--                                            <label><input type="checkbox" value="" class="mr-2"> I have read and accept the terms and conditions</label>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <p><a href="#"class="btn btn-primary py-3 px-4">Place an order</a></p>--}}
{{--                            </div>--}}
{{--                        </div>--}}
                    </div>
                </div> <!-- .col-md-8 -->
            </div>
        </div>
    </section> <!-- .section -->
@endsection
