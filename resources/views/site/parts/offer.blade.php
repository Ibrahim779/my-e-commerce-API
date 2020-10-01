<section class="ftco-section img" style="background-image: url({{session('dir') == 'rtl'?asset('assets/site/images/offer_ar.jpg'):asset('assets/site/images/offer_en.jpg')}});">
    <div class="container">
        <div class="row justify-content-end">
            <div style="text-align: initial;" class="col-md-6 heading-section ftco-animate deal-of-the-day ftco-animate">
                <span class="subheading">{{__('site.best_price')}}</span>
                <h2 class="mb-4">{{__('site.offer_title')}}</h2>
                <p>{{__('site.offer_sentence')}}</p>
                <h3><a href="{{route('products.index')}}">{{__('site.shop_now')}} </a></h3>
                <div id="timer" class="d-flex mt-5">
                    <div class="time" id="days"></div>
                    <div class="time pl-3" id="hours"></div>
                    <div class="time pl-3" id="minutes"></div>
                    <div class="time pl-3" id="seconds"></div>
                </div>
            </div>
        </div>
    </div>
</section>

@section('script')
    <script>
        function makeTimer() {
            var endDate = '{{date('d', strtotime('friday this week'))>date('d', strtotime('now'))?date('m/d/Y', strtotime('friday this week')):date('m/d/Y', strtotime('friday next week'))}}';
            var endTime = new Date(endDate);
            endTime = (Date.parse(endTime) / 1000);

            var now = new Date();
            now = (Date.parse(now) / 1000);

            var timeLeft = endTime - now;

            var days = Math.floor(timeLeft / 86400);
            var hours = Math.floor((timeLeft - (days * 86400)) / 3600);
            var minutes = Math.floor((timeLeft - (days * 86400) - (hours * 3600 )) / 60);
            var seconds = Math.floor((timeLeft - (days * 86400) - (hours * 3600) - (minutes * 60)));

            if (hours < "10") { hours = "0" + hours; }
            if (minutes < "10") { minutes = "0" + minutes; }
            if (seconds < "10") { seconds = "0" + seconds; }

            $("#days").html(days + "<span>{{__('site.days')}}</span>");
            $("#hours").html(hours + "<span>{{__('site.hours')}}</span>");
            $("#minutes").html(minutes + "<span>{{__('site.minutes')}}</span>");
            $("#seconds").html(seconds + "<span>{{__('site.seconds')}}</span>");

        }

        setInterval(function() { makeTimer(); }, 1000);
    </script>
@endsection
