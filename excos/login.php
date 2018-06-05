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
                <span id="reply" class="text-danger font-weight-bold"></span>
                </div>
                <p class="lead">Hi Exco! Login Below</p>
                    <form action="#" method="POST" id="login_form">
                        <div class="form-group">
                            <label for="reg"> <strong> <span class="text-center small text-danger" id="matric-reply"> </span> </strong> </label> 
                            <div class="input-group" id="mat_no">
                                <span class=" fa fa-user-circle input-group-addon bg-white"></span>
                                <input type="text" id="reg" name="matric" placeholder="Matric Number" class="form-control">
                            </div>
                        
                        </div>

                        <div class="form-group">
                            <label for="password"> <strong> <span class="text-center small text-danger" id="pass-reply"> </span> </strong> </label> 
                            <div class="input-group" id="pword">
                                <span class=" fa fa-key input-group-addon bg-white"></span>
                                <input type="password" id="password" name="password" placeholder="Password" class="form-control">
                            </div>
                        
                        </div>

                        <button class="btn btn-outline-info btn-block" type="submit" name="login">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <script src="../js/popper.min.js"></script>
    <script src="../js/main.js"></script>
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

        //validate the whole form based on the click event
        $(document).ready(function(){
            $('#login_form').submit(function(event){
            var matric = $('#reg').val();
            var password = $('#password').val();

            validateMaticNo(matric, event);
            validatePassword(password, event);

            });
            
            
        });
        
        //Valiadtion function for matric number field
        function validateMaticNo(matric, event){
            if(!validMatric(matric)){
                $('#matric-reply').text('Invalid Matric Number');
                $('#mat_no').addClass('border');
                $('#mat_no').addClass('rounded');
                $('#mat_no').addClass('border-danger');
                $('#login-box').addClass('shake-table');

                event.preventDefault();
            }
            else{
                $('#matric-reply').text('');
            }
        }
        
        // validation for password field; must not be empty
        function validatePassword (pass, event){
            if(pass.trim() == ''){
                $('#pass-reply').text('Password Empty');
                $('#login-box').addClass('shake-table');
                $('#pword').addClass('border');
                $('#pword').addClass('rounded');
                $('#pword').addClass('border-danger');
            
                event.preventDefault();
                

            }else{
                $('#pass-reply').text("");
            }
        }
        function validMatric(matric){
            return matric.length == 12;
        }
        
        //remove the shake class after they remove mouse from password
        $('#password').focus(function(){
            $('#pass-reply').text("");
            $('#login-box').removeClass('shake-table');
        });
       //remove the shake class after they remove mouse from matric number
        $('#reg').focus(function(){
            $('#matric-reply').text("");
            $('#login-box').removeClass('shake-table');
        });

    </script>
</body>
</html>