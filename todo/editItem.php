<?php
include('../model/database.php');
include('../model/db_functions.php');
?>
<html>
<head>
Edit Item
</head>
<body>
<form method="post" action=".">
<table>
<tr>
<td>ID</td><td><input type="text" name="ID" value="<?php echo $result['ID'] ;?>"> </td></tr>
<td>Item Name</td><td><input type="text" name="item_name" value="<?php echo $result['items'] ;?>"> </td></tr>
<td>Due Date</td><td><input type="date" name="date" value="<?php echo $result['DueDate'] ;?>"> </td></tr>
<td>Due Time</td><td><input type="time" name="time" value="<?php echo $result['DueTime'] ;?>"> </td></tr>
<tr>
<td>
<input type="submit" name="update_item" value="Update Item">
</td></tr>
</table>
</form>
</body>
</html>
