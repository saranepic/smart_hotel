<?php include "db.php"; ?>
<?php session_start();?>
<?php define('name','name')?>


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
                        <h2>Bill - including room and food expenses.<br><br><small>you're logged in as <span style="color:red;"><?php echo $_SESSION['name']?></span></small><br><small><a href="guest_index.php">back</a></small></h2>
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
                <th>room bill</th>&nbsp;&nbsp;
                <th>food bill</th>&nbsp;&nbsp;
                <th>total</th>
            </tr>
        </thead>
        <tbody class="thead-light">
               
               <?php
            global $connection;
            $query="SELECT * FROM cus_bill WHERE name='".$_SESSION[name]."'";
            $result=mysqli_query($connection,$query);
            while($row=mysqli_fetch_assoc($result)){
                $name=$row['name'];
                $room_bill=$row['room_bill'];
                 $food_bill=$row['food_bill'];
                $total=$row['room_bill'] + $row['food_bill'];
                echo "<tr>";
                echo "<td>$name</td>&nbsp;&nbsp;";
                echo "<td>$room_bill</td>&nbsp;&nbsp;";
                echo "<td>$food_bill</td>&nbsp;&nbsp;";
                echo "<td>$total</td>&nbsp;&nbsp;";
                echo "</tr>";
                
            }
                            
                            
            ?>
              
                
        </tbody>
         
    </table>
    <br>
   
    </div> 
                        
                        
                        
                        
                    </div>
                </div>
                </div></div>
            
            
        </div>
        
                
                

                
        
    </main>
   
</body>
</html>