<div class="card">
    <div class="card-body">
        <h4 class="card-title">{{__('site.discount_products')}}</h4>
    </div>
    <div class="comment-widgets scrollable">
        <!-- Comment Row -->
        @forelse($offers as $offer)
        <div class="d-flex flex-row comment-row m-t-0">
            <div class="p-2"><img style="border-radius: 0 !important;" src="{{@$offer->image->url?(str_contains(@$offer->image->url, 'products')?'/storage/'.@$offer->image->url:@$offer->image->url):asset('assets/site/images/default.png')}}" alt="user" width="50" class="rounded-circle"></div>
            <div class="comment-text w-100">
                <h6 class="font-medium">{{$offer->name}}</h6>
                <span class="m-b-15 d-block">{{$offer->description}} </span>
                <div class="comment-footer">
                    <span class="text-muted float-right">{{$offer->price}}</span>
                        <a href="{{route('products.removeDiscount', $offer->id)}}">
                            <button type="button" class="btn btn-success btn-sm">
                                remove discount
                            </button>
                        </a>
                    <a href="{{route('products.destroy',  $offer->id)}}">
                        <button type="button" class="btn btn-danger btn-sm">
                            Delete
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
