<div class="card">
    <div class="card-body">
        <h4 class="card-title">{{__('dashboard.products_unpublished')}}</h4>
    </div>
    <div class="comment-widgets scrollable">
        <!-- Comment Row -->
        @forelse($products_unpublished as $product)
        <div class="d-flex flex-row comment-row m-t-0">
            <div class="p-2"><img style="border-radius: 0 !important;" src="{{@$product->image->url?(str_contains(@$product->image->url, 'products')?'/storage/'.@$product->image->url:@$product->image->url):asset('assets/site/images/default.png')}}" alt="user" width="50" class="rounded-circle"></div>
            <div class="comment-text w-100">
                <h6 class="font-medium">{{$product->name}}</h6>
                <span class="text-muted m-b-15 d-block">{{$product->bar_code}}</span>
                <span class="m-b-15 d-block">{{$product->description}}</span>
                <div class="comment-footer">
                    @if($product->discount)
                    <span class="float-right" style="text-decoration: line-through;">{{$product->price}} {{__('site.currency')}}</span> <span class="float-right" style="color: #ffbe08 ">{{$product->discount_price}} {{__('site.currency')}}</span>
                    @else
                        <span class="float-right" style="color: #ffbe08 ">{{$product->price}} {{__('site.currency')}}</span>
                    @endif
                    <a href="{{route('products.published', $product->id)}}">
                        <button type="button" class="btn btn-success btn-sm">
                            {{$product->is_published? __('dashboard.unpublished') : __('dashboard.published')}}
                        </button>
                    </a>
                        <a class="float-left mr-2" href="{{route('products.categories.edit', ['category' => $product->category_id,'product' => $product->id])}}">
                            <button type="button" class="btn btn-cyan btn-sm">{{__('dashboard.edit')}}</button>
                        </a>
                        <form method="post"  action="{{route('products.destroy', $product->id )}}">
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
