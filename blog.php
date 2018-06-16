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
$querypaginate = "SELECT * FROM blog_posts  WHERE status='1' LIMIT $start_from,$per_page";
$selectpaginate = $db->select($querypaginate);
?>
<div class="container">
    <section>
        <div class="row">
            <div class="page-title">
                <h2>Some Articles About Pet Care</h2>
            </div>
            <div class="col-md-12">
                <?php if($selectpaginate){?>
                
                <div class="row">
                    
                    
                    <?php while($row = $selectpaginate->fetch_assoc()){?>
                    <?php
                    $id_category = $row['category'];
                    $id_author = $row['author'];
                    $idToCategory = "SELECT * FROM blog_categories WHERE id='$id_category'";
                    $selectCategory = $db->select($idToCategory);
                    $idToAuthor = "SELECT * FROM users WHERE id='$id_author'";
                    $selectAuthor = $db->select($idToAuthor);
                    ?>
                    <article class="blog-post col-md-4">
                        <div class="blog-post-body">
                            <img src="admin/<?php echo $row['image'];?>" >
                            <h2><a href="post.php?id=<?php echo urlencode($row['id']);?>"><?php echo $row['title'];?></a></h2>
                            <div class="pet_meta">
                                <span> <strong>Category:</strong> <?php while($rowCategory = $selectCategory->fetch_assoc()){ echo $rowCategory['name'];}?></span>
                                <span> <strong>Author:</strong> <?php while($rowAuthor = $selectAuthor->fetch_assoc()){ echo $rowAuthor['name'];}?></span>
                            </div>
                            
                            <p><?php echo $fd->formatExcerpt($row['description'],100);?></p>
                            <div class="read-more"><a href="post.php?id=<?php echo urlencode($row['id']);?>">Continue Reading</a></div>
                        </div>
                    </article>
                    <?php };?>
                </div>
                <!-- Pagination -->
                <?php
                $paginate_query = "SELECT * FROM blog_posts";
                $paginate_query_result = $db->select($paginate_query);
                $total_num_rows = mysqli_num_rows($paginate_query_result);
                $total_pages = ceil($total_num_rows / $per_page);
                $c="active";
                ?>
                <ul class="pagination-link">
                    <?php for($i=1;$i<=$total_pages;$i++){
                    if($page==$i)
                    {
                    $c="active";
                    }
                    else
                    {
                    $c="";
                    }
                    ?>
                    <li class='<?php echo $c;?>'><a href="blog.php?page=<?php echo $i;?>"><?php echo $i;?></a></li>
                    <?php }?>
                </ul>
                <!-- Pagination -->
                <?php }else{?>
                <?php echo "<h2 claas='not_found'>No Posts Found!!</h2>";?>
                <?php }?>
            </div>
        </div>
    </section>
    </div><!-- /.container -->
    <?php include('inc/footer.php');?>