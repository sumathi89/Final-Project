<?php
include('../model/database.php');
include('../model/db_functions.php');
$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
$action = filter_input(INPUT_GET, 'action');
if ($action == NULL) {
$action = 'list_items';
}
if ($action == 'list_items') {
header("Location:todoItems.php");
}
else  if($action == 'delete_items') {
$item_id = filter_input(INPUT_POST, 'item_id',FILTER_VALIDATE_INT);
delete_item($item_id);
header("Location:todoItems.php");
}
else if ($action == 'add_item') {
$itemName = filter_input(INPUT_POST, 'itemName');
if ($itemName ==NULL)
{
$error="Please enter Item name."
include('../error/todoerror.php');
}
else
{
add_item($itemName);
header("Location:todoItems.php");
}
}
?>
