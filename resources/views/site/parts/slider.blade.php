<section id="home-section" class="hero">

        <div class="home-slider owl-carousel" dir="ltr">
            @foreach($sliders as $slider)
            <div class="slider-item" style="background-image: url({{@$slider->image->url?(str_contains(@$slider->image->url, 'sliders')?'/storage/'.@$slider->image->url:@$slider->image->url):asset('assets/site/images/default.png')}});">
                <div class="overlay"></div>
                <div class="container">
                    <div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">

                        <div class="col-md-12 ftco-animate text-center">
                            <h1 class="mb-2">{{$slider->title}}</h1>
                            <h2 class="subheading mb-4">We deliver organic vegetables &amp; fruits</h2>
                            <p><a href="{{route('products.index')}}" class="btn btn-primary">Shop Now</a></p>
                        </div>

                    </div>
                </div>
            </div>
            @endforeach
        </div>

</section>
