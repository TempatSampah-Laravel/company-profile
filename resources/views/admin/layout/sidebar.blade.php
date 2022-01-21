<div class="left-side-menu">

    <div class="h-100" data-simplebar>

        <!--- Sidemenu -->
        <div id="sidebar-menu">

            <ul id="side-menu">

                <li class="menu-title">Main Menu</li>
    
                {{-- <li>
                    <a href="{{ route('dashboard.index') }}" data-bs-toggle="collapse">
                        <i data-feather="airplay"></i>
                        <span> Dashboards </span>
                    </a>
                    <div class="collapse" id="sidebarDashboards">
                        <ul class="nav-second-level">
                            <li>
                                <a href="index.html">Dashboard 1</a>
                            </li>
                            <li>
                                <a href="dashboard-2.html">Dashboard 2</a>
                            </li>
                            <li>
                                <a href="dashboard-3.html">Dashboard 3</a>
                            </li>
                            <li>
                                <a href="dashboard-4.html">Dashboard 4</a>
                            </li>
                        </ul>
                    </div>
                </li> --}}
                <li>
                    <a href="{{ route('dashboard.index') }}">
                        <i class="fe-airplay"></i>
                        <span> Dashboard</span>
                    </a>
                </li>

                @if(user_akses2('about', Auth::user()->role_id )->update ?? 0 =='1') 
                <li>
                    <a href="{{ route('about.index') }}">
                        <i class="fe-box"></i>
                        <span> About</span>
                    </a>
                </li>
                @endif

                @if(user_akses2('service', Auth::user()->role_id )->update ?? 0 =='1') 
                <li>
                    <a href="{{ route('service.index') }}">
                        <i class="fe-settings"></i>
                        <span> Service</span>
                    </a>
                </li>
                @endif

                @if(user_akses2('client', Auth::user()->role_id )->update ?? 0 =='1') 
                <li>
                    <a href="{{ route('client.index') }}">
                        <i class="fe-users"></i>
                        <span> Client</span>
                    </a>
                </li>
                @endif

                @if(user_akses2('certificate', Auth::user()->role_id )->update ?? 0 =='1') 
                <li>
                    <a href="{{ route('certificate.index') }}">
                        <i class="fe-file"></i>
                        <span> Certificate</span>
                    </a>
                </li>
                @endif

                @if(user_akses2('catalog', Auth::user()->role_id )->update ?? 0 =='1') 
                <li>
                    <a href="{{ route('catalog.index') }}">
                        <i class="fe-calendar"></i>
                        <span> Catalog</span>
                    </a>
                </li>
                @endif

                @if(user_akses2('message', Auth::user()->role_id )->view ?? 0 =='1') 
                <li>
                    <a href="{{ route('message.index') }}">
                        <i class="fe-inbox"></i>
                        <span> Message</span>
                    </a>
                </li>
                @endif

                @if(user_akses2('banner', Auth::user()->role_id )->update ?? 0 =='1') 
                <li>
                    <a href="{{ route('banner.index') }}">
                        <i class="fe-image"></i>
                        <span> Banner Setting</span>
                    </a>
                </li>
                @endif

                @if(user_akses2('config', Auth::user()->role_id )->update ?? 0 =='1') 
                <li>
                    <a href="{{ route('config.index') }}">
                        <i class="fe-chrome"></i>
                        <span> Website Setting</span>
                    </a>
                </li>
                @endif

                <li class="menu-title mt-2">Product</li>

                @if(user_akses2('category', Auth::user()->role_id )->update ?? 0 =='1') 
                <li>
                    <a href="{{ route('category-product.index') }}">
                        <i class="fe-briefcase"></i>
                        <span> Category Product</span>
                    </a>
                </li>
                @endif
                @if(user_akses2('category', Auth::user()->role_id )->update ?? 0 =='1') 
                <li>
                    <a href="{{ route('product.index') }}">
                        <i class="fe-package"></i>
                        <span> Product</span>
                    </a>
                </li>
                @endif

                @if(user_akses2('user', Auth::user()->role_id )->view ?? 0 =='1' OR user_akses2('role', Auth::user()->role_id )->view ?? 0 =='1')  
                <li class="menu-title mt-2">User Setting</li>
                @endif


                @if(user_akses2('user', Auth::user()->role_id )->view ?? 0 =='1')  
                <li>
                    <a href="{{ route('user.index') }}">
                        <i class="fe-users"></i>
                        <span> Users Account</span>
                    </a>
                </li>
                @endif

                @if(user_akses2('role', Auth::user()->role_id)->view ?? 0 =='1')
                <li>
                    <a href="{{ route('role.index') }}">
                        <i class="fas fa-user-lock"></i>
                        <span> Role Access</span>
                    </a>
                </li>
                @endif

                
            </ul>

        </div>
        <!-- End Sidebar -->

        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>