<?php
include('../model/database.php');
include('../model/db_functions.php');
?>
<html>
<head align="center">
<link rel="stylesheet" type="text/css" href="../css/main.css">
<h1 align="center"><b>Add Item</b></h1>
</head>
<body align="center" class='bodyback'>
<form method="post" action=".">
<table align="center">
<tr>
<input type="hidden" name="action" value="add_item">
<td>Item Name</td><td><input type="text" name="item_name" > </td></tr>
<td>Due Date</td><td><input type="date" name="date" > </td></tr>
<td>Due Time</td><td><input type="time" name="time" > </td></tr>
<tr>
<td>
</td><td>
<input type="submit" name="add_item" value="Add Item">
</td></tr>
</table>
</form>
</body>
</html>

