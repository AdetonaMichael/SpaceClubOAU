<?php
    if(isset($_POST['login']))
    {
        $matric = post('matric');
        $password = post('password');
        $password = stripslashes($password);
        $sql  = "SELECT * FROM `excos` where matric_no = '$matric' && password = '$password' ";
        $check_login = mysqli_query($connect, $sql) or die(mysqli_error($connect));

        if($check_login && mysqli_num_rows($check_login)>0 ):
            while($row = mysqli_fetch_array($check_login)):
                $_SESSION['exco-login'] = true;
                $_SESSION['exco-login-id'] = $row['id'];
            endwhile;
            redirect_to('index.php');
        else:
            $_SESSION['errorMessage'] = "Invalid Login details";
?>
            <script type="text/javascript">
                    $(function(){
                    var matric = $('#mat_no');
                    matric.addClass('border');
                    matric.addClass('rounded');
                    matric.addClass('border-danger');
                    
                    var pass = $('#pword');
                    pass.addClass('border');
                    pass.addClass('rounded');
                    pass.addClass('border-danger');

                    var loginBox = $('#login-box');
                    
                    loginBox.addClass('shake-table');
                
                
                });
                 
            </script>
<?php
        endif;
        
    }

?>