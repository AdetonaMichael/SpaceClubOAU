<?php
    include '../JhhamesPhp/sessions.php';
    include '../JhhamesPhp/database.php';
    $connect = connect_db();
    
    include '../JhhamesPhp/excologinaction.php';
    include '../JhhamesPhp/addMember.php';

    $members = membersList();
    $memberModals = membersList(); 



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
            <div class="dropdown">
                <a class="dropdown-toggle fa fa-user-circle text-dark" href="" style="text-decoration:none" data-toggle="dropdown">
                    <?= $_SESSION['excoDetails']['fname'] . " " . $_SESSION['excoDetails']['lname'] ?>
                </a>                <div class="dropdown-menu" style="z-index:9999">
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
                        <a href="" class="nav-link active text-capitalize">Members</a>
                    </li>
                    <li class="nav-item">
                        <a href="aspirants.php" class="nav-link text-capitalize text-light">Aspirants</a>
                    </li>
                    </li>
                    <li class="nav-item">
                        <a href="" class="nav-link text-capitalize text-light">Excos</a>
                    </li>
                </ul>
            </div>
        </div>

    </nav>
    <section id="error">
        <div class="container-fluid">
            <div class="row text-center">
                <?php
                    echo error();
                    echo success();
                ?>
            </div>
        </div>
    </section>


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
                            <th>Matric No</th>
                            <th>Phone </th>
                            <th>More </th>
                        </tr>
                    </thead>
                    <tbody id="myTable">
                        <?php
                        if (isset($members) && mysqli_num_rows($members) > 0) :
                            while ($row = mysqli_fetch_array($members)) :
                        ?>
                        <tr>
                            <td> <?= $row['name'] ?></td>
                            <td> <?= $row['reg_number'] ?> </td>
                            <td> <?= $row['phone'] ?> </td>
                            <td> <button data-toggle="modal" data-target="#mem<?=$row['id'] ?>" class="btn btn-secondary">
                            <span class="fa fa-ellipsis-h"></span>
                            </button> </td>
                        </tr>
                        <?php
                        endwhile;
                        else :
                            echo "<th colspan='4'> No members yet </th> ";
                        endif;
                        ?>
                    
                    </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container-fluid">
            <div class="row">
             <button class="btn btn-lg btn-info px-3 mb-4 mx-1 fixed-bottom rounded-circle"
                style="transform:scale(1.1,1.3); left: 80vw; box-shadow:0px 3px 10px #666"
                data-toggle="modal"
                data-target="#addNew" >
                <span class="fa fa-user-plus"></span>
            </button>
            </div>
        </div>
    </section>
   


<section class="modals">
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
                        <label for="email"> <b>Email </b> </label>
                        <input type="email" id="email" name="email" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="matric"> <b>Matric number </b> </label>
                        <input type="text" id="matric" name="matric" class="form-control">
                    </div>
                    
                    <div class="form-group">
                        <label for="number"> <b>Phone Number </b></label>
                        <input type="text" id="number" name="phone" class="form-control">
                    </div>
                    <button class="btn btn-outline-primary" type="submit" name="addMember">Add </button>


                </form>    
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>

            </div>
        </div>
    </div>

<?php 
            if(isset($memberModals) && mysqli_num_rows($memberModals)> 0):
                while($row = mysqli_fetch_array($memberModals)):
?>
    <div class="modal fade" id="mem<?= $row['id'] ?>">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">  </h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
               
                <div class="container bg-dark text-white">
                    <div class="row pt-4 pb-3 text-center">
                        <div class="col-md-2 text-center pt-md-3">
                            <span style="transform:scale(4,4);"  class="fa text-white align-middle text-center fa-user-circle-o ">
                            </span>
                        </div>
                        <div class="col-md-9 text-center h1 pt-sm-2">
                            <?= $row['name'] ?>
                        </div>
                    </div>
                </div>

                <table class="table">
                    <thead>

                    </thead>

                    <tbody class="bg-light">
                        <tr>
                            <td class="w-25 font-weight-bold">Matric Number</td>
                            <td><?= $row['reg_number'] ?></td>
                        </tr>

                        <tr>
                            <td class="w-25 font-weight-bold">Department</td>
                            <td><?= $row['department'] ?></td>
                        </tr>
                        
                        <tr>
                            <td class="w-25 font-weight-bold">Phone </td>
                            <td><?= $row['phone'] ?></td>
                        </tr>
                        
                        <tr>
                            <td class="w-25 font-weight-bold">Email</td>
                            <td><?= $row['email'] ?></td>
                        </tr>
                        
                        <tr>
                            <td class="w-25 font-weight-bold">Joined on</td>
                            <td><?= $row['date'] ?></td>
                        </tr>
                        
                        <tr class="bg-secondary text-light">
                            <td class="w-25 font-weight-bold">Added by</td>
                            <td class="clearfix"><?= $row['reg_by'] ?>
                                <span class="fa fa-clock-o float-right" > <?=$row['time'] ?> </span>
                            </td>
                        </tr>
                        
                        
                    </tbody>
                </table>
                
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>

            </div>
        </div>
    </div>
 <?php   
                endwhile;
            endif;

?>
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