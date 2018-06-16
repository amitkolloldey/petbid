<?php include('inc/header.php');?>
<?php
//Pagination
$per_page = 12;
if(isset($_GET['page'])){
$page = $_GET['page'];
}else{
$page = 1;
}
$start_from = ($page -1)* $per_page;
$querypaginate = "SELECT * FROM pets WHERE status='1' ORDER BY id ASC LIMIT 50";
$selectpaginate = $db->select($querypaginate);
?>
<div class="container">
    <section>
        <div class="row">
            <div class="page-title">
                <h2>Top 50 Deals For Todays: <?php echo date('F j, Y' );;?></h2>
            </div>
            <div class="col-md-12">
                <?php if($selectpaginate){?>
                
                <div class="row">
                    
                    <?php while($row = $selectpaginate->fetch_assoc()){?>
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
                    <article class="blog-post col-md-4">
                        <div class="blog-post-body">
                            <img src="admin/<?php echo $row['image'];?>" >
                            <h2><a href="pet.php?id=<?php echo urlencode($row['id']);?>"><?php echo $row['name'];?></a></h2>
                            <div class="pet_meta">
                                <span> <strong>Category:</strong> <?php while($rowCategory = $selectPetCategory->fetch_assoc()){ echo $rowCategory['name'];}?></span>
                                <span> <strong>Location:</strong> <?php while($rowLocation = $selectPetLocation->fetch_assoc()){ echo $rowLocation['name'];}?></span>
                                <span> <strong>Author:</strong> <?php while($rowAuthor = $selectPetAuthor->fetch_assoc()){ echo $rowAuthor['name'];}?></span>
                                <span> <strong>Basic Amount:</strong> <?php echo $row['basic_amount'];?></span>
                                <span> <strong>Incremental Amount:</strong> <?php echo $row['incremental_amount'];?></span>
                            </div>
                            
                            <p><?php echo $fd->formatExcerpt($row['description'],100);?></p>
                            <div class="read-more"><a href="pet.php?id=<?php echo urlencode($row['id']);?>">See Details</a></div>
                        </div>
                    </article>
                    <?php };?>
                </div>
                
                <?php }else{?>
                <?php echo "<h2 claas='not_found'>No Deal Found!!</h2>";?>
                <?php }?>
            </div>
        </div>
    </section>
    </div><!-- /.container -->
    <?php include('inc/footer.php');?>