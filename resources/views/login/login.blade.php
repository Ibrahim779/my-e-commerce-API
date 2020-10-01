@extends('login.layout.login-layout')

@section('title',__('site.login'))

@section('content')
    <div class="limiter">
        <div class="container-login100" style="background-image:url({{asset('assets/site/images/auth.jpg')}});">
            <div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">
                <form method="post" action="{{route('login')}}" class="login100-form validate-form">
                    @csrf
                    <a href="{{route('home.index')}}">
                    <i class="fa fa-arrow-left fa-3x" aria-hidden="true"></i>
                    </a>
                    <span class="login100-form-title p-b-49">
						{{__('site.login')}}
					</span>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <i class="fa fa-times">&times;</i>
                            </button>
                            <span>
                        {{$errors->first()}}
                    </span>
                        </div>
                    @endif
                    <div class="wrap-input100 validate-input m-b-23" data-validate="Email is reauired">
                        <span class="label-input100">{{__('site.email')}}</span>
                        <input value="{{old('email')}}" class="input100" type="email" name="email" placeholder="{{__('site.email')}}">
                        <span class="focus-input100" data-symbol="&#xf206;"></span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Password is required">
                        <span class="label-input100">{{__('site.password')}}</span>
                        <input class="input100" type="password" name="password" placeholder="{{__('site.password')}}">
                        <span class="focus-input100" data-symbol="&#xf190;"></span>
                    </div>

                    {{--<div class="text-right p-t-8 p-b-31">--}}
                    {{--    <a href="#">--}}
                    {{--        Forgot password?--}}
                    {{--    </a>--}}
                    {{--</div>--}}

                    <div class="container-login100-form-btn p-t-50">
                        <div class="wrap-login100-form-btn">
                            <div class="login100-form-bgbtn"></div>
                            <button style="background: #febe08" class="login100-form-btn">
                                {{__('site.login')}}
                            </button>
                        </div>
                    </div>
                    <div class="flex-col-c p-t-155">
						<span class="txt1 p-b-17">
							{{__('site.register')}}
						</span>

                        <a href="{{route('register')}}" class="txt2">
                            {{__('site.register')}}
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection


