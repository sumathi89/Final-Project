<?php
function isUserValid($username,$password)
{
echo "count";
global $db;
$query='select * from store_login where username=:name and password=:pass';
echo "count1";
$statement=$db->prepare($query);
echo "count 2";
$statement->bindValue(":name",$username);
echo "count 3";
$statement->bindValue(":pass",$password);
echo "count 4";
$statement->execute();
echo "count 5";
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
?>
