<?php
include('../model/database.php');
include('../model/db_functions.php');
$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
$action = filter_input(INPUT_GET, 'action');
if ($action == NULL) {
$action = 'list_items';
}
}
if ($action == 'list_items') {
header("Location:todoItems.php");
}
else  if($action == 'delete_items') {

$item_id = filter_input(INPUT_POST, 'item_id',FILTER_VALIDATE_INT);
delete_item($item_id);
header("Location:todoItems.php");
}


else if ($action == 'complete_item') {

$itemId = filter_input(INPUT_POST, 'item_id',FILTER_VALIDATE_INT);

if ($itemId ==NULL)
{
$error="Something went wrong.";
include('../error/todoerror.php');
}
else
{
complete_item($itemId);
header("Location:todoItems.php");
}
}

else if ($action == 'edit_item') {
$itemId = filter_input(INPUT_POST, 'item_id',FILTER_VALIDATE_INT);
if ($itemId ==NULL)
{
$error="Something went wrong.";
include('../error/todoerror.php');
}
else
{
$result=edit_item($itemId);
if ($result==true)
{
header("Location:editItem.php");
}
}
}

else if ($action == 'update_item') {
$itemId = filter_input(INPUT_POST, 'ID',FILTER_VALIDATE_INT);
$itemName = filter_input(INPUT_POST, 'item_name');
$dueDate = filter_input(INPUT_POST, 'date');
$dueDate = date('Y-m-d', strtotime(str_replace('-', '/', $dueDate)));
$dueTime = filter_input(INPUT_POST, 'time');
//$dueTimestamp=strtotime($dueTime);
//$time = date("H:i:s A", strtotime($dueTimestamp));
if ($itemId ==NULL)
{
$error="Something went wrong.";

include('../error/todoerror.php');
}
else
{
$update=update_item($itemId,$itemName,$dueDate,$dueTime);
if ($update==true)
{
header("Location:todoItems.php");
}
}
}

else if ($action == 'AddItem') {

header("Location:addItem.php");
}


else if ($action == 'add_item') {

$itemName = filter_input(INPUT_POST, 'item_name');
$dueDate = filter_input(INPUT_POST, 'date');
$dueDate = date('Y-m-d', strtotime(str_replace('-', '/', $dueDate)));
$dueTime = filter_input(INPUT_POST, 'time');
//$dueTimestamp=strtotime($dueTime);
//$time = date("H:i:s A", strtotime($dueTimestamp));
$addition=add_item($itemName,$dueDate,$dueTime);
if ($addition==true)
{
header("Location:todoItems.php");
}
}
?>
