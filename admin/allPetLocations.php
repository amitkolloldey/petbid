<?php include('inc/header.php');?>
<?php include('inc/sidebar.php');
$query = "SELECT * FROM pet_locations";
$select = $db->select($query);
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        All Pet Locations
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
                <?php
                if(isset($_GET['errormessage'])){
                echo "<p class='alert alert-danger'>".$_GET['errormessage']."</p>";
                }
                ?>
                <?php if($select){?>
                <table id="allposts" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Action</th>
                    </tr>
                    </tfoot>
                    <tbody>
                        <?php while($row = $select->fetch_assoc()){
                        ?>
                        
                        <tr>
                            <th><?php echo $row['id'];?></th>
                            <th><?php echo $row['name'];?></th>
                            <?php $check_id = $row['id']; ?>
                            <?php $query_check = "SELECT * FROM pets WHERE location = '$check_id'";
                            $select_check = $db->select($query_check); ?>
                            <th><a href="editPetLocation.php?id=<?php echo urlencode($row['id']);?>">Edit</a>
                            ||
                            <?php if ($select_check == NULL): ?>
                            <a onclick="return confirm('Are You Sure You Want To Delete?');" href="deletePetLocation.php?id=<?php echo urlencode($row['id']);?>">Delete</a>
                            <?php else: ?>
                            <?php echo "<span class='text-danger'>Can Not Be deleted!!</span>" ;?>
                            <?php endif ?>
                        </th>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
            <?php }else{
            echo "<p class='alert alert-danger'>No Locations Yet!</p>";
            } ?>
        </div>
    </div>
    <!-- /.row -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php include('inc/footer.php');?>