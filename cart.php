<?php include "db.php"; ?>
<?php session_start();?>
<?php define('name','name')?>


<?php
global $connection;
if(isset($_GET['delete'])){
    $f_id=$_GET['delete'];
    $query="DELETE FROM cart WHERE f_id={$f_id} ";
    $result=mysqli_query($connection,$query);
    if($result){
        header("Location:cart.php");
    }
}

?>

<?php

global $connection;
if(isset($_POST['submit'])){
    
    $query="SELECT * FROM cart WHERE name='".$_SESSION[name]."'";
            $result=mysqli_query($connection,$query);
            while($row=mysqli_fetch_assoc($result)){
                $name=$_SESSION['name'];
                $f_id=$row['f_id'];
                $food=$row['food'];
                $sum=$_GET['sum'];
                $query100="UPDATE cus_bill SET food_bill='$sum' WHERE name='".$_SESSION[name]."'";
              $result400=mysqli_query($connection,$query100); 
                $query9="SELECT * FROM current_guest WHERE name='".$_SESSION[name]."'";
            $result9=mysqli_query($connection,$query9);
            while($row=mysqli_fetch_assoc($result9)){
                $name=$_SESSION['name'];
                $room=$row['room'];
        $query1="INSERT INTO ordered (name,f_id,food,room) VALUES ('$name','$f_id','$food','$room')";
              $result4=mysqli_query($connection,$query1);  
    if($result4){
        
        $query10="DELETE FROM cart WHERE name='".$_SESSION[name]."'";
              $result40=mysqli_query($connection,$query10);
        if($result40){
            echo "<script>window.alert('Order placed... cart will be emptied!');</script>";
        }
        
    }
            }}
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cart</title>
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
    <main>
        <div class="container-fluid p-0">
            <div class="title">
              <div class="d-flex justify-content-center">
                    <div class="d-flex flex-column">
                        <h2>Items in your cart.<br><br><small>you're logged in as <span style="color:red;"><?php echo $_SESSION['name']?></span></small><br><small><a href="rest_index.php">back</a></small></h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="section-2 container-fluid text-center justify-content-center">
            <div class="d-flex">
                    <div class="d-flex flex-column">
                    <div class="d-flex flex-row row items">
                    <div class="col-sm-12">
                        
                       <div class="table table-bordered">
    <table>
        <thead class="thead-dark">
            <tr>
                <th>name</th>&nbsp;&nbsp;
                <th>cost</th>&nbsp;&nbsp;
            </tr>
        </thead>
        <tbody class="thead-light">
               
               <?php
            global $connection;
            $query="SELECT * FROM cart WHERE name='".$_SESSION[name]."'";
            $result=mysqli_query($connection,$query);
            while($row=mysqli_fetch_assoc($result)){
                $f_id=$row['f_id'];
                $food=$row['food'];
                 $cost=$row['cost'];
                echo "<tr>";
                echo "<td>$food</td>&nbsp;&nbsp;";
                echo "<td>$cost</td>&nbsp;&nbsp;";
                echo "<th><a href='cart.php?delete={$f_id}'>Delete</a></th>";
                echo "</tr>";
                
            }
                           
                
                           
                            
            ?>
              
                
        </tbody>
         
    </table>
    <br>
    <?php
                           
                           global $connection;
                $result1 = mysqli_query($connection, "SELECT SUM(cost) AS value_sum FROM cart WHERE name='".$_SESSION[name]."'"); 
                $row = mysqli_fetch_assoc($result1); 
                $sum = $row['value_sum'];
                echo "<td>total-$sum</td>&nbsp;&nbsp;";
                 echo"<form action='cart.php?sum=$sum' method='post'>";
                           echo"<input type='submit' name='submit' value='order' class='btn btn-success'>";
                           echo"</form>";
                           
                           
                           
                           ?>
   
                            
                            
    </div> 
                        
                        
                        
                        
                    </div>
                </div>
                </div></div>
            
            
        </div>
        
                
                

                
        
    </main>
   
</body>
</html>