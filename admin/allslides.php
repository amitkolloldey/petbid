<?php include('inc/header.php');?>
<?php include('inc/sidebar.php');
$query = "SELECT * FROM slider";
$select = $db->select($query);
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        All Slides
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
                            <th>Title</th>  
                            <th>Image</th> 
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>Id</th>
                        <th>Title</th>  
                        <th>Image</th> 
                        <th>Action</th>
                    </tr>
                    </tfoot>
                    <tbody>
                        <?php while($row = $select->fetch_assoc()){
                        ?>
                        
                        <tr>
                            <th><?php echo $row['id'];?></th>
                            <th><?php echo $row['title'];?></th>
                            <th><img src="../<?php echo $row['image'];?>" width="50px"></th>
                            <th><a href="editslide.php?id=<?php echo urlencode($row['id']);?>">Edit</a> 
                        </th>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
            <?php }else{
            echo "<p class='alert alert-danger'>No Slide Found!</p>";
            } ?>
        </div>
    </div>
    <!-- /.row -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php include('inc/footer.php');?>