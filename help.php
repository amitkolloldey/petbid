<?php
include('inc/header.php');?>
<div class="container">
    <section>
	    <div class="row">
            <div class="col-lg-12">
				<?php 
				$querypage = "SELECT * FROM pages WHERE id='3'";
				$selectpage = $db->select($querypage);
				if($selectpage){
					while($rowpage = $selectpage->fetch_assoc()){
				?> 
                <h2><?php echo $rowpage['title']; ?></h2> 
				<div class="page_wrapper">
					<p>
						<?php echo $rowpage['content']; ?>
					</p>
				</div>
				<?php }}else{
                echo "<div class='not_found'><h2>Page Not Found!!</h2></div>";
                } ; ?>           
            </div>
        </div>
    </section>
    </div><!-- /.container -->
<?php include('inc/footer.php');?>                 