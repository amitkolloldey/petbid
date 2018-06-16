<?php include('inc/header.php');?>
<?php
if(isset($_GET['id'])){
$id = $_GET['id'];
}else{
header('Location: 404.php');
}
$query = "SELECT * FROM pets WHERE id='$id' AND deadline > NOW() AND status='1'";
$select = $db->select($query);
?>
<div class="container">
    <section>
        <div class="row">
            <div class="col-md-12">
                <?php if($select){?>
                <?php while($row = $select->fetch_assoc()){?>
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
                <article class="blog-post">
                    <div class="blog-post-image">
                        <img src="admin/<?php echo $row['image'];?>" alt="<?php echo $row['title'];?>">
                    </div>
                    <div class="blog-post-body">
                        <h2><?php echo $row['name'];?></h2>
                        <div class="pet_meta">
                            <span> <strong>Category:</strong> <?php while($rowCategory = $selectPetCategory->fetch_assoc()){ echo $rowCategory['name'];}?></span>
                            <span> <strong>Location:</strong> <?php while($rowLocation = $selectPetLocation->fetch_assoc()){ echo $rowLocation['name'];}?></span>
                            <span> <strong>Author:</strong> <?php while($rowAuthor = $selectPetAuthor->fetch_assoc()){ echo $rowAuthor['name'];}?></span>
                            <span> <strong>Basic Amount:</strong> <?php echo $row['basic_amount'];?></span>
                            <span> <strong>Incremental Amount:</strong> <?php echo $row['incremental_amount'];?></span>
                        </div>
                        <div class="blog-post-text">
                            <?php echo $row['description'];?>
                        </div>
                    </div>
                </article>
                <div class="row">
                    <div class="pet_bids col-md-12">
                        <h2>Place Your Bid</h2>
                        <?php if (Session::get('ulogin')):
                        $author_id = Session::get('id');
                        ?>
                        <a href="#bidbox" data-toggle="modal" data-target="#bidbox">Bid Now</a>
                        <?php else:?>
                        <span>You Must Login To Bid!!</span>
                        <?php endif;?>
                    </div>
                    <div class="pet_bids col-md-12">
                        <h2>User's Bid <small> (Highest To Lowest)</small></h2>
                        <?php
                        $bidid = $row['id'];
                        $querybids = "SELECT * FROM pet_bids WHERE pet='$bidid' GROUP BY id ORDER BY MAX(my_bid) DESC ";
                        $selectbids = $db->select($querybids); ?>
                        <?php if ($selectbids):
                        $countid = 1;
                        while($rowbid = $selectbids->fetch_assoc()){
                        $author = $rowbid['bid_author'];
                        $queryauthor = "SELECT * FROM users WHERE id='$author'";
                        $selectauthor = $db->select($queryauthor);
                        $countid++;
                        ?>
                        <div class="col-md-12 single_bid">
                            <div class="row">
                                <div class="col-md-2 user_image">
                                    <?php while($rowauthor = $selectauthor->fetch_assoc()){ ?>
                                    <img src="<?php echo $rowauthor['image']; ?>">
                                    <div class="bidder_details">
                                        <button data-toggle="collapse" data-target="#bidder_details<?php echo $countid; ?>" class="btn btn-primary">Bidder Details</button>
                                        <div id="bidder_details<?php echo $countid; ?>" class="collapse">
                                            <p><strong>Name: </strong><?php echo $rowauthor['name']; ?></p>
                                            <p><strong>Cell: </strong><?php echo $rowauthor['cell']; ?></p>
                                            <p><strong>Address: </strong><?php echo $rowauthor['address']; ?></p>
                                        </div>
                                    </div>
                                    <?php } ?>
                                </div>
                                <div class="col-md-10 user_bid_details">
                                    <span><strong>Title:</strong> <?php echo $rowbid['title']; ?></span>
                                    <span><strong>Descripion:</strong> <?php echo $rowbid['description']; ?></span>
                                    <span><strong>Bid Amount:</strong> <?php echo $rowbid['my_bid']; ?> BDT</span>
                                </div>

                            </div>
                        </div>
                        <?php } else: ?>
                        <div class="col-md-12">
                            <span>No Bid Yet!!</span>
                        </div>
                        <?php endif; ?>
                    </div>
                    <div class="related col-md-12">
                        <h2>Related Ads</h2>
                        <?php
                        $catid = $row['category'];
                        $catquery = "SELECT * FROM pets WHERE category='$catid' AND status='1'";
                        $catselect = $db->select($catquery);
                        if($catselect){
                        while($catrow = $catselect->fetch_assoc()){
                        $id_category2 = $catrow['category'];
                        $id_location2 = $catrow['location'];
                        $id_pet_author2 = $catrow['pet_author'];
                        $idToCategory2 = "SELECT * FROM pet_categories WHERE id='$id_category2'";
                        $selectPetCategory2 = $db->select($idToCategory2);
                        $idToLocation2 = "SELECT * FROM pet_locations WHERE id='$id_location2'";
                        $selectPetLocation2 = $db->select($idToLocation2);
                        $idToAuthor2 = "SELECT * FROM users WHERE id='$id_pet_author2'";
                        $selectPetAuthor2 = $db->select($idToAuthor2);
                        ?>
                        <article class="blog-post col-md-3">
                            <div class="blog-post-body">
                                <img src="admin/<?php echo $catrow['image'];?>" >
                                <h2><a href="pet.php?id=<?php echo urlencode($catrow['id']);?>"><?php echo $catrow['name'];?></a></h2>
                                <div class="pet_meta">
                                    <span> <strong>Category:</strong> <?php while($rowCategory2 = $selectPetCategory2->fetch_assoc()){ echo $rowCategory2['name'];}?></span>
                                    <span> <strong>Location:</strong> <?php while($rowLocation2 = $selectPetLocation2->fetch_assoc()){ echo $rowLocation2['name'];}?></span>
                                    <span> <strong>Author:</strong> <?php while($rowAuthor2 = $selectPetAuthor2->fetch_assoc()){ echo $rowAuthor2['name'];}?></span>
                                    <span> <strong>Basic Amount:</strong> <?php echo $catrow['basic_amount'];?></span>
                                    <span> <strong>Incremental Amount:</strong> <?php echo $catrow['incremental_amount'];?></span>
                                </div>
                                <div class="read-more"><a href="pet.php?id=<?php echo urlencode($catrow['id']);?>">See Details</a></div>
                            </div>
                        </article>
                        <?php } } else{ ?>
                        <div class="col-md-12">
                            No Related Posts Found!!
                        </div>
                        <?php } ?>
                    </div>
                </div>
                <?php }}else{
                echo "<div class='not_found'><h2>This Post Is Archived!!</h2><p>Deadline Is Over For Bidding!!</p></div>";
                } ;?>
            </div>
        </div>
    </section>
    </div><!-- /.container -->
    <?php include('inc/footer.php');?>