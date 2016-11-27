<?php 
session_start();
define("DB_HOST", "localhost");
define("DB_USER", "root");
define("DB_PASSWORD", "123456");
define("DB_DATABASE", "ticket_new");

if( isset($_POST['tel']) && isset($_POST["password"]) ){
	$tel = $_POST['tel'];
	$password = $_POST['password'];

	@$conn = mysql_connect( DB_HOST, DB_USER, DB_PASSWORD )
		or die("connected failed! <br>");

	mysql_query('set names utf8');
	$db_select = mysql_select_db(DB_DATABASE, $conn);
	$query = "SELECT * from user where tel=$tel";
	$result = mysql_query($query, $conn);
	if(mysql_num_rows($result) > 0){
		$row = mysql_fetch_assoc($result);
	
		if($row['password'] == $password){
			$_SESSION['login'] = True;
			$_SESSION['tel'] = $tel; 
			$_SESSION['uid'] = $row['uid'];
		}else{
			$_SESSION['login'] = False;
		}
	}
}
if(isset($_SESSION['login']))
	$_SESSION['login'] = $_SESSION['login'];
else
	$_SESSION['login'] = false;
?>

<!DOCTYPE html>
<html>

<head>
	<title>小黄人购票网</title>
	<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
	<!-- Custom Theddme files -->
	<link rel="stylesheet" href="css/menu.css" />
	<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
	<!-- Custom Theme files -->
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<!-- Custom Theme files -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="My Show Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
	<script type="application/x-javascript">
    addEventListener("load", function() {
        setTimeout(hideURLbar, 0);
    }, false);

    function hideURLbar() {
        window.scrollTo(0, 1);
    }
    </script>
	<!--webfont-->

	<!-- start menu -->
	<link href="css/megamenu.css" rel="stylesheet" type="text/css" media="all" />
	<script type="text/javascript" src="js/megamenu.js"></script>
	<script>
    $(document).ready(function() {
        $(".megamenu").megamenu();
    });
    </script>
	<script type="text/javascript" src="js/jquery.leanModal.min.js"></script>
	<link rel="stylesheet" href="css/font-awesome.min.css" />
	<script src="js/easyResponsiveTabs.js" type="text/javascript"></script>
	<script type="text/javascript">
    $(document).ready(function() {
        $('#horizontalTab').easyResponsiveTabs({
            type: 'default', //Types: default, vertical, accordion           
            width: 'auto', //auto or any width like 600px
            fit: true // 100% fit in a container
        });
    });
    </script>
	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	<script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
	<![endif]-->
	<!---- start-smoth-scrolling---->
	<script type="text/javascript" src="js/move-top.js"></script>
	<script type="text/javascript" src="js/easing.js"></script>
	<script type="text/javascript">
    jQuery(document).ready(function($) {
        $(".scroll").click(function(event) {
            event.preventDefault();
            $('html,body').animate({
                scrollTop: $(this.hash).offset().top
            }, 1200);
        });
    });
    </script>
	<!---- start-smoth-scrolling---->
</head>

