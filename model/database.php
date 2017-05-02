<?php
$dsn='mysql:host=sql1.njit.edu;dbname=ss3467';
$username='ss3467';
$password='kGn1UMT0';
try
{
$db=new PDO($dsn,$username,$password);
}
catch (PDOException $e)
{
$error_message=$e->getMessge();
include('../errors/database_error.php');
exit();
}
?>
