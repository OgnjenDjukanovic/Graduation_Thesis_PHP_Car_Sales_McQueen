<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Uloguj se</title>
  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">

  <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=poppins:400,100,300,500,700,900|RobotoDraft:400,100,300,500,700,900'>
<link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>

      <link rel="stylesheet" href="css/login.css">
      <link rel="stylesheet" href="css/footer.css">
  
</head>

<body>
<?php
include("connection/connect.php");
error_reporting(0);
session_start();
if(isset($_POST['submit']))
{
	$username = $_POST['username'];
	$password = $_POST['password'];
	
	if(!empty($_POST["submit"]))
     {
	$loginquery ="SELECT * FROM users WHERE username='$username' && password='".md5($password)."'";
	$result=mysqli_query($db, $loginquery);
	$row=mysqli_fetch_array($result);
	
	                        if(is_array($row))
								{
                                    	$_SESSION["user_id"] = $row['u_id'];
										 header("refresh:1;url=index.php");
	                            } 
							else
							    {
                                      	$message = "Neispravni korisničko ime i šifra!";
                                }
	 }
	
	
}
?>
  
<div class="pen-title">
  <h1>Logovanje</h1>
</div>

<div class="module form-module">
  <div class="toggle">
   
  </div>
  <div class="form">
    <h2>Ulogujte se na vaš korisnički nalog</h2>
	  <span style="color:red;"><?php echo $message; ?></span> 
   <span style="color:green;"><?php echo $success; ?></span>
    <form action="" method="post">
      <input class="input" type="text" placeholder="Korisničko ime"  name="username"/>
      <input class="input" type="password" placeholder="Šifra" name="password"/>
      <input class="input greenBg" type="submit"  name="submit" value="Uloguj se" />
    </form>
  </div> 
  
  <div class="cta">Nemate korisnički nalog?<a href="registration.php" style="color:#f30;"> Kreiraj korsnički nalog</a>
  <br><br>  
  <p><a href="index.php" style="color:#f30;"> Vrati se na početnu stranu</a></p>
  </div>
</div>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

</body>

</html>
