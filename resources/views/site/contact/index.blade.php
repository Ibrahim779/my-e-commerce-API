@extends('layouts.site')
@section('content')
    @include('site.parts.hero', ['title' => __('site.contact')] )
<section style="background: none !important;" class="ftco-section contact-section bg-light">
    <div class="container">
        <div  class="row d-flex mb-5 contact-info">
            <div class="w-100"></div>
            <div  class="col-md-3 d-flex">
                <div style="background: #febe08 !important;" class="info bg-white p-4">
                    <p style="color:white;font-style: italic"><strong>{{__('site.address')}} :</strong> <span style="color: white">{{__('setting.site_address')}}</span></p>
                </div>
            </div>
            <div class="col-md-3 d-flex">
                <div style="background: #febe08 !important;" class="info bg-white p-4">
                    <p style="color:white;font-style: italic"><strong>{{__('site.phone')}} :</strong> <a style="color: white" href="tel://1234567920">{{$information['phone']}}</a></p>
                </div>
            </div>
            <div class="col-md-3 d-flex">
                <div style="background: #febe08 !important;" class="info bg-white p-4">
                    <p style="color:white;font-style: italic"><strong>{{__('site.email')}} :</strong> <a style="color: white" href="mailto:info@yoursite.com">{{$information['email']}}</a></p>
                </div>
            </div>
            <div class="col-md-3 d-flex">
                <div style="background: #febe08 !important;" class="info bg-white p-4">
                    <p style="color:white; font-style: italic"><strong>{{__('site.website')}} :</strong> <a style="color: white" href="#">{{$information['website']}}</a></p>
                </div>
            </div>
        </div>
        <div class="row block-9">
            <div class="col-md-6 order-md-last d-flex">
                <form method="post" action="{{route('contact.store')}}" class="bg-white p-5 contact-form">
                    @csrf
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <i class="material-icons">{{__('site.close')}}</i>
                            </button>
                            <span>
                                        {{$errors->first()}}
                                    </span>
                        </div>
                    @endif
                    <div class="form-group">
                        <input value="{{old('name')??auth()->user()->full_name}}" name="name" type="text" class="form-control" placeholder="{{__('site.name')}}">
                    </div>
                    <div class="form-group">
                        <input value="{{old('phone')??auth()->user()->phone}}" name="phone" type="text" class="form-control" placeholder="{{__('site.phone')}}">
                    </div>
                    <div class="form-group">
                        <textarea name="message" id="" cols="30" rows="7" class="form-control" placeholder="{{__('site.message')}}">{{old('message')}}</textarea>
                    </div>
                    <div class="form-group">
                        <input type="submit" value="{{__('site.send_message')}}" class="btn btn-primary py-3 px-5">
                    </div>
                </form>

            </div>

            <div class="col-md-6 d-flex">
                <div id="map" class="bg-white"></div>
            </div>
        </div>
    </div>
</section>
@endsection
