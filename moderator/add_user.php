<!DOCTYPE html>
<html lang="en">
<?php


session_start();
error_reporting(0);
include("../connection/connect.php");

if(isset($_POST['submit'] ))
{
    if(empty($_POST['uname']) ||
   	    empty($_POST['fname'])|| 
		empty($_POST['lname']) ||  
		empty($_POST['email'])||
		empty($_POST['password'])||
		empty($_POST['phone']) ||
		empty($_POST['address']))
		{
			$error = '<div class="alert alert-danger alert-dismissible fade show">
																<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
																<strong>Sva polja su obavezna!</strong>
															</div>';
		}
	else
	{
		
	$check_username= mysqli_query($db, "SELECT username FROM users where username = '".$_POST['uname']."' ");
	$check_email = mysqli_query($db, "SELECT email FROM users where email = '".$_POST['email']."' ");
		

	
	
    if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
    {
       	$error = '<div class="alert alert-danger alert-dismissible fade show">
																<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
																<strong>Netačna e-mail adresa!</strong>
															</div>';
    }
	elseif(strlen($_POST['password']) < 6)
	{
		$error = '<div class="alert alert-danger alert-dismissible fade show">
																<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
																<strong>Šifra mora imati minimum 6 karaktera!</strong>
															</div>';
	}
	
	elseif(strlen($_POST['phone']) < 10)
	{
		$error = '<div class="alert alert-danger alert-dismissible fade show">
																<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
																<strong>Netačan broj telefona!</strong>
															</div>';
	}
	elseif(mysqli_num_rows($check_username) > 0)
     {
    	$error = '<div class="alert alert-danger alert-dismissible fade show">
																<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
																<strong>Korisničko ime već postoji!</strong>
															</div>';
     }
	elseif(mysqli_num_rows($check_email) > 0)
     {
    	$error = '<div class="alert alert-danger alert-dismissible fade show">
																<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
																<strong>E-mail adresa već postoji!</strong>
															</div>';
     }
	else{
       
	
	$mql = "INSERT INTO users(username,f_name,l_name,email,phone,password,address) VALUES('".$_POST['uname']."','".$_POST['fname']."','".$_POST['lname']."','".$_POST['email']."','".$_POST['phone']."','".md5($_POST['password'])."','".$_POST['address']."')";
	mysqli_query($db, $mql);
			$success = 	'<div class="alert alert-success alert-dismissible fade show">
																<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
																<strong>Uspečno!</strong> Novi korisnik je dodat.</br></div>';
	
    }
	}

}

?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Moderator Dodavanje Korisnika</title>

    <link href="css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link href="css/helper.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    
</head>

