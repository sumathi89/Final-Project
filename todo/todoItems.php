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
<head>
<link rel="stylesheet" type="text/css" href="./css/main.css">
</head>
<body>
<table border="1">
<tr class='columnheader'>
<td>ID</td>
<td>Item Name</td>
<td>Due Date</td>
<td>Due Time</td>
<td>Status</td>
</tr>
<?php foreach($result as $res):?>
<tr>
<td> <?php echo $res['ID']; ?>  </td>
<td> <?php echo $res['Items']; ?>  </td>
<td> <?php echo $res['DueDate']; ?>  </td>
<td> <?php echo $res['DueTime']; ?>  </td>
<td><form action="." method="post">
<input type="hidden" name="action" value="complete_item">
<input type="hidden" name="item_id" value="<?php echo $res['ID']; ?>">
<input type="submit" name="complete_item" value="Complete">
</form></td>

<td><form action="." method="post">
<input type="hidden" name="action" value="edit_item">
<input type="hidden" name="item_id" value="<?php echo $res['ID']; ?>">
<input type="submit" name="edit_item" value="Edit">
</form></td>

<td><form action="." method="post">
<input type="hidden" name="action" value="delete_items">
<input type="hidden" name="item_id" value="<?php echo $res['ID']; ?>">
<input type="submit" name="delete_item" value="Delete">
</form></td>
</tr>  
<?php endforeach;?>
</table>
<br><br>
<table border="1">
<tr><td colspan="5"><b>Completed Items</b></td></tr>
<tr>
<td>ID</td>
<td>Item Name</td>
<td>Due Date</td>
<td>Due Time</td>
</tr>
<?php foreach($compresult as $rslt):?>
<tr>
<td> <?php echo $rslt['ID']; ?>  </td>
<td> <?php echo $rslt['Items']; ?>  </td>
<td> <?php echo $rslt['DueDate']; ?>  </td>
<td> <?php echo $rslt['DueTime']; ?>  </td>
<td><form action="." method="post">
<input type="hidden" name="action" value="delete_items">
<input type="hidden" name="item_id" value="<?php echo $rslt['ID']; ?>">
<input type="submit" value="Delete">
</form></td>
</tr>
<?php endforeach;?>
</table>
<br><br>
<table>
<form method = 'post' action='.'>
<tr><td>
<input type = 'hidden' name = 'action' value='AddItem'><br>
<input type='hidden' name='uid' value="<?php echo $_COOKIE['my_id']; ?>">
<td><input type="submit" value="Add Item"/></td></tr>
</form>
</table>
</body>
</html>

