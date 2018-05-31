<?php
    include 'JhhamesPhp/sessions.php';
    include 'JhhamesPhp/database.php';
    $connect = connect_db();

    include 'JhhamesPhp/addAspirant.php';

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Space Club  </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="slick/slick.css">
    <link rel="stylesheet" href="slick/slick-theme.css">
    <link rel="icon" href="img/logo.png" >

</head>
<body> 
    <nav class="navbar navbar-expand-sm bg-white nav-primary fixed-top p-2">
       <div class="container">
            <a href="" class="navbar-brand mr-auto " >
                <img src="img/logo.png"  height="50" alt="Logo">
            </a>
              <?php
                echo success();
                echo error();
                ?>
            <button class="navbar-toggler" data-target="#nav-slant" data-toggle="collapse">
                <span class="fa fa-bars"></span>
            </button>
           

            
            <div class="collapse navbar-collapse" id="nav-slant">
                <ul class="navbar-nav ml-auto" >
                    <li class="nav-item active">
                        <a href="#header" class="nav-link text-info">Home</a>
                    </li>

                    <li class="nav-item">
                        <a href="#about" class="nav-link text-info">About</a>
                    </li>

                    <li class="nav-item">
                        <a href="index.php" class="nav-link text-info">Services</a>
                    </li>
    
                </ul>
            </div>
        </div>
    
    </nav>
    <header class="header" id="header"> 
        <div class="carousel slide" data-ride="carousel"  id="headSlide"> 
            <ol class="carousel-indicators">    
                <li data-target="#headSlide" data-slide-to="0" class="active"></li>
                <li data-target="#headSlide" data-slide-to="1"></li>
                <li data-target="#headSlide" data-slide-to="2"></li>
            </ol>

            <div class="carousel-inner">
                <div class="carousel-item active" id="background-1">
                    <div class="container">
                        <div class="carousel-caption" id="">
                            <h1 id="head-caption">Lorem ipsum dolor sit amet consectetur.</h1>            
                            <span id="under-caption"> Lorem ipsum dolor sit, amet consectetur adipisicing elit. Dolores debitis odit
                                 voluptas cumque nobis aliquid quae cupiditate vel iusto consectetur corrupti accusantium quas vitae temporibus molestias
                                veritatis exercitationem, reprehenderit qui. 
                            <p>  </p>
                            </span> 
                        </div>
                    </div>
                </div>

                <div class="carousel-item " id="background-2">
                    <div class="container">
                        <div class="carousel-caption">
                            <h1 id="head-caption"> Lorem ipsum dolor sit amet.  </h1>
                            <span id="under-caption">Lorem ipsum dolor sit, 
                                amet consectetur adipisicing elit. Et, error. Acc
                                usantium odio saepe sed autem tempora, architecto quisquam ut non! 
                                <p> <!-- Button to Open the Modal -->
                                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal">
                                    Become a Member
                                </button>
                                </p>

                           </span>
                               
                        </div>
                    </div>
                </div>

                <div class="carousel-item " id="background-3">
                    <div class="container">
                        <div class="carousel-caption">
                            <h1 id="head-caption"> Lorem ipsum dolor sit.</h1>
                            <span id="under-caption">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Et, error. Accusantium odio saepe sed autem tempora, architecto quisquam ut non!</span>

                        </div>
                    </div>
                </div>
       
            </div>
            
                <a href="#headSlide" data-slide="prev" class="carousel-control-prev">
                    <span class="carousel-control-prev-icon"></span>
                </a>

                <a href="#headSlide" data-slide="next" class="carousel-control-next">
                    <span class="carousel-control-next-icon"></span>
                </a>

        </div>
    </header>

    <section>
        <div class="container-fluid">
            <div class="row">
            <?php
                echo success();
                echo error();
            ?>
            </div>
        </div>
    </section>

    <section id="about" class="text-dark bg-light p-3">
        <div class="container">
            <div class="row">
                <h2 class="comic">About SpaceClub</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus deleniti velit possimus quod eaque esse totam, 
                    neque consectetur impedit nisi temporibus quasi ullam iusto nostrum nihil error excepturi corporis eligendi a
                    b vero id. Ex necessitatibus alias quisquam, ab deserunt vitae quam debitis aut, corrupti nesciunt impedit obcae
                    cati doloremque laboriosam eius atque cum, aliquid quidem eum dolor minus. Debitis, dolore velit.</p>
                    <p> <!-- Button to Open the Modal -->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                            Click to join
                        </button>
                    </p>
            </div>
        </div>
    </section>

    <section class="bg-white p-3" id="contact">
        <div class="container">
            <div class="row">
                <h2 class="comic">Contact Us</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                Suscipit magnam iste quis officia unde nemo voluptatibus numquam ducimus tenetur earum!</p>

            </div>
        </div>
    </section>

<!-- The Modal -->
<div class="modal fade" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title"> Become a member Today </h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
          <p class="lead"> To become a member of the club, get your form today @SpaceClub Secetariat</p>
          <p class="lead">SpaceClub secretariat is located @ Faculty of Agric beside Agro-Fresh Mart, Ajose basement </p>
          <p class="font-weight-bold"> NOTE: The form costs <strike>N</strike> 1,000</p>
            <hr>
        <p>Fill your contact details below as apiring member and to get notified of events before you become a member</p>
        <form action="#" method="POST" class="bg-light p-4 ">
            <div class="form-group">
                <label for="name"><b> Name</b> </label>
                <input type="text" id="name" name="name" class="form-control">
            </div>

            <div class="form-group">
                <label for="department"> <b>Department </b> </label>
                <input type="text" id="department" name="department" class="form-control">
            </div>
            
            <div class="form-group">
                <label for="number"> <b>Phone Number </b></label>
                <input type="text" id="number"name="number" class="form-control">
            </div>
            <button class="btn btn-outline-primary" type="submit" name="addAspirant">Submit</button>


        </form>    
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/main.js"></script>
    <script src="slick/slick.js"></script>
    <script src="slick/slick.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>