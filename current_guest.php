<?php
include"db.php";

if(isset($_GET['g_id'])){
    
    global $connection;
    $g_id=$_GET['g_id'];
    
    $query="DELETE FROM current_guest WHERE g_id={$g_id}";
    $result=mysqli_query($connection,$query);
    if($result){
        header('location:current_guest.php');
    }
    
}


?>
  
  
  <?php

if(isset($_POST['submit'])){
    
    global $connection;
    $name=$_POST['name'];
    $message=$_POST['message'];
    
    $query="INSERT INTO message (name,message) VALUES ('$name','$message')";
    $result=mysqli_query($connection,$query);
    if($result){
         header("Location:current_guest.php");
    }
    
}

?>
   

  
  
   <?php include"db.php";?>
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>current guest</title>
    <meta http-equiv="refresh" content="15">
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
              <a class="navbar-brand">smart hotel management</a>
       </div>
    </header>
    <main>
        <div class="container-fluid p-0">
            <div class="title">
              <div class="d-flex justify-content-center">
                    <div class="d-flex flex-column">
                        <h2>current customer</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid text-center justify-content-center">
            <div class="d-flex">
                    <div class="d-flex flex-column">
                    <div class="d-flex flex-row row guestitems">
                    <div class="col-sm-6">
               <div class="table">
    <table>
        <thead>
            <tr>
                <th>guest id</th>&nbsp;&nbsp;
                <th>name</th>&nbsp;&nbsp;
                <th>phone</th>&nbsp;&nbsp;
                  <th>room number</th>&nbsp;&nbsp;
                <th>checked_in</th>&nbsp;&nbsp;
                <th>checked_out</th>
                
            </tr>
        </thead>
        <tbody>
               
               <?php
            global $connection;
            $query="SELECT * FROM current_guest ORDER BY checked_in DESC";
            $result=mysqli_query($connection,$query);
            while($row=mysqli_fetch_assoc($result)){
                $g_id=$row['g_id'];
                $name=$row['name'];
                $phone=$row['phone'];
                $checked_in=$row['checked_in'];
                $checked_out=$row['checked_out'];
                $room=$row['room'];
                echo "<tr>";
                echo "<td>$g_id</td>&nbsp;&nbsp;";
                echo "<td>$name</td>&nbsp;&nbsp;";
                echo "<td>$phone</td>&nbsp;&nbsp;";
                 echo "<td>$room</td>&nbsp;&nbsp;";
                echo "<td>$checked_in</td>&nbsp;&nbsp;";
                echo "<td>$checked_out</td>&nbsp;&nbsp;";
                echo "<td><form action='current_guest.php?g_id={$g_id}' method='post'><input type='submit' name='submit' value='clear' class='btn btn-danger'>
</form></td>";
               
                echo "</tr>";
            }
            ?>
               
                
        </tbody>
    </table>
    </div> 
                </div>
                <div class="col-sm-6">
                    
                    <h4>Chat System</h4>
                    <p>Chat with all the guests from here!</p>
                    
                      <div class="display FixedHeightContainer">
                          <p><span style='color:green'>Hello all welcome to our hotel.If you want anything you can chat here and will get a reply within 10s. Have a wonderfull stay with us.</span></p>
               <?php
            global $connection;  
    $result1=mysqli_query($connection,"SELECT * FROM message ORDER BY s_no DESC");
            while($row = mysqli_fetch_assoc($result1)){
                $s_no = $row['s_no'];
                $message = $row['message'];
                $name = $row['name'];
                
                 echo "<p><span style='color:red'>$name</span>: $message</p>";
            }
            
            ?>
            </div>
                   
                    <form action="current_guest.php" method="post">
                   <div class="form-group">
                    <label for="name">name:</label>
                    <input type="text" class="form-control" name="name" value="Reception">
                  </div>
                   <div class="form-group">
                    <label for="message">Message:</label>
                    <input type="text" class="form-control" name="message" placeholder="Message">
                  </div>
                  <div class="form-group">
                   <input type="submit" name="submit" value="send" class="btn btn-success">
                   </div>
                </form>
                    
                </div>
                
                
                </div></div>
            </div>
        </div>      
      
    </main>
   
</body>
</html>