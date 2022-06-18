<?php
    include('./db/conect.php')
 ?>
<!-- Blog -->
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
                    <p class="author_name">Rafael Marquez</p>
                    <span>2022-10-5</span>
                </div>
                <h3 class="post_title">Online Payment Security Tips for Shoppers</h3>
                <div class="post-images">
                    <img src="https://images.unsplash.com/photo-1655317173493-71ebfdce3968?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxlZGl0b3JpYWwtZmVlZHw5fHx8ZW58MHx8fHw%3D&auto=format&fit=crop&w=500&q=60"
                        alt="">
                </div>
            </div>
            <div class="blog-review_right">
                <p class="review_desc">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                    incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                    ullamco laboris nisi ut aliquip ex ea com consequat. Duis
                    aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                    Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt… </p>
            </div>
        </div>
        <?php 
                }
        ?>
    </div>
</div>