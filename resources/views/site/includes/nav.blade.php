
<div class="py-1 bg-primary">
    <div class="container">
        <div style="text-align: initial;" class="row no-gutters d-flex align-items-start align-items-center px-md-0">
            <div class="col-lg-12 d-block">
                <div class="row d-flex">
                    <div class="col-md pr-4 d-flex topper align-items-center">
                        <div class="icon mr-2 d-flex justify-content-center align-items-center"><span class="icon-phone2"></span></div>
                        <span class="text">{{$information['phone']}}</span>
                    </div>
                    <div class="col-md pr-4 d-flex topper align-items-center">
                        <div class="icon mr-2 d-flex justify-content-center align-items-center"><span class="icon-paper-plane"></span></div>
                        <span class="text">{{$information['email']}}</span>
                    </div>
                    <div class="col-md-5 pr-4 d-flex topper align-items-center text-lg-right">
                        <span class="text">{{$information['service']}}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
        <a class="navbar-brand" href="{{route('home.index')}}">{{__('setting.site_name')}}</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> {{__('site.menu')}}
        </button>

        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a href="{{route('home.index')}}" class="nav-link">
                        {{__('site.home')}}
                    </a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{__('site.shop')}}
                    </a>
                    <div class="dropdown-menu" aria-labelledby="dropdown04">
                        <a class="dropdown-item" href="{{route('products.index')}}">
                            {{__('site.shop')}}
                        </a>
                        <a class="dropdown-item" href="{{route('wishlist.index')}}">
                            {{__('site.wishlist')}}
                            <span style="color:white;background: #febe08;border-radius: 50px; padding: 0 6px 0 6px">
                            {{\App\Wishlist::whereUserId(auth()->id())->count()}}
                            </span>
                        </a>
                        <a class="dropdown-item" href="{{route('cart.index')}}">
                            {{__('site.cart')}}
                            <span style="color:white;background: #febe08;border-radius: 50px; padding: 0 6px 0 6px">
                            {{\App\Cart::whereUserId(auth()->id())->whereOrderId(null)->count()}}
                            </span>
                        </a>
                        <a class="dropdown-item" href="{{route('checkout.index')}}">
                            {{__('site.checkout')}}
                        </a>
                    </div>
                </li>
                <li class="nav-item"><a href="{{route('about.index')}}" class="nav-link">{{__('site.about')}}</a></li>
                <li class="nav-item"><a href="{{route('contact.index')}}" class="nav-link">{{__('site.contact')}}</a></li>
                <li class="nav-item"><a href="{{route('profile.edit')}}" class="nav-link">{{__('site.profile')}}</a></li>
                <li class="nav-item cta cta-colored">
                    <a href="{{route('cart.index')}}" class="nav-link">
                        <span class="icon-shopping_cart">
                        </span>[{{\App\Cart::whereUserId(auth()->id())->whereOrderId(null)->count()}}]
                    </a>
                </li>
                <li class="nav-item cta cta-colored">
                    <a href="{{route('profile.orders')}}" class="nav-link">
                       {{__('site.orders')}} <span class="icon-motorcycle">
                        </span>[{{\App\Order::whereUserId(auth()->id())->count()}}]
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle"  id="dropdown04" data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false">
                        <i class="icon-translate" aria-hidden="true"></i>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="dropdown04">
                        <a class="dropdown-item" href="{{route('lang', 'ar')}}">العربية</a>
                        <a class="dropdown-item" href="{{route('lang', 'en')}}">English</a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- END nav -->
