<div id="sidebar-wrapper">
    
    <img src="images/logo.png" height="70">
    
    <ul class="sidebar-nav nav-pills nav-stacked" id="menu">

        <li <?php if ($page == 'Dashbord') { ?> class="active" <?php } ?>>
            <a href="Dashbord"><span class="fa-stack fa-lg pull-right"><i class="fa fa-home fa-stack-1x"></i></span> داشبورد</a>
        </li>
        <li <?php if ($page == 'Search') { ?> class="active" <?php } ?>>
            <a href="Search"><span class="fa-stack fa-lg pull-right"><i class="fa fa-search fa-stack-1x"></i></span> جستجو</a>
        </li>
        <li>
            <a href="#"><span class="fa-stack fa-lg pull-right"><i class="fa fa-cloud-download fa-stack-1x "></i></span>Overview</a>
        </li>
        <li>
            <a href="#"> <span class="fa-stack fa-lg pull-right"><i class="fa fa-cart-plus fa-stack-1x "></i></span>Events</a>
        </li>
        <li>
            <a href="#"><span class="fa-stack fa-lg pull-right"><i class="fa fa-youtube-play fa-stack-1x "></i></span>About</a>
        </li>
        <li>
            <a href="#"><span class="fa-stack fa-lg pull-right"><i class="fa fa-wrench fa-stack-1x "></i></span>Services</a>
        </li>
        <li>
            <a href="#"><span class="fa-stack fa-lg pull-right"><i class="fa fa-server fa-stack-1x "></i></span>Contact</a>
        </li>
        <li>
            <a href="#"><span class="fa-stack fa-lg pull-right"><i class="fa fa-flag fa-stack-1x "></i></span> Shortcut</a>
            <ul class="nav-pills nav-stacked" style="list-style-type:none;">
                <li><a href="#"><span class="fa-stack fa-lg pull-right"><i class="fa fa-flag fa-stack-1x "></i></span>link1</a></li>
                <li><a href="#"><span class="fa-stack fa-lg pull-right"><i class="fa fa-flag fa-stack-1x "></i></span>link2</a></li>

            </ul>
        </li>
    </ul>
</div><!-- /#sidebar-wrapper -->