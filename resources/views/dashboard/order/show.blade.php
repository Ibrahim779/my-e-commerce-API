@extends('layouts.dashboard')
@section('page_title','Subcategories')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-body printableArea">
                    <h3><b>Order</b> <span class="pull-right">Details</span></h3>
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="pull-left">
                                <address>
                                    <h3> &nbsp;<b class="text-danger">{{$order->name??$order->user->full_name}}</b></h3>
                                    <p class="text-muted m-l-5">
                                       <span>Phone: </span> {{$order->phone??$order->user->phone}}
                                        <br/>
                                        <span>Address: </span> {{$order->address??$order->user->address}}
                                    </p>
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
                                        <th class="text-right">Quantity</th>
                                        <th class="text-right">Price</th>
                                        <th class="text-right">Count</th>
                                        <th class="text-right">Total</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($cartItems as $cartItem)
                                    <tr>
                                        <td class="text-center">{{$loop->iteration}}</td>
                                        <td>
                                            <img style="width: 50px;height: auto" src="{{url('storage/'.@$cartItem->product->image->url)}}" alt="category image">
                                        </td>
                                        <td class="text-right">{{@$cartItem->product->name}}</td>
                                        <td class="text-right"> {{@$cartItem->product->quantity}}</td>
                                        <td class="text-right"> {{@$cartItem->product->discount_price}}</td>
                                        <td class="text-right"> {{$cartItem->count}}</td>
                                        <td class="text-right"> {{$cartItem->count * @$cartItem->product->discount_price}}</td>
                                    </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="pull-right m-t-30 text-right">
                                <p>Sub - Total amount: $13,848</p>
                                <p>vat (10%) : $138 </p>
                                <hr>
                                <h3><b>Total :</b> $13,986</h3>
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
