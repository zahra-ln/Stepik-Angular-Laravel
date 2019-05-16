<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <img src="images/logo.png" alt="AdminLTE Logo" class="brand-image elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">پنل مدیریت</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar" style="direction: ltr">
        <div style="direction: rtl">

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
                         with font-awesome or any other icon font library -->
                    <li class="nav-item">
                        <a class="nav-link" ng-click="changeTab('taskTab')" href="#">
                            <i class="far fa-circle nav-icon"></i>
                            <p>کارها</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" ng-click="changeTab('categoryTab')" href="#">
                            <i class="nav-icon fa fa-edit"></i>
                            <p>دسته بندی ها</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" ng-click="changeTab('weatherTab')" href="#">
                            <i class="nav-icon fa fa-cloud"></i>
                            <p>مشاهده آب و هوا</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" ng-click="changeTab('smsTab')" href="#">
                            <i class="nav-icon fa fa-sms"></i>
                            <p>ارسال پیامک</p>
                        </a>
                    </li>


                    <li class="nav-item">
                        <a class="nav-link" ng-click="changeTab('usersTab')" href="#">
                            <i class="nav-icon fa fa-users"></i>
                            <p>مشاهده اطلاعات کاربران سایت</p>
                        </a>
                    </li>

                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
    </div>
    <!-- /.sidebar -->
</aside>