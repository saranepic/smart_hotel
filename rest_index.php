<?php include "db.php"; ?>
<?php session_start();?>


<?php

if(isset($_POST['submit'])){
    
    global $connection;
    $f_id=$_GET['f_id'];
    $name=$_SESSION['name'];
    $food=$_GET['name'];
    $cost=$_GET['cost'];
    
    $query="INSERT INTO cart (name,f_id,food,cost) VALUES ('$name','$f_id','$food','$cost')";
    $result=mysqli_query($connection,$query);
    if($result){
        echo "<script>window.alert('added to cart!')</script>";
    }
    
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Book your food</title>
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
                        <h2>Book your food by sitting in your room.  <br><br><small>you're logged in as <span style="color:red;"><?php echo $_SESSION['name']?></span></small><br><small><a href="cart.php">view cart</a></small><br> <small><a href="guest_index.php">back</a></small></h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="section-2 container-fluid text-center justify-content-center">
            <div class="d-flex">
                    <div class="d-flex flex-column">
                    <div class="d-flex flex-row row items">
                    
                  
                     <?php
            global $connection;
            $query="SELECT * FROM food";
            $result=mysqli_query($connection,$query);
            while($row=mysqli_fetch_assoc($result)){
                $name=$row['name'];
                $cost=$row['cost'];
                $f_id=$row['f_id'];
               echo "<div class='col-lg-4'>";
                echo "<div class='card-body'>";
                echo "<form name='hidden-form' action='rest_index.php?f_id={$f_id}&name={$name}&cost={$cost}' method='post'>";
                echo "<h5 class='card-title'>$name</h5>";
                echo "<p class='card-text'>Rs.$cost</p>";
                echo "<input type='submit' name='submit' value='Add to cart' class='btn btn-danger'>";
                echo "</form>";
                echo "</div>";
                echo "</div>";
            }
            ?>
                    
                    
                   
                        
                       
                    
                </div>
                </div></div>
            
            
        </div>
        
                
                

                
        
    </main>
   
</body>
</html>