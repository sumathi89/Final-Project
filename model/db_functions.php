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
setcookie('login',$result[0]['firstName']);
setcookie('my_id',$result[0]['UID']);
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
function createNewAccount($fname,$lname,$phone,$email,$pass,$gender,$dateOfBirth)
{
global $db;
$query='INSERT INTO store_login(username,password,firstName,lastName,Gender,dob,phoneNo)values(:email,:pass,:fname,:lname,:gender,:dob,:phone)';
$statement=$db->prepare($query);
$statement->bindValue(":email",$email);
$statement->bindValue(":pass",$pass);
$statement->bindValue(":fname",$fname);
$statement->bindValue(":lname",$lname);
$statement->bindValue(":gender",$gender);
$statement->bindValue(":dob",$dateOfBirth);
$statement->bindValue(":phone",$phone);
$statement->execute();
$statement->closeCursor();
return true;
}

function getMainPage($user_id){
global $db;
$status="N";
$query = 'select * from todo_list where UID= :userid and Completed=:status';
$statement = $db->prepare($query);
$statement->bindValue(':userid',$user_id);
$statement->bindValue(':status',$status);
$statement->execute();
$result= $statement->fetchAll();
$statement->closeCursor();
return $result;
}

function getCompletedItems($user_id)
{
global $db;
$status="Y";
$query = 'select * from todo_list where UID= :userid and Completed=:status';
$statement = $db->prepare($query);
$statement->bindValue(':userid',$user_id);
$statement->bindValue(':status',$status);
$statement->execute();
$result= $statement->fetchAll();
$statement->closeCursor();
return $result;
}

function delete_item($item_id)
{
global $db;
$query = 'DELETE FROM todo_list  WHERE UID = :item_id';
$statement = $db->prepare($query);
$statement->bindValue(':item_id', $item_id);
$success = $statement->execute();
$statement->closeCursor();    
}
?>
