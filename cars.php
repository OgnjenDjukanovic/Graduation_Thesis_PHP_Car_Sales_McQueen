<!DOCTYPE html>
<html lang="en">
<?php
include("connection/connect.php");
error_reporting(0);
session_start();

include_once 'product-action.php';

?>


<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="#">
    <title>Automobili</title>
    
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
    
        <!--Header -->
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
									echo  '<li class="nav-item"><a href="logout.php" class="nav-link active">Odjavi se</a> </li>';
							}

						?>
							 
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- Navbar -->
        </header>
        <div class="page-wrapper">
            <!-- Top Links -->
            <div class="top-links">
                <div class="container">
                    <ul class="row links">
                      
                        <li class="col-xs-12 col-sm-4 link-item"><span>1</span><a href="suppliers.php">Pogledaj ponuda</a></li>
                        <li class="col-xs-12 col-sm-4 link-item active"><span>2</span><a href="cars.php?res_id=<?php echo $_GET['res_id']; ?>">Odaberi željeni automobil</a></li>
                        <li class="col-xs-12 col-sm-4 link-item"><span>3</span><a href="#">Naruči i izvrši plaćanje online</a></li>
                    </ul>
                </div>
            </div>
            <!-- Top links -->
            <!-- Inner Page -->
			<?php $ress= mysqli_query($db,"select * from car_bonds where rs_id='$_GET[res_id]'");
									     $rows=mysqli_fetch_array($ress);
										  
										  ?>
            <section class="inner-page-hero bg-image" data-image-src="images/cars.jpg">
                <div class="profile">
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12  col-md-4 col-lg-4 profile-img">
                                <div class="image-wrap">
                                    <figure><?php echo '<img src="admin/images/suppliers/'.$rows['image'].'" alt="car_bonds logo">'; ?></figure>
                                </div>
                            </div>
							
                            <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 profile-desc">
                                <div class="pull-left right-text white-txt">
                                    <h6><a href="#"><?php echo $rows['title']; ?></a></h6>
                                    <p><?php echo $rows['address']; ?></p>
                                    <ul class="nav nav-inline">
                                        
                                        <li class="nav-item ratings">
                                            <a class="nav-link" href="#"> <span>
                                    
                                    </span> </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
							
							
                        </div>
                    </div>
                </div>
            </section>
            <!-- Inner Page -->

            <div class="container m-t-30">
                <div class="row">
                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-3">
                        
                         <div class="widget widget-cart">
                                <div class="widget-heading">
                                    <h3 class="widget-title text-dark">
                                 Vasa potrosacka korpa
                              </h3>
							  				  
							  
                                    <div class="clearfix"></div>
                                </div>
                                <div class="order-row bg-white">
                                    <div class="widget-body">
									
									
	<?php

$item_total = 0;

foreach ($_SESSION["cart_item"] as $item)
{
?>									
									
                                        <div class="title-row">
										<?php echo $item["title"]; ?><a href="cars.php?res_id=<?php echo $_GET['res_id']; ?>&action=remove&id=<?php echo $item["d_id"]; ?>" >
										<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 12 12" width="12" height="12"><path d="M1.757 10.243a6.001 6.001 0 1 1 8.488-8.486 6.001 6.001 0 0 1-8.488 8.486ZM6 4.763l-2-2L2.763 4l2 2-2 2L4 9.237l2-2 2 2L9.237 8l-2-2 2-2L8 2.763Z"></path></svg></a>
										</div>
										
                                        <div class="form-group row no-gutter">
                                            <div class="col-xs-8">
                                                 <input type="text" class="form-control b-r-0" value=<?php echo "$".$item["price"]; ?> readonly id="exampleSelect1">
                                                   
                                            </div>
                                            <div class="col-xs-4">
                                               <input class="form-control" type="text" readonly value='<?php echo $item["quantity"]; ?>' id="example-number-input"> </div>
                                        
									  </div>
									  
	<?php
$item_total += ($item["price"]*$item["quantity"]);
}
?>								  
									  
									  
									  
                                    </div>
                                </div>

                                <!-- Order -->
                                <div class="widget-body">
                                    <div class="price-wrap text-xs-center">
                                        <p>UKUPNO</p>
                                        <h3 class="value"><strong><?php echo "€".$item_total; ?></strong></h3>
                                        <p>Besplatna dostava</p>
                                        <a href="checkout.php?res_id=<?php echo $_GET['res_id'];?>&action=check"  class="btn theme-btn btn-lg">Dovrši plaćanje</a>
                                    </div>
                                </div>
								
						
								
								
                            </div>
                    </div>

                    <div class="col-xs-12 col-sm-8 col-md-8 col-lg-6">
                      
                        <!-- Menu -->
                        <div class="menu-widget" id="2">
                            <div class="widget-heading">
                                <h3 class="widget-title text-dark">
                              Trenutni modeli automobila na stanju 
                           </h3>
                                <div class="clearfix"></div>
                            </div>
                            <div class="collapse in" id="popular2">
						<?php
									$stmt = $db->prepare("select * from brands where rs_id='$_GET[res_id]'");
									$stmt->execute();
									$products = $stmt->get_result();
									if (!empty($products)) 
									{
									foreach($products as $product)
										{
						
													
													 
													 ?>
                                <div class="Car-item">
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-12 col-lg-8">
										<form method="post" action='cars.php?res_id=<?php echo $_GET['res_id'];?>&action=add&id=<?php echo $product['d_id']; ?>'>
                                            <div class="rest-logo pull-left">
                                                <a class="car_bonds-logo pull-left" href="#"><?php echo '<img src="admin/images/cars/'.$product['img'].'" alt="Car logo">'; ?></a>
                                            </div>
                                            <!-- Logo -->
                                            <div class="rest-descr">
                                                <h6><a href="#"><?php echo $product['title']; ?></a></h6>
                                                <p> <?php echo $product['slogan']; ?></p>
                                            </div>
                                            <!-- Description -->
                                        </div>

                                        <div class="col-xs-12 col-sm-12 col-lg-4 pull-right item-cart-info"> 
										<span class="price pull-left" >€<?php echo $product['price']; ?></span>
										  <input class="b-r-0" type="hidden" name="quantity"  style="margin-left:20px;" value="1" />
										  <input type="submit" class="btn theme-btn ctaBtn" style="margin-top:20px; background: rgb(63, 41, 125); color: white;" value="Kupi automobil" />
										</div>
										</form>
                                    </div>

                                </div>
                                <!-- Car item -->
								
								<?php
									  }
									}
									
								?>
								
								
                              
                            </div>

                        </div>

                       
                    </div>
                    
                </div>

            </div>

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
        </div>
    </div>
   
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
