<div class="row">
    <!-- Column -->
    <div class="col-md-6 col-lg-3">
        <div class="card card-hover">
            <div class="box bg-cyan text-center">
                <h1 class="font-light text-white"><i class="mdi mdi-view-dashboard"></i></h1>
                <h6 class="text-white">{{__('dashboard.dashboard')}}</h6>
            </div>
        </div>
    </div>
    <!-- Column -->
    <div class="col-md-6 col-lg-3">
        <div class="card card-hover">
            <div class="box bg-success text-center">
                <h1 class="font-light text-white"><i>{{$products_unpublished_count}}</i></h1>
                <h6 class="text-white">{{__('dashboard.products_unpublished')}}</h6>
            </div>
        </div>
    </div>
    <!-- Column -->
    <div class="col-md-6 col-lg-3">
        <div class="card card-hover">
            <div class="box bg-warning text-center">
                <h1 class="font-light text-white"><i>{{$messages_count}}</i></h1>
                <h6 class="text-white">{{__('dashboard.messages')}}</h6>
            </div>
        </div>
    </div>
    <!-- Column -->
    <div class="col-md-6 col-lg-3">
        <div class="card card-hover">
            <div class="box bg-danger text-center">
                <h1 class="font-light text-white"><i>{{$pending_orders_count}}</i></h1>
                <h6 class="text-white">{{__('dashboard.pending_orders')}}</h6>
            </div>
        </div>
    </div>
</div>
