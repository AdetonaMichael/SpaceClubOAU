<?php
    include '../JhhamesPhp/sessions.php';
    include '../JhhamesPhp/database.php';

    $connect = connect_db();
    if (!isset($_SESSION['exco-login'])) :
            $_SESSION['errorMessage'] = "Login actions needed to access page";
            redirect_to('login.php');
            die();
    else :
            $id = $_SESSION['exco-login-id'];
            $sql = "SELECT * FROM `excos` where id = '$id' ";
            $exco_details = fetch_custom($connect, $sql);
        if(mysqli_num_rows($exco_details) > 0) :
            while ($row = mysqli_fetch_array($exco_details)) :
                $excoFname = $row['firstname'];
                $excoLname = $row['lastname'];
                $excoEmail = $row['email'];
                $excoPhone = $row['phone'];
                $excoOffice = $row['office'];
                $excoDepartment = $row['department'];
                $excoMatricNumber = $row['matric_no'];
            endwhile;
        endif;
    endif;

    include '../JhhamesPhp/addAspirant.php';

    $sql = "SELECT * FROM `aspiring` ORDER BY id DESC";
    $aspirants = fetch_custom($connect, $sql);


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
                <span class="dropdown-toggle fa fa-user-circle" data-toggle="dropdown"> <?= $excoFname . " " . $excoLname ?></span>
                <div class="dropdown-menu" style="z-index:9999">
                    <a href="" class="dropdown-item" data-toggle="modal"> <span class="fa fa-pencil"></span> Details </a>
                    <a href="../JhhamesPhp/excologout.php" class="dropdown-item"> <span class="fa fa-sign-out"></span> Logout </a>
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
                        <a href="index.php" class="nav-link  text-capitalize text-light">Members</a>
                    </li>
                    <li class="nav-item">
                        <a href="aspirants.php" class="nav-link active text-capitalize text-dark">Aspirants</a>
                    </li>
                    </li>
                    <li class="nav-item">
                        <a href="" class="nav-link text-capitalize text-light">Excos</a>
                    </li>
                </ul>
            </div>
        </div>

    </nav>
    <section>
        <div class="container">
            <div class="row">
                <?php 
                        echo success();
                        echo error();
                ?>
            </div>
        </div>
    </section>
    <section class="mt-2">
        <div class="container">
            <div class="row">    
                <div class="clearfix border p-2 border-dark w-100">
                    <span class="float-left"> <h4 class="float-left"> <span class="fa fa-users"></span> Aspirants  </h4></span>
                    <span class="float-right"><input type="text" id="myInput" placeholder="search..." class="float-right form-control"></span>
                </div>
           
                <div class="table-responsive w-100">   
                    <table class="table table-striped border border-dark" >
                    
                    <thead class="thead-dark bg-dark text-white text-capitalize">
                        <tr>
                            <th>Name</th>
                            <th>Department</th>
                            <th>Phone </th>
                            <th>More </th>
                        </tr>
                    </thead>
                    <tbody id="myTable">
                        <?php
                            if(isset($aspirants) && mysqli_num_rows($aspirants)> 0):
                                while($row = mysqli_fetch_array($aspirants)):
                        ?>
                        <tr>
                            <td> <?= $row['name'] ?></td>
                            <td> <?= $row['department'] ?> </td>
                            <td> <?= $row['phone'] ?> </td>
                            <td> <button data-toggle="modal" data-target="#modal1" class="btn btn-secondary"> <span class="fa fa-pencil"></span> </button> </td>
                        </tr>
                        <?php
                                endwhile;
                            else: 
                                echo "<th colspan='4'> No Aspirants yet </th> ";
                            endif;
                        ?>
                    
                    </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="row">
             <button class="btn btn-lg btn-info px-3 mb-4 mx-1 fixed-bottom rounded-circle"
                style="transform:scale(1.1,1.3); left: 80vw; box-shadow:0px 3px 10px #666"
                data-toggle="modal"
                data-target="#addaspirant" >
                <span class="fa fa-user-plus"></span>
            </button>
            </div>
        </div>
    </section>
                
    <section name="modals">
        <div class="modal fade" id="addaspirant">
            <div class="modal-dialog">
                <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title"> Add Aspirants/Potential Members </h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
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



        <div class="modal fade" id="modal1">
            <div class="modal-dialog">
                <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Complete Membership Registration </h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
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
                        <button class="btn btn-outline-primary" type="submit" name="submit">Add Member</button>
                    </form>    
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>

                </div>
            </div>
        </div>
    </section>
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