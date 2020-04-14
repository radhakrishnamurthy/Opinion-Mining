<?php
$con = mysqli_connect('127.0.0.1','root','');
if(!$con){
    echo "Not connected to the server";
}
if(!mysqli_select_db($con,'wad')){
    echo 'No database found';
}
$name = $_POST['name'];
$password = $_POST['password'];
$sql = "insert into sample (name,email) values('$name','$password')";
if(!mysqli_query($con,$sql)){
    echo 'Not inserted';
}
else{
    echo 'Inserted';
}
header("refresh:3;url=phpfile.html");
?>