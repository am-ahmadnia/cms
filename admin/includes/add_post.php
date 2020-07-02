<?php
    if(isset($_POST['submit'])){
        $post_title = $_POST['title'];
        $post_category_id = $_POST['category_id'];
        $post_author = $_POST['author'];
        $post_status = $_POST['status'];
        $post_tags = $_POST['tags'];
        $post_comment = $_POST['content'];
        $post_image = $_FILES['image']['name'];
        $post_image_temp = $_FILES['image']['tmp_name'];
        $post_content = $_POST['content'];
        $post_date = date('d-m-y');
        // $post_comment_count = 4;

        move_uploaded_file($post_image_temp,"../images/$post_image");
        
        $query = "INSERT INTO posts(post_category_id, post_title, post_author, post_date, post_image, post_content, post_tags, post_comment_count, post_status) ";
        $query .= "VALUES($post_category_id, '$post_title', '$post_author', now(), '$post_image', '$post_content', '$post_tags', '$post_status')";
        $addPostQuery = mysqli_query($connection, $query);
        confirmQuery($addPostQuery);
    }

?>
<h1 class="display-1">
    Add Post
</h1>
<hr>
<form action="" class="needs-validation" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="title">Post Title</label>
        <input class="form-control" type="text" name="title" required>
    </div>

    
        
        
    

    <div class="form-group">
        <label for="category_id">Post Category</label>
        <select name="category_id" class="form-control">
        <?php
            ////////////////////////////CATEGORIES BITCH
            $query = "SELECT * FROM categories ORDER BY cat_title"; //FIND ALL CATEGORIES
            $selectCategories = mysqli_query($connection,$query);
            if(!$selectCategories){
                die("QUERY FAILED".mysqli_error($connection));
            }
            while($row = mysqli_fetch_assoc($selectCategories)){
                $cat_id = $row['cat_id'];
                $cat_title = $row['cat_title'];
                
                // echo "<option>$cat_title</option>";
                echo "<option value='$cat_id'>$cat_title</option>";
            }
        ?>
        </select>
    </div>

    <div class="form-group">
        <label for="author">Post Author</label>
        <input class="form-control" type="text" name="author">
    </div>

    <div class="form-group">
        <label for="status">Post Status</label>
        <input class="form-control" type="text" name="status">
    </div>
    
    <div class="form-group">
        <label for="image">Post Image</label>
        <input class="" type="file" name="image">
    </div>

    <div class="form-group">
        <label for="tags">Post Tags</label>
        <input class="form-control" type="text" name="tags">
    </div>

    <div class="form-group">
        <label for="content">Post Content</label>
        <textarea class="form-control" name="content" id="" cols="30" rows="10"></textarea>
    </div>
    
    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="submit" value="Publish Post">
    </div>
    
</form>