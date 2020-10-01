<!-- ============================================================== -->
<!-- Left Sidebar - style you can find in sidebar.scss  -->
<!-- ============================================================== -->
<aside class="left-sidebar" data-sidebarbg="skin5">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav" class="p-t-30">
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('dashboard.index')}}" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span class="hide-menu">{{__('dashboard.dashboard')}}</span></a></li>
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('categories.index')}}" aria-expanded="false"><i class="mdi mdi-library-books"></i><span class="hide-menu"> {{__('site.categories')}}</span></a></li>

                <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-format-indent-increase"></i><span class="hide-menu"> {{__('site.subcategories')}}</span></a>
                    <ul aria-expanded="false" class="collapse  first-level">
                        @foreach($categories as $category)
                        <li class="sidebar-item">
                            <a href="{{route('subcategories.categories.index', $category->id)}}" class="sidebar-link">
                                <i class="mdi mdi-chevron-double-right"></i>
                                <span class="hide-menu">{{$category->name}} </span>
                            </a>
                        </li>
                            @endforeach
                    </ul>
                </li>
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('brands.index')}}" aria-expanded="false"><i class="mdi mdi-checkbox-multiple-marked"></i><span class="hide-menu"> {{__('site.brands')}}</span></a></li>
                <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi  mdi-bookmark-check"></i><span class="hide-menu"> {{__('site.products')}}</span></a>
                    <ul aria-expanded="false" class="collapse  first-level">
                        @foreach($categories as $category)
                            <li class="sidebar-item">
                                <a href="{{route('products.categories.index', $category->id)}}" class="sidebar-link">
                                    <i class="mdi mdi-chevron-double-right"></i>
                                    <span class="hide-menu">{{$category->name}} </span>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </li>
                <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-bookmark-remove"></i><span class="hide-menu"> {{__('dashboard.products_unpublished')}} </span></a>
                    <ul aria-expanded="false" class="collapse  first-level">
                        @foreach($categories as $category)
                            @if($category->products()->unPublished()->count()>0)
                            <li class="sidebar-item">
                                <a href="{{route('products.categories.unPublished', $category->id)}}" class="sidebar-link">
                                    <i class="mdi mdi-chevron-double-right"></i>
                                    <span class="hide-menu">{{$category->name}} </span>
                                </a>
                            </li>
                            @endif
                        @endforeach
                    </ul>
                </li>
                <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-paper-cut-vertical"></i><span class="hide-menu"> {{__('site.discount_products')}}</span></a>
                    <ul aria-expanded="false" class="collapse  first-level">
                        @foreach($categories as $category)
                            @if($category->products()->hasDiscount()->count()>0)
                            <li class="sidebar-item">
                                <a href="{{route('products.categories.hasDiscount', $category->id)}}" class="sidebar-link">
                                    <i class="mdi mdi-chevron-double-right"></i>
                                    <span class="hide-menu">{{$category->name}} </span>
                                </a>
                            </li>
                            @endif
                        @endforeach
                    </ul>
                </li>
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('cities.index')}}" aria-expanded="false"><i class="mdi mdi-map-marker-radius"></i><span class="hide-menu"> {{__('site.shipping').' / '.__('dashboard.cities')}}</span></a></li>
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('orders.index')}}" aria-expanded="false"><i class="mdi mdi-motorbike"></i><span class="hide-menu"> {{__('site.orders')}}</span></a></li>
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('orders.completed')}}" aria-expanded="false"><i class="mdi mdi-clipboard-check"></i><span class="hide-menu"> {{__('dashboard.completed_orders')}}</span></a></li>
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('coupons.index')}}" aria-expanded="false"><i class="mdi mdi-multiplication-box"></i><span class="hide-menu"> {{__('site.coupon')}}</span></a></li>
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('sliders.index')}}" aria-expanded="false"><i class="mdi mdi-sign-caution"></i><span class="hide-menu"> {{__('dashboard.sliders')}}</span></a></li>
                @if(auth()->user()->role == 'owner')
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('users.index')}}" aria-expanded="false"><i class="mdi  mdi-account-multiple"></i><span class="hide-menu"> {{__('dashboard.users')}}</span></a></li>
                @endif
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('messages.index')}}" aria-expanded="false"><i class="mdi mdi-message-text"></i><span class="hide-menu"> {{__('dashboard.messages')}}</span></a></li>
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('subscribes.index')}}" aria-expanded="false"><i class="mdi mdi-email"></i><span class="hide-menu"> {{__('dashboard.subscribes')}}</span></a></li>
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('settings.index')}}" aria-expanded="false"><i class="mdi mdi-settings"></i><span class="hide-menu"> {{__('dashboard.settings')}}</span></a></li>
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
<!-- ============================================================== -->
<!-- End Left Sidebar - style you can find in sidebar.scss  -->
<!-- ============================================================== -->
