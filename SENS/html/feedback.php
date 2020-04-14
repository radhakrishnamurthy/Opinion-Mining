<?php
if($_SERVER["REQUEST_METHOD"]=="POST") {
$msg="";
$con = mysqli_connect('127.0.0.1','root','');
if(!$con){
    echo "Not connected to the server";
}
if(!mysqli_select_db($con,'wad')){
    echo 'No database found';
}
$user=$_GET['user'];
$feedback = $_POST['feedback_feedback'];
$sql = "update  customer set feedback = '$feedback' where uname = '$user'";
if(!mysqli_query($con,$sql)){
    $msg = "Feedback not updated";
}
else{
    $msg = "Feedback Updated";
}
}
?>
<html>
  <head><META http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
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
    <center>
    <div class="card" name="sollu" style="border:black;width: 35rem;height: 30rem;display:inline-block;-webkit-box-shadow: -8px 2px 62px 8px rgba(0,0,0,0.75);
                    -moz-box-shadow: -8px 2px 62px 8px rgba(0,0,0,0.75);
                    box-shadow: -8px 2px 62px 8px rgba(0,0,0,0.75);margin-left:10px;margin-bottom:10px; margin-top: 5px;padding:10px;">
    
    <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
    <div class="card-body">  
        <center>
        <table style="position:relative;">
            <h2><b>Please share your experience using Sens</b></h2><br>
            <tr><th>Feedback:-</th><td><textarea rows="5" cols="50" name="feedback_feedback"></textarea></td></tr>
            </table><br>
            <button type="submit" class="btn btn-primary">Submit</button>
        </center>
      </div>
    </form>
    </div>
    </center>
    
      <script>
  var c=0;
  function check() {
    var msg = <?php echo json_encode($msg); ?>;
    if(msg != "" && c==0) {
      alert(msg);
      c=1;
    }
  }
  setInterval(check,100);
  </script>
    </body>
    </html>