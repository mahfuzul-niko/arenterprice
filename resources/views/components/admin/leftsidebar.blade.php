<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                
                @admin
                <li class="menu-title" key="t-menu">As Admin</li>
                <li><a href="{{ route('admin.dashboard') }}"><i class="bx bx-food-menu"></i><span>Dashboard</span></a></li>
                @endadmin
                <li class="menu-title" key="t-menu">Dashboard</li>
                <li><a href="{{ route('agent.dashboard') }}"><i class="bx bx-food-menu"></i><span>Dashboard</span></a></li>
                
                <li><a href="{{ route('agent.pos') }}"><i class="bx bxl-product-hunt "></i><span>Point Of
                            Sale</span></a></li>
                <li><a href="{{ route('agent.customer.order') }}"><i class="bx bx-detail"></i><span>Order</span></a></li>


                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-layout"></i>
                        <span key="t-dashboards">Products</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('agent.product') }}"><i class="bx bx-detail"></i><span>Product
                                    list</span></a></li>
                        <li><a href="{{ route('agent.product.create') }}"><i class="bx bx-detail"></i><span>Product
                                    Create</span></a></li>
                    </ul>
                </li>
                <li><a href="{{ route('agent.customer') }}"><i class="bx bx-user "></i><span>Customers</span></a></li>
            </ul>

        </div>
        <!-- Sidebar -->
    </div>
</div>
