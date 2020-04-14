<html>
    <head>
    <META http-equiv="Content-Type" content="text/html; charset=utf-8">
                <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
            <style>
                * {box-sizing:border-box}
                .map-container-3{
                overflow:hidden;
                padding-bottom:56.25%;
                position:relative;
                height:0;
                }
                .map-container-3 iframe{
                left:0;
                top:0;
                height:100%;
                width:100%;
                position:absolute;
                }
            </style>
    </head>
    <body>
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                    <a class="navbar-brand" href="#">5ense</a>
                    
                  
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                      <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                          <a class="nav-link" href="User_page.php">Home </a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="Locationextractor.php" >view hotels</a>
                        </li>
                        
                        <li class="nav-item">
                          <a class="nav-link " href="feedback.php"  >Feedback</a>
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
           
            
            <div id="map-container-google-3" class="z-depth-1-half map-container-3">
            <iframe src="<?php echo $_GET["source"];?>" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" name="location2">
            </iframe>
            </div>
          

    </body>
</html>