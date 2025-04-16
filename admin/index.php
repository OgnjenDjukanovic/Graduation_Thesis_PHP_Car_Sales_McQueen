<!DOCTYPE html>
<html lang="en" >
<?php
include("../connection/connect.php");
error_reporting(0);
session_start();
if(isset($_POST['submit']))
{
	$username = $_POST['username'];
	$password = $_POST['password'];
	$code = "";
	
	if(!empty($_POST["submit"])) 
  {
	$loginquery ="SELECT * FROM admin WHERE username='$username' && password='".md5($password)."'";
	$result=mysqli_query($db, $loginquery);
	$row=mysqli_fetch_array($result);
	
		if(is_array($row) && $row['code'] == "QSTE52")
		{
			$_SESSION["adm_id"] = $row['adm_id'];
			header("refresh:1;url=dashboard.php");
		}
		else if(is_array($row))
		{
			$_SESSION["adm_id"] = $row['adm_id'];
			header("refresh:1;url=../moderator/dashboard.php");
		}
		else
		{
			$message = "Netačno korisničko ime i šifra!";
		}
	
	}

}

if(isset($_POST['submit1'] ))
{
     if(empty($_POST['cr_user']) ||
   	    empty($_POST['cr_email'])|| 
		empty($_POST['cr_pass']) ||  
		empty($_POST['cr_cpass']) ||
		empty($_POST['code']))
		{
			$message = "Sva polja moraju biti popunjena!";
		}
	else
	{
		
	
	$check_username= mysqli_query($db, "SELECT username FROM admin where username = '".$_POST['cr_user']."' ");
	
	$check_email = mysqli_query($db, "SELECT email FROM admin where email = '".$_POST['cr_email']."' ");
	
	  $check_code = mysqli_query($db, "SELECT adm_id FROM admin where code = '".$_POST['code']."' ");

	
	if($_POST['cr_pass'] != $_POST['cr_cpass']){
       	$message = "Šifra se nepodudara!";
    }
	
    elseif (!filter_var($_POST['cr_email'], FILTER_VALIDATE_EMAIL))
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
	 if(mysqli_num_rows($check_code) > 0) 
             {
                   $message = "Jedinstveni kod već iskorišćen!";
             }
	else{
       $result = mysqli_query($db,"SELECT id FROM admin_codes WHERE codes =  '".$_POST['code']."'");
					  
                     if(mysqli_num_rows($result) == 0)
						 {
                           
			                 $message = "Netačan kod!";
                         } 
                      
                      else                                  
					     {
	
								$mql = "INSERT INTO admin (username,password,email,code) VALUES ('".$_POST['cr_user']."','".md5($_POST['cr_pass'])."','".$_POST['cr_email']."','".$_POST['code']."')";
								mysqli_query($db, $mql);
									$success = "Moderator dodat uspešno!";
						 }
        }
	}

}
?>

<head>
  <meta charset="UTF-8">
  <title>Admin Moderator</title>
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">

  <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=poppins:400,100,300,500,700,900'>
	<link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Montserrat:400,700'>
	<link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>

  <link rel="stylesheet" href="css/login.css">
  <link rel="stylesheet" href="css/green.css">
     
</head>

<body>

  
<div class="container">
  <div class="info">
    <h1>Administrator  Moderator </h1><span> Logovanje</span>
  </div>
</div>
<div class="form">
  <div class="thumbnail kyi"><img src="images/profile/manager.png"/></div>
  
  <form class="register-form" action="index.php" method="post">
    <input type="text" placeholder="Korisničko ime" name="cr_user"/>
    <input type="text" placeholder="E-mail adresa"  name="cr_email"/>
	 	<input type="password" placeholder="Šifra"  name="cr_pass"/>
	  <input type="password" placeholder="Potvrdi šifru"  name="cr_cpass"/>
	  <input type="password" placeholder="Jedinstveni kod"  name="code"/>
   	<input type="submit"  name="submit1" value="Kreiraj" />
    <p class="message">Već kreiran moderator? <a href="#">Uloguj se</a></p>
		<p class="message"><a href="../index.php">Vrati se na početnu stranu</a></p>
  </form>

  <span style="color:red;"><?php echo $message; ?></span>
  <span style="color:green;"><?php echo $success; ?></span>
	
  <form class="login-form" action="index.php" method="post">
    <input type="text" placeholder="Korisničko ime" name="username"/>
    <input type="password" placeholder="Šifra" name="password"/>
    <input  type="submit"  name="submit" value="Uloguj se" />
    <p class="message">Zelite da kreirate moderatora? <a href="#">Kreiraj moderatora</a></p>
		<p class="message"><a href="../index.php">Vrati se na početnu stranu</a></p>
  </form>
  
</div>

  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
  <script src='js/index.js'></script>
  
</body>

</html>
