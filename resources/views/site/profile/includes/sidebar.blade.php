<div style="background: #ffbe08  ; color: white" class="dashboard-sidebar">
    <div class="company-info">
        <div class="thumb">
            <img src="{{isset(auth()->user()->image->url)?'/storage/'.auth()->user()->image->url:asset('assets/site/images/avatar.png')}}" class="img-fluid" alt="">
        </div>
        <div class="company-body">
            <h5 style="color: #2a3d45">{{auth()->user()->full_name}}</h5>
            <span>{{auth()->user()->email}}</span>
        </div>
    </div>


    <div  class="dashboard-menu">
        <ul >

            <li class="{{$edit??''}}"><i class="ion-ios-person"></i><a  href="{{route('profile.edit')}}">{{__('site.edit_profile')}}</a></li>
            <li class="{{$orders??''}} &quot;&quot;"><i class="ion-ios-paper"></i><a  href="{{route('profile.orders')}}">{{__('site.orders')}}</a></li>
        </ul>
        <ul class="delete">
            <form id="logout-form" action="{{route('logout')}}" method="POST" style="display: none;">
                @csrf
            </form>
            <li><i class="ion-ios-power"></i><a href="{{route('logout')}}" onclick="event.preventDefault();
                               document.getElementById(&#39;logout-form&#39;).submit();">{{__('site.logout')}}</a></li>
        </ul>
    </div>
</div>
