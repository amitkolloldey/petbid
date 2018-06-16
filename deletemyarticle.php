<?php include('inc/header.php');?>
<?php include('inc/sidebar.php');?>
<?php if(Session::get('ulogin')){
?>

<?php if (isset($_GET['id']) && $_GET['id'] != NULL  ){
$id = $_GET['id'];
$user = Session::get('id');
}else{
echo "<script>window.location.assign('myarticles.php')</script>";
}
$query = "DELETE FROM blog_posts WHERE id = '$id' AND author = '$user'";
$delete = $db->delete($query);
?>

<?php }else{
echo "<script>window.location.assign('index.php')</script>";
} ?>