<?php
    if(isset($_POST['updatePassword'])):
        $id = post('updatePassword');
        $new = post('newPassword');

        if(empty($new)):
            $_SESSION['errorMessage'] = 'Field cannot be empty';
        else:
            $sql = "UPDATE `excos` SET `password` = '$new' WHERE `id` = '$id' ";
            $query = fetch_custom($connect,$sql);

            if($query):
                $_SESSION['successMessage'] = 'Password changed';
            else:
                $_SESSION['errorMessage'] = 'Something went wrong, try again';
            endif;
        endif;

    endif;

?>