<div class="card">
    <div class="card-body">
        <h4 class="card-title">Pending Orders</h4>
        <div class="todo-widget scrollable" style="height:450px;">
            <ul class="list-task todo-list list-group m-b-0" data-role="tasklist">
                @foreach($pending_orders as $pending_order)
                <li class="list-group-item todo-item" data-role="task">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="{{$pending_order->id}}">
                        <label class="custom-control-label todo-label" for="{{$pending_order->id}}">
                            <span class="badge badge-pill badge-danger float-right">Today</span>
                            <h4 class="badge">Name: {{$pending_order->name??$pending_order->user->name}}</h4>
                            <h4 class="badge">Phone: {{$pending_order->name??$pending_order->user->phone}}</h4>
                            <h4 class="badge">Total: {{$pending_order->total_price}}</h4>
                            @foreach(App\Cart::getUserCart($pending_order->user_id)->whereOrderId($pending_order->id)->get() as $cartItem)
                            <div style="padding-top: 20px" class="d-flex flex-row comment-row m-t-0">
                                <div class="p-2"><img style="border-radius: 0 !important;" src="{{@$cartItem->product->image->url?(str_contains(@$cartItem->product->image->url, 'products')?'/storage/'.@$cartItem->product->image->url:@$cartItem->product->image->url):asset('assets/site/images/default.png')}}" alt="user" width="50" class="rounded-circle"></div>
                                <div class="comment-text w-100">
                                    <h6 class="font-medium">{{@$cartItem->product->name}}</h6>
{{--                                    <span class="m-b-15 d-block ">{{@$cartItem->product->description}} </span>--}}
                                    <div class="comment-footer">
                                        <span class="text-muted float-right">{{@$cartItem->product->discount_price}}</span>

                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </label>
                    </div>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
