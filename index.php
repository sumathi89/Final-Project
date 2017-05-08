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

if ($action=="show_signup")
{
	include('login/sign-up.php');
}

else if($action =="validate_user")
{
?>
<p>welcome</p>
<?php
	$username=$_POST['reg_uname'];
	$password=$_POST['reg_password'];
	$success=isUserValid($username,$password);
        $user=checkUser($username);
	if ($user[0]['username']==$username)
	{
	echo "hello";

		if (!($user[0]['password']==$password))
		{
		echo "welcom";
			header("Location:error/passError.php");	
		}	
	}
	if($success==true)
	{
	

		header("Location:todo/todoItems.php");
	}
	else
	{
	
		header("Location:error/loginError.php");
	}
}
?>


	
	
