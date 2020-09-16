<section class="ftco-section ftco-category ftco-no-pt mt-5">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="row">
                    <div class="col-md-6 order-md-last align-items-stretch d-flex">
                        <div class="category-wrap-2 ftco-animate img align-self-stretch d-flex" style="background-image: url({{asset('assets/site/images/categories.jpg')}});">
                            <div class="text text-center">
                                <h2>Categories</h2>
                                <p>There are many main and sub-categories to provide easy searching for the product you need</p>
                                <p><a href="{{route('products.index')}}" class="btn btn-primary">Shop now</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        @foreach($categories_section1 as $category)
                            <div class="category-wrap ftco-animate img mb-4 d-flex align-items-end" style="background-image: url({{@$category->image->url?(str_contains(@$category->image->url, 'categories')?'/storage/'.@$category->image->url:@$category->image->url):asset('assets/site/images/default.png')}});">
                                <div class="text px-3 py-1">
                                    <h2 class="mb-0"><a href="{{route('products.categories.getCategoryProducts', $category->id)}}">{{$category->name}}</a></h2>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                @foreach($categories_section2 as $category)
                    <div class="category-wrap ftco-animate img mb-4 d-flex align-items-end" style="background-image: url({{@$category->image->url?(str_contains(@$category->image->url, 'categories')?'/storage/'.@$category->image->url:@$category->image->url):asset('assets/site/images/default.png')}});">
                        <div class="text px-3 py-1">
                            <h2 class="mb-0"><a href="{{route('products.categories.getCategoryProducts', $category->id)}}">{{$category->name}}</a></h2>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
