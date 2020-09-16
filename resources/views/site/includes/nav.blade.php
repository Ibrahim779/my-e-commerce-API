
<div class="py-1 bg-primary">
    <div class="container">
        <div class="row no-gutters d-flex align-items-start align-items-center px-md-0">
            <div class="col-lg-12 d-block">
                <div class="row d-flex">
                    <div class="col-md pr-4 d-flex topper align-items-center">
                        <div class="icon mr-2 d-flex justify-content-center align-items-center"><span class="icon-phone2"></span></div>
                        <span class="text">+ 1235 2355 98</span>
                    </div>
                    <div class="col-md pr-4 d-flex topper align-items-center">
                        <div class="icon mr-2 d-flex justify-content-center align-items-center"><span class="icon-paper-plane"></span></div>
                        <span class="text">youremail@email.com</span>
                    </div>
                    <div class="col-md-5 pr-4 d-flex topper align-items-center text-lg-right">
                        <span class="text">3-5 Business days delivery &amp; Free Returns</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
        <a class="navbar-brand" href="{{route('home.index')}}">{{$information['name']}}</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> Menu
        </button>

        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active"><a href="{{route('home.index')}}" class="nav-link">Home</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Shop</a>
                    <div class="dropdown-menu" aria-labelledby="dropdown04">
                        <a class="dropdown-item" href="{{route('products.index')}}">Shop</a>
                        <a class="dropdown-item" href="{{route('wishlist.index')}}">
                            Wishlist
                            <span style="color:white;background: #febe08;border-radius: 50px; padding: 0 6px 0 6px">
                            {{\App\Wishlist::whereUserId(1)->count()}}
                            </span>
                        </a>
                        <a class="dropdown-item" href="{{route('cart.index')}}">
                            Cart
                            <span style="color:white;background: #febe08;border-radius: 50px; padding: 0 6px 0 6px">
                                {{--                            Todo--}}
                            {{\App\Cart::whereUserId(1)->whereOrderId(null)->count()}}
                            </span>
                        </a>
                        <a class="dropdown-item" href="{{route('checkout.index')}}">Checkout</a>
                    </div>
                </li>
                <li class="nav-item"><a href="{{route('about.index')}}" class="nav-link">About</a></li>
                <li class="nav-item"><a href="{{route('contact.index')}}" class="nav-link">Contact</a></li>
                <li class="nav-item"><a href="{{route('profile.edit')}}" class="nav-link">Profile</a></li>
                <li class="nav-item cta cta-colored">
                    <a href="{{route('cart.index')}}" class="nav-link">
                        <span class="icon-shopping_cart">
{{--                            Todo--}}
                        </span>[{{\App\Cart::whereUserId(1)->whereOrderId(null)->count()}}]
                    </a>
                </li>

            </ul>
        </div>
    </div>
</nav>
<!-- END nav -->
