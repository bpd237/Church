<!DOCTYPE html>
<html>
	<head>
		<title><?= $title; ?></title>

		<meta charset="utf-8" /> <!-- Encodage des carractères de la page -->
		<meta name="robots" content="noarchive">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="author" content="Bpd_237" />
		<meta name="keywords" content="" />

		<link rel="icon" href="../Data/imgs/logo.ico" /> <!-- Icone de la page -->

    <link href="../Dist/__admin/css/bootstrap.min.css" type="text/css" rel="stylesheet" >
    <link href="../Dist/__admin/css/font-awesome.min.css" type="text/css" rel="stylesheet" >
    <link href="../Dist/__admin/css/nprogress.css" type="text/css" rel="stylesheet" >
    <link href="../Dist/__admin/css/green.css" type="text/css" rel="stylesheet" >

    <link href="../Dist/__admin/css/bootstrap-progressbar-3.3.4.min.css" type="text/css" rel="stylesheet" >
    <link href="../Dist/__admin/css/jqvmap.min.css" type="text/css" rel="stylesheet" >
    <link href="../Dist/__admin/css/prettify.min.css" type="text/css" rel="stylesheet" >
    <link href="../Dist/__admin/css/daterangepicker.css" type="text/css" rel="stylesheet" >

    <link href="../Dist/__admin/css//dataTables.bootstrap.min.css" type="text/css" rel="stylesheet" >
    <link href="../Dist/__admin/css/buttons.bootstrap.min.css" type="text/css" rel="stylesheet" >
    <link href="../Dist/__admin/css/fixedHeader.bootstrap.min.css" type="text/css" rel="stylesheet" >
    <link href="../Dist/__admin/css/responsive.bootstrap.min.css" type="text/css" rel="stylesheet" >
    <link href="../Dist/__admin/css/scroller.bootstrap.min.css" type="text/css" rel="stylesheet" >

    <link href="../Dist/__admin/css/custom.min.css" type="text/css" rel="stylesheet" >
    <link href="../Dist/__admin/css/__admin_style.css" type="text/css" rel="stylesheet" >
	</head>
    <body class="nav-md">
      <div class="container body">
        <div class="main_container">
          <div class="col-md-3 left_col">
            <div class="left_col scroll-view">
              <div class="navbar nav_title" style="border: 0;">
                <a href="index" class="site_title"><span style="font-family: script; color: #ff3; text-shadow: 1px 1px 3px #111">MANAGE FINANCE</span></a><hr style="position: relative; bottom: 20px;">
              </div>

              <div class="clearfix"></div>

              <!-- menu profile quick info -->
              <div class="profile clearfix">
                <div class="profile_pic">
                  <img src="../Data/imgs/user.png" alt="..." class="img-circle profile_img">
                </div>
                <div class="profile_info">
                  <span>Welcome,</span>
                  <h2 style="font-family: forte;"><?= ucfirst($_SESSION['aoadbfamtoidfnaomldfkajeiLEKA4ç_H']); ?></h2>
                </div>
              </div>
              <!-- /menu profile quick info -->

              <br />

              <!-- sidebar menu -->
              <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                <div class="menu_section">
                  <ul class="nav side-menu">
                    <li><a><i class="fa fa-dashboard"></i>Dashboard</a>
                      <ul class="nav child_menu">
                        <li><a href="index"><i class="fa fa-home"></i> Home </a></li>
                        <li><a href="transaction"><i class="fa fa-exchange"></i> Transactions </a></li>
                      </ul>
                    </li>
                    <li><a href="rapport"><i class="fa fa-eye"></i>Reports</a>
                    </li>
                    <?php if($_SESSION['authorizationsdioamkpàaç_rsslnf'] == 99) : ?>
                      <li><a><i class="fa fa-cogs"></i>Administration</a>
                        <ul class="nav child_menu">
                          <li><a href="categorie_parent"><i class="fa fa-tasks"></i> Categories </a></li>
                          <li><a href="categorie"><i class="fa fa-bookmark"></i> Sub-categories </a></li>
                          <li><a href="acteur"><i class="fa fa-heart"></i> Actors </a></li>
                          <li><a href="membre"><i class="fa fa-users"></i> Church Member </a></li>
                          <li><a href="degree"><i class="fa fa-bookmark"></i> Members Degrees </a></li>
                          <li><a href="user"><i class="fa fa-wrench"></i> Application Users </a></li>
                        </ul>
                      </li>
                    <?php endif; ?>
                  </ul>
                </div>

              </div>
              <!-- /sidebar menu -->

              <!-- /menu footer buttons -->
              <div class="sidebar-footer hidden-small">
                <a data-toggle="tooltip" data-placement="top" title="Settings">
                  <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                </a>
                <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                  <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
                </a>
                <a data-toggle="tooltip" data-placement="top" title="Lock">
                  <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
                </a>
                <a data-toggle="tooltip" data-placement="top" title="Logout" href="out">
                  <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                </a>
              </div>
              <!-- /menu footer buttons -->
            </div>
          </div>

          <!-- top navigation -->
          <div class="top_nav">
            <div class="nav_menu">
              <nav>
                <div class="nav toggle">
                  <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                </div>

                <ul class="nav navbar-nav navbar-right">
                  <li class="">
                    <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                      <img src="../Data/imgs/user.png" alt=""><?= ucfirst($_SESSION['aoadbfamtoidfnaomldfkajeiLEKA4ç_H']); ?>
                      <span class=" fa fa-angle-down"></span>
                    </a>
                    <ul class="dropdown-menu dropdown-usermenu pull-right">
                      <li><a href="javascript:;"> Profile</a></li>
                      <li><a href="javascript:;">Help</a></li>
                      <li><a href="out"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                    </ul>
                  </li>
                </ul>
              </nav>
            </div>
          </div>
          <!-- /top navigation -->

          <!-- page content -->
          <div class="right_col" role="main">

            <?= $content; ?>
          </div>
          <!-- /page content -->

          <!-- footer content -->
          <footer>
            <div class="pull-right">
              <div class="">Copyright &copy; 2018 church / Designed By <a href="https://www.facebook.com/camsoftgroup/">Camsoft</a></div>
            </div>
            <div class="clearfix"></div>
          </footer>
          <!-- /footer content -->
        </div>
      </div>

      <!-- START SCRIPTS -->
        <script type="text/javascript" src="../Dist/__admin/js/jquery.min.js"></script>
        <script type="text/javascript" src="../Dist/__admin/js/bootstrap.min.js"></script>        
        <script type="text/javascript" src="../Dist/__admin/js/fastclick.js"></script>
        <script type="text/javascript" src="../Dist/__admin/js/nprogress.js"></script>
        
        <script type="text/javascript" src="../Dist/__admin/js/Chart.min.js"></script>
        <script type="text/javascript" src="../Dist/__admin/js/gauche.min.js"></script>
        <script type="text/javascript" src="../Dist/__admin/js/bootstrap-progressbar.min.js"></script>
        <script type="text/javascript" src="../Dist/__admin/js/icheck.min.js"></script>
        <script type="text/javascript" src="../Dist/__admin/js/skycons.js"></script>
        <script type="text/javascript" src="../Dist/__admin/js/jquery.flot.js"></script>
        <script type="text/javascript" src="../Dist/__admin/js/jquery.flot.pie.js"></script>
        <script type="text/javascript" src="../Dist/__admin/js/jquery.flot.time.js"></script>
        <script type="text/javascript" src="../Dist/__admin/js/jquery.flot.stack.js"></script>
        <script type="text/javascript" src="../Dist/__admin/js/jquery.flot.resize.js"></script>
        <script type="text/javascript" src="../Dist/__admin/js/jquery.flot.orderBars.js"></script>
        <script type="text/javascript" src="../Dist/__admin/js/jquery.flot.spline.min.js"></script>
        <script type="text/javascript" src="../Dist/__admin/js/curvedLines.js"></script>
        <script type="text/javascript" src="../Dist/__admin/js/date.js"></script>
        <script type="text/javascript" src="../Dist/__admin/js/jquery.vmap.js"></script>
        <script type="text/javascript" src="../Dist/__admin/js/jquery.vmap.world.js"></script>
        <script type="text/javascript" src="../Dist/__admin/js/jquery.vmap.sampledata.js"></script>
        <script type="text/javascript" src="../Dist/__admin/js/moment.min.js"></script>
        <script type="text/javascript" src="../Dist/__admin/js/daterangepicker.js"></script>

        <script type="text/javascript" src="../Dist/__admin/js/bootstrap-wysiwyg.min.js"></script>
        <script type="text/javascript" src="../Dist/__admin/js/jquery.hotkeys.js"></script>
        <script type="text/javascript" src="../Dist/__admin/js/prettify.min.js"></script>

        <script type="text/javascript" src="../Dist/__admin/js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="../Dist/__admin/js/dataTables.bootstrap.min.js"></script>
        <script type="text/javascript" src="../Dist/__admin/js/dataTables.buttons.min.js"></script>
        <script type="text/javascript" src="../Dist/__admin/js/buttons.bootstrap.min.js"></script>
        <script type="text/javascript" src="../Dist/__admin/js/buttons.flash.min.js"></script>
        <script type="text/javascript" src="../Dist/__admin/js/buttons.html5.min.js"></script>
        <script type="text/javascript" src="../Dist/__admin/js/buttons.print.min.js"></script>
        <script type="text/javascript" src="../Dist/__admin/js/dataTables.fixedHeader.js"></script>
        <script type="text/javascript" src="../Dist/__admin/js/dataTables.keyTable.min.js"></script>
        <script type="text/javascript" src="../Dist/__admin/js/dataTables.responsive.min.js"></script>
        <script type="text/javascript" src="../Dist/__admin/js/responsive.bootstrap.js"></script>
        <script type="text/javascript" src="../Dist/__admin/js/dataTables.scroller.min.js"></script>
        
        <script type="text/javascript" src="../Dist/__admin/js/jszip.min.js"></script>
        <script type="text/javascript" src="../Dist/__admin/js/pdfmake.min.js"></script>
        <script type="text/javascript" src="../Dist/__admin/js/vfs_fonts.js"></script>

        <script type="text/javascript" src="../Dist/__admin/js/custom.min.js"></script>
      <!-- END SCRIPTS -->         
    </body>

</html>