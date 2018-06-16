<?php include('inc/header.php');?>
<?php include('inc/sidebar.php');?>



<?php if (isset($_GET['read']) && $_GET['read'] != NULL){
$read = $_GET['read'];
$archived = 1;
if($archived != 1){
echo "<p class='alert alert-danger'>Error</p>";
}else{
$query = "UPDATE message SET archived = '$archived' WHERE id = '$read'";
$updated_rows = $db->update($query);
} 
?>

<?php
}elseif(isset($_GET['unread']) && $_GET['unread'] != NULL){ 

$unread = $_GET['unread'];
$archived = 0;
if($archived != 0){
echo "<p class='alert alert-danger'>Error</p>";
}else{
$query = "UPDATE message SET archived = '$archived' WHERE id = '$unread'";
$updated_rows = $db->update($query);
}

}else{
  echo "<script>window.location.assign('messages.php')</script>";  
} 
?>

<?php include('inc/footer.php');?>