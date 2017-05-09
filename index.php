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
<?php
	$username=$_POST['reg_uname'];
	$password=$_POST['reg_password'];
 	$user=checkUser($username);
	$success=isUserValid($username,$password);
        if ($user==true)
	{
	 if ($_COOKIE['user']==$username)
                 {
                if ($_COOKIE['pass']!=$password)
                {
                 header("Location:error/passError.php");
                  }
          }
	}
	else
	{
	 
	 header("Location:error/loginError.php");
 
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


	
	
