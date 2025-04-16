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
    <title>Auto Plac McQueen</title>
    
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

<body class="home">
    
        <!-- Header -->
        <header id="header" class="header-scroll top-header headrom headerBg">
            <!-- Navbar -->
            <nav class="navbar navbar-dark">
                <div class="container">
                    <button class="navbar-toggler hidden-lg-up" type="button" data-toggle="collapse" data-target="#mainNavbarCollapse">&#9776;</button>
                    <a class="navbar-brand" href="index.php"> <img src="./" alt=""> McQueen </a>
                    <div class="collapse navbar-toggleable-md  float-lg-right" id="mainNavbarCollapse">
                        <ul class="nav navbar-nav">
                            <li class="nav-item"> <a class="nav-link active" href="index.php">Početna <span class="sr-only">(current)</span></a> </li>
                            <li class="nav-item"> <a class="nav-link active" href="suppliers.php">Ponuda <span class="sr-only"></span></a> </li>
                            
                           
							<?php
						if(empty($_SESSION["user_id"]))
							{
								echo '<li class="nav-item"><a href="login.php" class="nav-link active">Uloguj se</a> </li>
							  <li class="nav-item"><a href="registration.php" class="nav-link active bgGreen">Registruj se</a> </li>
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
        <!-- Banner Part -->
        <section class="hero bg-image" data-image-src="images/index.jpg">
            <div class="hero-inner">
               
                <div class="heroSection">
                    <h1>Auto plac McQueen</h1>
                    <h4>Raznovrsna ponuda automobila</h4>

                </div>
            </div>

        </section>
        <!-- Banner Part -->
      
        <section class="popular">
            <div class="container">
                <div class="title text-xs-center m-b-30" >
                    <h2 class= "title">Istaknuti modeli</h2>
                    <p class="subTitle">Najprodavaniji automobili u godini za nama.</p>
                </div>
                <div class="row">
				
				
				
						<?php 
						
						$query_res= mysqli_query($db,"select * from brands LIMIT 6"); 
									      while($r=mysqli_fetch_array($query_res))
										  {
													
						                       echo '  <div class="col-xs-12 col-sm-6 col-md-4 Car-item">
														<div class="Car-item-wrap box">
															<div class="figure-wrap bg-image" data-image-src="admin/images/cars/'.$r['img'].'">
																<div class="distance"></div>
																<div class="stars rating pull-left"> </div>
																<div class="review pull-right"> </div>
															</div>
															<div class="content">
																<h5><a href="cars.php?res_id='.$r['rs_id'].'">'.$r['title'].'</a></h5>
																<div class="product-name">'.$r['slogan'].'</div>
																<div class="price-btn-block"> <span class="price">€'.$r['price'].'</span> <a href="cars.php?res_id='.$r['rs_id'].'" class="btn ctaBtn  pull-right">Poruči automobil</a> </div>
															</div>
															
														</div>
												</div>';
													
										  }
						
						
						?>
				
                </div>
            </div>
        </section>

        <section class="featured-car_bonds">
            <div class="container">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="title-block pull-left">
                            <h4 class= "title">Proizvođači</h4> </div>
                    </div>
                    <div class="col-sm-8">

                        <div class="car_bonds-filter pull-right">
                            <nav class="primary pull-left">
                                <ul>
                                    <li><a href="#" class="selected" data-filter="*">Svi</a> </li>
									<?php 
									
									$res= mysqli_query($db,"select * from res_category");
									      while($row=mysqli_fetch_array($res))
										  {
											echo '<li><a href="#" data-filter=".'.$row['c_name'].'"> '.$row['c_name'].'</a> </li>';
										  }
									?>
                                   
                                </ul>
                            </nav>
                        </div>

                    </div>
                </div>

                <div class="row">
                    <div class="car_bonds-listing">
                        
						
						<?php
						$ress= mysqli_query($db,"select * from car_bonds");  
									      while($rows=mysqli_fetch_array($ress))
										  {
													$query= mysqli_query($db,"select * from res_category where c_id='".$rows['c_id']."' ");
													 $rowss=mysqli_fetch_array($query);
						
													 echo ' <div class="col-xs-12 col-sm-12 col-md-6 single-car_bonds all '.$rowss['c_name'].'">
														<div class="car_bonds-wrap">
															<div class="row">
																<div class=" col-xs-12 col-sm-3 col-md-12 col-lg-3 text-xs-center">
																	<a class="car_bonds-logo" href="cars.php?res_id='.$rows['rs_id'].'" > <img src="admin/images/suppliers/'.$rows['image'].'" alt="Car bond logo"> </a>
																</div>
																<!--end:col -->
																<div class="col-xs-12 col-sm-9 col-md-12 col-lg-9">
																	<h5><a href="cars.php?res_id='.$rows['rs_id'].'" >'.$rows['title'].'</a></h5> <span>'.$rows['address'].'</span>
																	<div class="bottom-part">
																		<div class="cost"></div>
																		<div class="mins"></div>
																		<div class="ratings"> </div>
																	</div>
																</div>
																<!-- end:col -->
															</div>
															<!-- end:row -->
														</div>
														<!--end:car_bonds wrap -->
													</div>';
										  }
						
						
						?>
						
							
						
					
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