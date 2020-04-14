<?php
$msg="";
$result="";
$con1 = mysqli_connect('127.0.0.1','root','','wad');
$con2 = mysqli_connect('127.0.0.1','root','','wad');
$con3 = mysqli_connect('127.0.0.1','root','','wad');
require './vendor/autoload.php';
use Sentiment\Analyzer;
if($_SERVER["REQUEST_METHOD"]=="POST") {
  $sentence = $_POST["rest_rating"];
  $id= $_GET['source'];

  $user = $_GET["user"];
  $analyzer = new Analyzer();
  $result = $analyzer->getSentiment($sentence);
  $sent=array_values($result);
  if($sent[0]<$sent[1]){
    $result="positive";
    $x=$sent[1]*10;
  }else{
    $result="Negative";
    $x=-$sent[0]*10;
    }
  $sql = "insert into rating values('$user','$id','$x','$sentence','$result')";
  
  if(!mysqli_query($con1,$sql)){
    echo '<script> alert("You hav ealready rated this restaurant") </script>';
}
else{
    $msg = "Restaurant rated successfully";
}
$sql1="select avgrating from restaurant where rid=$id";
$resultset1 = mysqli_query($con2, $sql) or die("database error:". mysqli_error($con2));
$record1 = mysqli_fetch_assoc($resultset1);
  $avg= $record1['avgrating']+$x;
  $sql2="update restaurant set avgrating=$avg where rid=$id";

}
$id= $_GET['source'];
    $sql="select rname, address,rimg from restaurant where rid=$id";
    $resultset = mysqli_query($con3, $sql) or die("database error:". mysqli_error($con3));
    $record = mysqli_fetch_assoc($resultset);

?>
<html>
<head>
        <META http-equiv="Content-Type" content="text/html; charset=utf-8">
                <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
            <style>
                * {box-sizing:border-box}
                body,html{
                  background-image: url("images/background.jpg");
                  height: 100%;
                  background-position: center;
                  background-repeat: no-repeat;
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
                      <a class="nav-link" href="User_page.php">Home </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="Locationextractor.php" >view hotels</a>
                    </li>
                    
                    <li class="nav-item">
                      <a class="nav-link " href="feedback.php">Feedback</a>
                    </li>
                    <li class="nav-item">
                              <a class="nav-link " href="HomePage.html" >logout</a>
                            </li>
                  </ul>
                  <form class="form-inline my-2 my-lg-0" target="anotherlocation.php" method="POST">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                  </form>
                </div>
        </nav>
        <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
        <center>
            <div class="card" style="border:black;width: 24rem;height: 30rem;display:inline-block;-webkit-box-shadow: -8px 2px 62px 8px rgba(0,0,0,0.75);
                    -moz-box-shadow: -8px 2px 62px 8px rgba(0,0,0,0.75);
                    box-shadow: -8px 2px 62px 8px rgba(0,0,0,0.75);margin-left:10px;margin-bottom:10px; margin-top: 5px;padding:10px;";>
            <img src="<?php  $folder = "images/";
                                echo $folder . $record['rimg'];
              ?>" class="card-img-top" alt="...">
                        <div class="card-body">
                          <h5 class="card-title"><?php echo $record['rname'];?></h5>
                          <p class="card-text"><?php echo $record['address'];?></p>
                          <p class="card-text"><small class="text-muted"></small></p>
                          <textarea rows="5" cols="30" name="rest_rating" value="write your review"></textarea>
                          <input type="submit" class="btn btn-primary" value="submit">
                        </div>
                      </div><br>
                    </center>
        </form>
    </body>
</html>