<body>
	<div class="container">
		<div class="main-content">
			<div class="header">
				<div class="logo">
					<a href="index.php">
						<h1>小黄人购票网</h1>
					</a>
				</div>
				<div class="search">
					<div class="search2">
						<form> <i class="fa fa-search"></i>
							<input type="text" value="Search for a movie, play, event, sport or more" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search for a movie, play, event, sport or more';}" />
						</form>
					</div>
				</div>
				<div class="clearfix"></div>
			</div>
			<div class="bootstrap_container">
				<nav class="navbar navbar-default w3_megamenu" role="navigation">
					<div class="navbar-header">
						<button type="button" data-toggle="collapse" data-target="#defaultmenu" class="navbar-toggle">
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<a href="index.php" class="navbar-brand"> <i class="fa fa-home"></i>
						</a>
					</div>
					<!-- end navbar-header -->
					<div id="defaultmenu" class="navbar-collapse collapse">
						<ul class="nav navbar-nav">
							<li class="active">
								<a href="index.php">首页</a>
							</li>
							<!-- Mega Menu -->
							<li class="dropdown w3_megamenu-fw">
								<a href="movies.html" data-toggle="dropdown" class="dropdown-toggle">
									电影<b class="caret"></b>
								</a>
								<ul class="dropdown-menu fullwidth">
									<li class="w3_megamenu-content">
										<div class="row">
											<h5 class="movies-page">
												for movies page -
												<a href="movies.html">Click here</a>
											</h5>
											<div class="col-sm-4">
												<h3 class="title">Now Showing</h3>
												<ul class="mov_list">
													<li>99%</li>
													<li>
														<a href="movie-single.html">Baahubali (Telugu) (U/A)</a>
													</li>
												</ul>
												<ul class="mov_list">
													<li>100%</li>
													<li>
														<a href="movie-single.html">Baahubali (Hindi) (U/A)</a>
													</li>
												</ul>
												<ul class="mov_list">
													<li>98%</li>
													<li>
														<a href="movie-single.html">Baahubali (English) (U/A)</a>
													</li>
												</ul>
												<ul class="mov_list">
													<li>80%</li>
													<li>
														<a href="movie-single.html">Jurassic World (3D Hindi) (U/A)</a>
													</li>
												</ul>
												<ul class="mov_list">
													<li>65%</li>
													<li>
														<a href="movie-single.html">Hamari Adhuri Kahani (U)</a>
													</li>
												</ul>
											</div>
											<!-- end col-4 -->
											<div class="col-sm-4 movie-dd">
												<h3 class="title">Next Change</h3>
												<p>
													<a href="movie-single.html">ABCD 2 (3D) (4DX)</a>
													<span>... (Tomorrow, 19 Jun)</span>
												</p>
												<p>
													<a href="movie-single.html">ABCD 2 (3D) (4DX)</a>
													<span>... (Tomorrow, 19 Jun)</span>
												</p>
												<p>
													<a href="movie-single.html">ABCD 2 (3D) (4DX)</a>
													<span>... (Tomorrow, 19 Jun)</span>
												</p>
												<p>
													<a href="movie-single.html">ABCD 2 (3D) (4DX)</a>
													<span>... (Tomorrow, 19 Jun)</span>
												</p>
												<p>
													<a href="movie-single.html">ABCD 2 (3D) (4DX)</a>
													<span>... (Tomorrow, 19 Jun)</span>
												</p>
											</div>
											<!-- end col-4 -->
											<div class="col-sm-4 movie-dd">
												<h3 class="title">Comming Soon</h3>
												<p>
													<a href="movie-single.html">ABCD 2 (3D) (4DX)</a>
													<span>... (Tomorrow, 19 Jun)</span>
												</p>
												<p>
													<a href="movie-single.html">ABCD 2 (3D) (4DX)</a>
													<span>... (Tomorrow, 19 Jun)</span>
												</p>
												<p>
													<a href="movie-single.html">ABCD 2 (3D) (4DX)</a>
													<span>... (Tomorrow, 19 Jun)</span>
												</p>
												<p>
													<a href="movie-single.html">ABCD 2 (3D) (4DX)</a>
													<span>... (Tomorrow, 19 Jun)</span>
												</p>
												<p>
													<a href="movie-single.html">ABCD 2 (3D) (4DX)</a>
													<span>... (Tomorrow, 19 Jun)</span>
												</p>
											</div>
											<!-- end col-4 -->
											<div class="clearfix"></div>
											<div class="menu-featured-movies">
												<h3 class="title">Featured Trailers</h3>
												<div class="col-md-2 menu-featured-movies-img">
													<a href="movie-single.html">
														<img src="images/mf1.jpg" alt="" />
													</a>
												</div>
												<div class="col-md-2 menu-featured-movies-img">
													<a href="movie-single.html">
														<img src="images/mf2.jpg" alt="" />
													</a>
												</div>
												<div class="col-md-2 menu-featured-movies-img">
													<a href="movie-single.html">
														<img src="images/mf3.jpg" alt="" />
													</a>
												</div>
												<div class="col-md-2 menu-featured-movies-img">
													<a href="movie-single.html">
														<img src="images/mf3.jpg" alt="" />
													</a>
												</div>
												<div class="col-md-2 menu-featured-movies-img">
													<a href="movie-single.html">
														<img src="images/mf3.jpg" alt="" />
													</a>
												</div>
												<div class="col-md-2 menu-featured-movies-img">
													<a href="movie-single.html">
														<img src="images/mf3.jpg" alt="" />
													</a>
												</div>
												<div class="clearfix"></div>
											</div>
										</div>
										<!-- end row -->
										<hr></li>
								</ul>
							</li>
							<li class="dropdown w3_megamenu-fw">
								<a href="#" data-toggle="dropdown" class="dropdown-toggle">
									时评 <b class="caret"></b>
								</a>
								<ul class="dropdown-menu half">
									<li class="w3_megamenu-content withdesc">
										<div class="row">
											<h5 class="movies-page">
												for events page -
												<a href="events.html">Click here</a>
											</h5>
											<h3 class="title">Featured Events</h3>
											<div class="col-sm-3">
												<div class="e-movie">
													<div class="e-movie-img">
														<a href="events.html">
															<img src="images/f2.jpg" alt="" />
														</a>
													</div>
													<div class="e-buy-tickets">
														<a href="event-payment.html">BUY TICKETS</a>
													</div>
												</div>
											</div>
											<div class="col-sm-3">
												<div class="e-movie">
													<div class="e-movie-img">
														<a href="events.html">
															<img src="images/f3.jpg" alt=""></a>
													</div>
													<div class="e-buy-tickets">
														<a href="event-payment.html">BUY TICKETS</a>
													</div>
												</div>
											</div>
											<div class="col-sm-3">
												<div class="e-movie">
													<div class="e-movie-img">
														<a href="events.html">
															<img src="images/f4.jpg" alt="" />
														</a>
													</div>
													<div class="e-buy-tickets">
														<a href="event-payment.html">BUY TICKETS</a>
													</div>
												</div>
											</div>
											<div class="col-sm-3">
												<div class="e-movie">
													<div class="e-movie-img">
														<a href="events.html">
															<img src="images/f1.jpg" alt="" />
														</a>
													</div>
													<div class="e-buy-tickets">
														<a href="event-payment.html">BUY TICKETS</a>
													</div>
												</div>
											</div>
										</div>
									</li>
								</ul>
							</li>
							<li class="dropdown w3_megamenu-fw">
								<a href="#" data-toggle="dropdown" class="dropdown-toggle">
									戏剧
									<b class="caret"></b>
								</a>
								<ul class="dropdown-menu half3">
									<li class="w3_megamenu-content withoutdesc">
										<div class="row">
											<h5 class="movies-page">
												for plays page -
												<a href="plays.html">Click here</a>
											</h5>
											<h3 class="title">Featured Events</h3>
											<div class="col-sm-3">
												<div class="e-movie">
													<div class="e-movie-img">
														<a href="plays.html">
															<img src="images/f2.jpg" alt="" />
														</a>
													</div>
													<div class="e-buy-tickets">
														<a href="event-payment.html">BUY TICKETS</a>
													</div>
												</div>
											</div>
											<div class="col-sm-3">
												<div class="e-movie">
													<div class="e-movie-img">
														<a href="plays.html">
															<img src="images/f3.jpg" alt=""></a>
													</div>
													<div class="e-buy-tickets">
														<a href="event-payment.html">BUY TICKETS</a>
													</div>
												</div>
											</div>
											<div class="col-sm-3">
												<div class="e-movie">
													<div class="e-movie-img">
														<a href="plays.html">
															<img src="images/f4.jpg" alt="" />
														</a>
													</div>
													<div class="e-buy-tickets">
														<a href="event-payment.html">BUY TICKETS</a>
													</div>
												</div>
											</div>
											<div class="col-sm-3">
												<div class="e-movie">
													<div class="e-movie-img">
														<a href="plays.html">
															<img src="images/f1.jpg" alt="" />
														</a>
													</div>
													<div class="e-buy-tickets">
														<a href="event-payment.html">BUY TICKETS</a>
													</div>
												</div>
											</div>
										</div>
									</li>
								</ul>
							</li>
							<li class="dropdown">
								<a href="#" data-toggle="dropdown" class="dropdown-toggle">
									运动
									<b class="caret"></b>
								</a>
								<ul class="dropdown-menu half3">
									<li class="w3_megamenu-content withoutdesc">
										<div class="row">
											<h5 class="movies-page">
												for sports page -
												<a href="sports.html">Click here</a>
											</h5>
											<h3 class="title">Featured Sports</h3>
											<div class="col-sm-3">
												<div class="e-movie">
													<div class="e-movie-img">
														<a href="sports.html">
															<img src="images/me1.jpg" alt="" />
														</a>
														<a class="plays-go" href="#">Volleyball is a team sport</a>
													</div>
												</div>
											</div>
											<div class="col-sm-3">
												<div class="e-movie">
													<div class="e-movie-img">
														<a href="sports.html">
															<img src="images/me2.jpg" alt="" />
														</a>
														<a class="plays-go" href="#">Chase, we're going to win races.</a>
													</div>
												</div>
											</div>
											<div class="col-sm-3">
												<div class="e-movie">
													<div class="e-movie-img">
														<a href="sports.html">
															<img src="images/me3.jpg" alt="" />
														</a>
														<a class="plays-go" href="#">2015 The action or activity of skating on ice skates</a>
													</div>
												</div>
											</div>
											<div class="col-sm-3">
												<div class="e-movie">
													<div class="e-movie-img">
														<a href="sports.html">
															<img src="images/me4.jpg" alt="" />
														</a>
														<a class="plays-go" href="#">SVM Bowling & Gaming</a>
													</div>
												</div>
											</div>
										</div>
									</li>
								</ul>
								<!-- end dropdown-menu -->
							</li>
							
							<!-- end standard drop down -->
							<!-- end dropdown w3_megamenu-fw -->
						</ul>
						<!-- end nav navbar-nav -->
						<ul class="nav navbar-nav navbar-right">
						<?php 
						if($_SESSION['login']){
							echo '<li><a href="my_account.php">我的账号</a></li>';
							echo '<li><a href="logout.php">登出</a></li>';
						}else{
							echo '<li><a href="#myModal" data-toggle="modal">登陆</a></li>';
						}

						?>
						<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
							<div class="modal-dialog modal-lg">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
										<h4 class="modal-title" id="myModalLabel">Don't Wait, Login now!</h4>
									</div>
									<div class="modal-body">
										<div class="row">
											<div class="col-md-8" style="border-right: 1px dotted #C2C2C2;padding-right: 30px;">
												<!-- Nav tabs -->
												<ul class="nav nav-tabs">
													<li class="active">
														<a href="#Login" data-toggle="tab">登入</a>
													</li>
													<li>
														<a href="#Registration" data-toggle="tab">注册</a>
													</li>
												</ul>
												<!-- Tab panes -->
												<div class="tab-content">
													<div class="tab-pane active" id="Login">
														<form role="form" class="form-horizontal"  method="post"   action=
																"<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>
															"
																>
															<div class="form-group">
																<label for="email" class="col-sm-2 control-label">电话号码</label>
																<div class="col-sm-10">
																	<input type="" name="tel" class="form-control" id="email1"  />
																</div>
															</div>
															<div class="form-group">
																<label for="exampleInputPassword1" class="col-sm-2 control-label">密码</label>
																<div class="col-sm-10">
																	<input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="password" />
																</div>
															</div>
															<div class="row">
																<div class="col-sm-2"></div>
																<div class="col-sm-10">
																	<button type="submit" class="btn btn-primary btn-sm">提交</button>
																	<a href="javascript:;">忘记密码</a>
																</div>
															</div>
														</form>
													</div>
													<div class="tab-pane" id="Registration">
														<form role="form" class="form-horizontal" method="post" action="regist.php">
															<div class="form-group">
																<label for="mobile" class="col-sm-2 control-label">电话号码</label>
																<div class="col-sm-10">
																	<input name="tel" class="form-control" id="tel" placeholder="Mobile" />
																</div>
															</div>
															<div class="form-group">
																<label for="password" class="col-sm-2 control-label">密码</label>
																<div class="col-sm-10">
																	<input type="re_password" class="form-control" 
																	name="password" id="password" placeholder="Password" />
																</div>
															</div>
															<div class="row">
																<div class="col-sm-2"></div>
																<div class="col-sm-10">
																	<button type="submit" class="btn btn-primary btn-sm">完成</button>
																	<a href="index.php"><button type="button" class="btn btn-default btn-sm">取消</button></a>
																</div>
															</div>
														</form>
													</div>
												</div>
												<div id="OR" class="hidden-xs">OR</div>
											</div>
											<div class="col-md-4">
												<div class="row text-center sign-with">
													<div class="col-md-12">
														<h3 class="other-nw">Sign in with</h3>
													</div>
													<div class="col-md-12">
														<div class="btn-group btn-group-justified">
															<a href="#" class="btn btn-primary">Facebook</a>
															<a href="#" class="btn btn-danger">Google +</a>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!--script>$('#myModal').modal('show');</script-->

				</ul>
				<!-- end nav navbar-nav navbar-right -->
			</div>
			<!-- end #navbar-collapse-1 -->
		</nav>
		<!-- end navbar navbar-default w3_megamenu -->
	</div>
	<!-- end container -->
	<!-- AddThis Smart Layers END -->
	<div class="main-banner">
		<div class="banner col-md-8">
			<section class="slider">
				<div class="flexslider">
					<ul class="slides">
						<li>
							<img src="images/pic1.jpg" class="img-responsive" alt="" />
						</li>
						<li>
							<img src="images/pic2.jpg" class="img-responsive" alt="" />
						</li>
						<li>
							<img src="images/pic3.jpg" class="img-responsive" alt="" />
						</li>
						<li>
							<img src="images/pic4.jpg" class="img-responsive" alt="" />
						</li>
					</ul>
				</div>
			</section>
			<!-- FlexSlider -->
			<script defer src="js/jquery.flexslider.js"></script>
			<link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" />
			<script type="text/javascript">
                    $(function() {
                        SyntaxHighlighter.all();
                    });
                    $(window).load(function() {
                        $('.flexslider').flexslider({
                            animation: "slide",
                            start: function(slider) {
                                $('body').removeClass('loading');
                            }
                        });
                    });
                    </script>
		</div>
		<div class="col-md-4 banner-right">
			<h4>门票订购</h4>
			<div class="grid_3 grid_5">
				<div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
					<ul id="myTab" class="nav nav-tabs" role="tablist">
						<li role="presentation" class="active">
							<a href="#home" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true">电影</a>
						</li>
						<li role="presentation">
							<a href="#profile" role="tab" id="profile-tab" data-toggle="tab" aria-controls="profile" aria-expanded="false">戏剧</a>
						</li>
						<li role="presentation">
							<a href="#profile" role="tab" id="profile-tab" data-toggle="tab" aria-controls="profile" aria-expanded="false">时评</a>
						</li>
						<li role="presentation">
							<a href="#profile" role="tab" id="profile-tab" data-toggle="tab" aria-controls="profile" aria-expanded="false">运动</a>
						</li>
					</ul>
					<div id="myTabContent" class="tab-content">
						<form action="./buy_ticket.php" method="post">
							<div role="tabpanel" class="tab-pane fade in active" id="home" aria-labelledby="home-tab">
								<div class="fleft">
								</div>
								<select class="list_of_movies" name="movie">
									<option value="">选择电影票</option>
									
										<option style="padding-left: 10px;" value="1"> 千与千寻 星期六15时30分三号影厅</option>
										<option style="padding-left: 10px;" value="2">龙猫 星期天15时30分三号影厅</option>
										<option style="padding-left: 10px;" value="3">哈尔的移动城堡 星期天19时30分一号影厅</option>
										<option style="padding-left: 10px;" value="4">肖生克救赎 星期一8时30分2号影厅</option>
										<option style="padding-left: 10px;" value="5">监狱风云 星期二8时30分2号影厅</option>
										<option style="padding-left: 10px;" value="6">龙虎门   星期三8时30分2号影厅 </option>
								
								</select>
								<br>
								<br>
								<br>
								<button type="submit" class="btn btn-primary btn-sm">购买</button>
							</div>
						</form>
						
					</div>
				</div>
			</div>
		</div>
		<div class="clearfix"></div>
	</div>
	<div class="review-slider">
		<ul id="flexiselDemo1">
			<li>
				<a href="movies.html">
					<img src="images/r1.jpg" alt=""/>
				</a>
				<div class="slide-title">
					<h4>looked up one of the more Contrary to popular</h4></div>
					<div class="date-city">
						<h5>Dec 12-15</h5>
						<h6>Multi-city</h6>
						<div class="buy-tickets">
							<a href="movie-select-show.html">BUY TICKETS</a>
						</div>
					</div>
				</li>
				<li>
					<a href="movies.html">
						<img src="images/r2.jpg" alt="" />
					</a>
					<div class="slide-title">
						<h4>There are many 'variations' belief</h4>
					</div>
					<div class="date-city">
						<h5>Dec 12-15</h5>
						<h6>Multi-city</h6>
						<div class="buy-tickets">
							<a href="movie-select-show.html">BUY TICKETS</a>
						</div>
					</div>
				</li>
				<li>
					<a href="movies.html">
						<img src="images/r3.jpg" alt="" />
					</a>
					<div class="slide-title">
						<h4>Finibus Bonorum et Malorum more 'Contrary'</h4>
					</div>
					<div class="date-city">
						<h5>Dec 12-15</h5>
						<h6>Multi-city</h6>
						<div class="buy-tickets">
							<a href="movie-select-show.html">BUY TICKETS</a>
						</div>
					</div>
				</li>
				<li>
					<a href="movies.html">
						<img src="images/r4.jpg" alt="" />
					</a>
					<div class="slide-title">
						<h4>Lorem Ipsum is simply Bonorum</h4>
					</div>
					<div class="date-city">
						<h5>Dec 12-15</h5>
						<h6>Multi-city</h6>
						<div class="buy-tickets">
							<a href="movie-select-show.html">BUY TICKETS</a>
						</div>
					</div>
				</li>
				<li>
					<a href="movies.html">
						<img src="images/r5.jpg" alt="" />
					</a>
					<div class="slide-title">
						<h4>Lorem Ipsum is simply Bonorum</h4>
					</div>
					<div class="date-city">
						<h5>Dec 12-15</h5>
						<h6>Multi-city</h6>
						<div class="buy-tickets">
							<a href="movie-select-show.html">BUY TICKETS</a>
						</div>
					</div>
				</li>
				<li>
					<a href="movies.html">
						<img src="images/r6.jpg" alt="" />
					</a>
					<div class="slide-title">
						<h4>Lorem Ipsum is simply Bonorum</h4>
					</div>
					<div class="date-city">
						<h5>Dec 12-15</h5>
						<h6>Multi-city</h6>
						<div class="buy-tickets">
							<a href="movie-select-show.html">BUY TICKETS</a>
						</div>
					</div>
				</li>
			</ul>
			<script type="text/javascript">
                                $(window).load(function() {

                                    $("#flexiselDemo1").flexisel({
                                        visibleItems: 5,
                                        animationSpeed: 1000,
                                        autoPlay: true,
                                        autoPlaySpeed: 3000,
                                        pauseOnHover: false,
                                        enableResponsiveBreakpoints: true,
                                        responsiveBreakpoints: {
                                            portrait: {
                                                changePoint: 480,
                                                visibleItems: 2
                                            },
                                            landscape: {
                                                changePoint: 640,
                                                visibleItems: 3
                                            },
                                            tablet: {
                                                changePoint: 800,
                                                visibleItems: 4
                                            }
                                        }
                                    });
                                });
                                </script>
			<script type="text/javascript" src="js/jquery.flexisel.js"></script>
		</div>
		<div class="footer-top-grid">
			<div class="list-of-movies col-md-8">
				<div class="tabs">
					<div class="sap_tabs">
						<div id="horizontalTab" style="display: block; width: 100%; margin: 0px;">
							<ul class="resp-tabs-list">
								<li class="resp-tab-item" aria-controls="tab_item-2" role="tab">
									<span>Now Playing</span>
								</li>
								<li class="resp-tab-item" aria-controls="tab_item-1" role="tab">
									<span>Opening This Week</span>
								</li>
								<li class="resp-tab-item" aria-controls="tab_item-0" role="tab">
									<span>Comming Soon</span>
								</li>
								<div class="clearfix"></div>
							</ul>
							<div class="resp-tabs-container">
								<div class="tab-1 resp-tab-content" aria-labelledby="tab_item-0">
									<ul class="tab_img">
										<li>
											<div class="view view-first">
												<a href="movie-select-show.html">
													<img src="images/pic-1.jpg" class="img-responsive" alt="" />
												</a>
												<div class="info1"></div>
												<div class="mask"></div>
												<div class="tab_desc">
													<a href="movie-select-show.html">Book Now</a>
													<div class="percentage-w-t-s">
														<h5>97</h5>
														<p>
															%
															<br>Want to see</p>
														<div class="clearfix"></div>
													</div>
												</div>
											</div>
										</li>
										<li>
											<div class="view view-first">
												<a href="movie-select-show.html">
													<img src="images/pic-2.jpg" class="img-responsive" alt="" />
												</a>
												<div class="info1"></div>
												<div class="mask"></div>
												<div class="tab_desc">
													<a href="movie-select-show.html">Book Now</a>
													<div class="percentage-w-t-s">
														<h5>98</h5>
														<p>
															%
															<br>Want to see</p>
														<div class="clearfix"></div>
													</div>
												</div>
											</div>
										</li>
										<li>
											<div class="view view-first">
												<a href="movie-select-show.html">
													<img src="images/pic-10.jpg" class="img-responsive" alt="" />
												</a>
												<div class="mask">
													<div class="info1"></div>
												</div>
												<div class="tab_desc">
													<a href="movie-select-show.html">Book Now</a>
													<div class="percentage-w-t-s">
														<h5>100</h5>
														<p>
															%
															<br>Want to see</p>
														<div class="clearfix"></div>
													</div>
												</div>
											</div>
										</li>
										<div class="clearfix"></div>
									</ul>
								</div>
								<div class="tab-1 resp-tab-content" aria-labelledby="tab_item-1">
									<ul class="tab_img">
										<li>
											<div class="view view-first">
												<a href="movie-select-show.html">
													<img src="images/pic-8.jpg" class="img-responsive" alt="" />
												</a>
												<div class="mask">
													<div class="info1"></div>
												</div>
												<div class="tab_desc">
													<a href="movie-select-show.html">Book Now</a>
													<div class="percentage-w-t-s">
														<h5>92</h5>
														<p>
															%
															<br>Want to see</p>
														<div class="clearfix"></div>
													</div>
												</div>
											</div>
										</li>
										<li>
											<div class="view view-first">
												<a href="movie-select-show.html">
													<img src="images/pic-3.jpg" class="img-responsive" alt="" />
												</a>
												<div class="mask">
													<div class="info1"></div>
												</div>
												<div class="tab_desc">
													<a href="movie-select-show.html">Book Now</a>
													<div class="percentage-w-t-s">
														<h5>100</h5>
														<p>
															%
															<br>Want to see</p>
														<div class="clearfix"></div>
													</div>
												</div>
											</div>
										</li>
										<li class="last">
											<div class="view view-first">
												<a href="movie-select-show.html">
													<img src="images/pic-9.jpg" class="img-responsive" alt="" />
												</a>
												<div class="mask">
													<div class="info1"></div>
												</div>
												<div class="tab_desc">
													<a href="movie-select-show.html">Book Now</a>
													<div class="percentage-w-t-s">
														<h5>74</h5>
														<p>
															%
															<br>Want to see</p>
														<div class="clearfix"></div>
													</div>
												</div>
											</div>
										</li>
										<div class="clearfix"></div>
									</ul>
								</div>
								<div class="tab-1 resp-tab-content" aria-labelledby="tab_item-2">
									<ul class="tab_img">
										<li>
											<div class="view view-first">
												<a href="movie-select-show.html">
													<img src="images/pic-4.jpg" class="img-responsive" alt="" />
												</a>
												<div class="mask">
													<div class="info1"></div>
												</div>
												<div class="tab_desc">
													<a href="movie-select-show.html">Book Now</a>
													<div class="percentage-w-t-s">
														<h5>88</h5>
														<p>
															%
															<br>Want to see</p>
														<div class="clearfix"></div>
													</div>
												</div>
											</div>
										</li>
										<li>
											<div class="view view-first">
												<a href="movie-select-show.html">
													<img src="images/pic-12.jpg" class="img-responsive" alt="" />
												</a>
												<div class="mask">
													<div class="info1"></div>
												</div>
												<div class="tab_desc">
													<a href="movie-select-show.html">Book Now</a>
													<div class="percentage-w-t-s">
														<h5>100</h5>
														<p>
															%
															<br>Want to see</p>
														<div class="clearfix"></div>
													</div>
												</div>
											</div>
										</li>
										<li class="last">
											<div class="view view-first">
												<a href="movie-select-show.html">
													<img src="images/pic-5.jpg" class="img-responsive" alt="" />
												</a>
												<div class="mask">
													<div class="info1"></div>
												</div>
												<div class="tab_desc">
													<a href="movie-select-show.html">Book Now</a>
													<div class="percentage-w-t-s">
														<h5>90</h5>
														<p>
															%
															<br>Want to see</p>
														<div class="clearfix"></div>
													</div>
												</div>
											</div>
										</li>
										<div class="clearfix"></div>
									</ul>
								</div>
								<div class="tab-1 resp-tab-content" aria-labelledby="tab_item-3">
									<ul class="tab_img">
										<li>
											<div class="view view-first">
												<a href="movie-select-show.html">
													<img src="images/pic-6.jpg" class="img-responsive" alt="" />
												</a>
												<div class="mask">
													<div class="info1"></div>
												</div>
												<div class="tab_desc">
													<a href="movie-select-show.html">Book Now</a>
												</div>
											</div>
										</li>
										<li>
											<div class="view view-first">
												<a href="movie-select-show.html">
													<img src="images/pic-1.jpg" class="img-responsive" alt="" />
												</a>
												<div class="mask">
													<div class="info1"></div>
												</div>
												<div class="tab_desc">
													<a href="movie-select-show.html">Book Now</a>
												</div>
											</div>
										</li>
										<li>
											<div class="view view-first">
												<a href="movie-select-show.html">
													<img src="images/pic-9.jpg" class="img-responsive" alt="" />
												</a>
												<div class="mask">
													<div class="info1"></div>
												</div>
												<div class="tab_desc">
													<a href="movie-select-show.html">Book Now</a>
												</div>
											</div>
										</li>
										<div class="clearfix"></div>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="clearfix"></div>
				<div class="featured">
					<h4>Featured</h4>
					<ul>
						<li>
							<div class="f-movie">
								<div class="f-movie-img">
									<a href="movies.html">
										<img src="images/f4.jpg" alt="" />
									</a>
								</div>
								<div class="f-movie-name">
									<a href="movies.html">Lorem Ipsum used since</a>
									<p>Multi city</p>
								</div>
								<div class="f-buy-tickets">
									<a href="movie-select-show.html">BUY TICKETS</a>
								</div>
							</div>
						</li>
						<li>
							<div class="f-movie">
								<div class="f-movie-img">
									<a href="movies.html">
										<img src="images/f5.jpg" alt="" />
									</a>
								</div>
								<div class="f-movie-name">
									<a href="movies.html">looked up one of more</a>
									<p>Multi city</p>
								</div>
								<div class="f-buy-tickets">
									<a href="movie-select-show.html">BUY TICKETS</a>
								</div>
							</div>
						</li>
						<li>
							<div class="f-movie">
								<div class="f-movie-img">
									<a href="movies.html">
										<img src="images/f6.jpg" alt="" />
									</a>
								</div>
								<div class="f-movie-name">
									<a href="movies.html">The Live Lorem Ipsum</a>
									<p>Mumbai</p>
								</div>
								<div class="f-buy-tickets">
									<a href="movie-select-show.html">BUY TICKETS</a>
								</div>
							</div>
						</li>
						<li>
							<div class="f-movie">
								<div class="f-movie-img">
									<a href="movies.html">
										<img src="images/f1.jpg" alt=""></a>
								</div>
								<div class="f-movie-name">
									<a href="movies.html">The standard chunk</a>
									<p>Multi city</p>
								</div>
								<div class="f-buy-tickets">
									<a href="movie-select-show.html">BUY TICKETS</a>
								</div>
							</div>
						</li>
						<li>
							<div class="f-movie">
								<div class="f-movie-img">
									<a href="movies.html">
										<img src="images/f2.jpg" alt=""></a>
								</div>
								<div class="f-movie-name">
									<a href="movies.html">There are many 'variations'</a>
									<p>Multi city</p>
								</div>
								<div class="f-buy-tickets">
									<a href="movie-select-show.html">BUY TICKETS</a>
								</div>
							</div>
						</li>
						<li>
							<div class="f-movie">
								<div class="f-movie-img">
									<a href="movies.html">
										<img src="images/f3.jpg" alt=""></a>
								</div>
								<div class="f-movie-name">
									<a href="movies.html">The Live Tribute Show</a>
									<p>Mumbai</p>
								</div>
								<div class="f-buy-tickets">
									<a href="movie-select-show.html">BUY TICKETS</a>
								</div>
							</div>
						</li>
						<div class="clearfix"></div>
					</ul>
				</div>
			</div>
			<div class="right-side-bar">
				<div class="top-movies-in-india">
					<h4>Top Movies in India</h4>
					<ul class="mov_list">
						<li>
							<i class="fa fa-star"></i>
						</li>
						<li>77%</li>
						<li>
							<a href="movie-single.html">Jurassic World (3D) (U/A)</a>
						</li>
					</ul>
					<ul class="mov_list">
						<li>
							<i class="fa fa-star"></i>
						</li>
						<li>80%</li>
						<li>
							<a href="movie-single.html">Jurassic World (3D Hindi) (U/A)</a>
						</li>
					</ul>
					<ul class="mov_list">
						<li>
							<i class="fa fa-star"></i>
						</li>
						<li>69%</li>
						<li>
							<a href="movie-single.html">Dil Dhadakne Do (U/A)</a>
						</li>
					</ul>
					<ul class="mov_list">
						<li>
							<i class="fa fa-star"></i>
						</li>
						<li>65%</li>
						<li>
							<a href="movie-single.html">Hamari Adhuri Kahani (U)</a>
						</li>
					</ul>
					<ul class="mov_list">
						<li>
							<i class="fa fa-star"></i>
						</li>
						<li>83%</li>
						<li>
							<a href="movie-single.html">Premam (U)</a>
						</li>
					</ul>
					<ul class="mov_list">
						<li>
							<i class="fa fa-star"></i>
						</li>
						<li>87%</li>
						<li>
							<a href="movie-single.html">Tanu Weds Manu Returns (U/A)</a>
						</li>
					</ul>
					<ul class="mov_list">
						<li>
							<i class="fa fa-star"></i>
						</li>
						<li>71%</li>
						<li>
							<a href="movie-single.html">Romeo Juliet (U)</a>
						</li>
					</ul>
					<ul class="mov_list">
						<li>
							<i class="fa fa-star"></i>
						</li>
						<li>81%</li>
						<li>
							<a href="movie-single.html">Jurassic World (IMAX 3D) (U/A)</a>
						</li>
					</ul>
					<ul class="mov_list">
						<li>
							<i class="fa fa-star"></i>
						</li>
						<li>80%</li>
						<li>
							<a href="movie-single.html">Jurassic World (2D Hindi) (U/A)</a>
						</li>
					</ul>
					<ul class="mov_list">
						<li>
							<i class="fa fa-star"></i>
						</li>
						<li>89%</li>
						<li>
							<a href="movie-single.html">Kaaka Muttai (U)</a>
						</li>
					</ul>
				</div>
				<div class="quick-pay">
					<h3>Quick Pay</h3>
					<p class="payText">
						Make your online payments a breeze. Save your Credit, Debit card and Netbanking in your BookMyShow profile..
						<a href="#">Read more</a>
					</p>
				</div>
				<div class="our-blog">
					<h5>Our Blog</h5>
					<div class="post-article">
						<a href="blog.html" class="post-title">Lorem Ipsum is simply dummy text of the printing</a>
						<i>Posted on June 15, 2015</i>
						<p>
							Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old...
							<br>
							<a href="blog.html">Read more</a>
						</p>
					</div>
					<div class="post-article">
						<a href="blog.html" class="post-title">Sed ut perspiciatis unde</a>
						<i>Posted on June 15, 2015</i>
						<p>
							Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old...
							<br>
							<a href="blog.html">Read more</a>
						</p>
					</div>
					<div class="post-article">
						<a href="blog.html" class="post-title">Sed ut perspiciatis unde</a>
						<i>Posted on June 15, 2015</i>
						<p>
							Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old...
							<br>
							<a href="blog.html">Read more</a>
						</p>
					</div>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
		<div class="footer-top-strip">
			<p>
				<span>
					Next Change
					<i>(Friday, 19 Jun)</i>
					:
				</span>
				<a href="movie-single.html">Disney's ABCD 2 (3D) (U)</a>
				,
				<a href="movie-single.html">2 Premi Premache</a>
				,
				<a href="movie-single.html">Dekh Ke (Bhojpuri)</a>
				,
				<a href="movie-single.html">Disney's ABCD 2 (2D) (U)</a>
				,
				<a href="movie-single.html">Dekh Ke (Bhojpuri)</a>
			</p>
			<p>
				<span>Coming Soon :</span>
				<a href="movie-single.html">2 Premi Premache</a>
				,
				<a href="movie-single.html">Acharam, Dekh Ke (Bhojpuri)</a>
				,
				<a href="movie-single.html">Entourage</a>
				,
				<a href="movie-single.html">Kuttram Kadithal</a>
			</p>
		</div>
	</div>
	<div class="footer">
		<div class="col-md-3 footer-left">
			<div class="f-mov-list">
				<h4>Latest Movies</h4>
				<ul>
					<li>
						<a href="now-showing.html">Now Showing</a>
					</li>
					<li>
						<a href="comming-soon.html">Coming Soon</a>
					</li>
					<li>
						<a href="celebrities.html">Movie Celebrities</a>
					</li>
				</ul>
				<div class="clearfix"></div>
			</div>
			<div class="f-mov-list">
				<h4>Movie Reviews</h4>
				<ul>
					<li>
						<a href="404.html" target="target_blank">Entertainment News</a>
					</li>
					<li>
						<a href="blog.html" target="target_blank">Rajeev Masand</a>
					</li>
					<li>
						<a href="blog.html" target="target_blank">Film Reviews</a>
					</li>
					<li>
						<a href="write-us.html" target="target_blank">Guest Blogging</a>
					</li>
				</ul>
				<div class="clearfix"></div>
			</div>
			<div class="f-mov-list">
				<h4>Movie Trailers</h4>
				<ul>
					<li>
						<a href="trailers-now-showing.html">Now Showing</a>
					</li>
					<li>
						<a href="trailers-comming-soon.html">Coming Soon</a>
					</li>
				</ul>
				<div class="clearfix"></div>
			</div>
		</div>
		<div class="col-md-3 footer-left">
			<div class="f-mov-list">
				<h4>Cinemas & Regions</h4>
				<ul>
					<li>
						<a href="regions.html">All Regions</a>
					</li>
					<li>
						<a href="cinema-chain.html">Cinema Chains</a>
					</li>
					<li>
						<a href="cinemas.html">Cinemas</a>
					</li>
				</ul>
				<div class="clearfix"></div>
			</div>
			<div class="f-mov-list">
				<h4>Movies by Language</h4>
				<ul>
					<li>
						<a href="movies.html">Hindi</a>
					</li>
					<li>
						<a href="movies.html">English</a>
					</li>
					<li>
						<a href="movies.html">Marathi</a>
					</li>
					<li>
						<a href="movies.html">Bengali</a>
					</li>
					<li>
						<a href="movies.html">Tamil</a>
					</li>
					<li>
						<a href="movies.html">Telugu</a>
					</li>
					<li>
						<a href="movies.html">Malayalam</a>
					</li>
					<li>
						<a href="movies.html">Bhojpuri</a>
					</li>
					<li>
						<a href="movies.html">Kannada</a>
					</li>
				</ul>
				<div class="clearfix"></div>
			</div>
		</div>
		<div class="col-md-3 footer-left">
			<div class="f-mov-list">
				<h4>Exclusives</h4>
				<ul>
					<li>
						<a href="donate.html">Book A Smile</a>
					</li>
					<li>
						<a href="vochers.html">Corporate Vouchers</a>
					</li>
					<li>
						<a href="gift-cards.html">Gift Cards</a>
					</li>
				</ul>
				<div class="clearfix"></div>
			</div>
			<div class="f-mov-list">
				<h4>Help</h4>
				<ul>
					<li>
						<a href="site-map.html">Sitemap</a>
					</li>
					<li>
						<a href="feed-back.html">Feedback</a>
					</li>
					<li>
						<a href="faq.html">FAQs</a>
					</li>
					<li>
						<a href="terms-and-conditions.html">Terms and Conditions</a>
					</li>
					<li>
						<a href="privacy-policy.html">Privacy Policy</a>
					</li>
				</ul>
				<div class="clearfix"></div>
			</div>
		</div>
		<div class="col-md-3 footer-left">
			<div class="f-mov-list">
				<h4>Movies by Genre</h4>
				<ul>
					<li>
						<a href="movies.html">Action</a>
					</li>
					<li>
						<a href="movies.html">Romance</a>
					</li>
					<li>
						<a href="movies.html">Comedy</a>
					</li>
					<li>
						<a href="movies.html">Adult</a>
					</li>
					<li>
						<a href="movies.html">Adventure</a>
					</li>
					<li>
						<a href="movies.html">Classic</a>
					</li>
					<li>
						<a href="movies.html">Crime</a>
					</li>
					<li>
						<a href="movies.html">Drama</a>
					</li>
					<li>
						<a href="movies.html">Family</a>
					</li>
					<li>
						<a href="movies.html">Fantasy</a>
					</li>
					<li>
						<a href="movies.html">Musical</a>
					</li>
					<li>
						<a href="movies.html">Mystery</a>
					</li>
					<li>
						<a href="movies.html">Suspense</a>
					</li>
					<li>
						<a href="movies.html">Thriller</a>
					</li>
				</ul>
				<div class="clearfix"></div>
			</div>
		</div>
		<div class="clearfix"></div>
		<div class="col-md-12">
			<div class="footer-right">
				<div class="follow-us">
					<h5 class="f-head">Follow us</h5>
					<ul class="social-icons">
						<li>
							<a href="#">
								<i class="fa fa-facebook"></i>
							</a>
						</li>
						<li>
							<a href="#">
								<i class="fa fa-twitter"></i>
							</a>
						</li>
						<li>
							<a href="#">
								<i class="fa fa-youtube"></i>
							</a>
						</li>
						<li>
							<a href="#">
								<i class="fa fa-pinterest"></i>
							</a>
						</li>
						<li>
							<a href="#">
								<i class="fa fa-google-plus"></i>
							</a>
						</li>
						<li>
							<a href="#">
								<i class="fa fa-linkedin"></i>
							</a>
						</li>
					</ul>
					<div class="clearfix"></div>
				</div>
				<div class="subscribe">
					<h5 class="f-head">Subscribe to our newsletters</h5>
					<input type="text" class="text" value="Enter Email ID" onfocus="this.value = '';" onblur="if (this.value == 'Enter email...') {this.value = 'Enter Email ID';}">
					<input type="submit" value="submit">
					<div class="clearfix"></div>
				</div>
				<div class="recent_24by7">
					<a class="play-icon popup-with-zoom-anim" href="#small-dialog" href="#">
						<i class="fa fa-calendar-o"></i>
						Resend Booking Confirmation
					</a>
					<a href="support.html">
						<i class="fa fa-question"></i>
						24/7 Customer Care
					</a>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
		<div class="clearfix"></div>
	</div>
	<div class="clearfix"></div>
</div>
<p>
	Copyright &copy; 2015
	<a target="_blank" href="http://www.moke8.com/">魔客吧</a>
</p>
</div>
<script type="text/javascript">
                $(document).ready(function() {
                    /*
                    	var defaults = {
                    	 containerID: 'toTop', // fading element id
                    	 containerHoverID: 'toTopHover', // fading element hover id
                    	 scrollSpeed: 1200,
                    	 easingType: 'linear' 
                    	};
                    	*/

                    $().UItoTop({
                        easingType: 'easeOutQuart'
                    });

                });
                </script>
<a href="#home" class="scroll" id="toTop" style="display: block;">
<span id="toTopHover" style="opacity: 1;"></span>
</a>
</body>

</html>
