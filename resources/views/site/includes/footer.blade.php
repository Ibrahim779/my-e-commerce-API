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
                <div style="margin-right: -5px;" class="ftco-footer-widget mb-4">
                    <h2 class="ftco-heading-2">{{__('setting.site_name')}}</h2>
                    <p>{{__('setting.site_sentence')}}</p>
                    <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
                        <li class="ftco-animate"><a href="{{$information['facebook_link']}}"><span class="icon-twitter"></span></a></li>
                        <li class="ftco-animate"><a href="{{$information['twitter_link']}}"><span class="icon-facebook"></span></a></li>
                        <li class="ftco-animate"><a href="{{$information['instagram_link']}}"><span class="icon-instagram"></span></a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md">
                <div class="ftco-footer-widget mb-4 ml-md-5">
                    <h2 class="ftco-heading-2">{{__('site.menu')}}</h2>
                    <ul class="list-unstyled">
                        <li><a href="{{route('home.index')}}" class="py-2 d-block">{{__('site.home')}}</a></li>
                        <li><a href="{{route('about.index')}}" class="py-2 d-block">{{__('site.about')}}</a></li>
                        <li><a href="{{route('products.index')}}" class="py-2 d-block">{{__('site.shop')}}</a></li>
                        <li><a href="{{route('contact.index')}}" class="py-2 d-block">{{__('site.contact')}}</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-4">
                <div class="ftco-footer-widget mb-4">
                    <h2  class="ftco-heading-2">{{__('site.services')}}</h2>
                    <div class="d-flex">
                        <ul class="list-unstyled mr-l-5 pr-l-3 mr-4">
                            <li>{{__('site.support')}}</li>
                            <li>{{__('site.fresh')}}</li>
                            <li>{{__('site.shipping')}}</li>
                            <li>{{__('site.quality')}}</li>
                        </ul>
                        <ul class="list-unstyled">
                            <li>{{__('site.support_sentence')}}</li>
                            <li><a href="{{route('contact.index')}}" class="py-2 d-block">{{__('site.contact')}}</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md">
                <div class="ftco-footer-widget mb-4">
                    <h2 class="ftco-heading-2">{{__('site.contact_information')}}</h2>
                    <div class="block-23 mb-3">
                        <ul>
                            <li><span class="icon icon-map-marker"></span> <span style="padding-right: 1px; " class="text">{{__('setting.site_address')}}</span> </li>
                            <li><a href="#"><span class="icon icon-phone"></span> <span style="padding-right: 5px; " class="text">{{$information['phone']}}</span> </a> </li>
                            <li><a href="#"><span class="icon icon-envelope"></span> <span style="padding-right: 5px; " class="text">{{$information['email']}}</span> </a> </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 text-center">

                <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    {{__('site.copyright')}} &copy;<script>document.write(new Date().getFullYear());</script> | {{__('site.programmed')}} <i class="icon-heart color-danger" aria-hidden="true"></i> <a href="https://ema-web.site" target="_blank">{{__('site.ibrahim_ismail')}}</a> | {{__('site.team_work')}} <a href="https://spider-te8.com" target="_blank">Spider-te8</a> | {{__('site.designed')}} <a href="https://colorlib.com" target="_blank">Colorlib</a>
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                </p>
            </div>
        </div>
    </div>
</footer>
