<?php
    if(isset($_POST['addExco'])):
        $id = post('member');
        $office = post('office');

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

function excosList()
{
    $connect = connect_db();
    $sql = "SELECT * from `excos` ORDER BY id DESC";
    $excos = fetch_custom($connect, $sql);

    return $excos;
}


//new excos reveal //talk about making the group live
//why the fuck are you here and what do you want to get out of the club
//michael presents his rules
//club plans - 
//call to join arms of the club
//space law 
//space lab 
//editorial team, 
//outreach



?>
