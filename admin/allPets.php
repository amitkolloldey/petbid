<?php include('inc/header.php');?>
<?php include('inc/sidebar.php');
$query = "SELECT * FROM pets";
$select = $db->select($query);
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        All Pets By 
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
                            <th>Name</th>
                            <th>Image</th>
                            <th>Description</th>
                            <th>Basic Amount</th>
                            <th>Incremental Amount</th>
                            <th>Deadline</th>
                            <th>Category</th>
                            <th>Location</th>
                            <th>Created By</th>
                            <th>Created Date</th>
                            <th>Status</th>
                            <th>View Bids</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Image</th>
                        <th>Description</th>
                        <th>Basic Amount</th>
                        <th>Incremental Amount</th>
                        <th>Deadline</th>
                        <th>Category</th>
                        <th>Location</th>
                        <th>Created By</th>
                        <th>Created Date</th>
                        <th>Status</th>
                        <th>View Bids</th>
                        <th>Action</th>
                    </tr>
                    </tfoot>
                    <tbody>
                        <?php while($row = $select->fetch_assoc()){
                        ?>
                        
                        <tr>
                            <?php
                            $id_category = $row['category'];
                            $id_location = $row['location'];
                            $id_pet_author = $row['pet_author'];
                            $idToCategory = "SELECT * FROM pet_categories WHERE id='$id_category'";
                            $selectPetCategory = $db->select($idToCategory);
                            $idToLocation = "SELECT * FROM pet_locations WHERE id='$id_location'";
                            $selectPetLocation = $db->select($idToLocation);
                            $idToAuthor = "SELECT * FROM users WHERE id='$id_pet_author'";
                            $selectPetAuthor = $db->select($idToAuthor);
                            ?>
                            <th><?php echo $row['id'];?></th>
                            <th><?php echo $row['name'];?></th>
                            <th><img src="<?php echo $row['image'];?>" width="50px"></th>
                            <th><?php echo $fd->formatExcerpt($row['description'],100);?></th>
                            <th><?php echo $row['basic_amount'];?></th>
                            <th><?php echo $row['incremental_amount'];?></th>
                            <th><?php echo $row['deadline'];?></th>
                            <th><?php while($rowCategory = $selectPetCategory->fetch_assoc()){ echo $rowCategory['name'];}?></th>
                            <th><?php while($rowLocation = $selectPetLocation->fetch_assoc()){ echo $rowLocation['name'];}?></th>
                            <th><?php while($rowAuthor = $selectPetAuthor->fetch_assoc()){ echo $rowAuthor['name'];}?></th>
                            <th><?php echo $row['created_date'];?></th>
                            <th>
                                <?php if ($row['status'] == 0): ?>
                                <?php echo "<p class='btn btn-warning'>Pending</p>"; ?>
                                <?php else: ?>
                                <?php echo "<p class='btn btn-success'>Approved</p>"; ?>
                                <?php endif ?>
                            </th>
                            <th><a href="allBidsOnPet.php?id=<?php echo urlencode($row['id']);?>">View Bids</a></th>
                            <th><a href="editPet.php?id=<?php echo urlencode($row['id']);?>">Edit</a>
                            ||
                            <?php $check_id = $row['id']; ?>
                            <?php $query_check = "SELECT * FROM pet_bids WHERE pet = '$check_id'";
                            $select_check = $db->select($query_check); ?>
                            <?php if ($select_check == NULL): ?>
                            <a onclick="return confirm('Are You Sure You Want To Delete?');" href="deletePet.php?id=<?php echo urlencode($row['id']);?>">Delete</a>
                            <?php else: ?>
                            <?php echo "<span class='text-danger'>Can Not Be deleted!!</span>" ;?>
                            <?php endif ?>
                        </th>
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