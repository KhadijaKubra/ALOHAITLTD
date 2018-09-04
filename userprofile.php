
<?php
session_start();

$_SESSION['mid']=$_GET['id'];
if (!(isset($_SESSION['un']))){
    header("location:userprofile.php");
}
//$_SESSION['un']=$_GET['un']; 
?>




<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Bootstrap Dashboard by Bootstrapious.com</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="vendor/font-awesome/css/font-awesome.min.css">
    <!-- Fontastic Custom icon font-->
    <link rel="stylesheet" href="css/fontastic.css">
    <!-- Google fonts - Roboto -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700">
    <!-- jQuery Circle-->
    <link rel="stylesheet" href="css/grasp_mobile_progress_circle-1.0.0.min.css">
    <!-- Custom Scrollbar-->
    <link rel="stylesheet" href="vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.css">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="css/style.default.css" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="css/custom.css">
    <!-- Favicon-->
    <link rel="shortcut icon" href="img/favicon.ico">
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
  </head>
    
  <body>
    <!-- Side Navbar -->
    <nav class="side-navbar">
      <div class="side-navbar-wrapper">
        <!-- Sidebar Header    -->
        <div class="sidenav-header d-flex align-items-center justify-content-center">
          <!-- User Info-->
          <div class="sidenav-header-inner text-center">
			 <?php
			require 'config.php';
			if(isset($_SESSION['un'])){
                $un= $_SESSION['un'];
            $statement="select * from member where Name='$un'";
            $result = mysqli_query($conn, $statement);

            if (mysqli_num_rows($result) > 0)
            {
                while($row = mysqli_fetch_assoc($result))
                {
					echo"<img src=image/".$row['ProfilePic']." width='10%' height='10%' alt='person' class='img-fluid rounded-circle'>";
                }

            }
            else
            {
                echo "Nothing found in db";
            }
			}
            mysqli_close($conn);
			?>
		  
            <h2 class="h5">

              <?php if(isset($_SESSION['un'])){
                $un= $_SESSION['un'];
                
                echo "$un";
                

            }
            
            ?>
            </h2><span> </span>
          </div>
          <!-- Small Brand information, appears on minimized sidebar-->
          <div class="sidenav-header-logo"><a href="index.html" class="brand-small text-center"> <strong>B</strong><strong class="text-primary">D</strong></a></div>
        </div>
        <!-- Sidebar Navigation Menus-->
          
          
          
          
          
          <!-- can be updated according to need -->
          
          
          
        <div class="main-menu">
          <h5 class="sidenav-heading">Main</h5>
          <ul id="side-main-menu" class="side-menu list-unstyled">                  
            <li><a href="memberdashboard.php"> <i class="icon-home"></i>Home                             </a></li>
            <li><a href="ongproject.php"> <i class="icon-form"></i>on going project                            </a></li>      
            <li><a href="userprofile.php"> <i class="icon-grid"></i>userprofile                           </a></li>
            <li><a href="chat.php"> <i class="icon-grid"></i>Chat                           </a></li>
            
            
         
          </ul>
        </div>
   
      </div>
    </nav>
      
     
      <!-- push notification div  -->
      
    <div class="page">
      <!-- navbar-->
      <header class="header">
        <nav class="navbar">
          <div class="container-fluid">
            <div class="navbar-holder d-flex align-items-center justify-content-between">
              <div class="navbar-header"><a id="toggle-btn" href="#" class="menu-btn"><i class="icon-bars"> </i></a><a href="index.html" class="navbar-brand">
                  <div class="brand-text d-none d-md-inline-block"><strong class="text-primary">Aloha solutions LTD</strong></div></a></div>
              <ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center">             
                <!-- Log out-->
                <li class="nav-item"><a href="logout.php" class="nav-link logout"> <span class="d-none d-sm-inline-block">Logout</span><i class="fa fa-sign-out"></i></a></li>
              </ul>
            </div>
          </div>
            
        </nav>
          
      </header>
        

     
      
      <!--
      <!-- work within these section for front and back end -->
      
      <section >
      
      
      
      <h1>
        User Profile
      </h1>
     
    </section>
	
	 
	 
	 
	 
	<section class="content">
		<div class="col-md-3">
            <div class="box box-primary">
            <div class="box-body box-profile">
             
              
        </div>
		
		</div>
	</section>	
	
	<table class="table table-striped table-bordered table-condensed">
	
        <?php
            require 'config.php';
            $statement="select * from member where Name='$un'";
            $result = mysqli_query($conn, $statement);

            if (mysqli_num_rows($result) > 0)
            {
                while($row = mysqli_fetch_assoc($result))
                {
					echo"<img class='profile-user-img img-responsive img-circle' width='10%' height='10%' src=image/".$row['ProfilePic']." alt='User profile picture'>";
					echo"<thead><th>Name</th><th>Position</th></thead>";
					echo "<tr><td> <h3>".$row['Name']."</h3></td>";
					echo "<td> <span><h3>".$row['Position']."</h3></span></td></tr>";

                }

            }
            else
            {
                echo "Nothing found in db";
            }
            mysqli_close($conn);
        ?>
		
	 </table>

	 <section>	
		<div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">About Me</h3>
            </div>
		<div class="box-body">
              <strong><i class="fa fa-book margin-r-5"></i> Education</strong>
	  
		</div>
		<table class="table table-striped table-bordered table-condensed">
	
        <?php
            require 'config.php';

           $statement="select * from member where Name='$un'";
            $result = mysqli_query($conn, $statement);

            if (mysqli_num_rows($result) > 0)
            {
                while($row = mysqli_fetch_assoc($result))
                {
					//echo " <h3>".$row['skills']."</h3>";
					 echo " <h3>".$row['Education']."</h3>";

                }

            }
            else
            {
                echo "Nothing found in db";
            }
            mysqli_close($conn);
        ?>
		
	 </table>
		</div>
	 </section> 
	 
	 
	  
	  
	  
	 
      
      <section >
		<div class="box-body">

            <hr>

              <strong><i class="fa fa-map-marker margin-r-5"></i> Location</strong>
             
			<table class="table table-striped table-bordered table-condensed">
	
        <?php
            require 'config.php';

            $statement="select * from member where Name='$un'";
            $result = mysqli_query($conn, $statement);

            if (mysqli_num_rows($result) > 0)
            {
                while($row = mysqli_fetch_assoc($result))
                {
					echo " <h3>".$row['location']."</h3>";
					

                }

            }
            else
            {
                echo "Nothing found in db";
            }
            mysqli_close($conn);
        ?>
		
	 </table>
	 </div>
	  </section>
     <section >
		<div class="box-body">

            <hr>

              <strong><i class="fa fa-pencil margin-r-5"></i> Skills</strong>
             <table class="table table-striped table-bordered table-condensed">
	
        <?php
            require 'config.php';

            $statement="select * from member where Name='$un'";
            $result = mysqli_query($conn, $statement);

            if (mysqli_num_rows($result) > 0)
            {
                while($row = mysqli_fetch_assoc($result))
                {
					echo " <h3>".$row['skills']."</h3>";
					

                }

            }
            else
            {
                echo "Nothing found in db";
            }
            mysqli_close($conn);
        ?>
	<form method="get" action="editMember.php">
    <button type="submit" class="btn btn-default">EDIT</button>
</form>
 
	 </table>
		</div>
</div>		
	</section>
      <section >
        

      </section>
      
      </div>
      
      <!-- copy entire page for new page to maintain the dashboard design same-->
      
      
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/popper.js/umd/popper.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="js/grasp_mobile_progress_circle-1.0.0.min.js"></script>
    <script src="vendor/jquery.cookie/jquery.cookie.js"> </script>
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="vendor/jquery-validation/jquery.validate.min.js"></script>
    <script src="vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="js/charts-home.js"></script>
    <!-- Main File-->
    <script src="js/front.js"></script>
    </body>
</html>