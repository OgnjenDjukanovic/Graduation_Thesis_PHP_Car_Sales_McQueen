<!DOCTYPE html>
<html lang="en">
<?php

session_start();
error_reporting(0);
include("connection/connect.php");
if(isset($_POST['submit'] ))
{
     if(empty($_POST['firstname']) ||  
   	    empty($_POST['lastname'])|| 
		empty($_POST['email']) ||  
		empty($_POST['phone'])||
		empty($_POST['password'])||
		empty($_POST['cpassword']) ||
		empty($_POST['cpassword']))
		{
			$message = "Sva polja moraju biti popunjena!";
		}
	else
	{
	$check_username= mysqli_query($db, "SELECT username FROM users where username = '".$_POST['username']."' ");
	$check_email = mysqli_query($db, "SELECT email FROM users where email = '".$_POST['email']."' ");
		

	
	if($_POST['password'] != $_POST['cpassword']){
       	$message = "Šifra se nepodudara!";
    }
	elseif(strlen($_POST['password']) < 6)
	{
		$message = "Šifra mora imati najmanje 6 karaktera!";
	}
	elseif(strlen($_POST['phone']) < 10)
	{
		$message = "Netačan broj telefona!";
	}

    elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
    {
       	$message = "Netačna e-mail adresa!";
    }
	elseif(mysqli_num_rows($check_username) > 0)  
     {
    	$message = 'Korisničko ime već postoji!';
     }
	elseif(mysqli_num_rows($check_email) > 0) 
     {
    	$message = 'E-mail već postoji!';
     }
	else{
       
	$mql = "INSERT INTO users(username,f_name,l_name,email,phone,password,address) VALUES('".$_POST['username']."','".$_POST['firstname']."','".$_POST['lastname']."','".$_POST['email']."','".$_POST['phone']."','".md5($_POST['password'])."','".$_POST['address']."')";
	mysqli_query($db, $mql);
		$success = "Uspešno kreiran korisnički nalog! <p>Bićete prebačeni na Login stranu za <span id='counter'>5</span> sekundi.</p>
														<script type='text/javascript'>
														function countdown() {
															var i = document.getElementById('counter');
															if (parseInt(i.innerHTML)<=0) {
																location.href = 'login.php';
															}
															i.innerHTML = parseInt(i.innerHTML)-1;
														}
														setInterval(function(){ countdown(); },1000);
														</script>'";
		
		
		
		
		 header("refresh:5;url=login.php");
    }
	}

}


?>


<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="#">

    <title>Registruj se</title>

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
									
									
										echo  '<li class="nav-item"><a href="your_orders.php" class="nav-link active">Vaše narudžbine</a> </li>';
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
            <div class="breadcrumb">
               <div class="container">
                  <ul>
                     <li><a href="#" class="active">
					  <span style="color:g;"><?php echo $message; ?></span>
					   <span style="color:green;">
								<?php echo $success; ?>
										</span>
					   
					</a></li>
                    
                  </ul>
               </div>
            </div>
            <section class="contact-page inner-page">
               <div class="container">
                  <div class="row">
                     <!-- Register -->
                     <div class="col-md-8">
                        <div class="widget">
                           <div class="widget-body">
                              
							  <form action="" method="post">
                                 <div class="row">
								  <div class="form-group col-sm-12">
                                       <label for="exampleInputEmail1">Korisničko ime</label>
                                       <input class="form-control" type="text" name="username" id="example-text-input" placeholder="Unesite korisničko ime"> 
                                    </div>
                                    <div class="form-group col-sm-6">
                                       <label for="exampleInputEmail1">Ime</label>
                                       <input class="form-control" type="text" name="firstname" id="example-text-input" placeholder="Unesite ime"> 
                                    </div>
                                    <div class="form-group col-sm-6">
                                       <label for="exampleInputEmail1">Prezime</label>
                                       <input class="form-control" type="text" name="lastname" id="example-text-input-2" placeholder="Unesite prezime"> 
                                    </div>
                                    <div class="form-group col-sm-6">
                                       <label for="exampleInputEmail1">E-mail adresa</label>
                                       <input type="text" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Unesite e-mail adresu">
                                    </div>
                                    <div class="form-group col-sm-6">
                                       <label for="exampleInputEmail1">Broj telefona</label>
                                       <input class="form-control" type="text" name="phone" id="example-tel-input-3" placeholder="Unesite broj telefona">
                                    </div>
                                    <div class="form-group col-sm-6">
                                       <label for="exampleInputPassword1">Šifra</label>
                                       <input type="password" class="form-control" name="password" id="exampleInputPassword1" placeholder="Unesite šifru"> 
                                    </div>
                                    <div class="form-group col-sm-6">
                                       <label for="exampleInputPassword1">Ponovite šifru</label>
                                       <input type="password" class="form-control" name="cpassword" id="exampleInputPassword2" placeholder="Ponovo unesite šifru"> 
                                    </div>
									 <div class="form-group col-sm-12">
                                       <label for="exampleTextarea">Adresa dostave</label>
                                       <textarea class="form-control" id="exampleTextarea"  name="address" rows="3"></textarea>
                                    </div>
                                   
                                 </div>
                                
                                 <div class="row">
                                    <div class="col-sm-4">
                                       <p> <input type="submit" value="Registruj se" name="submit" class="btn input theme-btn"> </p>
                                    </div>
                                 </div> 
                              </form>
                           
						   </div>
                        </div>
                        <!-- Register -->
                     </div>

                     <div class="col-md-4">
                        <h4>Registracija je brza, laka, i besplatna.</h4>
                        <p>Nakon registracije, moćićeš da:</p>
                        <hr>
                        <img src="images/registration.jpg" alt="" class="img-fluid">
                        <p></p>

                        <div class="panel">
                           <div class="panel-heading">
                              <h4 class="panel-title"><a data-parent="#accordion" data-toggle="collapse" class="panel-toggle" href="#faq2" aria-expanded="true"><i class="ti-info-alt" aria-hidden="true"></i>Koje su to opcije kupovine dostupne?</a></h4>
                           </div>
                           <div class="panel-collapse collapse" id="faq2" aria-expanded="true" role="article">
                              <div class="panel-body"> Kupite svoj automobil direktno uz siguran i pouzdan način plaćanja. </div>
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