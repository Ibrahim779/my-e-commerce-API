@extends('layouts.site')
@section('content')
    @include('site.parts.hero', ['title' => __('site.about')])
    <section style="background: none !important;" class="ftco-section ftco-no-pb ftco-no-pt bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-5 p-md-5 img img-2 d-flex justify-content-center align-items-center" style="background-image: url({{asset('assets/site/images/about_1.jpg')}});">
                    <a href="https://vimeo.com/45830194" class="icon popup-vimeo d-flex justify-content-center align-items-center">
                        <span class="icon-play"></span>
                    </a>
                </div>
                <div class="col-md-7 py-5 wrap-about pb-md-5 ftco-animate">
                    <div class="heading-section-bold mb-4 mt-md-5">
                        <div class="ml-md-0">
                            <h2 class="mb-4">{{__('setting.site_sentence')}}</h2>
                        </div>
                    </div>
                    <div class="pb-md-5">
                      <p> {{__('setting.site_text')}} </p>
                        <p><a href="{{route('products.index')}}" class="btn btn-primary">{{__('site.shop_now')}}</a></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
