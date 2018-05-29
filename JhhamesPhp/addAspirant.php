<?php

    if(isset($_POST['addAspirant']))
    {
        $name = post('name');
        $department = post('department');
        $number = post('number');

        $array = array(
            'name'=> $name,
            'department' => $department,
            'phone' => $number
        );

        $insert = insert($array, $connect, 'aspiring');

        if($insert):
            $_SESSION['successMessage'] = "Dear ".stripslashes($name). ", You've been added as an aspiring member. 
            Don't forget to get your form to become a member";
        else:
            $_SESSION['errorMessage'] = "Some Error Occured, try again";
        endif;
    }

    function aspirantList(){
        $connect = connect_db();
        $sql = "SELECT * FROM `aspiring` ORDER BY id DESC";
        $aspirants = fetch_custom($connect, $sql);
        
        return $aspirants;
    }


?>