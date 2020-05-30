<?php 

    session_start();
    include('connection.php');

    $driverid = mysqli_real_escape_string($conn, $_SESSION['driverid']);

    $sql = "SELECT * FROM driver WHERE driverid = $driverid";

    $result = mysqli_query($conn, $sql);

    $car_detail = mysqli_fetch_assoc($result);

    mysqli_free_result($result);

    $custid = mysqli_real_escape_string($conn, $_SESSION['custid']);

    $sql = "SELECT * FROM customer WHERE custid = $custid";

    $result = mysqli_query($conn, $sql);

    $cust_detail = mysqli_fetch_assoc($result);

    mysqli_free_result($result);
    
    mysqli_close($conn);

    $dropofflocation = $_SESSION['dropofflocation'];

    if(isset($_POST['Pay'])){
     

      include('connection.php');

      $customerid = mysqli_real_escape_string($conn, $cust_detail['custid']);
      $driverid = mysqli_real_escape_string($conn, $car_detail['driverid']);
      $departureloc= mysqli_real_escape_string($conn,  $car_detail['location']);
      $arriavalloc = mysqli_real_escape_string($conn,  $_SESSION['dropofflocation']);

      $sql= "INSERT INTO reservation(customerid,driverid,departureloc,arrivalloc) VALUES ('$customerid','$driverid','$departureloc','$arriavalloc')";
      if(mysqli_query($conn,$sql))
            {
                header('location: homepage.php');
            }else{
                echo 'query error: ' . mysqli_error($conn);
            }


    }

?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>

body {
  font-family: Arial, Helvetica, sans-serif;
  background-color: black;
}

* {
  box-sizing: border-box;
}

/* Add padding to containers */
.container {
  width:50%;
  align: center;
  /* padding: 16px; */
  background-color: white;
  margin: 0 auto;
  margin-top: 50px;
}

/* Full-width input fields */
input[type=text], input[type=datetime-local] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}


input[type=text]:focus, input[type=datetime-local]:focus {
  background-color: #ddd;
  outline: none;
}

/* Overwrite default styles of hr */
hr {
  border: 3px solid grey;
  margin-bottom: 25px;
}

/* Set a style for the submit button */
.btn {
  background-color: #0098db;
  color: white;
  padding: 8px 40px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  opacity: 0.9;
  border-radius: 30px;
  margin-left: 30px;
  font-size: 18px;
  font-weight: 500;
}

.btn:hover {
  opacity: 0.8;
}

.cancelbtn {
  width: 65px;
  height: 43px;
  padding: 10px 18px;
  background-color: #f44336;
}
  .cancelbtn {
     width: 100%;
  }

body {
      background-image:
      url('image.png');
      background-repeat:no-repeat;
      background-attachment:fixed;
      background-size:cover;
      }

      .cd-container{
    padding: 0;
    border-radius: 30px;
    padding-bottom: 50px;
    margin-bottom: 50px;
}

.cd-head{
    background-color: #0098db;
    padding: 4px;
    color: white;
    border-top-left-radius: 30px;
    border-top-right-radius: 30px;
    margin-bottom: 50px;
}

.cd-head h1{
    margin-left: 30px;
    font-size: 40px;
    font-weight: 500;
}

.car-sec{
    color: #808080;
    margin-left: 30px;
    margin-right: 30px;
    font-size: 30px;
    background-color: #dfdfdf;
    padding: 10px 10px;
    box-sizing: border-box;
}

.car-details{
    color: #808080;
    margin-left: 30px;
    font-size: 16px;
}

.cd-container p span{
    color: #000;
    font-size: 22px;
    font-weight: 500;
}

</style>
</head>
<body>
<font  face="Bahnschrift" size="10" color="#ff9900"> 
<img src="logo.png" height="100%" width="3.5%" align="center">
<b>YUGENKSD.COM</b>
</font>

<div class="container cd-container">
    <div class="cd-head">
        <h1>PAYMENT</h1>
    </div>
    <P class="car-sec">PASSENGER</P>
	  <p class="car-details">NAME : <span><?php echo $cust_detail['username']; ?></p></span>
    <p class="car-details">GENDER : <span><?php echo $cust_detail['gender']; ?></p></span>
      <p class="car-details">CONTACT NO. : <span><?php echo $cust_detail['contactno']; ?></p></span>
      <p class="car-details">EMAIL : <span><?php echo $cust_detail['email']; ?></p></span>
      <br/>
      <P class="car-sec">DRIVER</P>
      <p class="car-details">NAME : <span><?php echo $car_detail['username']; ?></p></span>
      <p class="car-details">LICENCE NO : <span><?php echo $car_detail['licenseno']; ?></p></span>
      <p class="car-details">CONTACT NO : <span><?php echo $car_detail['contactno']; ?></p></span>
      <p class="car-details">STAND NAME : <span><?php echo $car_detail['standname']; ?></p></span>
      <br/>
      <p class="car-details">PICK-UP LOCATION : <span><?php echo $car_detail['location']; ?></p></span>
      <p class="car-details">DROP-OFF LOCATION : <span><?php echo $dropofflocation; ?></p></span>
      <p class="car-details">VEHICLE NO : <span><?php echo $car_detail['vehiclemodel']; ?></p></span>
      <p class="car-details">AC/NON-AC : <span><?php echo $car_detail['ac']; ?></p></span>
      <p class="car-details">NO. SEATS : <span><?php echo $car_detail['seatno']; ?></p></span>
      
      <form action="payment.php" method="POST">
        <input type="submit" class="btn" name="Pay" value="PAY">
      </form>
</div>

</body>
</html>