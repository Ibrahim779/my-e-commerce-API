<footer class="ftco-footer ftco-section">
    <div class="container">
        <div class="row">
            <div class="mouse">
                <a href="#" class="mouse-icon">
                    <div class="mouse-wheel"><span class="ion-ios-arrow-up"></span></div>
                </a>
            </div>
        </div>
        <div class="row mb-5">
            <div class="col-md">
                <div class="ftco-footer-widget mb-4">
                    <h2 class="ftco-heading-2">{{$information['name']}}</h2>
                    <p>{{$information['sentence']}}</p>
                    <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
                        <li class="ftco-animate"><a href="{{$information['facebook_link']}}"><span class="icon-twitter"></span></a></li>
                        <li class="ftco-animate"><a href="{{$information['twitter_link']}}"><span class="icon-facebook"></span></a></li>
                        <li class="ftco-animate"><a href="{{$information['instagram_link']}}"><span class="icon-instagram"></span></a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md">
                <div class="ftco-footer-widget mb-4 ml-md-5">
                    <h2 class="ftco-heading-2">Menu</h2>
                    <ul class="list-unstyled">
                        <li><a href="{{route('home.index')}}" class="py-2 d-block">Home</a></li>
                        <li><a href="{{route('about.index')}}" class="py-2 d-block">About</a></li>
                        <li><a href="{{route('products.index')}}" class="py-2 d-block">Shop</a></li>
                        <li><a href="{{route('contact.index')}}" class="py-2 d-block">Contact Us</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-4">
                <div class="ftco-footer-widget mb-4">
                    <h2 class="ftco-heading-2">Services</h2>
                    <div class="d-flex">
                        <ul class="list-unstyled mr-l-5 pr-l-3 mr-4">
                            <li>Support</li>
                            <li>Shipping</li>
                            <li>Always Fresh</li>
                            <li>Superior Quality</li>
                        </ul>
                        <ul class="list-unstyled">
                            <li>24/7 Support</li>
                            <li><a href="{{route('contact.index')}}" class="py-2 d-block">Contact</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md">
                <div class="ftco-footer-widget mb-4">
                    <h2 class="ftco-heading-2">Have a Questions?</h2>
                    <div class="block-23 mb-3">
                        <ul>
                            <li><span class="icon icon-map-marker"></span><span class="text">{{$information['address']}}</span></li>
                            <li><a href="#"><span class="icon icon-phone"></span><span class="text">{{$information['phone']}}</span></a></li>
                            <li><a href="#"><span class="icon icon-envelope"></span><span class="text">{{$information['email']}}</span></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 text-center">

                <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    Copyright &copy;<script>document.write(new Date().getFullYear());</script> | programmed by <i class="icon-heart color-danger" aria-hidden="true"></i> <a href="https://ema-web.site" target="_blank">Ibrahim Ismail</a> | designed by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                </p>
            </div>
        </div>
    </div>
</footer>
