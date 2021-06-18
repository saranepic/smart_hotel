<?php
include"db.php";

if(isset($_POST['submit'])){
    
    global $connection;
    $g_id=$_POST['g_id'];
    $name=$_POST['name'];
    $phone=$_POST['phone'];
    $address=$_POST['address'];
    $co=$_POST['co'];
    $days=$_POST['days'];
    $checked_in=$_POST['checked_in'];
    $checked_out=$_POST['checked_out'];
    $room=$_POST['room'];
    $rb=$_GET['rb'];
    $room_bill=$_POST['days'] * $_GET['rb'];
    
    $query="INSERT INTO cus_history (g_id,name,phone,address,co,days,checked_in,checked_out,room) VALUES ('$g_id','$name','$phone','$address','$co','$days','$checked_in','$checked_out','$room')";
    $query1="INSERT INTO current_guest (g_id,name,phone,checked_in,checked_out,room) VALUES ('$g_id','$name','$phone','$checked_in','$checked_out','$room')";
    $query2="INSERT INTO cus_bill (g_id,name,room_bill) VALUES ('$g_id','$name','$room_bill')";
    $result2=mysqli_query($connection,$query2);
    $result1=mysqli_query($connection,$query1);
    $result=mysqli_query($connection,$query);
    if($result){
        header('location:current_guest.php');
    }
    
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>index</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
</head>
<body>
      <header>
          <div class="navbar">
              <a class="navbar-brand">Smart hotel restaurant</a>
       </div>
    </header>
      <div class="container-fluid p-0">
            <div class="title">
              <div class="d-flex justify-content-center">
                    <div class="d-flex flex-column">
                        <h2>Register new guests over here.  <br><br><small><a href="current_guest.php">current guests</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="history.php">history</a></small></h2>
                    </div>
                </div>
            </div>
        </div>
      
       <div class="row">
       <div class="col">
       </div>
       <div class="col-6">
    <form action="index.php?rb=1000" method="post">
        <div class="form-group">
        <label for="g_id">guest id</label>
        <input type="text" name="g_id" class="form-control">
        </div>
        <div class="form-group">
        <label for="name">Guest name</label>
        <input type="text" name="name" class="form-control">
        </div>
        <div class="form-group">
        <label for="phone">phone</label>
        <input type="text" name="phone" class="form-control">
        </div>
        <div class="form-group">
        <label for="address">address</label>
        <input type="text" name="address" class="form-control">
        </div>
        <div class="form-group">
        <label for="co">number of guests</label>
        <input type="text" name="co" class="form-control">
        </div>
        <div class="form-group">
        <label for="days">number of days</label>
        <input type="text" name="days" class="form-control">
        </div>
        <div class="form-group">
        <label for="checked_in">checked_in</label>
        <input type="date" name="checked_in" class="form-control">
        </div>
        <div class="form-group">
        <label for="checked_out">checked_out</label>
        <input type="date" name="checked_out" class="form-control">
        </div>
        <div class="form-group">
        <label for="room">Room number</label>
        <input type="text" name="room" class="form-control">
        </div>
        <input type="submit" name="submit" value="add" class="btn btn-primary">
    </form>
    </div>
    <div class="col"></div>
    </div>
   
</body>
</html>