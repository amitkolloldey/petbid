<?php include('inc/header.php');?>
<?php include('inc/sidebar.php');
if (isset($_GET['id']) && $_GET['id'] != NULL){
$id = $_GET['id'];
}else{
echo "<script>window.location.assign('allBlogPosts.php')</script>";
}
$query = "SELECT * FROM pet_bids WHERE pet='$id'";
$select = $db->select($query);
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        All Bid On Pet
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-md-12">
                <?php if(isset($_GET['message'])){
                echo "<p class='alert alert-success'>".$_GET['message']."</p>";
                }?>
                <?php if($select){?>
                <table id="allposts" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Bid Price</th>
                            <th>Bid On</th>
                            <th>Bid By</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>Id</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Bid Price</th>
                        <th>Bid On</th>
                        <th>Bid By</th>
                        <th>Action</th>
                    </tr>
                    </tfoot>
                    <tbody>
                        <?php while($row = $select->fetch_assoc()){
                        ?>
                        
                        <tr>
                            <?php
                            $id_pet = $row['pet'];
                            $id_aut = $row['bid_author'];
                            $idToPet= "SELECT * FROM pets WHERE id='$id_pet'";
                            $selectPet = $db->select($idToPet);
                            $idToAuthor = "SELECT * FROM users WHERE id='$id_aut'";
                            $selectBidAuthor = $db->select($idToAuthor);
                            ?>
                            <th><?php echo $row['id'];?></th>
                            <th><?php echo $row['title'];?></th>
                            <th><?php echo $fd->formatExcerpt($row['description'],200);?></th>
                            <th><?php echo $row['my_bid'];?></th>
                            <th><?php while($rowPet = $selectPet->fetch_assoc()){ echo $rowPet['name'];}?></th>
                            <th><?php while($rowAuthor = $selectBidAuthor->fetch_assoc()){ echo $rowAuthor['name'];}?></th>
                            <th><a href="deletePetBid.php?id=<?php echo urlencode($row['id']);?>">Delete</a></th>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <?php }else{
                echo "<p class='alert alert-danger'>No Pets Yet!</p>";
                } ?>
            </div>
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php include('inc/footer.php');?>