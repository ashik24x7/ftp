<div class="page-sidebar navbar-collapse collapse">
                    <!-- BEGIN SIDEBAR MENU -->
                    <!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
                    <!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
                    <!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
                    <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
                    <!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
                    <!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
                    <ul class="page-sidebar-menu  page-header-fixed page-sidebar-menu-closed " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">
                        <!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
                        <li class="sidebar-toggler-wrapper hide">
                            <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
                            <div class="sidebar-toggler"> </div>
                            <!-- END SIDEBAR TOGGLER BUTTON -->
                        </li>
                        <!-- DOC: To remove the search box from the sidebar you just need to completely remove the below "sidebar-search-wrapper" LI element -->
                        <li class="sidebar-search-wrapper">
                            <!-- BEGIN RESPONSIVE QUICK SEARCH FORM -->
                            <!-- DOC: Apply "sidebar-search-bordered" class the below search form to have bordered search box -->
                            <!-- DOC: Apply "sidebar-search-bordered sidebar-search-solid" class the below search form to have bordered & solid search box -->
                            <form class="sidebar-search  " action="page_general_search_3.html" method="POST">
                                <a href="javascript:;" class="remove">
                                    <i class="icon-close"></i>
                                </a>
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search...">
                                    <span class="input-group-btn">
                                        <a href="javascript:;" class="btn submit">
                                            <i class="icon-magnifier"></i>
                                        </a>
                                    </span>
                                </div>
                            </form>
                            <!-- END RESPONSIVE QUICK SEARCH FORM -->
                        </li>
						<li class="nav-item start <?php // //echo active('dashboard.php'); ?>">
                            <a href="dashboard.php" class="nav-link nav-toggle">
                                <i class="icon-home"></i>
                                <span class="title">Dashboard</span>
                                <span class="selected"></span>
                                <span class="arrow open"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item start  <?php // echo active('page_user_profile_account.php'); ?>">
                                    <a href="page_user_profile_account.php" class="nav-link ">
                                        <i class="icon-user"></i>
                                        <span class="title">my profile</span>
                                        <span class="selected"></span>
                                    </a>
                                </li>
								<li class="nav-item start  <?php // echo active('dashboard.php'); ?>">
                                    <a href="dashboard.php" class="nav-link ">
                                        <i class="icon-user"></i>
                                        <span class="title">Dashboard<span>
                                        <span class="selected"></span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item start <?php // echo active('tvseries.php'); ?>">
                            <a href="#" class="nav-link nav-toggle">
                                <i class="fa fa-television"></i>
                                <span class="title">Menues</span>
                                <span class="selected"></span>
                                <span class="arrow open"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item start  <?php // echo active('tvseries.php'); ?>">
                                    <a href="/admin/menu" class="nav-link ">
                                        <i class="fa fa-plus"></i>
                                        <span class="title">Add Main Menu</span>
                                        <span class="selected"></span>
                                    </a>
                                </li>
                                <li class="nav-item start <?php // echo active('add_episodes.php'); ?>"> 
                                    <a href="/admin/sub-menu" class="nav-link ">
                                        <i class="fa fa-edit"></i>
                                        <span class="title">Add Sub Menu<span>
                                        <span class="selected"></span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        
                        <li class="heading">
                            <h3 class="uppercase">Movies</h3>
                        </li>
                        <li class="nav-item <?php // echo active('addmovies.php'); ?>">
                            <a href="/admin/movie/manual" class="nav-link nav-toggle">
                                <i class="fa fa-plus"></i>
                                <span class="title">Add Movie (Manual)</span> 
                            </a>
                        </li>
						<li class="nav-item  <?php // echo active('allmovies.php'); ?>">
                            <a href="allmovies.php" class="nav-link nav-toggle">
                                <i class="fa fa-edit"></i>
                                <span class="title">all Movies</span> 
                            </a>
                        </li>
						<li class="nav-item  <?php // echo active('unpublished.php'); ?>">
                            <a href="unpublished.php" class="nav-link nav-toggle">
                                <i class="fa fa-ban"></i>
                                <span class="title">unpublished Movies</span> 
                            </a>
                        </li>
						<li class="nav-item  <?php // echo active('trash.php'); ?>">
                            <a href="trash.php" class="nav-link nav-toggle">
                                <i class="fa fa-trash"></i>
                                <span class="title">trash Movies</span> 
                            </a>
                        </li>
						<li class="nav-item  <?php // echo active('autoinsert.php'); ?>">
                            <a href="autoinsert.php" class="nav-link nav-toggle">
                                <i class="fa fa-sort-amount-asc"></i>
                                <span class="title">Automatic Upload Movies</span> 
                            </a>
                        </li>
                        <li class="nav-item start <?php // echo active('tvseries.php'); ?>">
                            <a href="#" class="nav-link nav-toggle">
                                <i class="fa fa-television"></i>
                                <span class="title">Movie Quality</span>
                                <span class="selected"></span>
                                <span class="arrow open"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item start  <?php // echo active('tvseries.php'); ?>">
                                    <a href="/admin/movie/quality" class="nav-link ">
                                        <i class="fa fa-plus"></i>
                                        <span class="title">Add Quality</span>
                                        <span class="selected"></span>
                                    </a>
                                </li>
                                <li class="nav-item start <?php // echo active('add_episodes.php'); ?>"> 
                                    <a href="/admin/movie/quality/view" class="nav-link ">
                                        <i class="fa fa-edit"></i>
                                        <span class="title">View Quality<span>
                                        <span class="selected"></span>
                                    </a>
                                </li>
                            </ul>
                        </li>
						
						<li class="nav-item start <?php // echo active('tvseries.php'); ?>">
                            <a href="dashboard.php" class="nav-link nav-toggle">
                                <i class="fa fa-television"></i>
                                <span class="title">tv-series</span>
                                <span class="selected"></span>
                                <span class="arrow open"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item start  <?php // echo active('tvseries.php'); ?>">
                                    <a href="tvseries.php" class="nav-link ">
                                        <i class="fa fa-plus"></i>
                                        <span class="title">add tv series</span>
                                        <span class="selected"></span>
                                    </a>
                                </li>
								<li class="nav-item start <?php // echo active('add_episodes.php'); ?>"> 
                                    <a href="add_episodes.php" class="nav-link ">
                                        <i class="fa fa-edit"></i>
                                        <span class="title">Add Episodes<span>
                                        <span class="selected"></span>
                                    </a>
                                </li>
								<li class="nav-item start  <?php // echo active('dashboard.php'); ?>">
                                    <a href="dashboard.php" class="nav-link ">
                                        <i class="fa fa-edit"></i>
                                        <span class="title">Edit tv series<span>
                                        <span class="selected"></span>
                                    </a>
                                </li>
								<li class="nav-item start  <?php // echo active('untvseries.php'); ?>">
                                    <a href="untvseries.php" class="nav-link ">
                                        <i class="fa fa-ban"></i>
                                        <span class="title">Unpublished tv series<span>
                                        <span class="selected"></span>
                                    </a>
                                </li>
								<li class="nav-item start  <?php // echo active('dashboard.php'); ?>">
                                    <a href="dashboard.php" class="nav-link ">
                                        <i class="fa fa-trash-o"></i>
                                        <span class="title">Trash tv series<span>
                                        <span class="selected"></span>
                                    </a>
                                </li>
								<li class="nav-item start  <?php // echo active('autotvseries.php'); ?>">
                                    <a href="autotvseries.php" class="nav-link ">
                                        <i class="fa fa-sort-amount-asc"></i>
                                        <span class="title">Automatic add tv series<span>
                                        <span class="selected"></span>
                                    </a>
                                </li>
                            </ul>
                        </li>
						
						<li class="nav-item start <?php // 
						// if(basename($_SERVER['PHP_SELF']) == 'games.php' or basename($_SERVER['PHP_SELF']) == 'editgames.php' or basename($_SERVER['PHP_SELF']) == 'ungames.php' or basename($_SERVER['PHP_SELF']) == 'trashgames.php'){
						// echo active(basename($_SERVER['PHP_SELF']));
						// }
						 ?>">
                            <a href="games.php" class="nav-link nav-toggle">
                                <i class="fa fa-gamepad"></i>
                                <span class="title">Games</span>
                                <span class="selected"></span>
                                <span class="arrow open"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item start  <?php // echo active('games.php'); ?>">
                                    <a href="games.php" class="nav-link ">
                                        <i class="fa fa-plus"></i>
                                        <span class="title">add Games</span>
                                        <span class="selected"></span>
                                    </a>
                                </li>
								<li class="nav-item start  <?php // echo active('editgames.php'); ?>">
                                    <a href="editgames.php" class="nav-link ">
                                        <i class="fa fa-edit"></i>
                                        <span class="title">Edit Games<span>
                                        <span class="selected"></span>
                                    </a>
                                </li>
								<li class="nav-item start  <?php // echo active('ungames.php'); ?>">
                                    <a href="ungames.php" class="nav-link ">
                                        <i class="fa fa-ban"></i>
                                        <span class="title">Unpublished Games<span>
                                        <span class="selected"></span>
                                    </a>
                                </li>
								<li class="nav-item start  <?php // echo active('trashgames.php'); ?>">
                                    <a href="trashgames.php" class="nav-link ">
                                        <i class="fa fa-trash-o"></i>
                                        <span class="title">Trash Games<span>
                                        <span class="selected"></span>
                                    </a>
                                </li>
								
                            </ul>
                        </li>
						
						<li class="nav-item start <?php // 
						// if(basename($_SERVER['PHP_SELF']) == 'software.php' or basename($_SERVER['PHP_SELF']) == 'editsoftware.php' or basename($_SERVER['PHP_SELF']) == 'unsoftware.php' or basename($_SERVER['PHP_SELF']) == 'Trashsoftware.php' or basename($_SERVER['PHP_SELF']) == 'Autosoftware.php'){
						// echo active(basename($_SERVER['PHP_SELF']));
						// }
						 ?>">
                            <a href="software.php" class="nav-link nav-toggle">
                                <i class="fa fa-gears"></i>
                                <span class="title">Software</span>
                                <span class="selected"></span>
                                <span class="arrow open"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item start  <?php // echo active('software.php'); ?>">
                                    <a href="software.php" class="nav-link ">
                                        <i class="fa fa-plus"></i>
                                        <span class="title">add Software</span>
                                        <span class="selected"></span>
                                    </a>
                                </li>
								<li class="nav-item start  <?php // echo active('editsoftware.php'); ?>">
                                    <a href="editsoftware.php" class="nav-link ">
                                        <i class="fa fa-edit"></i>
                                        <span class="title">Edit Software<span>
                                        <span class="selected"></span>
                                    </a>
                                </li>
								<li class="nav-item start  <?php // echo active('unsoftware.php'); ?>">
                                    <a href="unsoftware.php" class="nav-link ">
                                        <i class="fa fa-ban"></i>
                                        <span class="title">Unpublished Software<span>
                                        <span class="selected"></span>
                                    </a>
                                </li>
								<li class="nav-item start  <?php // echo active('Trashsoftware.php'); ?>">
                                    <a href="Trashsoftware.php" class="nav-link ">
                                        <i class="fa fa-trash-o"></i>
                                        <span class="title">Trash Software<span>
                                        <span class="selected"></span>
                                    </a>
                                </li>
								<li class="nav-item start  <?php // echo active('Autosoftware.php'); ?>">
                                    <a href="dashboard.php" class="nav-link ">
                                        <i class="fa fa-sort-amount-asc"></i>
                                        <span class="title">Automatic add Software<span>
                                        <span class="selected"></span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    <!-- END SIDEBAR MENU -->
                    <!-- END SIDEBAR MENU -->
                </div>