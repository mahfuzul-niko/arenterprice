<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title" key="t-menu">Dashboard</li>
                @if (auth()->user()->role == 2)
                    <li><a href="{{ route('admin.dashboard') }}"><i class="bx bx-food-menu"></i><span>Dashboard</span></a>
                    </li>
                    <li><a href="{{ route('customer.order') }}"><i class="bx bx-detail"></i><span>Order</span></a></li>
                @endif
                @if (auth()->user()->role == 3)
                    <li><a href="{{ route('agent.dashboard') }}"><i
                                class="bx bx-food-menu"></i><span>Dashboard</span></a></li>
                    <li><a href="{{ route('agent.pos') }}"><i class="bx bxl-product-hunt "></i><span>Point Of
                                Sale</span></a></li>
                    <li><a href="{{ route('customer.order') }}"><i class="bx bx-detail"></i><span>Order</span></a></li>

                   
                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="bx bx-layout"></i>
                            <span key="t-dashboards">Products</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a href="{{ route('agent.product') }}"><i class="bx bx-detail"></i><span>Product list</span></a></li>
                            <li><a href="{{ route('agent.product.create') }}"><i class="bx bx-detail"></i><span>Product Create</span></a></li>
                        </ul>
                    </li>
                @endif
                @if (auth()->user()->role == 1)
                    <li><a href="{{ route('home') }}"><i class="bx bx-food-menu"></i><span>Dashboard</span></a></li>
                    <li><a href="{{ route('user.order.list') }}"><i class="bx bx-detail"></i><span>Order</span></a></li>
                @endif



                {{-- <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-layout"></i>
                        <span key="t-dashboards">Products</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="#" key="t-default">List</a></li>
                    </ul>
                </li>
                <li><a href="#"><i class="bx bxs-message-alt"></i><span>Contacts</span></a></li>
                <li><a href="#"><i class="bx bx-user"></i><span>Facts</span></a></li>
                <li><a href="#"><i class="bx bxs-brightness"></i><span>Settings</span></a></li> --}}
            </ul>

        </div>
        <!-- Sidebar -->
    </div>
</div>
