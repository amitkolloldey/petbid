<?php include('inc/header.php');?>
<?php include('inc/sidebar.php');
$query = "SELECT * FROM blog_posts";
$select = $db->select($query);
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        All Pets
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
                            <th>Image</th>
                            <th>Author</th>
                            <th>Category</th>
                            <th>Created Date</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>Id</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Image</th>
                        <th>Author</th>
                        <th>Category</th>
                        <th>Created Date</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </tfoot>
                    <tbody>
                        <?php while($row = $select->fetch_assoc()){
                        ?>
                        
                        <tr>
                            <?php
                            $id_category = $row['category'];
                            $id_blog_author = $row['author'];
                            $idToCategory = "SELECT * FROM blog_categories WHERE id='$id_category'";
                            $selectBlogCategory = $db->select($idToCategory);
                            $idToAuthor = "SELECT * FROM users WHERE id='$id_blog_author'";
                            $selectBlogAuthor = $db->select($idToAuthor);
                            ?>
                            <th><?php echo $row['id'];?></th>
                            <th><?php echo $row['title'];?></th>
                            <th><?php echo $fd->formatExcerpt($row['description'],100);?></th>
                            <th><img src="<?php echo $row['image'];?>" width="50px"></th>
                            <th><?php while($rowAuthor = $selectBlogAuthor->fetch_assoc()){ echo $rowAuthor['name'];}?></th>
                            <th><?php while($rowCategory = $selectBlogCategory->fetch_assoc()){ echo $rowCategory['name'];}?></th>
                            <th><?php echo $row['created_date'];?></th>
                            <th>
                                <?php if ($row['status'] == 0): ?>
                                <?php echo "<p class='btn btn-warning'>Pending</p>"; ?>
                                <?php else: ?>
                                <?php echo "<p class='btn btn-success'>Approved</p>"; ?>
                                <?php endif ?>
                            </th>
                            <th><a href="editBlogPost.php?id=<?php echo urlencode($row['id']);?>">Edit</a>
                            ||
                            <a onclick="return confirm('Are You Sure You Want To Delete?');" href="deleteBlogPost.php?id=<?php echo urlencode($row['id']);?>">Delete</a>
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