<?php
include('../model/database.php');
include('../model/db_functions.php');
?>
<html>
<head>
Add Item
</head>
<body>
<form method="post" action=".">
<table>
<tr>
<td>Item Name</td><td><input type="text" name="item_name" > </td></tr>
<td>Due Date</td><td><input type="date" name="date" > </td></tr>
<td>Due Time</td><td><input type="time" name="time" > </td></tr>
<tr>
<td>
<input type="submit" name="add_item" value="Add Item">
</td></tr>
</table>
</form>
</body>
</html>

