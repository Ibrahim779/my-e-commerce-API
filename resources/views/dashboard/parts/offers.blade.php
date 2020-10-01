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
                <span class="text-muted m-b-15 d-block">{{$offer->bar_code}}</span>
                <span class="m-b-15 d-block">{{$offer->description}} </span>
                <div class="comment-footer">
                    <span class="float-right" style="text-decoration: line-through;">{{$offer->price}} {{__('site.currency')}}</span> <span class="float-right" style="color: #ffbe08 ">{{$offer->discount_price}} {{__('site.currency')}}</span>
                        <a href="{{route('products.removeDiscount', $offer->id)}}">
                            <button type="button" class="btn btn-success btn-sm">
                                {{__('dashboard.remove_discount')}}
                            </button>
                        </a>
                    <a class="float-left mr-2" href="{{route('products.categories.edit', ['category' => $offer->category_id,'product' => $offer->id])}}">
                        <button type="button" class="btn btn-cyan btn-sm">{{__('dashboard.edit')}}</button>
                    </a>
                    <form method="post"  action="{{route('products.destroy', $offer->id )}}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">{{__('dashboard.delete')}}</button>
                    </form>
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
