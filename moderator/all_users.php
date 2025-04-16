<!DOCTYPE html>
<html lang="en">
<?php
include("../connection/connect.php");
error_reporting(0);
session_start();

?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Moderator Korisnici</title>
    <link href="css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link href="css/helper.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

</head>

<body class="fix-header fix-sidebar">
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
        <div class="page-wrapper">
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Korisnici</h3> </div>
               
            </div>
            <!-- Container Fluid  -->
            <div class="container-fluid">
                <!-- Page Content -->
                <div class="row">
                    <div class="col-12">  
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Svi Korisnici</h4>
                             
                                <div class="table-responsive m-t-40">
                                    <table id="myTable" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Korisničko Ime</th>
                                                <th>Ime</th>
                                                <th>Prezime</th>
                                                <th>E-mail adresa</th>
                                                <th>Broj Telefona</th>
												<th>Adresa Stanovanja</th>												
												 <th>Datum Registracije</th>
												  <th>Obriši/Izmeni</th>
												 
                                            </tr>
                                        </thead>
                                        <tbody>
											<?php
												$sql="SELECT * FROM users order by u_id desc";
												$query=mysqli_query($db,$sql);
												
													if(!mysqli_num_rows($query) > 0 )
														{
															echo '<td colspan="7"><center>Nema Korisnika!</center></td>';
														}
													else
														{				
																	while($rows=mysqli_fetch_array($query))
																		{
																					
																				
																				
																					echo ' <tr><td>'.$rows['username'].'</td>
																								<td>'.$rows['f_name'].'</td>
																								<td>'.$rows['l_name'].'</td>
																								<td>'.$rows['email'].'</td>
																								<td>'.$rows['phone'].'</td>
																								<td>'.$rows['address'].'</td>																								
																								<td>'.$rows['date'].'</td>
																									 <td><a href="delete_user.php?user_del='.$rows['u_id'].'" class="btn btn-danger btn-flat btn-addon btn-xs m-b-10"><i class="fa fa-trash-o" style="font-size:16px"></i></a> 
																									 <a href="update_user.php?user_upd='.$rows['u_id'].'" " class="btn btn-info btn-flat btn-addon btn-sm m-b-10 m-l-5"><i class="ti-settings"></i></a>
																									</td></tr>';
																					 
																						
																						
																		}	
														}
												
											
											?> 
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
						 </div>
                      
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Page Content -->
            </div>
            <!-- Container Fluid  -->
            <!-- Footer -->
            <footer class="footer">    &copy; Copyright 2024 - Ognjen Đukanović</footer>
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


    <script src="js/lib/datatables/datatables.min.js"></script>
    <script src="js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
    <script src="js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
    <script src="js/lib/datatables/cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script src="js/lib/datatables/cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
    <script src="js/lib/datatables/cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
    <script src="js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
    <script src="js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
    <script src="js/lib/datatables/datatables-init.js"></script>
</body>

</html>