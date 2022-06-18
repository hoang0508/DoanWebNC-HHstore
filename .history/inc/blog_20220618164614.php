<?php
    include('./db/conect.php')
 ?>
<!-- Blog -->
<div class="details-bg" style="background-image: url(./images/blog.jpg)">
	<div class="overlay"></div>
	<h3 class="details-text">Blog</h3>
</div>
<div class="blog-post">
    <div class="container">
        <h3 class="heading-tittle">Blog nổi bật</h3>
        <div class="post">
            <?php 
                $sql_blog = mysqli_query($con, "SELECT * FROM tbl_blog  WHERE blog_hot = '1'");
                while($row_blog = mysqli_fetch_array($sql_blog)) {
             ?>
            <div class="blog-post_people">
                <a href="">
                    <div class="post_image">
                        <img src="../images/<?php echo $row_blog['Blog_img'] ?>" alt="" class="img-bn">
                    </div>
                    <h3 class="post_title"><?php echo $row_blog['content_name'] ?></h3>
                    <div class="post_author">
                        <p class="author_name"><?php echo $row_blog['author'] ?></p>
                        <span><?php echo $row_blog['ngaydang'] ?></span>
                    </div>
                </a>
            </div>
            <?php
                }
                ?>
        </div>
    </div>
</div>

<!-- Review -->
<div class="review">
    <div class="container">
        <h3 class="heading-tittle">Blog mới nhất</h3>
        <?php 
                $sql_blog = mysqli_query($con, "SELECT * FROM tbl_blog  WHERE blog_hot = '0'");
                while($row_blog = mysqli_fetch_array($sql_blog)) {
             ?>
        <div class="blog-review">
            <div class="blog-review_left">
                <div class="post_author">
                    <p class="author_name"><?php echo $row_blog['author'] ?></p>
                    <span>2<?php echo $row_blog['ngaydang'] ?></span>
                </div>
                <h3 class="post_title"><?php echo $row_blog['content_name'] ?></h3>
                <div class="post-images">
                    <img src="../images/<?php echo $row_blog['Blog_img'] ?>"
                        alt="">
                </div>
            </div>
            <div class="blog-review_right">
                <p class="review_desc"><?php echo $row_blog['content'] ?></p>
            </div>
        </div>
        <?php 
                }
        ?>
    </div>
</div>