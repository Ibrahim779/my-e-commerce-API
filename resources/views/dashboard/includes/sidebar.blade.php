<!-- ============================================================== -->
<!-- Left Sidebar - style you can find in sidebar.scss  -->
<!-- ============================================================== -->
<aside class="left-sidebar" data-sidebarbg="skin5">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav" class="p-t-30">
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('dashboard.index')}}" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span class="hide-menu">Dashboard</span></a></li>
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('categories.index')}}" aria-expanded="false"><i class="mdi mdi-chart-bar"></i><span class="hide-menu">Categories</span></a></li>

                <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi-clipboard-text"></i><span class="hide-menu">subcategories </span></a>
                    <ul aria-expanded="false" class="collapse  first-level">
                        @foreach($categories as $category)
                        <li class="sidebar-item">
                            <a href="{{route('subcategories.categories.index', $category->id)}}" class="sidebar-link">
                                <i class="mdi mdi-note-outline"></i>
                                <span class="hide-menu">{{$category->name}} </span>
                            </a>
                        </li>
                            @endforeach
                    </ul>
                </li>
                <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-face"></i><span class="hide-menu">Products</span></a>
                    <ul aria-expanded="false" class="collapse  first-level">
                        @foreach($categories as $category)
                            <li class="sidebar-item">
                                <a href="{{route('products.categories.index', $category->id)}}" class="sidebar-link">
                                    <i class="mdi mdi-note-outline"></i>
                                    <span class="hide-menu">{{$category->name}} </span>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </li>
                <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-alert"></i><span class="hide-menu">Products UnPublished </span></a>
                    <ul aria-expanded="false" class="collapse  first-level">
                        @foreach($categories as $category)
                            <li class="sidebar-item">
                                <a href="{{route('products.categories.unPublished', $category->id)}}" class="sidebar-link">
                                    <i class="mdi mdi-note-outline"></i>
                                    <span class="hide-menu">{{$category->name}} </span>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </li>
                <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-alert"></i><span class="hide-menu">Products Has Discount</span></a>
                    <ul aria-expanded="false" class="collapse  first-level">
                        @foreach($categories as $category)
                            <li class="sidebar-item">
                                <a href="{{route('products.categories.hasDiscount', $category->id)}}" class="sidebar-link">
                                    <i class="mdi mdi-note-outline"></i>
                                    <span class="hide-menu">{{$category->name}} </span>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </li>
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('products.isOffer')}}" aria-expanded="false"><i class="mdi mdi-chart-bar"></i><span class="hide-menu">Offers</span></a></li>
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('coupons.index')}}" aria-expanded="false"><i class="mdi mdi-chart-bar"></i><span class="hide-menu">Coupon Codes</span></a></li>
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('users.index')}}" aria-expanded="false"><i class="mdi mdi-chart-bar"></i><span class="hide-menu">Users</span></a></li>
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('messages.index')}}" aria-expanded="false"><i class="mdi mdi-chart-bar"></i><span class="hide-menu">Messages</span></a></li>
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('sliders.index')}}" aria-expanded="false"><i class="mdi mdi-chart-bar"></i><span class="hide-menu">Sliders</span></a></li>
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
<!-- ============================================================== -->
<!-- End Left Sidebar - style you can find in sidebar.scss  -->
<!-- ============================================================== -->
