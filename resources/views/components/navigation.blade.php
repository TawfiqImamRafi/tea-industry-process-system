<nav class="main-navigation">
    <ul class="navigation" data-widget="tree">
        <li>
            <a href="#" class="dashboard">
                <i class="bx bxs-dashboard text-blue-400"></i>
                <span>Dashboard</span>
            </a>
        </li>
        <li class="treeview">
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
                <span>Company</span>
            </a>
            <ul class="treeview-menu">
                <li>
                    <a href="{{ route('company.list') }}">
                        <i class="bx bx-check-circle"></i>
                        <span>Companies</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('company.create') }}">
                        <i class="bx bx-check-circle"></i>
                        <span>Add Company</span>
                    </a>
                </li>
            </ul>
        </li>
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
                <li>
                    <a href="{{ route('price.create') }}">
                        <i class="bx bx-check-circle"></i>
                        <span>Add Price</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('price.today') }}">
                        <i class="bx bx-check-circle"></i>
                        <span>Today's Price</span>
                    </a>
                </li>
            </ul>

            <li class="treeview">
            <a href="javascript:void(0)">
                <i class="bx bxs-check-circle text-green-400"></i>
                <span>Tea categoriey</span>
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

        
        <li>
            <a href="#" class="dashboard">
                <i class="bx bxs-envelope-open"></i>
                <span>Contact List</span>
            </a>
        </li>
    </ul>
</nav>
