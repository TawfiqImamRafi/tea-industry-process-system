<nav class="main-navigation">
    <ul class="navigation" data-widget="tree">
        <li>
            <a href="#" class="dashboard">
                <i class="bx bxs-dashboard text-blue-400"></i>
                <span>Dashboard</span>
            </a>
        </li>
        {{-- <li class="treeview">
            <a href="javascript:void(0)">
                <i class="bx bxs-check-circle text-green-400"></i>
                <span>Farmers</span>
            </a>
            <ul class="treeview-menu">
                <li>
                    <a href="{{ route('farmer.list') }}">
                        <i class="bx bx-check-circle"></i>
                        <span>All Farmer</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('farmer.create') }}">
                        <i class="bx bx-check-circle"></i>
                        <span>Add Farmer</span>
                    </a>
                </li>
            </ul>
        </li>
        <li class="treeview">
            <a href="javascript:void(0)">
                <i class="bx bxs-check-circle text-green-400"></i>
                <span>Fatctory</span>
            </a>
            <ul class="treeview-menu">
                <li>
                    <a href="{{ route('company.list') }}">
                        <i class="bx bx-check-circle"></i>
                        <span>Fatctories</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('company.create') }}">
                        <i class="bx bx-check-circle"></i>
                        <span>Add Fatctory</span>
                    </a>
                </li>
            </ul>
        </li> --}}
        @if (Auth::user()->hasRole('company'))
            <li class="treeview">
                <a href="javascript:void(0)">
                    <i class="bx bxs-check-circle text-green-400"></i>
                    <span>Pickup</span>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a href="{{ route('price.pickuplist') }}">
                            <i class="bx bx-check-circle"></i>
                            <span>Requests</span>
                        </a>
                    </li>
                </ul>
            </li>
        @endif

        @if (Auth::user()->hasRole('company'))
            <li class="treeview">
                <a href="javascript:void(0)">
                    <i class="bx bxs-check-circle text-green-400"></i>
                    <span>Tea category</span>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a href="{{ route('category.list') }}">
                            <i class="bx bx-check-circle"></i>
                            <span>Tea categories</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('category.create') }}">
                            <i class="bx bx-check-circle"></i>
                            <span>Add category</span>
                        </a>
                    </li>
                </ul>
            </li>
        @endif
        @if (!Auth::user()->hasRole('wholesaler'))
            <li class="treeview">
                <a href="javascript:void(0)">
                    <i class="bx bxs-check-circle text-green-400"></i>
                    <span>Daily Tea Prices</span>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a href="{{ route('price.list') }}">
                            <i class="bx bx-check-circle"></i>
                            <span>Tea Prices</span>
                        </a>
                    </li>
                    @if (Auth::user()->hasRole('company'))
                        <li>
                            <a href="{{ route('price.create') }}">
                                <i class="bx bx-check-circle"></i>
                                <span>Add Price</span>
                            </a>
                        </li>
                    @endif
                    <li>
                        <a href="{{ route('price.today') }}">
                            <i class="bx bx-check-circle"></i>
                            <span>Today's Price</span>
                        </a>
                    </li>
                </ul>



            <li>
        @endif



        @if (Auth::user()->hasRole('wholesaler'))
            <li>
                <a href="{{ route('wholesaler.company') }}">
                    <i class="bx bx-check-circle"></i>
                    <span>Company list</span>
                </a>
            </li>
            <li>
                <a href="{{ route('tea.category') }}">
                    <i class="bx bx-check-circle"></i>
                    <span>Tea leaf categories</span>
                </a>
            </li>
        @endif
        @if (Auth::user()->hasRole('farmer'))
            <li class="treeview">
                <a href="javascript:void(0)">
                    <i class="bx bxs-check-circle text-green-400"></i>
                    <span>Sale</span>
                </a>
                <ul class="treeview-menu">
                    {{-- <li>
                    <a href="{{ route('price.purchaselist') }}">
                        <i class="bx bx-check-circle"></i>
                        <span>Purchase request</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('price.confirmpurchase') }}">
                        <i class="bx bx-check-circle"></i>
                        <span>Confirmed request</span>
                    </a>
                </li> --}}
                    <li>
                        <a href="{{ route('sales.list') }}">
                            <i class="bx bx-check-circle"></i>
                            <span>Sale List</span>
                        </a>
                    </li>
                </ul>
        @endif
        @if (Auth::user()->hasRole('company'))
            <li class="treeview">
                <a href="javascript:void(0)">
                    <i class="bx bxs-check-circle text-green-400"></i>
                    <span>Purchase</span>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a href="{{ route('purchase.list') }}">
                            <i class="bx bx-check-circle"></i>
                            <span>Purchase List</span>
                        </a>
                    </li>
                </ul>
        @endif



        {{-- <li>
            <a href="#" class="dashboard">
                <i class="bx bxs-envelope-open"></i>
                <span>Contact List</span>
            </a>
        </li> --}}
    </ul>
</nav>
