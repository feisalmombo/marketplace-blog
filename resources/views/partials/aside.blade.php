<aside class="main-sidebar">
<section class="sidebar">
<ul class="sidebar-menu" data-widget="tree">
        <li class="header">OVERVIEW</li>
    <li class="treeview">
        <a href="#">
        <i class="fa fa-dashboard"></i> <span>Dashboard</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
        </span>
        </a>
        <ul class="treeview-menu">
        <li class="active"><a href="{{url('/home')}}"><i class="fa fa-home"></i> Home</a></li>
        </ul>
    </li>

    @if(Auth::user()->hasRole('developer') || Auth::user()->hasRole('staff'))
    <li class="treeview">
            <a href="#">
                <i class="fa fa-user"></i>
                <span>Manage All Users</span>
                <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="{{ url('/view/all/users') }}"><i class="fa fa-users"></i> All Users</a></li>
                <li><a href="{{ url('/view-users/create') }}"><i class="fa fa-plus"></i> Add User</a></li>
            </ul>
    </li>
    @endif

    @if(Auth::user()->hasRole('developer') || Auth::user()->hasRole('staff'))
    <li class="treeview">
            <a href="#">
                <i class="fa fa-square"></i>
                <span>Manage Blog Posts</span>
                <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="{{ url('/blog/post') }}"><i class="fa fa-clipboard"></i> All Posts</a></li>
                <li><a href="{{ url('/blog/post/create') }}"><i class="fa fa-plus"></i> Add Post</a></li>
            </ul>
    </li>
    @endif


    @if(Auth::user()->hasRole('developer') || Auth::user()->hasRole('staff'))
    <li class="treeview">
            <a href="#">
                <i class="fa fa-indent"></i>
                <span>Manage Categories</span>
                <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="{{ url('/view/all/category') }}"><i class="fa fa-caret-square-o-down"></i> All Categories</a></li>
                <li><a href="{{ url('/view/all/category/create') }}"><i class="fa fa-plus"></i> Add Category</a></li>
            </ul>
    </li>
    @endif

    @if(Auth::user()->hasRole('developer') || Auth::user()->hasRole('staff'))
    <li class="treeview">
            <a href="#">
                <i class="fa fa-comment"></i>
                <span>Manage Comment</span>
                <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="{{ url('/contact/all/contacts') }}"><i class="fa fa-comments-o"></i> All Comments</a></li>
            </ul>
    </li>
    @endif

    {{-- @if(Auth::user()->hasRole('tech') || Auth::user()->hasRole('teacher'))
    <li class="treeview">
        <a href="#">
            <i class="fa fa-universal-access"></i> <span>Manage Permissions</span>
            <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>

        <ul class="treeview-menu">
            <li>
            <a href="{{ url('/settings/manage_users/permissions') }}"><i class="fa fa-circle-o"></i> View Permission</a>
            </li>

            <li>
            <a href="{{ url('/settings/manage_users/permissions/entrust_role') }}"><i class="fa fa-circle-o"></i> Assign Permissions to Role</a>
            </li>

            <li>
            <a href="{{ url('/settings/manage_users/permissions/entrust_user') }}"><i class="fa fa-circle-o"></i> Entrust Permission to User</a>
            </li>
        </ul>
    </li>
    @endif --}}

    {{-- @if(Auth::user()->hasRole('tech') || Auth::user()->hasRole('teacher'))
    <li class="treeview">
        <a href="#">
            <i class="fa fa-times"></i> <span>Manage Roles</span>
            <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li>
            <a href="{{ url('/settings/manage_users/roles') }}"><i class="fa fa-circle-o"></i> View Roles</a>
            </li>

            <li>
            <a href="{{ url('/settings/manage_users/roles/create') }}"><i class="fa fa-circle-o"></i> Entrust Role to User</a>
            </li>
        </ul>
    </li>
    @endif --}}

    @if(Auth::user()->hasRole('developer') || Auth::user()->hasRole('staff'))
    <li class="treeview">
        <a href="#">
            <i class="fa fa-user-plus"></i> <span>Manage Subscribers</span>
            <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li>
            <a href="{{ url('/subscriber-email') }}"><i class="fa fa-user"></i> View Subscribers</a>
            </li>
        </ul>
    </li>
    @endif

    @if(Auth::user()->hasRole('developer') || Auth::user()->hasRole('staff'))
    <li class="treeview">

        <a href="#">
            <i class="fa fa-cog"></i> <span>Settings</span>
            <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">

            <li>
                <a href="{{ url('/view-users') }}"><i class="fa fa-user"></i>Edit My Profile</a>
                </li>

            <li>
                <a href="{{url('/view-users/profile/photo/upload')}}"><i class="fa fa-camera"></i>View Profile Photo</a>
            </li>

            <li>
            <a href="{{url('/change-password')}}"><i class="fa fa-unlock"></i> Change Password</a>
            </li>

        </ul>

    </li>
    @endif

</ul>
</section>
</aside>
