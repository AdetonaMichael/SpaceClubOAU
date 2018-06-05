<?php
    include '../JhhamesPhp/sessions.php';
    include '../JhhamesPhp/database.php';

    $connect = connect_db();
    include '../JhhamesPhp/excologinaction.php';
    include '../JhhamesPhp/addMember.php';
    include '../JhhamesPhp/addAspirant.php';

    if(isset($_POST['aspirant']) && !isset($_POST['name'])):
        $deleteAspirant = deleteAspirant();

        if($deleteAspirant):
            $_SESSION['successMessage'] = "Aspirant Deleted";
        else:
            $_SESSION['errorMessage'] = "Something went wrong, try again";
        endif;
    endif;    
    $aspirants = aspirantList();
    $aspirantModals = aspirantList();

    

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
                <a class="dropdown-toggle fa fa-user-circle text-dark" href="" style="text-decoration:none" data-toggle="dropdown">
                    <?= $_SESSION['excoDetails']['fname']." ".$_SESSION['excoDetails']['lname']  ?>
                </a>
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
                        <a href="excos.php" class="nav-link text-capitalize text-light">Excos</a>
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
                            <td>
                                <button data-toggle="modal" data-target="#mod<?= $row['id']  ?>" class="btn btn-secondary">
                                <span class="fa fa-pencil"></span> </button>
                            </td>
                        </tr>
                        <?php
                                endwhile;
                            else: 
                                echo "<th colspan='4' class='text-center'> No Aspirants yet </th> ";
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
                    <form action="#" method="POST" class="bg-light p-4" id="aspirant-form">
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

<?php
                if(isset($aspirantModals) && mysqli_num_rows($aspirantModals)>0):
                    while($row =  mysqli_fetch_array($aspirantModals)):
?>
        <div class="modal fade" id="mod<?= $row['id'] ?>">
            <div class="modal-dialog">
                <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Complete Membership Registration </h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    
                <form action="#" method="POST" class="bg-light p-4 " id="member-form">
                    <div class="form-group">
                        <label for="name"><b> Name </b> </label>
                        <input type="text" id="fname" value="<?= $row['name'] ?>" name="name" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="department"> <b>Department </b> </label>
                        <input type="text" id="adepartment" value="<?= $row['department'] ?>" name="department" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="email"> <b>Email </b> </label>
                        <input type="email" id="email" placeholder="Enter Email address" name="email" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="matric"> <b>Matric number </b> </label>
                        <input type="text" id="matric" placeholder="Enter Matric Number" name="matric" class="form-control">
                    </div>
                    
                    <input type="hidden" value="<?= $row['id']?>" name="aspirant">

                    <div class="form-group">
                        <label for="number"> <b>Phone Number </b></label>
                        <input type="text" id="anumber" value="<?= $row['phone'] ?>" name="phone" class="form-control">
                    </div>
                    <button class="btn btn-outline-primary" type="submit" name="addMember">Register </button>


                </form> 

                <form action="#" method="POST">       
                    <button name="aspirant" value="<?=$row['id'] ?>" class="btn btn-danger btn-block"><span class="fa fa-trash"></span></button>
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

         $(document).ready(function(){
            $('#member-form').submit(function(event){

                var name = $('#fname').val();
                var department = $('#adepartment').val();
                var email = $('#email').val();
                var matric = $('#matric').val();
                var phone = $('#anumber').val();

                validateEmptyName(name, event);
                validateEmptyDept(department, event);
                validateEmptyEmail(email, event);
                validateEmptyMatric(matric, event);
                validateEmptyPhone(phone, event);
            });

                        
            $('#aspirant-form').submit(function(event){
                var name = $('#name').val();
                var department = $('#department').val();
                var number = $('#number').val();
                
                validateEmptyName_2(name,event);
                validateEmptyDept_2(department,event);
                validateEmptyPhone_2(number,event);
            });
        });
    


        rmvClass('#fname');
        rmvClass('#name');
        rmvClass('#number');
        rmvClass('#department');
        rmvClass('#adepartment');
        rmvClass('#email');
        rmvClass('#matric');
        rmvClass('#anumber');

    
            function validateEmptyName(field, event){
                if(field.trim() ==''){
                    $('#fname').addClass('border');
                    $('#fname').addClass('border-danger');
                    $('#fname').addClass('shake-table');
                    event.preventDefault();
                }
        
        }
    
            function validateEmptyName_2(field, event){
                if(field.trim() ==''){
                    $('#name').addClass('border');
                    $('#name').addClass('border-danger');
                    $('#name').addClass('shake-table');
                    event.preventDefault();
                }
        
        }
    
            function validateEmptyDept(field, event){
                if(field.trim() ==''){
                    $('#adepartment').addClass('border');
                    $('#adepartment').addClass('border-danger');
                    $('#adepartment').addClass('shake-table');
                    event.preventDefault();
                }
        
        }

            function validateEmptyDept_2(field, event){
                if(field.trim() ==''){
                    $('#department').addClass('border');
                    $('#department').addClass('border-danger');
                    $('#department').addClass('shake-table');
                    event.preventDefault();
                }
        
        }
    
            function validateEmptyMatric(field, event){
                if(field.trim() ==''){
                    $('#matric').addClass('border');
                    $('#matric').addClass('border-danger');
                    $('#matric').addClass('shake-table');
                    event.preventDefault();
                }
        
        }
    
            function validateEmptyPhone(field, event){
                if(field.trim() ==''){
                    $('#anumber').addClass('border');
                    $('#anumber').addClass('border-danger');
                    $('#anumber').addClass('shake-table');
                    event.preventDefault();
                }
        
        }
    
            function validateEmptyPhone_2(field, event){
                if(field.trim() ==''){
                    $('#number').addClass('border');
                    $('#number').addClass('border-danger');
                    $('#number').addClass('shake-table');
                    event.preventDefault();
                }
        
        }
    
            function validateEmptyEmail(field, event){
                if(field.trim() ==''){
                    $('#email').addClass('border');
                    $('#email').addClass('border-danger');
                    $('#email').addClass('shake-table');
                    event.preventDefault();
                }
        
        }

        function rmvClass(field){
            $(field).focus(function(){
                $(field).removeClass('shake-table');
                $(field).removeClass('border');
                $(field).removeClass('border-danger');
            });
        }
    </script>
</body>
</html>