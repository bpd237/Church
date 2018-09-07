<?php
    // var_dump(sha1(md5('Bonjour2018')));
?>
<!DOCTYPE HTML>
<html lang="en-us">
	<head>
        <title>Church App</title>

		<meta charset="utf-8" /> <!-- Encodage des carractères de la page -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="author" content="Bpd_237" />

        <link rel="icon" href="Data/imgs/logo.ico" /> <!-- Icone de la page -->

		<link href="Dist/css/main.css" type="text/css" rel="stylesheet" >
	</head>
	<body>
        <div class="content-block" id="header">
            <div id="overlay-1">
                <header id="site-header" class="clearfix">
                    <h1><a href="#" class="script">Welcome to the Church ...</a><span class="pull-right"><img src="Data/imgs/logo.png" width="30" height="30"></span></h1>
                </header>	<!-- site-header -->
                
                <div class="middle text-center clearfix">
                    <div class="container">
					<img src="Data/imgs/logo.png" class="rounded float-left" alt="Logo" width="304" height="236">
                        
                        <p class="tagline">ALWAYS FIND GOD</p>
                        <div class="skills">

                        </div>  <!-- skills -->
                    </div>  <!-- container -->
                </div>  <!-- middle -->
                
            </div>  <!-- overlay-1 -->
        </div>  <!-- content-block -->

        <footer id="site-footer">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="col-md-12 black-footer">
                            <div class="">Copyright &copy; 2018 church / Designed By <a href="https://www.facebook.com/camsoftgroup/">Camsoft</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>	<!-- site-footer -->
            
        <div class="login-box animated fadeInDown">
            <div class="login-body">
                <div class="login-title"><strong>Welcome</strong>, <em>Please login</em></div>
                <form action="admin/controlLog" class="form-horizontal" method="post">
                    <div class="form-group">
                        <div class="col-md-12">
                            <input type="text" class="form-control text" placeholder="Username" name="username" />
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <input type="password" class="form-control password" placeholder="Password" name="password" />
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <input type="submit" name="login" class="btn btn-success btn-block" value="Log In">
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- js -->
        <script>
            new WOW().init();
        </script>

        <script src="Dist/js/jquery-2.1.3.min.js"></script>
        <script src="Dist/js/bootstrap.min.js"></script>
        <script src="Dist/js/jquery.actual.min.js"></script>
        <script src="Dist/js/isotope.pkgd.min.js"></script>
        <script src="Dist/js/owl.carousel.min.js"></script>
        <script src="Dist/js/jquery.isonscreen.js"></script>
        <script src="Dist/js/main.js"></script>
	</body>
</html>