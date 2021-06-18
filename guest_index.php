<!DOCTYPE html>
<?php include "db.php"; ?>
<?php session_start();?>


<?php

if(isset($_GET['name'])){
    
    global $connection;
    $name=$_GET['name'];
    $message="NEED ROOM SERVICE";
    
    $query="INSERT INTO message (name,message) VALUES ('$name','$message')";
    $result=mysqli_query($connection,$query);
    if($result){
         echo "<script>window.alert('Room service called ! Will reach you within 5 minutes.')</script>";
    }
    
}

?>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>guest index</title>
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
                        <h2>Just one click, we will reach you.  <br><small>you're logged in as <span style="color:red;"><?php echo $_SESSION['name']?></span></small></h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="section-2 container-fluid text-center justify-content-center">
            <div class="d-flex">
                    <div class="d-flex flex-column">
                    <div class="d-flex flex-row row guestitems">
                    
                <div class="col-sm-6">
                  <div class="card-body">
                    <a href="rest_index.php"><img src="images/undraw_Hamburger_8ge6.svg" width="200px" height="200px" alt="cooking"></a>
                    <p class="card-text">Order food</p>
                    </div></div>
                    
                    <div class="col-sm-6">
                  <div class="card-body">
                   <a href="chat.php"><img src="images/undraw_Chatting_re_j55r.svg" width="200px" height="200px" alt="chat"></a>
                    <p class="card-text">Chat with reception</p>
                    </div></div>
                    
                    <div class="col-sm-6">
                  <div class="card-body">
                   <a href="guest_index.php?name=<?php echo $_SESSION['name'];?>"><img src="images/undraw_wash_hands_nwl2.svg" width="200px" height="200px" alt="room service"></a>
                    <p class="card-text">Room service</p>
                    </div></div>
                    
                    <div class="col-sm-6">
                  <div class="card-body">
                  <a href="bill.php"><img src="images/undraw_online_payments_luau.svg" width="200px" height="200px" alt="Bill"></a>
                    <p class="card-text">Check bill</p>
                    </div></div>
                    
                </div>
                </div></div>
            
            
        </div>
        
                
                

                
        
    </main>
   
</body>
</html>