@extends('layouts.site')
@section('title', 'Profile | Edit')
@section('css')
    @include('site.profile.includes.links')
@endsection
@section('content')
    @include('site.parts.hero', ['title' => 'Edit Profile'])
    <div id="app">

        @include('site.profile.includes.breadcrumb', ['title' => 'Edit Profile'])

        <div style="background: none"  class="alice-bg section-padding-bottom">
            <div class="container no-gliters">
                <div class="row no-gliters">
                    <div class="col">
                        <div class="dashboard-container">
                            <div style="background: #fdfdfd"  class="dashboard-content-wrapper">
                                <form action="{{route('profile.update')}}" method="POST" class="dashboard-form" name="canProfileForm" enctype="multipart/form-data" novalidate="novalidate">
                                    @csrf
                                    @method('PATCH')
                                    <input type="hidden" name="image" id="avatarHidden">
                                    <div class="dashboard-section upload-profile-photo">
                                        <div class="update-photo">
                                            <img class="image" id="candidateImg" src="{{isset(auth()->user()->image->url)?'/storage/'.auth()->user()->image->url:asset('assets/site/images/avatar.png')}}" alt="">
                                        </div>
                                        <div style="background: #fbaf29 !important;" class="file-upload">
                                            <input  type="file" name="image" id="upload_image" value="" class="file-input">Change
                                            Avatar
                                        </div>
                                    </div>

                                    <div class="dashboard-section basic-info-input">

                                        <div class="row">
                                            <label class="col-sm-3 col-form-label">Name</label>

                                            <div class="col-9">
                                                <div class="row">
                                                    <div class="form-group col-6">
                                                        <input type="text" name="first_name" value="{{auth()->user()->first_name??old('first_name')}}" class="form-control" placeholder="First Name">
                                                    </div>

                                                    <div class="form-group col-6">
                                                        <input type="text" name="last_name" value="{{auth()->user()->last_name??old('last_name')}}" class="form-control" placeholder="Last Name">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Email Address</label>
                                            <div class="col-sm-9">
                                                <input type="email" name="email" class="form-control" value="{{auth()->user()->email??old('email')}}" placeholder="email@example.com">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">City</label>
                                            <div class="col-sm-9">
                                                <select class="form-control" name="city_id">
                                                    <option  value="{{null}}">select city</option>
                                                    @foreach($cities as $city)
                                                        <option {{$city->id == auth()->user()->city_id|old('city_id')?'selected':''}} value="{{$city->id}}">{{$city->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="address" class="col-sm-3 col-form-label">Address</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="address" id="address" value="{{auth()->user()->address??old('address')}}" class="form-control" autocomplete="address" placeholder="address">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="phone" class="col-sm-3 col-form-label">Phone</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="phone" id="phone" value="{{auth()->user()->phone??old('phone')}}" class="form-control" autocomplete="tel" placeholder="01 xxxxxxxxx">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label"></label>
                                        <div class="col-sm-9">
                                            <button class="button" type="submit">Save Change</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            @include('site.profile.includes.sidebar', ['edit' => 'active'])

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    @include('site.profile.includes.scripts')
@endsection
