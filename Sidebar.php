<div id="sidebar-wrapper">
    
    <img src="images/logo.png" height="70">
    
    <ul class="sidebar-nav nav-pills nav-stacked" id="menu">

        <li <?php if ($page == 'Dashbord') { ?> class="active" <?php } ?>>
            <a href="Dashbord"><span class="fa-stack fa-lg pull-right"><i class="fa fa-home fa-stack-1x"></i></span> داشبورد</a>
        </li>
        <li <?php if ($page == 'AddUser') { ?> class="active" <?php } ?>>
            <a href="AddUser"><span class="fa-stack fa-lg pull-right"><i class="fa fa-user-plus fa-stack-1x"></i></span> افزودن کاربر</a>
        </li>
        <li <?php if ($page == 'Search') { ?> class="active" <?php } ?>>
            <a href="Search"><span class="fa-stack fa-lg pull-right"><i class="fa fa-search fa-stack-1x"></i></span> جستجو</a>
        </li>
        <li>
            <a href="#"><span class="fa-stack fa-lg pull-right"><i class="fa fa-flag fa-stack-1x "></i></span> مدیریت</a>
            <ul class="nav-pills nav-stacked" style="list-style-type:none;">
                <li><a href="#"><span class="fa-stack fa-lg pull-right"><i class="fa fa-flag fa-stack-1x "></i></span>کاربران</a></li>
                <li><a href="#"><span class="fa-stack fa-lg pull-right"><i class="fa fa-flag fa-stack-1x "></i></span>آمار</a></li>

            </ul>
        </li>
    </ul>
</div><!-- /#sidebar-wrapper -->