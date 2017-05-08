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
$query = 'DELETE FROM todo_list  WHERE ID = :item_id';
$statement = $db->prepare($query);
$statement->bindValue(':item_id', $item_id);
$success = $statement->execute();
$statement->closeCursor();    
}

function add_item($item_name,$uid)
{
global $db;
$status="N";
$query='INSERT INTO todo_list(UID,Items,Completed)values(:uid,:item_name,:status)';
$statement=$db->prepare($query);
$statement->bindValue(":uid",$uid);
$statement->bindValue(":item_name",$item_name);
$statement->bindValue(":status",$status);
$statement->execute();
$statement->closeCursor();
return true;
}

function complete_item($item_id)
{
global $db;
$status="Y";
$query = 'UPDATE todo_list SET  Completed=:status  WHERE ID = :item_id';
$statement = $db->prepare($query);
$statement->bindValue(':item_id', $item_id);
$statement->bindValue(':status', $status);
$success = $statement->execute();
$statement->closeCursor();
}

function edit_item($item_id)
{
global $db;
$query = 'SELECT * FROM todo_list  WHERE ID = :item_id';
$statement = $db->prepare($query);
$statement->bindValue(':item_id', $item_id);
$statement->execute();
$result= $statement->fetchAll();
$statement->closeCursor();
return $result;
}

?>