<body class="fix-header">
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
			<circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>
    <!-- Main Wrapper  -->
    <div id="main-wrapper">
        <!-- Header  -->
         <div class="header">
            <nav class="navbar top-navbar navbar-expand-md navbar-light">
                <!-- Logo -->
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.html">
                    <a class="navbar-brand" href="index.php"> McQueen </a>
                    </a>
                </div>
                <!-- Logo -->
                <div class="navbar-collapse">
                    <ul class="navbar-nav mr-auto mt-md-0">
                        <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up text-muted  " href="javascript:void(0)"><i class="mdi mdi-menu"></i></a> </li>
                        <li class="nav-item m-l-10"> <a class="nav-link sidebartoggler hidden-sm-down text-muted  " href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
                     
                    </ul>
                    <ul class="navbar-nav my-lg-0">
                        <!-- Profile -->
                        <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-muted  " href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="../admin/images/profile/manager.png" alt="user" class="profile-pic" /></a>
                            <div class="dropdown-menu dropdown-menu-right animated zoomIn">
                                <ul class="dropdown-user">
                                   <li><a href="logout.php"><i class="fa fa-power-off"></i> Logout</a></li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <!-- Header -->
        <!-- Left Sidebar  -->
        <div class="left-sidebar">
            <!-- Sidebar Scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar Navigation-->
                <nav class="sidebar-nav">
                   <ul id="sidebarnav">
                        <li class="nav-devider"></li>
                        <li class="nav-label">Početna</li>
                        <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-tachometer"></i><span class="hide-menu">Kontrolna Tabla</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="dashboard.php">Kontrolna Tabla</a></li>
                                
                            </ul>
                        </li>
                        <li class="nav-label">Podaci</li>
                        <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-archive f-s-20 color-warning"></i><span class="hide-menu">Dobavljači</span></a>
                            <ul aria-expanded="false" class="collapse">
								<li><a href="all_suppliers.php">Svi Dobavljači</a></li>
								<li><a href="add_manufacturer.php">Dodaj Proizvođača</a></li>
                                <li><a href="add_supplier.php">Dodaj Dobavljača</a></li>
                                
                            </ul>
                        </li>
                       <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-car" aria-hidden="true"></i><span class="hide-menu">Automobili</span></a>
                            <ul aria-expanded="false" class="collapse">
								<li><a href="all_cars.php">Svi Autombili</a></li>
								<li><a href="add_car.php">Dodaj Automobil</a></li>
                              
                            </ul>
                        </li>
						 <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-shopping-cart" aria-hidden="true"></i><span class="hide-menu">Narudžbenice</span></a>
                            <ul aria-expanded="false" class="collapse">
								<li><a href="all_orders.php">Sve Narudžbenice</a></li>
								  
                            </ul>
                        </li>
                         
                    </ul>
                </nav>
                <!-- Sidebar Navigation -->
            </div>
            <!-- Sidebar Scroll-->
        </div>
        <!-- Left Sidebar  -->
        <!-- Page Wrapper  -->
        <div class="page-wrapper" style="height:1200px;">
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Dodavanje Korisnika</h3> </div>
               
            </div>
            <!-- Container Fluid  -->
            <div class="container-fluid">
                <!-- Page Content -->
                     <div class="row">
                   
                   
					
					 <div class="container-fluid">
                  
									
									<?php  //echo var_dump($_POST);
									        echo $error;
									        echo $success; ?>
									
									
								
								
					    <div class="col-lg-12">
                        <div class="card card-outline-primary">
                            <div class="card-header " style="background: rgb(63, 41, 125);">
                                <h4 class="m-b-0 text-white">Dodaj Korisnika</h4>
                            </div>
                            <div class="card-body">
                                <form action='' method='post'  enctype="multipart/form-data">
                                    <div class="form-body">
                                       
                                        <hr>
                                        <div class="row p-t-20">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Korisničko Ime</label>
                                                    <input type="text" name="uname" class="form-control" placeholder="Unesite Korisničko Ime">
                                                   </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group has-danger">
                                                    <label class="control-label">Ime</label>
                                                    <input type="text" name="fname" class="form-control form-control-danger" placeholder="Unesite Ime">
                                                    </div>
                                            </div>
                                        </div>
                                        <div class="row p-t-20">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Prezime </label>
                                                    <input type="text" name="lname" class="form-control" placeholder="Unesite Prezime">
                                                   </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group has-danger">
                                                    <label class="control-label">E-mail Adresa</label>
                                                    <input type="text" name="email" class="form-control form-control-danger" placeholder="Unesite E-mail Adresu">
                                                    </div>
                                            </div>
                                        </div>
										 <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Šifra</label>
                                                    <input type="password" name="password" class="form-control form-control-danger" placeholder="Unesite Šifru">
                                                    </div>
                                                </div>
                                        
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Broj Telefona</label>
                                                    <input type="text" name="phone" class="form-control form-control-danger" placeholder="Unesite Broj Telefona">
                                                    </div>
                                                </div>
                                            </div>
                                            <h3 class="box-title m-t-40"> Adresa Stanovanja</h3>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-12 ">
                                                <div class="form-group">
                                                    
                                                    <textarea name="address" type="text" style="height:100px;" class="form-control"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                      
                                        </div>
                                    </div>
                                    <div class="form-actions">
                                        <input type="submit" name="submit" class="btn btn-success" value="Sačuvaj" style="background: rgb(63, 41, 125);"> 
                                        <a href="dashboard.php" class="btn btn-inverse">Poništi</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
					
					
					
					
					
					
					
					
					
					
					
					
                </div>
                <!-- Page Content -->
            </div>
            <!-- Container Fluid  -->
        </div>
        <!-- Page Wrapper  -->
        <!-- Footer -->
        <footer class="footer">     &copy; Copyright 2024 - Ognjen Djukanovic </footer>
        <!-- Footer -->
    </div>
    <!-- Wrapper -->
    <script src="js/lib/jquery/jquery.min.js"></script>
    <script src="js/lib/bootstrap/js/popper.min.js"></script>
    <script src="js/lib/bootstrap/js/bootstrap.min.js"></script>
    <script src="js/jquery.slimscroll.js"></script>
    <script src="js/sidebarmenu.js"></script>
    <script src="js/lib/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <script src="js/custom.min.js"></script>

</body>

</html>