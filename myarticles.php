<?php include('inc/header.php');?>
<?php if (Session::get('ulogin')): ?>

<div class="container">
	<section>
		<div class="row">
			<div class="col-md-3 left_sidebar">
				<?php include('inc/sidebar.php'); ?>
			</div>
			<div class="col-md-9 right_content">
				<div class="ucontent">
					<h4>Welcome Back, "<?php echo Session::get('name'); ?>"</h4>
                    <?php if(isset($_GET['message'])){
                    echo "<p class='alert alert-success'>".$_GET['message']."</p>";
                    }?>                    
					<?php
					$id = Session::get('id');
					$query = "SELECT * FROM blog_posts WHERE author='$id' ORDER BY id DESC";
					$select = $db->select($query); 
					if($select ){
					?>

                    <table id="allposts" class="table table-striped" cellspacing="0" width="100%">
                        <thead>
                            <tr> 
                                <th>Title</th>
                                <th>Description</th> 
                                <th>Category</th>
                                <th>Created Date</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                        <tr> 
                            <th>Title</th>
                            <th>Description</th> 
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
                                $idToCategory = "SELECT * FROM blog_categories WHERE id='$id_category'";
                                $selectBlogCategory = $db->select($idToCategory);  
                                ?> 
                                <th><?php echo $row['title'];?><br><img src="<?php echo $row['image'];?>" width="50px"></th>
                                <th><?php echo $fd->formatExcerpt($row['description'],100);?></th> 
                                <th><?php while($rowCategory = $selectBlogCategory->fetch_assoc()){ echo $rowCategory['name'];}?></th>
                                <th><?php echo $row['created_date'];?></th>
                                <th>
                                    <?php if ($row['status'] == 0): ?>
                                    <?php echo "<p class='btn btn-warning'>Pending</p>"; ?>
                                    <?php else: ?>
                                    <?php echo "<p class='btn btn-success'>Approved</p>"; ?>
                                    <?php endif ?>
                                </th>
                                <th> 
                                    <a onclick="return confirm('Are You Sure You Want To Delete?');" href="deletemyarticle.php?id=<?php echo urlencode($row['id']);?>">Delete</a>
                                </th>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
				<?php } else{
					echo "You have Added O pet!";
					} ?>
				 
			</div>
		</div>
	</div>
</section>
</div><!-- /.container -->
<?php else: ?>
<?php echo "<script>window.location.assign('index.php')</script>";  ?>
<?php endif; ?>
<?php include('inc/footer.php');?>