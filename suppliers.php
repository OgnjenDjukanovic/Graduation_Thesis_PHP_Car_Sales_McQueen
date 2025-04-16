<!DOCTYPE html>
<html lang="en">
<?php
include("connection/connect.php");
error_reporting(0);
session_start();
?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="#">

    <title>Dobavljači</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animsition.min.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/solid.css">
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="css/swiper-bundle.min.css">

    <link href="css/style.css" rel="stylesheet"> 
    <link href="css/footer.css" rel="stylesheet"> 
 </head>

<body>
           <!-- Header -->
        <header id="header" class="header-scroll top-header headrom headerBg" style="background: rgb(63, 41, 125);">
            <!-- Navbar -->
            <nav class="navbar navbar-dark">
                <div class="container">
                    <button class="navbar-toggler hidden-lg-up" type="button" data-toggle="collapse" data-target="#mainNavbarCollapse">&#9776;</button>
                    <a class="navbar-brand" href="index.php"> McQueen </a>
                    <div class="collapse navbar-toggleable-md  float-lg-right" id="mainNavbarCollapse">
                        <ul class="nav navbar-nav">
                            <li class="nav-item"> <a class="nav-link active" href="index.php">Početna <span class="sr-only">(current)</span></a> </li>
                            <li class="nav-item"> <a class="nav-link active" href="suppliers.php">Ponuda <span class="sr-only"></span></a> </li>
                            
							<?php
						if(empty($_SESSION["user_id"]))
							{
								echo '<li class="nav-item"><a href="login.php" class="nav-link active">Uloguj se</a> </li>
							  <li class="nav-item"><a href="registration.php" class="nav-link active greenBg" style="padding: 10px 15px; border-radius: 3rem">Registruj se</a> </li>
                              <li class="nav-item"> <a class="nav-link active" href="admin\index.php">Admin <span class="sr-only"></span></a> </li>';
							}
						else
							{
									
									
										echo  '<li class="nav-item"><a href="your_orders.php" class="nav-link active">Vaše Narudžbine</a> </li>';
									echo  '<li class="nav-item"><a href="logout.php" class="nav-link active">Odjavi Se</a> </li>';
							}

						?>
							 
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- Navbar -->
        </header>
        <div class="page-wrapper">
            <div class="top-links">
                <div class="container">
                    <ul class="row links">
                       
                        <li class="col-xs-12 col-sm-4 link-item active"><span>1</span><a href="suppliers.php">Pogledaj ponudu</a></li>
                        <li class="col-xs-12 col-sm-4 link-item"><span>2</span><a href="#">Odaberi željeni automobil</a></li>
                        <li class="col-xs-12 col-sm-4 link-item"><span>3</span><a href="#">Naruči i izvrši plaćanje online</a></li>
                    </ul>
                </div>
            </div>

            <div class="inner-page-hero bg-image" data-image-src="images/cars.jpg">
                <div class="container"> </div>

            </div>
            <div class="result-show">
                <div class="container">
                    <div class="row">
                       
                       
                    </div>
                </div>
            </div>

            <section class="car_bonds-page">
                <div class="container">
                    <div class="row">
                        
                        <div class="col-xs-12 col-sm-7 col-md-7 col-lg-9">
                            <div class="bg-gray car_bonds-entry">
                                <div class="row">
								<?php $ress= mysqli_query($db,"select * from car_bonds");
									      while($rows=mysqli_fetch_array($ress))
										  {
													
						
													 echo' <div class="col-sm-12 col-md-12 col-lg-8 text-xs-center text-sm-left">
															<div class="entry-logo">
																<a class="img-fluid" href="cars.php?res_id='.$rows['rs_id'].'" > <img src="admin/images/suppliers/'.$rows['image'].'" alt="Car logo"></a>
															</div>
															<!-- end:Logo -->
															<div class="entry-dscr">
																<h5 class="poppinsFont"><a href="cars.php?res_id='.$rows['rs_id'].'" >'.$rows['title'].'</a></h5> <span>'.$rows['address'].' <a href="#"></a></span>
																<ul class="list-inline">
																	
																</ul>
															</div>
															<!-- end:Entry description -->
														</div>
														
														 <div class="col-sm-12 col-md-12 col-lg-4 text-xs-center">
																<div class="right-content bg-white">
																	<div class="right-review">
																		<div class="rating-block"> <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="16" height="16"><path d="M13.03 8.22a.75.75 0 0 1 0 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L3.47 9.28a.751.751 0 0 1 .018-1.042.751.751 0 0 1 1.042-.018l2.97 2.97V3.75a.75.75 0 0 1 1.5 0v7.44l2.97-2.97a.75.75 0 0 1 1.06 0Z"></path></svg></i></div>
																		<p></p> <a href="cars.php?res_id='.$rows['rs_id'].'" class="btn ctaBtn">Pogledaj ponudu</a> </div>
																</div>
																<!-- end:right info -->
															</div>';
										  }
						
						
						?>
                                    
                                </div>

                            </div>
                         
                            
                                
                            </div>
                          
                          
                           
                        </div>
                    </div>
                </div>
            </section>

  <!-- Footer  -->
  <section class="footerSection">
    <div class="contentContainer container">
        <div class="footerIntro">
            <div class="footerLogoDiv">
                <span class="hotelName">
                    McQueen
                </span>
            </div>
            <p>Mi smo kompanija od poverenja u misiji za pružanje kvalitetnih usluga i rešenja za automobile u svetu oko nas.</p>

            
        </div>
            <div class="info">
                <div class="iconDiv"><i class='bx bx-mail-send' ></i></div>
                <span>ognjen5221@its.edu.rs</span>
            </div>

            <div class="info">
                <div class="iconDiv"><i class='bx bxs-phone-outgoing'></i></div>
                <span>+381 62779883</span>
            </div>

            <div class="info">
                <div class="iconDiv"><i class='bx bx-current-location' ></i></div>
                <span>Savski Nasip 7, Novi Beograd - Srbija</span>
            </div>


    </div>
        <div class="copyrightDiv">
            &copy; Copyright 2024 - Ognjen Đukanović
        </div>
    </section>
    <!-- Footer  -->
  
    <script src="js/swiper-bundle.min.js"></script>
    <script src="js/isratech.js"></script>
    <script src="js/jquery.min.js"></script>
    <script src="js/tether.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/animsition.min.js"></script>
    <script src="js/bootstrap-slider.min.js"></script>
    <script src="js/jquery.isotope.min.js"></script>
    <script src="js/headroom.js"></script>
    <script src="js/foodpicky.min.js"></script>
</body>

</html>