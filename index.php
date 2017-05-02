<?php
require 'model/database.php';
require 'model/db_functions.php';
$action=filter_input(INPUT_POST,"action");
if($action == NULL)
{
	$action="show_login_page";
}
if($action =="show_login_page")
{
	include('login/login.php');

}
else if($action =="validate_user")
{
?>
<p>welcome</p>
<?php
	$username=$_POST['reg_uname'];
	$password=$_POST['reg_password'];
	$success=isUserValid($username,$password);
	echo $success;
	if($success==true)
	{
	//	$result=getMainPage($cookie['my_id']);
	header("Location:view/mainpage.php");
	}
	else
	{
		header("Location: loginError.php");
	}
}
?>


	
	
