<div class="sidebar" data-background-color="white">
    <div class="sidebar-logo">
        <!-- Logo Header -->
        <div class="logo-header" data-background-color="white">
            <a href="index.html" class="logo">
                <img src="{{ asset('admin/img/kaiadmin/ecommercelogo.jpg') }}" alt="navbar brand" class="navbar-brand"
                    height="55" />
            </a>
            <div class="nav-toggle">
                <button class="btn btn-toggle toggle-sidebar">
                    <i class="gg-menu-right"></i>
                </button>
                <button class="btn btn-toggle sidenav-toggler">
                    <i class="gg-menu-left"></i>
                </button>
            </div>
            <button class="topbar-toggler more">
                <i class="gg-more-vertical-alt"></i>
            </button>
        </div>
        <!-- End Logo Header -->
    </div>
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <ul class="nav nav-secondary">
                <li class="nav-item ">
                    <a  href="/">
                        <i class="fas fa-home"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/admin/product">
                        <i class="fas fa-file"></i>
                        <p>Product</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a data-bs-toggle="collapse" href="#base">
                        <i class="fas fa-layer-group"></i>
                        <p>Settings</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="base">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="/admin/category">
                                    <span class="sub-item">Category</span>
                                </a>
                            </li>
                            <li>
                                <a href="/admin/subCategory">
                                    <span class="sub-item">Sub Category</span>
                                </a>
                            </li>
                            <li>
                                <a href="/admin/unit">
                                    <span class="sub-item">Units</span>
                                </a>
                            </li>
                            <li>
                                <a href="/admin/tax">
                                    <span class="sub-item">Taxes</span>
                                </a>
                            </li>

                        </ul>
                    </div>
                </li>



            </ul>
        </div>
    </div>
</div>