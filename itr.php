<!DOCTYPE html>

<?php
  session_start();
  require_once("dbconnect.php");
  $loginid=$_SESSION['loginid'];
  $sql="select * from customers where loginid='$loginid'";
  $result=mysqli_query($con,$sql);
  if(!$result)
    echo "DATABASE NOT AVAILABLE";
  $row=mysqli_fetch_array($result);
  $name=$row['name'];
  date_default_timezone_set("Asia/Calcutta");
?>

<html lang="en">
<head>

  <title>canteen online</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
  <script src="bootstrap/js/bootstrap.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.js"></script>
  


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
      font-size: 17px;
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
  

  $(document).ready(function(){ 

    $("input[type='radio']").click(function(){

      $("#abcd").val($("input[name='canteen']:checked").val());
      var can= $("input[name='canteen']:checked").val();
      $.ajax({
        url:'showmenu.php',
        type:'post',
        data:{can:can},
        success:function(result)
        {
          $("#show").html(result);
        }
      });
    });


    $("#calculate").click(function(){
      var md= $("input[name='md']").val();
      var sd1= $("input[name='sd1']").val();
      var sd2= $("input[name='sd2']").val();
      var canteen= $("input[name='canteen']:checked").val();
      $.ajax({
        url:'calculate.php',
        type:'post',
        data:{md:md,sd1:sd1,sd2:sd2,canteen:canteen},
        success:function(result)
        {
          $("input[name='calfare']").val(result);
        }
      });
    });
  


  });

</script>

</head>




<body>
<div class="jumbotron ">
  <div class="row">
    <div class="col-sm-2" style="padding-left: 30px;">
       <div><img src="image/drdologo1.jpg" class="img-responsive" style="width:150px; border-radius: 50%;padding:10px;" alt="Image"></div>
    </div>
    <div class="col-sm-2"></div>
    <div class="col-sm-6"> 
      <div class="container text-center">
       <h1>ITR MEAL BOOKING</h1>      
       <p>       EAT HEALTHY, STAY HEALTHY</p>
      </div>
    </div>
  </div>
</div>

<nav class="navbar navbar-inverse">
  <div class="container-fluid" style="font-size: 16px">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#">Logo</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Home</a></li>

      </ul>
      <ul class="nav navbar-nav navbar-right text-uppercase">
        <li>
          <a href="profile.php"><span class="glyphicon glyphicon-user"></span>
             <?php echo $name;?>
          </a>
        </li>
         <li><a href="logout.php">logout</a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="body">
<br><br>
<div class="justify-content-center">
      <p><center><?php
      if(isset($_GET['book']))
        echo $_GET['book'];
      unset($_GET['book']);
      ?></center>a</p>
  </div>
