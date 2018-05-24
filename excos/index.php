<?php
include '../JhhamesPhp/sessions.php';
include '../JhhamesPhp/database.php';
$connect = connect_db();


?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Space Club  </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../slick/slick.css">
    <link rel="stylesheet" href="../slick/slick-theme.css">
    <link rel="icon" href="../img/logo.png" >

</head>
<body> 
    <nav class="bg-light small">
        <div class="container">
            <div class="dropdown " >
                <span class="dropdown-toggle fa fa-user-circle" data-toggle="dropdown"> User</span>
                <div class="dropdown-menu" style="z-index:9999">
                    <a href="" class="dropdown-item"> <span class="fa fa-pencil"></span> Details </a>
                    <a href="" class="dropdown-item"> <span class="fa fa-user-times"></span> Logout </a>
                </div>

            </div>
        </div>
    </nav>
    <nav class="navbar navbar-expand-sm sticky-top bg-dark text-light">
        <div class="container">
            <div class="navbar-brand mr-auto">
                <span class="fa fa-gear"></span> SpaceClub Exco Panel
            </div>
            <button class="navbar-toggler text-light" data-target="#nav-slant" data-toggle="collapse">
                <span class="fa fa-bars"></span>
            </button>
           
            <div class="collapse navbar-collapse text-light" id="nav-slant">
                <ul class="ml-auto nav nav-tabs nav-justified">
                    <li class="nav-item">
                        <a href="" class="nav-link active text-capitalize">Members</a>
                    </li>
                    <li class="nav-item">
                        <a href="" class="nav-link text-capitalize text-light">Aspirants</a>
                    </li>
                    </li>
                    <li class="nav-item">
                        <a href="" class="nav-link text-capitalize text-light">Excos</a>
                    </li>
                </ul>
            </div>
        </div>

    </nav>

    <section class="mt-2">
        <div class="container">
            <div class="row">
                <div class="clearfix border p-2 border-dark w-100">
                    <span class="float-left"> <h4 class="float-left"> <span class="fa fa-users"></span> Members  </h4></span>
                    <span class="float-right"><input type="text" id="myInput" placeholder="search..." class="float-right form-control"></span>
                </div>
                <div class="table-responsive w-100">   
                    <table class="table table-striped border border-dark" >
                    
                    <thead class="thead-dark bg-dark text-white text-capitalize">
                        <tr>
                            <th>Name</th>
                            <th>Matric Number</th>
                            <th>Phone </th>
                            <th>More </th>
                        </tr>
                    </thead>
                    <tbody id="myTable">
                        <tr>
                            <td>Falola James</td>
                            <td> CSC/2015/051 </td>
                            <td>08165906890</td>
                            <td> <button class="btn btn-secondary">View</button> </td>
                        </tr>
                        
                    
                    </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="row">
             <button class="btn btn-lg btn-info px-3 mb-4 mx-2 fixed-bottom rounded-circle"
                style="transform:scale(1.2,1.3); left: 80vw; box-shadow:0px 3px 10px #666"
                data-toggle="modal"
                data-target="#addNew" >
                <span class="fa fa-user-plus"></span>
            </button>
            </div>
        </div>
    </section>
   
    <div class="modal fade" id="addNew">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title"> Add New </h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
      
        <form action="#" class="bg-light p-4 ">
            <div class="form-group">
                <label for="name"><b> Name</b> </label>
                <input type="text" id="name" class="form-control">
            </div>

            <div class="form-group">
                <label for="department"> <b>Department </b> </label>
                <input type="text" id="department" class="form-control">
            </div>

            <div class="form-group">
                <label for="email"> <b>Email </b> </label>
                <input type="email" id="email" class="form-control">
            </div>

            <div class="form-group">
                <label for="matric"> <b>Matric number </b> </label>
                <input type="text" id="matric" class="form-control">
            </div>
            
            <div class="form-group">
                <label for="number"> <b>Phone Number </b></label>
                <input type="text" id="number" class="form-control">
            </div>
            <button class="btn btn-outline-primary" type="submit" name="submit">Submit</button>


        </form>    
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>

    <script src="../js/jquery.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../slick/slick.js"></script>
    <script src="../slick/slick.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function(){
        $("#myInput").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#myTable tr").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
        });
    </script>
</body>
</html>