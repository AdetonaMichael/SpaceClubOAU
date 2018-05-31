<?php
function connect_db()
{
	$connect = mysqli_connect('localhost', 'root', '','spaceclub' ) or die('unable to make database connection');
	return $connect;
}

function post($var)
{
    $connect = connect_db('swep_project');
    if(isset($_POST[$var]))
    {
        return mysqli_real_escape_string($connect, $_POST[$var]);
    }
}

function insert($array,$connect,$tablename)
{
	$columns = implode(", ",array_keys($array));
	// $escaped_values = array_map('mysqli_real_escape_string', array_values($array));
	$values  = implode("', '", $array);

	$sql = "INSERT INTO `$tablename`($columns) VALUES ('$values'); ";
	$query = mysqli_query($connect, $sql) or die(mysqli_error($connect));

	return $query;
} 

function fetch_custom($connect, $sql)
{
	$query = mysqli_query($connect,$sql) or die(mysqli_error($connect));
	return $query;
}

function check_exist($connect, $row, $value, $tablename)
{
	$sql = "SELECT * FROM $tablename where $row = '$value'";
	$fetch = fetch_custom($connect, $sql);

	if ($fetch && mysqli_num_rows($fetch)>0) :
		return true;
	else :
		return false;
	endif;
}

function full_details($connect, $id, $tablename)
{
	$sql = "SELECT * FROM $tablename where id = '$id'";
	$fetch = fetch_custom($connect, $sql);

	if ($fetch) :
		return mysqli_fetch_array($fetch);
	else :
		$_SESSION['errorMessage'] = 'Something went wrong fetching from database, try again';
		die();
	endif;
}

// <a href="javascript: history.go(-1)">Go Back</a>



?>