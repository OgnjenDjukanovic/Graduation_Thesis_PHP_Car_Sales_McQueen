<!DOCTYPE html>
<html lang="en">
<?php
include("../connection/connect.php");
error_reporting(0);
session_start();




if(isset($_POST['submit']))
{
	
			
		
			
		  
		
		
		if(empty($_POST['c_name'])||empty($_POST['res_name'])||$_POST['email']==''||$_POST['phone']==''||$_POST['url']==''||$_POST['o_hr']==''||$_POST['c_hr']==''||$_POST['o_days']==''||$_POST['address']=='')
		{	
											$error = 	'<div class="alert alert-danger alert-dismissible fade show">
																<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
																<strong>Sva polja moraju biti popunjena!</strong>
															</div>';
									
		
								
		}
	else
		{
		
				$fname = $_FILES['file']['name'];
								$temp = $_FILES['file']['tmp_name'];
								$fsize = $_FILES['file']['size'];
								$extension = explode('.',$fname);
								$extension = strtolower(end($extension));  
								$fnew = uniqid().'.'.$extension;
   
								$store = "images/suppliers/".basename($fnew);
	
					if($extension == 'jpg'||$extension == 'png'||$extension == 'gif' )
					{        
									if($fsize>=1000000)
										{
		
		
												$error = 	'<div class="alert alert-danger alert-dismissible fade show">
																<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
																<strong>Maksimalna veličina slike je 1024kb!</strong> Pokušaj drugu sliku.
															</div>';
	   
										}
		
									else
										{
												
												
												$res_name=$_POST['res_name'];
				                                 
												$sql = "update car_bonds set c_id='$_POST[c_name]', title='$res_name',email='$_POST[email]',phone='$_POST[phone]',url='$_POST[url]',o_hr='$_POST[o_hr]',c_hr='$_POST[c_hr]',o_days='$_POST[o_days]',address='$_POST[address]',image='$fnew' where rs_id='$_GET[res_upd]' "; 
													mysqli_query($db, $sql); 
												move_uploaded_file($temp, $store);
			  
													$success = 	'<div class="alert alert-success alert-dismissible fade show">
																<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
																<strong>Uspečno</strong> ažurirano.
															</div>';
                
	
										}
					}
					elseif($extension == '')
					{
						$error = 	'<div class="alert alert-danger alert-dismissible fade show">
																<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
																<strong>Odaberi sliku.</strong>
															</div>';
					}
					else{
					
											$error = 	'<div class="alert alert-danger alert-dismissible fade show">
																<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
																<strong>Loša ekstentija!</strong>png, jpg, Gif su prihvatljivi.
															</div>';
						
	   
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
 
    <title>Admin Izmena Dobavljača</title>

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
                        <a class="nav-link dropdown-toggle text-muted  " href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="images/profile/manager.png" alt="user" class="profile-pic" /></a>
                            <div class="dropdown-menu dropdown-menu-right animated zoomIn">
                                <ul class="dropdown-user">
                               <li><a href="logout.php"><i class="fa fa-power-off"></i> Izloguj se</a></li>
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
                        <li> <a class="has-arrow  " href="#" aria-expanded="false">  <span><i class="fa fa-user f-s-20 "></i></span><span class="hide-menu">Korisnici</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="all_users.php">Svi Korisnici</a></li>
								<li><a href="add_user.php">Dodaj Korisnika</a></li>
								
                            </ul>
                        </li>
                        <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-archive f-s-20 color-warning"></i><span class="hide-menu">Dobavljači</span></a>
                            <ul aria-expanded="false" class="collapse">
								<li><a href="all_suppliers.php">Svi Dobavljači</a></li>
								<li><a href="add_manufacturer.php">Dodaj Proizvođača</a></li>
                                <li><a href="add_supplier.php">Dodaj Dobavljača</a></li>
                                
                            </ul>
                        </li>
                      <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-car" aria-hidden="true"></i><span class="hide-menu">Automobili</span></a>
                            <ul aria-expanded="false" class="collapse">
								<li><a href="all_cars.php">Svi Automobili</a></li>
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
                    <h3 class="text-primary">Izmena Dobavljača</h3> </div>
            </div>
            <!-- Container Fluid  -->
            <div class="container-fluid">
                <!-- Page Content -->			
                        <?php  echo $error;
                                echo $success; ?>
	
					    <div class="col-lg-12">
                        <div class="card card-outline-primary">
                            
                                <h4 class="m-b-0 ">Izmenite Dobavljača</h4>
                            
                            <div class="card-body">
                                <form action='' method='post'  enctype="multipart/form-data">
                                    <div class="form-body">
                                       <?php $ssql ="select * from car_bonds where rs_id='$_GET[res_upd]'";
													$res=mysqli_query($db, $ssql); 
													$row=mysqli_fetch_array($res);?>
                                        <hr>
                                        <div class="row p-t-20">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Naziv</label>
                                                    <input type="text" name="res_name" value="<?php echo $row['title'];  ?>" class="form-control" placeholder="Unesite Naziv">
                                                   </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group has-danger">
                                                    <label class="control-label">E-mail Adresa</label>
                                                    <input type="text" name="email" value="<?php echo $row['email'];  ?>"class="form-control form-control-danger" placeholder="Unesite E-mail Adresu">
                                                    </div>
                                            </div>
                                        </div>
                                        <div class="row p-t-20">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Broj Telefona </label>
                                                    <input type="text" name="phone" class="form-control" value="<?php echo $row['phone'];  ?>" placeholder="Unesite Broj Telefona">
                                                   </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group has-danger">
                                                    <label class="control-label">Web Adresa</label>
                                                    <input type="text" name="url" class="form-control form-control-danger" value="<?php echo $row['url'];  ?>" placeholder="Unesite Web Adresu">
                                                    </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Vreme Otvaranja</label>
                                                    <select name="o_hr" class="form-control custom-select"  data-placeholder="Choose a Category" >
                                                     <option>--Odaberite Vreme Otvaranja--</option>
                                                        <option value="06:00">06:00</option>
                                                        <option value="07:00">07:00</option> 
														<option value="08:00">08:00</option>
														<option value="09:00">09:00</option>
														<option value="10:00">10:00</option>
														<option value="11:00">11:00</option>
                                                        <option value="12:00">12:00</option>
                                                    </select>
                                                </div>
                                            </div>
                                             <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Vreme Zatvaranja</label>
                                                    <select name="c_hr" class="form-control custom-select"    data-placeholder="Choose a Category" >
                                                     <option>--Odaberite Vreme Zatvaranja--</option>
                                                          <option value="14:00">14:00</option>
                                                        <option value="15:00">15:00</option> 
														<option value="16:00">16:00</option>
														<option value="17:00">17:00</option>
														<option value="18:00">18:00</option>
														<option value="19:00">19:00</option>
                                                        <option value="20:00">20:00</option>
                                                        <option value="21:00">21:00</option>
                                                        <option value="22:00">22:00</option>
                                                        <option value="23:00">23:00</option>
                                                        <option value="00:00">00:00</option>
                                                    </select>
                                                </div>
                                            </div>
											
											 <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Radni Dani</label>
                                                    <select name="o_days" class="form-control custom-select"  data-placeholder="Choose a Category" tabindex="1">
                                                        <option>--Odaberite Radne Dane--</option>
                                                        <option value="pon-pet">Od Ponedeljka do Petka</option>
                                                        <option value="pon-sub">Od Ponedeljka do Subote</option> 
														<option value="24x7">Svim Danima</option>
														
                                                    </select>
                                                </div>
                                            </div>
											
											<div class="col-md-6">
                                                <div class="form-group has-danger">
                                                    <label class="control-label">Slika</label>
                                                    <input type="file" name="file"  id="lastName"  class="form-control form-control-danger" placeholder="12n">
                                                    </div>
                                            </div>
											
											 <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="control-label">Proizvođač</label>
													<select name="c_name" class="form-control custom-select" data-placeholder="Choose a Category" tabindex="1">
                                                        <option>--Odaberite Proizvođača--</option>
                                                 <?php $ssql ="select * from res_category";
													$res=mysqli_query($db, $ssql); 
													while($rows=mysqli_fetch_array($res))  
													{
                                                       echo' <option value="'.$rows['c_id'].'">'.$rows['c_name'].'</option>';;
													}  
                                                 
													?> 
													 </select>
                                                </div>
                                            </div>
	
                                        </div>
                                        <h3 class="box-title m-t-40">Adresa Dobavljača</h3>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-12 ">
                                                <div class="form-group">
                                                    
                                                    <textarea name="address" type="text" style="height:100px;" class="form-control" > <?php echo $row['address']; ?> </textarea>
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
            <!-- Footer -->
            <footer class="footer">   &copy; Copyright 2024 - Ognjen Đukanović </footer>
            <!-- Footer -->
        </div>
        <!-- Page Wrapper  -->
    </div>
    
    <script src="js/lib/jquery/jquery.min.js"></script>
    <script src="js/lib/bootstrap/js/popper.min.js"></script>
    <script src="js/lib/bootstrap/js/bootstrap.min.js"></script>
    <script src="js/jquery.slimscroll.js"></script>
    <script src="js/sidebarmenu.js"></script>
    <script src="js/lib/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <script src="js/custom.min.js"></script>

</body>

</html>