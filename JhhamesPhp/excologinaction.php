<?php
if (!isset($_SESSION['exco-login'])) :
        $_SESSION['errorMessage'] = "Login actions needed to access page";
        redirect_to('login.php');
        die();
else :
        $id = $_SESSION['exco-login-id'];
        $sql = "SELECT * FROM `excos` where id = '$id' ";
        $exco_details = fetch_custom($connect, $sql);
        if (mysqli_num_rows($exco_details) > 0) :
            while ($row = mysqli_fetch_array($exco_details)) :

                $_SESSION['excoDetails'] = array(
                'fname' => $row['firstname'],
                'lname' => $row['lastname'],
                'email' => $row['email'],
                'phone' => $row['phone'],
                'office' => $row['office'],
                'department' => $row['department'],
                'matric' => $row['matric_no']

            );
            endwhile;
        endif;
endif;


?>