<html>
	<head>
	<title>Login Form</title>
	<link rel="stylesheet" href="bootstrap/css/bootstrap.css">
 	<script src="bootstrap/js/bootstrap.js"></script>
	<script language="javascript" src="js/jQuery3.js"></script>
	<script language="javascript" src="js/md5.js"></script>
	<script language="javascript" src="js/base64.js"></script>
	<script language="javascript">
	$(document).ready(function(){
		$("#loginid").blur(function(){
			loginid=$("#loginid").val();
			$.ajax({
				url:'check-loginid.php',
				type:'post',
				data:{'loginid':loginid},
				success:function(data)
				{
					$("#loginidMessage").html(data);
				}
			});
		});	
	});
	</script>
   <style>
    /* Remove the navbar's default rounded borders and increase the bottom margin */ 
	.navbar {
      border-bottom: 3px solid blue;
      border-top: 3px solid blue;
      border-radius: 0;
      margin-bottom: 0;
    }    

    .body{
      background-image: url("image/1.png");
      background-size: 100% 100%;
      margin-top: 0;
    }

    .blueline{
    	background: blue;
    	width: 100%;
    	height: 7px;
    }

    .header{}
    /* Remove the jumbotron's default bottom margin */ 
     .jumbotron {
      margin-bottom: 0;
      padding-top: 0;
      padding-bottom: 0;
      background-color: #b0e0e6;
    }
    .jumbotron h1,p {color:#000000;}

    .panel-heading{
      text-align: center;
      font: 20px bold serif;
      padding: 4px;
    }
    button{
      font-size: 30px;
      font-weight: bold;
    }
    td{
      font-size: 17px;
      padding: 7px;
      font-family: red serif;
    }
    th{
      padding-right: 22px;
      font-size: 17px;
    }
    /* Add a gray background color and some padding to the footer */
    footer {
      background-color: #f2f2f2;
      padding: 25px;
    }
  </style>
	<script language="javascript">
	function convert()
	{
		password=document.getElementById("password").value;
		password=md5(password);
		password=Base64.encode(password);
		document.getElementById("password").value=password;
			
	}
	</script>
	</head>
	<body>
		<div class="jumbotron">
		  <div class="row">
  			  <div class="col-sm-2" style="padding-left: 30px;">
   			    <div><img src="image/drdologo1.jpg" class="img-responsive" style="width:150px; border-radius: 50%;padding:10px;" alt="Image"></div>
  			  </div>
  			  <div class="col-sm-8"> 
     			 <div class="container text-center">
    			   <h1>ITR MEAL BOOKING</h1>      
    			   <p>       EAT HEALTHY, STAY HEALTHY</p>
    			 </div>
  			  </div>
 		  </div>
		</div>

		<nav class="navbar navbar-inverse">
		    <div class="container-fluid" style="font-size: 16px">
    			<div class="collapse navbar-collapse" id="myNavbar">
    				<ul class="nav navbar-nav navbar-right">
    				    <li><a href="admin/adminlogin.php"><span class="glyphicon glyphicon-user"></span> ADMINSTRATOR</a></li>
    				</ul>
    			</div>
 			</div>
		</nav>
		<div class="body">
			<br><br>
			<div class="container"> 
 				<div class="row">
  			    	<div class="col-sm-3"></div> 
					<div class="col-sm-5">
						<div class="panel panel-primary">
							<div class="panel-heading">
								<h2>LOGIN HERE</h2>
							</div>
							<div style="color: red; font-weight: bold; text-align: center;">
								<?php
								if(isset($_GET['msg']))
								{
									$msg=$_GET['msg'];
									echo $msg;
								}
							?>
							</div>
							
				
							<form action="check-user.php" method="post" onsubmit="convert()">
								<div class="panel-body">
									<center>
									<table cellspacing="100px" cellpadding="5px">

										<tr>
											<td>Login ID:</td>
											<td><input type="text" name="loginid"/></td>
										</tr>
										<tr>
											<td>Password:</td>
											<td><input type="password" name="password" id="password"/></td>
										</tr>
										<tr>
											<td></td>
											<td><label id="loginidMessage"></label></td>
										</tr>
									</table>
									</center>
									<div class="panel-footer">
										<center>
											<input type="submit" name="Register" style="font-size: 20px" />
											<input type="reset" name="Cancel" style="font-size: 20px"/>
											<a href="register.php">New User?</a>
										</center>
									</div>		
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		<footer class="container-fluid text-center">
 			<p>Online Copyright</p>  
 			<form class="form-inline">
  				<p>&copy;CAN batch-II </p>
  				<p>Contact Info : 5548/4489</p>
 			</form>
		</footer>
	</body>
</html>