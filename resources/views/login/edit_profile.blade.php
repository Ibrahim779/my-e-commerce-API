@extends('login.layout.login-layout')

@section('title',__('site.register'))

@section('content')
    <div class="limiter">
        <div class="container-login100" style="background-image: url({{asset('login_assets/images/bg-01.jpg')}});">
            <div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">
                <form method="post" action="{{ route('users.update') }}"
                      class="login100-form validate-form" enctype="multipart/form-data">
                    @csrf
                    <a href="{{route('home.index')}}">
                        <i class="fa fa-arrow-left fa-3x" aria-hidden="true"></i>
                    </a>
                    <span class="login100-form-title p-b-49">
						{{__('dashboard.profile')}}
					</span>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <i class="fa fa-times"></i>
                            </button>
                            <span>
                        {{$errors->first()}}
                    </span>
                        </div>
                    @endif
                    <script type="text/javascript">
                        function changeToFiles(component) {
                            $("#files").change(function () {
                                let filename = this.files[0].name
                                $(component).text(filename);
                            });
                        }
                    </script>
                    <div class="wrap-input100 validate-input m-b-23">
                        <span class="label-input100">{{__('site.avatar')}}</span>
                        <img class="img-fluid d-block" style="max-height: 100px" src="{{$user->avatar}}">
                        <div class="m-t-10">
                            <label onclick="changeToFiles(this);" for="files" class="btn btn-primary">
                                {{__('site.avatar_change')}}
                            </label>
                            <input id="files" class="d-none" name="avatar" type="file">
                        </div>
                    </div>
                    <div class="wrap-input100 validate-input m-b-23" data-validate="First Name is required">
                        <span class="label-input100">{{__('site.first_name')}}</span>
                        <input class="input100" type="text" name="first_name"
                               value="{{old('first_name')??$user->first_name}}"
                               placeholder="{{__('site.first_name')}}">

                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Last Name is required">
                        <span class="label-input100">{{__('site.last_name')}}</span>
                        <input class="input100" type="text" name="last_name"
                               value="{{old('last_name')??$user->last_name}}"
                               placeholder="{{__('site.last_name')}}">

                    </div>
                    <div class="wrap-input100 validate-input" data-validate="Email is required">
                        <span class="label-input100">{{__('site.email')}}</span>
                        <input class="input100" type="email" name="email"
                               value="{{old('email')??$user->email}}"
                               placeholder="{{__('site.email')}}">

                    </div>
                    <div class="wrap-input100 validate-input" data-validate="Phone is required">
                        <span class="label-input100">{{__('site.phone')}}</span>
                        <input class="input100" type="tel" name="phone"
                               value="{{old('phone')??$user->phone}}"
                               placeholder="{{__('site.phone')}}">

                    </div>
                    <div class="wrap-input100 validate-input" data-validate="Job is required">
                        <span class="label-input100">{{__('site.job')}}</span>
                        <input class="input100" type="text" name="job"
                               value="{{old('job')??$user->job}}"
                               placeholder="{{__('site.job')}}">

                    </div>
                    <div class="wrap-input100 validate-input" data-validate="Address is required">
                        <span class="label-input100">{{__('site.address')}}</span>
                        <input class="input100" type="text" name="address"
                               value="{{old('address')??$user->address}}"
                               placeholder="{{__('site.address')}}">

                    </div>
                    <div class="wrap-input100">
                        <span class="label-input100">{{__('site.password')}}</span>
                        <input class="input100" type="password" name="password" placeholder="{{__('site.password')}}">

                    </div>
                    <div class="wrap-input100">
                        <span class="label-input100">{{__('site.password_confirm')}}</span>
                        <input class="input100" type="password" name="password_confirmation"
                               placeholder="{{__('site.password_confirm')}}">

                    </div>
                    <div class="text-right p-t-8 p-b-31">

                    </div>
                    <div class="container-login100-form-btn">
                        <div class="wrap-login100-form-btn">
                            <div class="login100-form-bgbtn"></div>
                            <button type="submit" class="login100-form-btn">
                                {{__('dashboard.actions.save')}}
                            </button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>

@endsection
