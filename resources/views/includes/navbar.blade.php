        
		<nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container">

                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-nav" aria-expanded="false">
                        <span class="sr-only">Toggle Navigation</span>	
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <!-- Button For Show And Hide Aside Right -->
                    <button type="button" class="navbar-toggle visible-sm hidden-xsm" id="btn-aside">
                        <span class="sr-only">Toggle Navigation</span>	
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="dashboard.php">لوحة التحكم</a>                          
                </div>
                  
                <div class="collapse navbar-collapse" id="app-nav">  

                    {{-- Start sidebar --}}
                    <ul class="nav navbar-nav navbar-left">                        
                        <!-- Start User Info -->
                        <li class="dropdown dropdown-user-main">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                <img src="{{ asset('storage/avatars/avatar.jpg') }}" class="img-circle" alt="Avatar">
                                {{ Auth::user()->name }}
                                <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu dropdown-user">
                                <li class="user-header">
                                    <img src="{{ asset('storage/avatars/avatar.jpg') }}" class="img-circle" alt="Avatar">
                                    <p><b>Zuhair</b></p>
                                </li>
                                <li class="user-footer">
                                    <div class="pull-right">
                                        <a href="admins.php?do=Edit&userid=1" class="btn btn-primary"><i class="fa fa-address-card"></i> البروفايل </a>
                                    </div>
                                    <div class="pull-left">
                                        <a 
                                        href="{{ route('logout') }}"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                        class="btn btn-danger"><span class="glyphicon glyphicon-log-out"></span> خروج </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            </ul>  
                        </li>
                        <!-- End User Info -->

                        <!-- Start Settings -->
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                    <i class="fa fa-cog"></i>
                                    الضبط
                                    <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu ">
                                <li><a href="admins.php"><i class="fa fa-group"></i> <?php echo 'إدارة المدراء' ?></a></li>
                                <li><a href="backup_db.php"> <i class="fa fa-database"></i> <?php echo 'إدارة النسخ الإحتياطي' ?> </a></li>
                                <li class="divider"></li>
                                <li>
                                    <ul class="lang-app">
                                        <li class="lang-header">
                                            <i class="fa fa-globe"></i>
                                            <?php echo ('LANGUAGE') ?>
                                            <span class="caret"></span>		
                                        </li>
                                        <li class="lang-body ">
                                            <ul class="list-unstyled">
                                                <li><a href="dashboard.php?do=Language&lang=arabic">
                                                    <i class="fa fa-check-square" <?php if (('LANGUAGE') == 'اللغة') echo 'style="color: green"' ?>></i>
                                                    <?php echo 'العربية' ?></a></li>
                                                <li><a href="dashboard.php?do=Language&lang=english">
                                                <i class="fa fa-check-square" <?php if (('LANGUAGE') == 'Language') echo 'style="color: green"' ?>></i> 
                                                <?php echo 'English' ?> </a></li>									
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <ul class="style-app">
                                        <li class="style-header">
                                            <i class="fa fa-diamond"></i>												
                                            ستايل البرنامج
                                            <span class="caret"></span>
                                        </li>
                                        <li class="style-body ">
                                                <ul class="list-unstyled">
                                                    @php
                                                        $_SESSION['style'] = 'default';
                                                    @endphp
                                                        <li><a href="dashboard.php?do=StyleApp&style=default"> 
                                                            <i class="fa fa-check-square" <?php if (isset($_SESSION['style']) && $_SESSION['style'] == 'default') echo 'style="color: green"' ?>></i> Default</a></li>
                                                        <li><a href="dashboard.php?do=StyleApp&style=blue">
                                                            <i class="fa fa-check-square" <?php if (isset($_SESSION['style']) && $_SESSION['style'] == 'blue') echo 'style="color: green"' ?>></i> Blue</a></li>
                                                        <li><a href="dashboard.php?do=StyleApp&style=green">
                                                            <i class="fa fa-check-square" <?php if (isset($_SESSION['style']) && $_SESSION['style'] == 'green') echo 'style="color: green"' ?>></i> Green</a></li>
                                                        <li><a href="dashboard.php?do=StyleApp&style=greenlight">
                                                            <i class="fa fa-check-square" <?php if (isset($_SESSION['style']) && $_SESSION['style'] == 'greenlight') echo 'style="color: green"' ?>></i> GreenLight</a></li>
                                                        <li><a href="dashboard.php?do=StyleApp&style=red">
                                                            <i class="fa fa-check-square" <?php if (isset($_SESSION['style']) && $_SESSION['style'] == 'red') echo 'style="color: green"' ?>></i> Red</a></li>
                                                        <li><a href="dashboard.php?do=StyleApp&style=dimgrey">
                                                            <i class="fa fa-check-square" <?php if (isset($_SESSION['style']) && $_SESSION['style'] == 'dimgrey') echo 'style="color: green"' ?>></i> DimGray</a></li>
                                                        <li><a href="dashboard.php?do=StyleApp&style=orange">
                                                            <i class="fa fa-check-square" <?php if (isset($_SESSION['style']) && $_SESSION['style'] == 'orange') echo 'style="color: green"' ?>></i> Orange</a></li>
                                                        <li><a href="dashboard.php?do=StyleApp&style=russet">
                                                            <i class="fa fa-check-square" <?php if (isset($_SESSION['style']) && $_SESSION['style'] == 'russet') echo 'style="color: green"' ?>></i> Russet</a></li>
                                                        <li><a href="dashboard.php?do=StyleApp&style=teal">
                                                            <i class="fa fa-check-square" <?php if (isset($_SESSION['style']) && $_SESSION['style'] == 'teal') echo 'style="color: green"' ?>></i> Teal</a></li>
                                                        <li><a href="dashboard.php?do=StyleApp&style=light">
                                                            <i class="fa fa-check-square" <?php if (isset($_SESSION['style']) && $_SESSION['style'] == 'light') echo 'style="color: green"' ?>></i> Light</a></li>
                                                </ul>
                                        </li>
                                    </ul>
                                </li>                                        
                            </ul>
                        </li>
                        <!-- End Settings -->                        
                    </ul>
                    {{-- End sidebar --}}

                    {{-- Start Navbar --}}
                    <ul class="nav navbar-nav navbar-right sidebar">
                        <!-- Start Initializing -->
                        <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                        <i class="fa fa-cog"></i>
                                        تهيئة
                                        <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a href="/users"> <i class="fa fa-users"></i> المستخدمين </a></li>
                                    <li><a href="/sections"> <i class="fa fa-users"></i> إدارة الأقسام </a></li>
                                    <li><a href="/collections"> <i class="fa fa-users"></i> إدارة المجموعات </a></li>
                                    <li><a href="/products"> <i class="fa fa-calendar"></i> إدارة المنتجات </a></li>
                                    <li><a href="/units"> <i class="fa fa-calendar"></i> إدارة الوحدات </a></li>
                                    <li><a href="/colors"> <i class="fa fa-calendar"></i> ألوان المنتجات </a></li>
                                    <li><a href="/sliders"> <i class="fa fa-calendar"></i>  إدارة السليدر </a></li>
                                    {{-- <li><a href="/stocks"> <i class="fa fa-calendar"></i> المخزون </a></li> --}}
                                </ul>
                        </li>
                        <!-- End Initializing -->
                        <!-- Start ClassSubjects -->
                        <li><a href="classsubjects.php"><i class="fa fa-book"></i> أخرى </a></li>
                        <!-- End ClassSubjects -->                      
                    </ul>
                    {{-- End Navbar --}}
                    
                </div>
            </div>
        </nav>          
 