<?php
$msg="";
$con = mysqli_connect('127.0.0.1','root','');
if(!$con){
    echo "Not connected to the server";
}
if(!mysqli_select_db($con,'wad')){
    echo 'No database found';
}
$name = $_POST['user_name'];
$password = $_POST['user_pass'];
$email = $_POST['user_email'];
$confirmpassword = $_POST['user_cpass'];
$mobileno = $_POST['user_mobile'];
$sql = "insert into customer (uname,upass,ucpass,umobile,uemail) values('$name','$password','$confirmpassword','$mobileno','$email')";
if(!mysqli_query($con,$sql)){
    $msg= 'Registration failed';
    header("refresh:2,url=user_login.php");

}
else{
    $msg= 'Successfully registered! Please Sign in to continue';
    header("refresh:2,url=user_login.php");

}

?>
<html>
    <body>

  </body>
  <script>
  var c=0;
  function check() {
    var msg = <?php echo json_encode($msg); ?>;
    if(msg != "" && c==0) {
      alert(msg);
      c=1;
    }
  }
  setInterval(check,600);
  </script>
</html>