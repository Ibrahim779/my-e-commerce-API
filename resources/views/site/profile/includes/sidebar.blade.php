<div style="background: #ffbe08  ; color: white" class="dashboard-sidebar">
    <div class="company-info">
        <div class="thumb">
            <img src="./Himba _ User Profile Edit_files/15997368305f5a0bfe81f1b.png" class="img-fluid" alt="">
        </div>
        <div class="company-body">
            <h5 style="color: #2a3d45">ibrahim ismail</h5>
            <span>ibrahim.ismail2022018@gmail.com</span>
        </div>
    </div>


    <div  class="dashboard-menu">
        <ul >

            <li class="{{$edit??''}}"><i class="ion-ios-person"></i><a  href="{{route('profile.edit')}}">Edit Profile</a></li>
            <li class="{{$orders??''}} &quot;&quot;"><i class="ion-ios-paper"></i><a  href="{{route('profile.orders')}}">Orders</a></li>
        </ul>
        <ul class="delete">
            <form id="logout-form" action="https://himba.net/logout" method="POST" style="display: none;">
                <input type="hidden" name="_token" value="7IOscdMhX5WDy49RKtHiwZkZmlkCb6lTxyU3w5r2">
            </form>
            <li><i class="ion-ios-power"></i><a href="https://himba.net/logout" onclick="event.preventDefault();
                               document.getElementById(&#39;logout-form&#39;).submit();">Logout</a></li>
        </ul>
    </div>
</div>
