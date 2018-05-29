<?php
        if(isset($_POST['addMember'])):
            $name = post('name');
            $department = post('department');
            $matric_no = post('matric');
            $email = post('email');
            $phone = post('phone');
            $reg_by = $_SESSION['excoDetails']['lname']." ".$_SESSION['excoDetails']['fname'];
            $date = date("d|m|Y");
            $time = date('g:i A');
            $array = array(
                'name' => $name,
                'reg_number' => $matric_no,
                'department' => $department,
                'phone' => $phone,
                'email' => $email,
                'reg_by' => $reg_by,
                'date' => $date,
                'time' => $time
            );

                $insert = insert($array , $connect , 'member');

                if($insert):
                    $_SESSION['successMessage'] = '1 new member added';
                else:
                    $_SESSION['errorMessage'] = 'error adding member, please try again';
                endif;
        else:
            $_SESSION['errorMessage'] = 'Add Members';
        endif;

        function membersList()
        {
            $sql = "SELECT * from `member` ORDER BY id DESC";
            $members = fetch_custom($connect, $sql);

            return $members;
        }
        



?>