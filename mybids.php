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
					$query = "SELECT * FROM pet_bids WHERE bid_author='$id' ORDER BY id DESC";
					$select = $db->select($query); 
					if($select ){

					?>

                <table id="allposts" class="table table-striped" cellspacing="0" width="100%">
                    <thead>
                        <tr>
	                        <th>Title</th> 
	                        <th>Description</th>
	                        <th>My Bid</th>
	                        <th>Pet</th> 
	                        <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                    <tr> 
                        <th>Title</th> 
                        <th>Description</th>
                        <th>My Bid</th>
                        <th>Pet</th> 
                        <th>Action</th>
                    </tr>
                    </tfoot>
                    <tbody>
                        <?php while($row = $select->fetch_assoc()){
                        ?>
                        
                        <tr>
                            <?php
                            $id_pet = $row['pet'];  
                            $idTopet = "SELECT * FROM pets WHERE id='$id_pet'";
                            $selectPet = $db->select($idTopet);
                            
                            ?> 
                            <th><?php echo $row['title'];?></th> 
                            <th><?php echo $fd->formatExcerpt($row['description'],100);?></th>
                            <th><?php echo $row['my_bid'];?></th> 

                            <th><?php if($selectPet){while($rowPet = $selectPet->fetch_assoc()){?> <a target="_blank" href="pet.php?id=<?php echo $rowPet['id']; ?>"><img src="<?php echo $rowPet['image']; ?>" width="100px"/></a> <?php }}else{ echo "<p class='alert-danger'>Pet Deleted!!</p>";}?></th>  
                            <th><a onclick="return confirm('Are You Sure You Want To Delete?');" href="deletemybid.php?id=<?php echo urlencode($row['id']);?>">Delete</a></th>
                    	</tr>
                    <?php } ?>
                </tbody>
                </table>
				<?php } else{
					echo "You have Placed O Bid!";
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