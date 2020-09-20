<div class="card">
    <div class="card-body">
        <h4 class="card-title">{{__('dashboard.pending_orders')}}</h4>
        <div class="comment-widgets scrollable">
            @forelse($pending_orders as $pending_order)
                <div class="d-flex flex-row comment-row m-t-0">
                    <div class="p-2"><img style="border-radius: 0 !important;" src="{{@$pending_order->user->image->url?(str_contains(@$pending_order->user->image->url, 'user')?'/storage/'.@$pending_order->user->image->url:@$pending_order->user->image->url):asset('assets/site/images/avatar.png')}}" alt="user" width="50" class="rounded-circle"></div>
                    <div class="comment-text w-100">
                        <h6 class="font-medium">
                            <span>{{__('site.name')}}:</span> {{$pending_order->user->full_name}}
                        </h6>
                        <span class="m-b-15 d-block">
                           <span>{{__('site.phone')}}:</span> {{$pending_order->phone}}
                        </span>
                        <span class="m-b-15 d-block">
                            <span>{{__('site.city')}}:</span> {{$pending_order->city->name}}
                        </span>
                        <span class="m-b-15 d-block">
                            <span>{{__('site.address')}}:</span> {{$pending_order->address}}
                        </span>
                        <span class="m-b-15 d-block">
                            <span>{{__('site.order_status')}}:</span>
                            <form method="post" action="{{route('orders.update', $pending_order->id)}}" class="subscribe-form">
                                            @csrf
                                @method('PATCH')
                                            <div class="form-group d-flex">
                                               <select name="status" style="border: none" class="input100">
                                                    <option  value="{{null}}">select status</option>
                                                    <option {{$pending_order->status == 'pending'?'selected':''}} value="pending">{{__('site.pending')}}</option>
                                                   <option {{$pending_order->status == 'prepared'?'selected':''}} value="prepared">{{__('site.prepared')}}</option>
                                                   <option {{$pending_order->status == 'delivered'?'selected':''}} value="delivered">{{__('site.delivered')}}</option>
                                                   <option {{$pending_order->status == 'completed'?'selected':''}} value="completed">{{__('site.completed')}}</option>
                                                </select>
                                                <input type="submit" value="{{__('site.change')}}" class="submit px-3">
                                            </div>
                            </form>
                        </span>
                        <span class="m-b-15 d-block">
                            <span>{{__('site.payment_status')}}:</span> {{__('site.'.$pending_order->payment_status)}}
                        </span>
                        <div class="comment-footer">
                            <span class="text-muted float-right"><span>{{__('site.total')}}:</span> {{$pending_order->total_price}} {{__('site.currency')}}</span>
                            <a href="{{route('orders.show', $pending_order->id)}}">
                                <button type="button" class="btn btn-success btn-sm">
                                    {{__('site.show')}}
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="d-flex flex-row comment-row m-t-0">
                    {{__('site.null')}}
                </div>
                @endforelse

        </div>
    </div>
</div>
