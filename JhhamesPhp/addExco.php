<?php
    if(isset($_POST['addExco'])):
        $id = post('member');
        $office = post('office');

        if(empty($id)&&empty($office)):
            $_SESSION['errorMessage'] = 'Fields cannot be empty';
        endif;
        
        $candidate = full_details($connect, $id, 'member');

        if(check_exist($connect,'matric_no',$candidate['reg_number'],'excos')):
            $_SESSION['errorMessage'] = 'Candidate already has an office';
        else:
            if($candidate):
                $array = array(
                    'firstname' => $candidate['name'],
                    'matric_no' => $candidate['reg_number'],
                    'department' => $candidate['department'],
                    'email' => $candidate['email'],
                    'phone' => $candidate['phone'],
                    'office' => $office,
                    'password' => 'spaceclub'
                );

                $insert = insert($array, $connect, 'excos');
                if($insert):
                    $_SESSION['successMessage'] = 'You`ve appointed '. $candidate['name']. ' as the '.$office .' of the club';
                else:
                    $_SESSION['errorMessage'] = 'something went wrong adding exco, try again!';
                endif;
            else:
            endif;
        endif;
    else:
    endif;

    if(isset($_POST['addOffice'])):
        $office = post('office');
        if(empty($office)):
            $_SESSION['errorMessage']= 'Fields cannot be empty';
        else:
            $array = array(
                'office' => $office
            );

            if(insert($array, $connect,'office')):
                $_SESSION['successMessage'] = 'Office added';
            else:
                $_SESSION['errorMessage'] = 'Error adding office try again';
            endif;   
        endif;
        

    endif;
    function excosList()
    {
        $connect = connect_db();
        $sql = "SELECT * from `excos` ORDER BY id DESC";
        $excos = fetch_custom($connect, $sql);

        return $excos;
    }

    function officeList(){
        $connect = connect_db();
        $sql = "SELECT * FROM `office`";
        $office = fetch_custom($connect, $sql);

        return $office;
    }


?>
