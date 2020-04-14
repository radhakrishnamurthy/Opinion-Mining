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
  $id=$_POST['addrestaurant_id'];
  $location=$_POST['addrestaurant_location'];
  $name = $_POST['addrestaurant_name'];
  $cuisine = $_POST['addcuisine'];
  $address = $_POST['addrestaurant_address'];
  $filename = $_FILES["fileToUpload"]["name"];
  $filetmpname = $_FILES["fileToUpload"]["tmp_name"];
  $url=$_POST['addrestaurant_url'];
  $pricefor2=$_POST['addpricefor2'];
  $folder = "images/";
  //$sql="insert into image values('$file1')";
  $sql = "insert into restaurant(rid, rname, location, address, pricefor2, cuisine, locurl,rimg) values ('$id','$name','$location','$address','$pricefor2','$cuisine', '$url','$filename')";
  if(!mysqli_query($con,$sql)){
      $msg="Restaurant adding failed";
     
  }
  else{
      $msg="Restaurant added successfully";
      move_uploaded_file($filetmpname, $folder . $filename);
  }
  }
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"><html>
    <head><META http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <style>
            * {box-sizing:border-box}
            html,body{
      background-image:url("images/background.jpg");
      background-repeat: no-repeat;
      background-size:cover;
    }
    th,h2{
      color: whitesmoke;
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
            <div> 
            <form target="" action="<?php htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" enctype="multipart/form-data"> 
                <center>
                <table>  
                <td><h2><b>Add Restaurant</b></h2>
                <tr><th>Retaurant Id:-</th><td><input type="text" name="addrestaurant_id"></td></tr>
                <tr><th>Restaurant Name:-</th><td><input type="text" name="addrestaurant_name"></td></tr>
                <tr><th>Restaurant Location:-</th><td><input type="text" name="addrestaurant_location"></td></tr>
                <tr><th>Location URL :-</th><td><input type="text" name="addrestaurant_url"></td></tr>
                <tr><th>Price for 2 :-</th><td><input type="text" name="addpricefor2"></td></tr>
                <tr><th>Restaurant Address:-</th><td><textarea rows="2" cols="50" name="addrestaurant_address"></textarea></td></tr>
                <tr><th>Cuisine :-</th><td><textarea rows="4" cols="50" name="addcuisine"></textarea></td></tr>
                <tr><th>Restaurant image:-</th><td><input type="file" id='image' name="fileToUpload" value="upload"></td></tr><td><br>
                </td></td>
                </table>
                <button type="submit">Submit</button> 
                </center>
            </form>   
            </div>
            <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
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
  $(document).ready(function(){
      $('#image').on('change', function(){ //on file input change
        if (window.File && window.FileReader && window.FileList && window.Blob) //check File API supported browser
          {
          $('#thumb-output').html(''); //clear html of output element
          var data = $(this)[0].files; //this file data
          
          $.each(data, function(index, file){ //loop though each file
            if(/(\.|\/)(gif|jpe?g|png)$/i.test(file.type)){ //check supported file type
              var fRead = new FileReader(); //new filereader
              fRead.onload = (function(file){ //trigger function on successful read
              return function(e) {
                var img = $('<img/>').addClass('thumb').attr('src', e.target.result); //create image element 
                $('#thumb-output').append(img); //append image to output element
              };
                })(file);
              fRead.readAsDataURL(file); //URL representing the file's data.
            }
      });     
    }else{
      alert("Your browser doesn't support File API!"); //if File API is absent
    }
  });
});
  </script>
        </body>
</html>
