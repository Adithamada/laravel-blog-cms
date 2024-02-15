<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
    <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
    <li class="nav-header">DASHBOARD</li>
    <li class="nav-item">
        <a href="" class="nav-link">
            <i class="nav-icon fas fa-calendar-alt"></i>
            <p>
                Dashboard
            </p>
        </a>
    </li>
    <li class="nav-header">MANAGE NAVIGATION</li>
    <li class="nav-item">
        <a href="#" class="nav-link">
            <i class="nav-icon fas fa-table"></i>
            <p>
                Manage Blogs
                <i class="fas fa-angle-left right"></i>
            </p>
        </a>
        <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="{{route('index-admin-blog',['user_id'=>$user_id])}}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Blogs Table</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('index-category',['user_id'=>$user_id])}}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Category Table</p>
                </a>
            </li>
        </ul>
    </li>
    <li class="nav-item">
        <a href="#" class="nav-link">
            <i class="nav-icon fas fa-table"></i>
            <p>
                Manage Users
                <i class="fas fa-angle-left right"></i>
            </p>
        </a>
        <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="{{route('index-user',['user_id'=>$user_id])}}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Users Table</p>
                </a>
            </li>
        </ul>
    </li>

</ul>