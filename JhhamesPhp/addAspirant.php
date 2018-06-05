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

        if(empty($name) || empty($department) || empty($number)):
            $_SESSION['errorMessage'] = 'Fields cannot be empty';
        elseif(check_exist($connect,'phone',$number,'aspiring')):
            $_SESSION['errorMessage'] = 'Aspirant already added';
        else:
            $insert = insert($array, $connect, 'aspiring');            
            if($insert):
                $_SESSION['successMessage'] = "Dear ".stripslashes($name). ", You've been added as an aspiring member. 
                Don't forget to get your form to become a member";
            else:
                $_SESSION['errorMessage'] = "Some Error Occured, try again";
            endif;
        endif;
    }

    function aspirantList(){
        $connect = connect_db();
        $sql = "SELECT * FROM `aspiring` ORDER BY id DESC";
        $aspirants = fetch_custom($connect, $sql);
        
        return $aspirants;
    }


?>