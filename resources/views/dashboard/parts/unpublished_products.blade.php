<div class="card">
    <div class="card-body">
        <h4 class="card-title">Products UnPublished</h4>
    </div>
    <div class="comment-widgets scrollable">
        <!-- Comment Row -->
        @forelse($products_unpublished as $product)
        <div class="d-flex flex-row comment-row m-t-0">
            <div class="p-2"><img style="border-radius: 0 !important;" src="{{@$product->image->url?(str_contains(@$product->image->url, 'products')?'/storage/'.@$product->image->url:@$product->image->url):asset('assets/site/images/default.png')}}" alt="user" width="50" class="rounded-circle"></div>
            <div class="comment-text w-100">
                <h6 class="font-medium">{{$product->name}}</h6>
                <span class="m-b-15 d-block">{{$product->description}} </span>
                <div class="comment-footer">
                    <span class="text-muted float-right">{{$product->price}}</span>
                    <a href="{{route('products.published', $product->id)}}">
                        <button type="button" class="btn btn-success btn-sm">
                            Published
                        </button>
                    </a>
                    <a href="{{route('products.destroy',  $product->id)}}">
                        <button type="button" class="btn btn-danger btn-sm">
                            Delete
                        </button>
                    </a>
                </div>
            </div>
        </div>
            @empty
        @endforelse
    </div>
</div>
