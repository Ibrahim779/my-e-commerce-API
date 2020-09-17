<section class="ftco-section ftco-no-pt ftco-no-pb py-5 bg-light">
    <div class="container py-4">
        <div class="row d-flex justify-content-center py-5">
            <div class="col-md-6">
                <h2 style="font-size: 22px;" class="mb-0">{{__('site.subscribe_title')}}</h2>
                <span>{{__('site.subscribe_sentence')}}</span>
            </div>
            <div class="col-md-6 d-flex align-items-center">
                <form method="post" action="{{route('subscribes.store')}}" class="subscribe-form">
                    @csrf
                    <div class="form-group d-flex">
                        <input name="email" type="text" class="form-control" placeholder="{{__('site.email')}}">
                        <input type="submit" value="{{__('site.subscribe')}}" class="submit px-3">
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
