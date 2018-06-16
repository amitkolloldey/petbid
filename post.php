<?php include('inc/header.php');?>
<?php
if(isset($_GET['id'])){
$id = $_GET['id'];
}else{
header('Location: 404.php');
}
$query = "SELECT * FROM blog_posts WHERE id='$id' AND status='1'";
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
                $id_author = $row['author'];
                $idToCategory = "SELECT * FROM blog_categories WHERE id='$id_category'";
                $selectCategory = $db->select($idToCategory);
                $idToAuthor = "SELECT * FROM users WHERE id='$id_author'";
                $selectAuthor = $db->select($idToAuthor);
                ?>
                <article class="blog-post">
                    <div class="blog-post-body">
                        <img src="admin/<?php echo $row['image'];?>" >
                        <h2><?php echo $row['title'];?></h2>
                        <div class="pet_meta">
                            <span> <strong>Category:</strong> <?php while($rowCategory = $selectCategory->fetch_assoc()){ echo $rowCategory['name'];}?></span>
                            <span> <strong>Author:</strong> <?php while($rowAuthor = $selectAuthor->fetch_assoc()){ echo $rowAuthor['name'];}?></span>
                        </div>
                        
                        <p><?php echo $row['description'] ;?></p>
                    </div>
                </article>
                <div class="row">
                    
                    <div class="related col-md-12">
                        <h2>Related Articles</h2>
                        <?php
                        $catid = $row['category'];
                        $catquery = "SELECT * FROM blog_posts WHERE category='$catid' AND status='1'";
                        $catselect = $db->select($catquery);
                        if($catselect){
                        while($catrow = $catselect->fetch_assoc()){
                            $id_category2 = $catrow['category'];
                            $id_author2 = $catrow['author'];
                            $idToCategory2 = "SELECT * FROM blog_categories WHERE id='$id_category2'";
                            $selectCategory2 = $db->select($idToCategory2);
                            
                            $idToAuthor2 = "SELECT * FROM users WHERE id='$id_author2'";
                            $selectAuthor2 = $db->select($idToAuthor2);
                        ?>
                        <article class="blog-post col-md-3">
                            <div class="blog-post-body">
                                <img src="admin/<?php echo $catrow['image'];?>" >
                                <h2><a href="post.php?id=<?php echo urlencode($catrow['id']);?>"><?php echo $catrow['title'];?></a></h2>
                                <div class="pet_meta">
                                    <span> <strong>Category:</strong> <?php while($rowCategory2 = $selectCategory2->fetch_assoc()){ echo $rowCategory2['name'];}?></span>
                                    <span> <strong>Author:</strong> <?php while($rowAuthor2 = $selectAuthor2->fetch_assoc()){ echo $rowAuthor2['name'];}?></span>
                                </div>
                                <div class="blog-post-text">
                                    <?php echo $row['description'];?>
                                </div>
                                <div class="read-more"><a href="post.php?id=<?php echo urlencode($catrow['id']);?>">Continue Reading</a></div>
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
                echo "<div class='not_found'><h2>Not Found!!</h2></div>";
                } ;?>
            </div>
        </div>
    </section>
    </div><!-- /.container -->
    <?php include('inc/footer.php');?>