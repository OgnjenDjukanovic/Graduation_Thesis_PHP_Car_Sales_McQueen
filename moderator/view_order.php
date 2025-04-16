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

    <title>Moderator Narudžbenica Status</title>

    <link href="css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link href="css/helper.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script language="javascript" type="text/javascript">
var popUpWin=0;
function popUpWindow(URLStr, left, top, width, height)
{
 if(popUpWin)
{
if(!popUpWin.closed) popUpWin.close();
}
popUpWin = open(URLStr,'popUpWin', 'toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=no,copyhistory=yes,width='+600+',height='+600+',left='+left+', top='+top+',screenX='+left+',screenY='+top+'');
}

</script>
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
                    <h3 class="text-primary">Narudžbenica Status</h3> </div>
                
            </div>
            <!-- Container Fluid  -->
            <div class="container-fluid">
                <!-- Page Content -->
                <div class="row">
                    <div class="col-12"> 
                       
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Podaci Narudžbenice</h4>
                             
                                <div class="table-responsive m-t-20">
                                    <table id="myTable" class="table table-bordered table-striped">
                                       
                                        <tbody>
                                           <?php
											$sql="SELECT users.*, users_orders.* FROM users INNER JOIN users_orders ON users.u_id=users_orders.u_id where o_id='".$_GET['user_upd']."'";
												$query=mysqli_query($db,$sql);
												$rows=mysqli_fetch_array($query);
					
												?>
											
											<tr>
													<td><strong>Korisničko Ime:</strong></td>
												    <td><center><?php echo $rows['username']; ?></center></td>
													   <td><center>
													   <a href="javascript:void(0);" onClick="popUpWindow('order_update.php?form_id=<?php echo htmlentities($rows['o_id']);?>');" title="Update order">
															 <button type="button" class="btn btn-primary">Definiši Status Narudžbenice</button></a>
															 </center>
											 </td>
												  
											</tr>	
											<tr>
												<td><strong>Naziv Automobila:</strong></td>
												    <td><center><?php echo $rows['title']; ?></center></td>
													    																							
											</tr>	
											<tr>
													<td><strong>Količina:</strong></td>
												    <td><center><?php echo $rows['quantity']; ?></center></td>
													  
											</tr>
											<tr>
													<td><strong>Cena:</strong></td>
												    <td><center>€<?php echo $rows['price']; ?></center></td>
													   
											</tr>
											<tr>
													<td><strong>Adresa:</strong></td>
												    <td><center><?php echo $rows['address']; ?></center></td>
													  
											</tr>
											<tr>
													<td><strong>Datum:</strong></td>
												     <td><center><?php echo $rows['date']; ?></center></td>
													  
											</tr>
											<tr>
													<td><strong>Status:</strong></td>
													<?php 
																			$status=$rows['status'];
																			if($status=="" or $status=="NULL")
																			{
																			?>
																			<td> <center><button type="button" class="btn btn-info" style="font-weight:bold;">Otpremljeno</button></center></td>
																			<?php
																				}
																			if($status=="closed")
																				{
																			?>
																			<td>  <center><button type="button" class="btn btn-success" ><span  class="fa fa-check-circle" aria-hidden="true">Isporučeno</button></center></td> 
																			<?php 
																			} 
																			?>
																			<?php
																			if($status=="rejected")
																				{
																			?>
																			<td>  <center><button type="button" class="btn btn-danger"> <i class="fa fa-close"></i>Otkazano</button> </center></td> 
																			<?php 
																			} 
																			?>
													  
											</tr>
                                           
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