<div class="container"> 
  <div class="row">
    <div class="col-sm-12"> 
      <div class="panel panel-primary">
        <div class="panel-heading">TODAY'S BOOKING</div>
        <div class="panel-body">
          
                  <center><table border="2" cellspacing="0" cellpadding="7" class='table table-bordered table-striped'>
                  <tr>
                    <td>Canteen</td>
                    <td>Token NO.</td>
                    <td>Main Dish</td>
                    <td>Special dish1</td>
                    <td>Special Dish2</td>
                    <td>Fare</td>
                    <td>Status</td>
                  </tr>


                  <?php
                      $date=date("Y/m/d");
                      $sql="select token_no,main,sd1,sd2,fare,status from ann_booking where loginid='$loginid' and date='$date' and status='CONFIRMED'";
                      $result=mysqli_query($con,$sql);
                      if(mysqli_num_rows($result)>0)
                      {
                        $row=mysqli_fetch_array($result);
                  ?>
                  <?php
                        while ($row) { 
                  ?>
                        <tr>
                          <td>ANNAPURNA</td>
                          <td><?php echo $row['token_no'];?></td>
                          <td><?php echo $row['main'];?></td>
                          <td><?php echo $row['sd1'];?></td>
                          <td><?php echo $row['sd2'];?></td>
                          <td><?php echo $row['fare'];?></td>
                          <td>
                              <a href="cancelbook.php?token=<?php echo $row['token_no']?> & can=ANNAPURNA" class="btn btn-danger">Cancel</a>
                          
                          </td>
                        </tr>
                  <?php
                        $row=mysqli_fetch_array($result);
                        }
                      }
                  ?>


                  <?php
                      $date=date("Y/m/d");
                      $sql="select token_no,main,sd1,sd2,fare,status from private_booking where loginid='$loginid' and date='$date' and status='CONFIRMED'";
                      $result=mysqli_query($con,$sql);
                      if(mysqli_num_rows($result)>0)
                      {
                        $row=mysqli_fetch_array($result);
                  ?>
                  <?php
                        while ($row) { 
                  ?>
                        <tr>
                          <td>PRIVATE</td>
                          <td><?php echo $row['token_no'];?></td>
                          <td><?php echo $row['main'];?></td>
                          <td><?php echo $row['sd1'];?></td>
                          <td><?php echo $row['sd2'];?></td>
                          <td><?php echo $row['fare'];?></td>
                          <td>
                               <a href="cancelbook.php?token=<?php echo $row['token_no']?> & can=PRIVATE" class="btn btn-danger">Cancel</a>
                          </td>
                        </tr>
                  <?php
                        $row=mysqli_fetch_array($result);
                        }
                      }
                  ?>


                  


                </table></center>
          
        </div>
      </div>
    </div>
  </div>   
  <div class="row">
    <div class="col-sm-6">
      <div class="panel panel-primary">
        <div class="panel-heading" >PLACE YOUR ORDER</div>
        <br/><center><p style="font-weight: bold; color: red"><?php
          if(isset($_GET['msg']))
            {
            $msg=$_GET['msg'];
            echo $msg;
            $msg="";
            }
        ?></p><center>
          <p>Booking Time: 09:00am to 11:30am IST</p>
        <form action="takeorder.php" method="post">
          <center>
            <div class="panel-body">
              <table bordercolor="WHITE">
                <td><tr>
                  <th><input type="radio" name="canteen" value="ANNAPURNA"  required />   ANNAPURNA </th>
                  <th><input type="radio" name="canteen" value="PRIVATE" required/>    PRIVATE CANTEEN</th>
                  </tr>
                  <tr>
                    <td>No. of Main Dish</td>
                    <td><input type="text" name="md" placeholder="Max. 5" max="5" required></td>
                  </tr>
                  <tr>
                    <td>No. of Special Dish1</td>
                    <td><input type="text" name="sd1" placeholder="Max. 5" max="5" required></td>
                  </tr>
                  <tr>
                    <td>No. of Special Dish2</td>
                    <td><input type="text" name="sd2" placeholder="Max. 5" max="5" required></td>
                  </tr>
                  <tr>  </tr>
                </td>
              </table>
            </div>

            <div class="panel-footer" style="font-size: 14px;font-weight: bold;background-color: #e9e9e9">
              <center>
                Total Fare
                <input type="text" name="calfare" value="0" readonly>
                <button type="button" id="calculate">CALCULATE</button>
                <button type="submit" value="submit">ORDER NOW</button>
              </center>
            </div>
          </center>
        </form>
      </div>
    </div>
    <div class="col-sm-6"> 
      <div class="panel panel-primary" style="min-height: 315px">
        <div class="panel-heading">TODAY'S MENU</div>



        <div class="panel-body">
          <div class="container-fluid">
            <center>
            <td>Canteen</td>
            <td><input text="text text-center" style="text-align: center;font-weight: bold;" id="abcd" placeholder="--Select--" readonly></td>
            <td></td>
              <div id="show">  </div>
            </center>
          </div>
             
        </div>
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
