<?php include('inc/header.php');?>
<?php include('inc/sidebar.php');?>
<?php if (isset($_GET['id']) && $_GET['id'] != NULL){
$id = $_GET['id'];
}else{
echo "<script>window.location.assign('messages.php')</script>";
}
$query = "DELETE FROM message WHERE id = '$id'";
$delete = $db->delete($query);
?>