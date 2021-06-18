<?php include"db.php";?>
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>history</title>
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
                        <h2>customer history.</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="section-2 container-fluid text-center justify-content-center">
            <div class="d-flex">
                    <div class="d-flex flex-column">
                    <div class="d-flex flex-row row guestitems">
                    
               <div class="table table-bordered">
    <table>
        <thead>
            <tr>
                <th>guest id</th>&nbsp;&nbsp;
                <th>name</th>&nbsp;&nbsp;
                <th>phone</th>&nbsp;&nbsp;
                <th>address</th>&nbsp;&nbsp;
                <th>co-guests</th>&nbsp;&nbsp;
                <th>checked_in</th>&nbsp;&nbsp;
                <th>checked_out</th>&nbsp;&nbsp;
                <th>room number</th>
            </tr>
        </thead>
        <tbody>
               
               <?php
            global $connection;
            $query="SELECT * FROM cus_history ORDER BY checked_in DESC";
            $result=mysqli_query($connection,$query);
            while($row=mysqli_fetch_assoc($result)){
                $g_id=$row['g_id'];
                $name=$row['name'];
                $phone=$row['phone'];
                $address=$row['address'];
                $co=$row['co'];
                $checked_in=$row['checked_in'];
                $checked_out=$row['checked_out'];
                $room=$row['room'];
                echo "<tr>";
                echo "<td>$g_id</td>&nbsp;&nbsp;";
                echo "<td>$name</td>&nbsp;&nbsp;";
                echo "<td>$phone</td>&nbsp;&nbsp;";
                echo "<td>$address</td>&nbsp;&nbsp;";
                echo "<td>$co</td>&nbsp;&nbsp;";
                echo "<td>$checked_in</td>&nbsp;&nbsp;";
                echo "<td>$checked_out</td>&nbsp;&nbsp;";
                echo "<td>$room</td>&nbsp;&nbsp;";
                echo "</tr>";
            }
            ?>
               
                
        </tbody>
    </table>
    </div> 
                </div>
                </div></div>
            
        </div>        
        
    </main>
   
</body>
</html>