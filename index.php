<?php include('inc/header.php');?>

<section id="home">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="slider_wrapper">
                    <?php
                    $queryslide = "SELECT * FROM slider";
                    $selectslide = $db->select($queryslide);
                    if($selectslide){
                    while($rowslide = $selectslide->fetch_assoc()){?>
                    <img src="<?php echo $rowslide['image']; ?>" alt="<?php echo $rowslide['title']; ?>"> 
                    <?php }}?>
                </div>
            </div>
        </div>
        <div class="row">
            <?php
            $querycat = "SELECT * FROM pet_categories WHERE featured='1' LIMIT 3";
            $selectcat = $db->select($querycat);
            if($selectcat){
            while($rowcat = $selectcat->fetch_assoc()){?>
            <div class="col-md-4 single-list">
                <div class="category-title text-center">
                    <h3><?php echo $rowcat['name']; ?></h3>
                </div>
                <div class="category-list">
                    <div class="row">
                        <?php
                        $catid = $rowcat['id'];
                        $querypet = "SELECT * FROM pets WHERE category='$catid' AND status='1' LIMIT 4";
                        $selectpet = $db->select($querypet);
                        if($selectpet){
                        while($rowpet = $selectpet->fetch_assoc()){?>
                        <div class="col-md-6">
                            <img src="admin/<?php echo $rowpet['image']; ?>" alt="<?php echo $rowpet['name']; ?>" width="50" height="50">
                            <a href="pet.php?id=<?php echo urlencode($rowpet['id']);?>"><?php echo $rowpet['name']; ?></a>
                        </div>
                        <?php }}else{
                        echo "<p>No Pet In This Category!!</p>";
                        } ?>
                    </div>
                </div>
            </div>
            <?php }}?>
        </div>
    </div>
</section>
<?php include('inc/footer.php');?>