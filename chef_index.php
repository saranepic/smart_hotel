<?php include"db.php";?>
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>chef index</title>
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
              <a class="navbar-brand">smart hotel cooking unit</a>
       </div>
    </header>
    <main>
        <div class="container-fluid p-0">
            <div class="title">
              <div class="d-flex justify-content-center">
                    <div class="d-flex flex-column">
                        <h2>Checking for new orders.</h2>
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
                <th>f_id</th>&nbsp;&nbsp;
                <th>name</th>&nbsp;&nbsp;
                <th>food</th>&nbsp;&nbsp;
                <th>room</th>
            </tr>
        </thead>
        <tbody>
               
               <?php
            global $connection;
            $query="SELECT * FROM ordered ORDER BY s_no DESC";
            $result=mysqli_query($connection,$query);
            while($row=mysqli_fetch_assoc($result)){
                $f_id=$row['f_id'];
                $name=$row['name'];
                $food=$row['food'];
                $room=$row['room'];
                
                echo "<tr>";
                echo "<td>$f_id</td>&nbsp;&nbsp;";
                echo "<td>$name</td>&nbsp;&nbsp;";
                echo "<td>$food</td>&nbsp;&nbsp;";
                echo "<td>$room</td>";
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