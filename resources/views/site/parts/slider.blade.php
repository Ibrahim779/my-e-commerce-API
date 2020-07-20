<section id="home-section" class="hero">
    @foreach($sliders as $slider)
        <div class="home-slider owl-carousel">
            <div class="slider-item" style="background-image: url({{'storage/'.@$slider->image->url}});">
                <div class="overlay"></div>
                <div class="container">
                    <div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">

                        <div class="col-md-12 ftco-animate text-center">
                            <h1 class="mb-2">{{$slider->title}}</h1>
                            <h2 class="subheading mb-4">We deliver organic vegetables &amp; fruits</h2>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    @endforeach
</section>
