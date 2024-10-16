<aside class="sidebar navbar-default" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
            <li class="sidebar-search">
                <div class="input-group custom-search-form">
                    <input type="text" class="form-control" placeholder="Search...">
                    <span class="input-group-btn">
                        <button class="btn btn-primary" type="button">
                            <i class="fa fa-search"></i>
                        </button>
                    </span>
                </div>
                <!-- /input-group -->
            </li>
            <li>
                <a href={{route("trangchu")}} class="active"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
            </li>
            <li>
                <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Manage Post<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href={{route("admin.posts.index")}}>Post</a>
                    </li>
                    <li>
                        <a href={{route("admin.posts.create")}}>Add Post</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
            <li>
                <a href={{route("admin.catetories.index")}}><i class="fa fa-table fa-fw"></i> Manage Catetory</a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href={{route("admin.catetories.index")}}>Catetory</a>
                    </li>
                    <li>
                        <a href={{route("admin.catetories.create")}}>Add Catetory</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href={{route("admin.users.index")}}><i class="fa fa-edit fa-fw"></i> Manage User</a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href={{route("admin.users.index")}}>User</a>
                    </li>
                    <li>
                        <a href={{route("admin.users.create")}}>Add User</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href={{route("panels-wells")}}><i class="fa fa-edit fa-fw"></i>Comment</a>
            </li>
            <li>
                <a href="#"><i class="fa fa-sitemap fa-fw"></i> View_History<span class="fa arrow"></span></a>
            </li>
            <li>
                <a href="#"><i class="fa fa-files-o fa-fw"></i> Image<span class="fa arrow"></span></a>
            </li>
            <li>
                <a href="#"><i class="fa fa-files-o fa-fw"></i>Tag<span class="fa arrow"></span></a>
            </li>
        </ul>
    </div>
</aside>
<!-- /.sidebar -->

