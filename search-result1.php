<?php
    include('connection.php');
    session_start();
    $pick_up_location= $_SESSION['pickuplocation'];
    $sql= "SELECT vehiclemodel, driverid FROM driver WHERE location= '$pick_up_location'";
    $result=mysqli_query($conn,$sql);
    $car_model = mysqli_fetch_all($result, MYSQLI_ASSOC);
    mysqli_free_result($result);
    mysqli_close($conn);
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

.car-list{
    text-decoration: none;
    color: #000;
    font-size: 22px;
    font-weight: 500;
    margin-left: 30px;
}

.car-list:hover{
  color:#0098db;
}

.car-list:hover::before{
  content: '-> ';
}


</style>
</head>
<body>
<font  face="Bahnschrift" size="10" color="#ff9900"> 
<img src="logo.png" height="5%" width="3.5%" align="center">
<b>YUGENKSD.COM</b>
</font>

<!-- <div class="container">
    <h1>CAR MODELS</h1>
    <hr>
    <?php if($car_model): ?>
        <?php foreach($car_model as $car):?>
        <div class="col-12">
        <a href="car-details1.php?driverid=<?php echo $car['driverid']?>" class="car-list"><?php echo htmlspecialchars($car['vehiclemodel']);?></a>
        
        </div>
        <?php endforeach; ?>
    <?php else: ?>
        <h5>SORRY, NO CAR AVAILABLE AT THE MOMENT !</h5>
    <?php endif ?>
</div> -->

<div class="container cd-container">
    <div class="cd-head">
        <h1>CAR AVAILABLE</h1>
    </div>
    <?php if($car_model): ?>
        <?php foreach($car_model as $car):?>

        <a href="car-details1.php?driverid=<?php echo $car['driverid']?>" class="car-list"><?php echo htmlspecialchars($car['vehiclemodel']);?></a>
        <br>
        <?php endforeach; ?>
    <?php else: ?>
        <h5>SORRY, NO CAR AVAILABLE AT THE MOMENT !</h5>
    <?php endif ?>
</div>

</body>
</html>