<?php include('inc/header.php');?>
<?php include('inc/sidebar.php');?>
<?php if (isset($_GET['id']) && $_GET['id'] != NULL){
$id = $_GET['id'];
}else{
echo "<script>window.location.assign('allPetLocations.php')</script>";
}
$query = "DELETE FROM pet_locations WHERE id = '$id'";
$delete = $db->delete($query);
?>