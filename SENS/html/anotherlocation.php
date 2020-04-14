
<html>
    <head>
        <META http-equiv="Content-Type" content="text/html; charset=utf-8">
                <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
            <style>
                * {box-sizing:border-box}
                
                body{
                  background-image: url("images/background.jpg");
                  height: 100%;
                  background-position: center;
                  background-repeat: repeat-y;
                  background-size: cover;
                  background-attachment: scroll;
                } 
            </style>    
        </head>
        <body>
                <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                  <a class="navbar-brand" href="#" style="font-family: serif,Scriptina;">SENS</a>
                                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                          <ul class="navbar-nav mr-auto">
                                            <li class="nav-item">
                                              <a class="nav-link" href="User_page.php?user=<?php echo $_GET['user'];?>">Home </a>
                                            </li>
                                            <li class="nav-item">
                                              <a class="nav-link" href="Locationextractor.php?user=<?php echo $_GET['user'];?>" >view hotels</a>
                                            </li>
                                            
                                            <li class="nav-item">
                                              <a class="nav-link " href="feedback.php?user=<?php echo $_GET['user'];?>" >Feedback</a>
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
        </body>
</html>
<?php
$location= $_GET['location'];
$u=$_GET['user'];
    $msg="";
    $i=1;
    include ("connection.php");
    $sql="select rid, rname, address,avgrating,locurl,rimg from restaurant where location='$location'";
    $resultset = mysqli_query($conn, $sql) or die("database error:". mysqli_error($conn));
    while( $record = mysqli_fetch_assoc($resultset) ) {
        ?>
            <div class="card" name="sollu" style="border:black;width: 24rem;height: 30rem;display:inline-block;-webkit-box-shadow: -8px 2px 62px 8px rgba(0,0,0,0.75);
                    -moz-box-shadow: -8px 2px 62px 8px rgba(0,0,0,0.75);
                    box-shadow: -8px 2px 62px 8px rgba(0,0,0,0.75);margin-left:10px;margin-bottom:10px; margin-top: 5px;padding:10px;">
            <center><img src = "<?php  $folder = "images/";
                                echo $folder . $record['rimg'];
              ?>" height="300px" width="324px"></center>
                        <div class="card-body">
                          <h5 class="card-title"><?php echo $record['rname'];?></h5>
                          <p class="card-text"><?php echo $record['address'];?></p>
                          <p class="card-text"><small class="text-muted">Avg Rating: <?php echo $record['avgrating'];?></small></p>
                          <a href="rating.php?source=<?php echo $record['rid']?>&user=<?php echo $u;?>" class="btn btn-primary">Rate this Hotel</a>
                          <a href="location.php?source=<?php echo $record['locurl'];?>" class="btn btn-primary">View location</a>
                        </div>
    </div>
                    
                      <?php } ?>