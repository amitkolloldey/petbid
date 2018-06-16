<?php include('inc/header.php');?>
<?php include('inc/sidebar.php');
$query = "SELECT * FROM users";
$select = $db->select($query);
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        All Users
        </h1>
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
                            <th>Email</th>
                            <th>Cell</th>
                            <th>Address</th>
                            <th>Image</th>
                            <th>Joining Date</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Cell</th>
                        <th>Address</th>
                        <th>Image</th>
                        <th>Joining Date</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </tfoot>
                    <tbody>
                        <?php while($row = $select->fetch_assoc()){
                        ?>
                        
                        <tr>
                            <th><?php echo $row['id'];?></th>
                            <th><?php echo $row['name'];?></th>
                            
                            <th><?php echo $row['email'];?></th>
                            <th><?php echo $row['cell'];?></th>
                            <th><?php echo $row['address'];?></th>
                            <th><img src="../<?php echo $row['image'];?>" width="50px"></th>
                            <th><?php echo $row['joining_date'];?></th>
                            <th>
                                <?php if ($row['status'] == 0): ?>
                                <?php echo "<p class='btn btn-warning'>In Active</p>"; ?>
                                <?php else: ?>
                                <?php echo "<p class='btn btn-success'>Active</p>"; ?>
                                <?php endif ?>
                            </th>
                            <th><a href="edituser.php?id=<?php echo urlencode($row['id']);?>">Edit</a>
                        </th>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
            <?php }else{
            echo "<p class='alert alert-danger'>No User Found!</p>";
            } ?>
        </div>
    </div>
    <!-- /.row -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php include('inc/footer.php');?>