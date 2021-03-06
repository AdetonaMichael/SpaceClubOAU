<?php
        function deleteAspirant(){
            $connect = connect_db();

            if (isset($_POST['aspirant'])) :
                $aspirantId = post('aspirant');
                $sql = "DELETE FROM `aspiring` where id = '$aspirantId' ";
                $delete = fetch_custom($connect, $sql);

                return $delete;
            else:
                return null;
            endif;

            

        }
        date_default_timezone_set('Africa/Lagos');
        if(isset($_POST['addMember'])):
            $name = post('name');
            $department = post('department');
            $matric_no = post('matric');
            $email = post('email');
            $phone = post('phone');
            $reg_by = $_SESSION['excoDetails']['lname']." ".$_SESSION['excoDetails']['fname'];
            $date = date("d | m | Y");
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


               
            if(empty($name) || empty($department) || empty($matric_no) || empty($email) || empty($phone)):
                $_SESSION['errorMessage'] = 'No fields Should be empty';
            elseif(check_exist($connect,'reg_number',$matric_no,'member')):
                $_SESSION['errorMessage'] = "Member already added";
            else:
                $insert = insert($array , $connect , 'member');
                deleteAspirant();
                if($insert):
                    $_SESSION['successMessage'] = '1 new member added';
                else:
                    $_SESSION['errorMessage'] = 'error adding member, please try again';
                endif;
            endif;
               
        else:

        endif;

        
        function membersList(){
            $connect = connect_db();
            $sql = "SELECT * from `member` ORDER BY id DESC";
            $members = fetch_custom($connect, $sql);

            return $members;
        }
        



?>