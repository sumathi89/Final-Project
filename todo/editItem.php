<?php
include('../model/database.php');
include('../model/db_functions.php');
?>
<html>
<head align="center">
<link rel="stylesheet" type="text/css" href="../css/main.css">
<h1 align="center"><b>Edit Item</b></h1>
</head>
<body class="bodyback">
<form method="post" action=".">
<table align="center">
<tr>
<input type="hidden" name="action" value="update_item">
<td>ID</td><td><input type="text" name="ID" value="<?php echo $_COOKIE['item_id'];?>" readonly> </td></tr>
<td>Item Name</td><td><input type="text" name="item_name" value="<?php echo  $_COOKIE['item_name']  ;?>"> </td></tr>
<td>Due Date</td><td><input type="date" name="date" value="<?php echo  $_COOKIE['duedate']  ;?>"> </td></tr>
<td>Due Time</td><td><input type="time" name="time" value="<?php echo  $_COOKIE['duetime']  ;?>"> </td></tr>
<tr>
<td></td>
<td>
<input type="submit" name="update_item" value="Update Item">
</td></tr>
</table>
</form>
</body>
</html>
