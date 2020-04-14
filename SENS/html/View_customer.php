<?php
include "connection.php";
?>
<!doctype html>
<html lang="en">
  <head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
      html,body{
      background-image:url("images/background.jpg");
      background-repeat: no-repeat;
      background-size:cover;
    }
    #tab tr td {
            font-family: 'Times New Roman', Times, serif;
            font-size: 15px;
            font-weight: bold;
            background-color: bisque;
        }

        #tab tr td:hover {
            background-color: grey;
            color: whitesmoke;
        }

        #tab tr th {
            font-weight: bold;
            background-color: chocolate;
        }
        h2{
            color:cornsilk;
        }
  </style>
  </head>
<body>  
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                    <h4><a class="navbar-brand" href="#">Sens</a></h4>
                  
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                      <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                          <a class="nav-link" href="Add_restaurant.php" target="background">Add Restaurants<span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="View_customer.php">View customers</a>
                        </li>
                        <li class="nav-item ">
                          <a class="nav-link " href="view _comments.php">View Comments</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link " href="view_feedback.php" >View feedbacks</a>
                        </li>
                        <li class="nav-item">
                              <a class="nav-link " href="HomePage.html" >logout</a>
                            </li>
                      </ul>
                      <form class="form-inline my-2 my-lg-0">
                        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                      </form>
                    </div>
            </nav>
        <center>
    <table>
        <h2><b>Customers Details</b></h2><br>
       <?php
        $disp = mysqli_query($conn,"select *from customer");
        echo "<table border=2 cellpadding='10' id='tab'>";
        echo"<th>username</th>";
        echo"<th>Mobileno</th>";
        echo"<th>Email</th>";
        while($result = mysqli_fetch_array($disp)) {
          echo "<tr>";
            echo "<td>".$result["uname"]."</td>";
            
            echo "<td>".$result["umobile"]."</td>";
            echo "<td>".$result["uemail"]."</td>";
            echo "</tr>";
        }
    echo "</table>";
    ?>
    </center>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>