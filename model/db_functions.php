<?php
function isUserValid($username,$password)
{

global $db;
$query='select * from store_login where username=:name and password=:pass';
$statement=$db->prepare($query);
$statement->bindValue(":name",$username);
$statement->bindValue(":pass",$password);
$statement->execute();
$result=$statement->fetchAll();
$statement->closeCursor();
$count=$statement->rowCount();

if($count==1)
{
setcookie('login',$username);
setcookie('my_id',$result[0]['id']);
setcookie('islogged',true);
return true;
}
else
{
unset($_COOKIE['login']);
setcookie('login',false);
setcookie('islogged',false);
setcookie('id',false);
return false;
}
}
function createNewAccount($fname,$lname,$phone,$email,$pass,$gender)
{
global $db;
$query='INSERT INTO store_login(username,password,firstName,lastName,Gender,phoneNo)values(:email,:pass,:fname,:lname,:gender,:phone)';
$statement=$db->prepare($query);
$statement->bindValue(":email",$email);
$statement->bindValue(":pass",$pass);
$statement->bindValue(":fname",$fname);
$statement->bindValue(":lname",$lname);
$statement->bindValue(":gender",$gender);
$statement->bindValue(":phone",$phone);
$statement->execute();
$statement->closeCursor();
return true;
}
?>
