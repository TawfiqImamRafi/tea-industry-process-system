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

        
        <li>
            <a href="#" class="dashboard">
                <i class="bx bxs-envelope-open"></i>
                <span>Contact List</span>
            </a>
        </li>
    </ul>
</nav>
