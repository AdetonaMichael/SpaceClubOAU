<script src="../js/jquery.min.js"></script>
<?php
    include '../JhhamesPhp/sessions.php';
    include '../JhhamesPhp/database.php';

    $connect = connect_db();

    include '../JhhamesPhp/excologin.php';


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
<body class="bg-light"> 

    <section class="p-2">
        <div class="container">
            <div class="row">
                <div class="col-md-4 mx-auto bg-white pb-3 pt-2 m-5 rounded" id="login-box" style="box-shadow: 0px 2px 19px #777">
                <div class="row m-0">
                    <?php
                        echo success();
                        echo error();
                    ?>
                </div>
                <p class="lead">Hi Exco! Login Below</p>
                    <form action="#" method="POST">
                        <div class="form-group">
                            <label for="reg"> <strong></strong> </label> 
                            <div class="input-group" id="mat_no">
                                <span class=" fa fa-user-circle input-group-addon bg-white"></span>
                                <input type="text" id="reg" name="matric" placeholder="Matric Number" class="form-control">
                            </div>
                        
                        </div>

                        <div class="form-group">
                            <label for="password"> <strong></strong> </label> 
                            <div class="input-group" id="pword">
                                <span class=" fa fa-key input-group-addon bg-white"></span>
                                <input type="password" id="password" name="password" placeholder="Password" class="form-control">
                            </div>
                        
                        </div>

                        <button class="btn btn-outline-info btn-block" name="login">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

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