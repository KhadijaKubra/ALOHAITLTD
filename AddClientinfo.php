   <?php

 require 'config.php';
  // Initialize message variable

session_start();
if (!(isset($_SESSION['un']))){
    header("location:AddClientinfo.php");
}


  // If upload button is clicked ...
  if (isset($_POST['submit'])) {
  	
  	// Get text
  	
      $name = $_POST['name'];
      $email = $_POST['Email'];
      $ContactNumber = $_POST['ContactNumber'];
      
      $deadline = $_POST['Deadline'];
      $ProjectID = $_POST['ProjectID'];
      $ServiceID = $_POST['ServiceID'];
     
	
  	$sql = "INSERT INTO client (Name,Email,ContactNumber,Deadline,ProjectID,ServiceID) VALUES ('$name','$email','$ContactNumber','$deadline','$ProjectID',$ServiceID)";
  	 require 'config.php';
      // execute query
	  
  	if(mysqli_query($conn, $sql)){
		echo "data insert";
	}

  	
  }
  //$result = mysqli_query($db, "SELECT * FROM images");
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
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
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
          <link rel="stylesheet" href="css/memberregi.css" type="text/css">

  </head>
    
	// <script>
	// window.onload=function() { 
        // if (window.XMLHttpRequest) {
            // // code for IE7+, Firefox, Chrome, Opera, Safari
            // xmlhttp = new XMLHttpRequest();
        // } else {
            // // code for IE6, IE5
            // xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        // }
        // xmlhttp.onreadystatechange = function() {
            // if (this.readyState == 4 && this.status == 200) {
                // document.getElementById("ProjectID").innerHTML = this.responseText;
				// document.getElementById("Se").innerHTML = this.responseText;
			// }
        // };
        // xmlhttp.open("GET","getProjectId.php",true);
		// xmlhttp.open("GET","getServiceID.php",true);
        // xmlhttp.send();
    // }
	
	// function jAjax(){
		// var n=document.getElementById('name').value;
		// var e=document.getElementById('Email').value;
		// var c=document.getElementById('ContactNumber').value;
		// var d=document.getElementById('Deadline').value;
		// var p=document.getElementById('project').value;
		// var s=document.getElementById('service').value;
		// if(p.localeCompare('no data found')!=0 && s.localeCompare('')!=0 )
		// {
			
        // $.ajax({url: "createClient.php",
		        // data: {name:n,Email:e,ContactNumber:c,Deadline:d, project:p,service:s },
				// success: function(result){
          // if(result==1)
		  // {			  
		   // alert("Data inserted");
		   // window.location.replace('ClientsList.php');
		  // }
		  // else if(result==0){
			  // alert("Data not inserted.");
		  // }
		  // else
		  // {
			  // alert("DataBase Error"+result);
		  // }
        // }});
		// }
// else{
	// alert('insert all data');
// }	
    // }
	
	
	
// </script>
	
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
            $statement="select * from admin_1 where Name='$un'";
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
      
      <h2 class="h5"><?php if(isset($_SESSION['un'])){
                $un= $_SESSION['un'];
        
      echo "$un";}
      ?>

          </div>
          <!-- Small Brand information, appears on minimized sidebar-->
          <div class="sidenav-header-logo"><a href="index.php" class="brand-small text-center"> <strong>B</strong><strong class="text-primary">D</strong></a></div>
        </div>
        <!-- Sidebar Navigation Menus-->
          
          
          
          
          
          <!-- can be updated according to need -->
          
          
          
        <div class="main-menu">
          <h5 class="sidenav-heading">Main</h5>
            <ul id="side-main-menu" class="side-menu list-unstyled">                  
           <li><a href="adminhome.php"> <i class="icon-home"></i>Home                             </a></li>
            <li><a href="membershow.php"> <i class="fa fa-bar-chart"></i>Memberlist                           </a></li>
            <li><a href="ongprojectAdmin.php"> <i class="icon-grid"></i> Projects                             </a></li>
            <li><a href="ClientsList.php"> <i class="icon-grid"></i> Clients and Projects                          </a></li>
        
              <li><a href="recentwork.php"> <i class="icon-grid"> Upgate recent work</i>                            </a></li>
              
                
             <li><a href="memberregiform.php"> <i class="icon-grid">Memeber registration</i>                            </a></li>
         
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
        

     
      
      
      <!-- work within these section for front and back end -->
      
     
        
        <section id="member registration">
        
         <div class="container">
             <div class="form-sec">
  <h4>Client information</h4>
       <form  method="post" enctype="multipart/form-data">
    <div class="form-group">
      <label>Name:</label>
      <input type="text" class="form-control" id="name" placeholder="Enter Name" name="name">
    </div>
      <div class="form-group">
      <label>Email:</label>
      <input type="text" class="form-control" id="Email" placeholder="Enter Email" name="Email">
    </div>
      <div class="form-group">
      <label>ContactNumber:</label>
      <input type="text" class="form-control" id="ContactNumber" placeholder="Enter ContactNumber" name="ContactNumber">
    </div>
    <div class="form-group"id="ProjectID">
      <label>DeadLine:</label>
      <input type="date" class="form-control" id="Deadline" placeholder="Enter Deadline" name="Deadline">
    </div>
    <div class="form-group"id="ProjectID">
     <label>ProjectID:</label>
      <input type="text" class="form-control" id="ProjectID" placeholder="Enter ProjectID" name="ProjectID">
    </div>
      <div class="form-group" id="ServiceID">
      <label>ServiceID:</label>
     <input type="text" class="form-control" id="ServiceID" placeholder="Enter ServiceID" name="ServiceID">
    </div>
    
    
    
     
    <button type="submit"id="create"name="submit" class="btn btn-default">Submit</button>
  </form>
            
            
             </div>
             
         </div>
        
        
        
     
        
        
        
        
        </section>
        
        
      </div>
        
        
        
      
      <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/popper.js/umd/popper.min.js"> </script>
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