@extends('layouts.dashboard')
@section('page_title','Subcategories')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-body printableArea">
                    <h3><b>{{__('site.order')}}</b> <span class="pull-right">#{{$order->id}}</span></h3>
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="pull-left">
                                <address>
                                    <h3> &nbsp;<b class="text-danger">{{$order->name}}</b></h3>
                                    <p class="text-muted m-l-5">
                                       <span>{{__('site.phone')}}: </span> {{$order->phone}}
                                        <br/>
                                        <span>{{__('site.city')}}: </span> {{$order->city->name}}
                                        <br>
                                        <span>{{__('site.address')}}: </span> {{$order->address}}
                                        <br/>
                                        <span>{{__('site.payment_status')}}: </span> {{__('site.'.$order->payment_status)}}
                                    </p>
                                    <span>{{__('site.order_status')}}: </span>
                                    <form method="post" action="{{route('orders.update', $order->id)}}" class="subscribe-form">
                                        @csrf
                                        @method('PATCH')
                                        <div class="form-group d-flex">
                                            <select name="status" style="border: none" class="input100">
                                                <option  value="{{null}}">select status</option>
                                                <option {{$order->status == 'pending'?'selected':''}} value="pending">{{__('site.pending')}}</option>
                                                <option {{$order->status == 'prepared'?'selected':''}} value="prepared">{{__('site.prepared')}}</option>
                                                <option {{$order->status == 'delivered'?'selected':''}} value="delivered">{{__('site.delivered')}}</option>
                                                <option {{$order->status == 'completed'?'selected':''}} value="completed">{{__('site.completed')}}</option>
                                            </select>
                                            <input type="submit" value="{{__('site.change')}}" class="submit px-3">
                                        </div>
                                    </form>
                                </address>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="table-responsive m-t-40" style="clear: both;">
                                <table class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th>Image</th>
                                        <th class="text-right">Name</th>
                                        <th class="text-right">BarCode</th>
                                        <th class="text-right">Quantity</th>
                                        <th class="text-right">Price</th>
                                        <th class="text-right">Count</th>
                                        <th class="text-right">Total</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($cartItems as $cartItem)
                                        @if($cartItem->product)
                                        <tr>
                                            <td class="text-center">{{$loop->iteration}}</td>
                                            <td>
                                                <img style="width: 50px;height: auto" src="{{url('storage/'.@$cartItem->product->image->url)}}" alt="category image">
                                            </td>
                                            <td class="text-right">{{@$cartItem->product->name}}</td>
                                            <td class="text-right">{{@$cartItem->product->bar_code}}</td>
                                            <td class="text-right"> {{@$cartItem->product->quantity}}</td>
                                            <td class="text-right"> {{@$cartItem->product->discount_price}}</td>
                                            <td class="text-right"> {{$cartItem->count}}</td>
                                            <td class="text-right"> {{$cartItem->count * @$cartItem->product->discount_price}}</td>
                                        </tr>
                                            @else
                                            <tr>
                                                <td></td>
                                                <td class="text-center">
                                                    {{__('dashboard.deleted')}}
                                                </td>
                                            </tr>
                                         @endif

                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="pull-right m-t-30 text-right">
                                <hr>
                                <h3><b>{{__('site.total')}} :</b> {{$order->total_price}} {{__('site.currency')}}</h3>
                            </div>
                            <div class="clearfix"></div>
                            <hr>
                            <div class="text-right">
                                <button class="btn btn-danger" type="submit"> Proceed to payment </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


</div>
@endsection
