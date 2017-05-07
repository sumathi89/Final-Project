<?php
include('../model/database.php');
include('../model/db_functions.php');
echo "<h1> To do list system</h1><br/>";
echo "Welcome, ".$_COOKIE['login'].'<br/>';
echo "Below you may find your to-do items: ";
echo "<br> <br>";
$result=getMainPage($_COOKIE['my_id']);
$compresult=getCompletedItems($_COOKIE['my_id']);
?>
<html>
<body>
<table border="1">
<?php foreach($result as $res):?>
<tr>
<td> <?php echo $res['ID']; ?>  </td>
<td> <?php echo $res['Items']; ?>  </td>
<td><form action="." method="post">
<input type="hidden" name="action" value="delete_items">
<input type="hidden" name="item_id" value="<?php echo $res['ID']; ?>">
<input type="submit" value="Delete">
</form></td>
</tr>  
<?php endforeach;?>
</table>
<table border="1">
<tr><td colspan="333"><b>Completed Items</b></td></tr>
<?php foreach($compresult as $rslt):?>
<tr>
<td> <?php echo $rslt['ID']; ?>  </td>
<td> <?php echo $rslt['Items']; ?>  </td>
<td><form action="." method="post">
<input type="hidden" name="action" value="delete_items">
<input type="hidden" name="item_id" value="<?php echo $res['ID']; ?>">
<input type="submit" value="Delete">
</form></td>
</tr>
<?php endforeach;?>
</table>

<form method = 'post' action='index.php'>
<strong> Description: </strong> <input type='text' name='description'/><br>
<input type = 'hidden' name = 'action' value='add_item'><br>
<input type="submit" value="Add"/>
</form>
</body
>
</html>
 
