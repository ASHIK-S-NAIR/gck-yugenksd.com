<?php 
session_start();
include('connection.php');

if(isset($_POST['Proceed']))
{

  if($_SESSION['custid']== "custid")
    {
      header("location:login-signup.php");
    }
  else
  {
    header("location:payment.php");
  }
}


if(isset($_GET['driverid'])){
		
  $driverid = mysqli_real_escape_string($conn, $_GET['driverid']);

  $_SESSION['driverid'] = $driverid;

  $sql = "SELECT * FROM driver WHERE driverid = $driverid";

  $result = mysqli_query($conn, $sql);

  $car_detail = mysqli_fetch_assoc($result);

  mysqli_free_result($result);
 
  mysqli_close($conn);


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
  padding: 16px;
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
  padding: 8px 12px;
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
        <h1><?php echo $car_detail['vehiclemodel']; ?></h1>
    </div>
	  <p class="car-details">Number of seats : <span><?php echo $car_detail['seatno']; ?></p></span>
      <p class="car-details">AC/NONAC : <span><?php echo $car_detail['ac']; ?></p></span>
      <br/>
      <p class="car-details">Driver Name : <span><?php echo $car_detail['fullname']; ?></p></span>
      <p class="car-details">Driver-id : <span><?php echo $car_detail['driverid']; ?></p></span>
      <p class="car-details">Contact-No : <span><?php echo $car_detail['contactno']; ?></p></span>
      <p class="car-details">Licence No : <span><?php echo $car_detail['licenseno']; ?></p></span>
      <p class="car-details">Stand : <span><?php echo $car_detail['location']; ?></p></span>
      <form action="car-details.php" method="POST">
        <input type="submit" class="btn" name="Proceed" value="Proceed">
      </form>
</div>

</body>
</html>