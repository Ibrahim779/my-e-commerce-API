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
                                    <h3> &nbsp;<b class="text-danger">{{$order->another_name??$order->user->full_name}}</b></h3>
                                    <p class="text-muted m-l-5">
                                       <span>Phone: </span> {{$order->another_phone??$order->user->phone}}
                                        <br/>
                                        <span>Address: </span> {{$order->another_address??$order->user->address}}
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
                                        <th>Description</th>
                                        <th class="text-right">Quantity</th>
                                        <th class="text-right">Unit Cost</th>
                                        <th class="text-right">Total</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td class="text-center">1</td>
                                        <td>Milk Powder</td>
                                        <td class="text-right">2 </td>
                                        <td class="text-right"> $24 </td>
                                        <td class="text-right"> $48 </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">2</td>
                                        <td>Air Conditioner</td>
                                        <td class="text-right"> 3 </td>
                                        <td class="text-right"> $500 </td>
                                        <td class="text-right"> $1500 </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">3</td>
                                        <td>RC Cars</td>
                                        <td class="text-right"> 20 </td>
                                        <td class="text-right"> %600 </td>
                                        <td class="text-right"> $12000 </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">4</td>
                                        <td>Down Coat</td>
                                        <td class="text-right"> 60 </td>
                                        <td class="text-right">$5 </td>
                                        <td class="text-right"> $300 </td>
                                    </tr>
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
