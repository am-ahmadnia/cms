<?php
    if(isset($_GET['p_id'])){
        $the_post_id = $_GET['p_id'];
    }

    $query = "SELECT * FROM posts WHERE post_id = $the_post_id ORDER BY post_id"; //FIND ALL CATEGORIES
    $select_posts_by_id = mysqli_query($connection,$query);
    confirmQuery($select_posts_by_id);
    while($row = mysqli_fetch_assoc($select_posts_by_id)){
        // var_dump($row);
        $post_id = $row['post_id'];
        $post_category_id = $row['post_category_id'];
        $post_title = $row['post_title'];
        $post_author = $row['post_author'];
        $post_date = $row['post_date'];
        $post_image = $row['post_image'];
        $post_status = $row['post_status'];
        $post_content = $row['post_content'];
        $post_tags = $row['post_tags'];
        $post_comment_count = $row['post_comment_count'];
        $post_user = $row['post_user'];
    }
    

    if(isset($_POST['update_submit'])){
        $post_author = $_POST['author'];
        $post_title = $_POST['title'];
        $post_category_id = $_POST['post_category'];
        $post_status = $_POST['status'];
        $post_image = $_FILES['image']['name'];
        $post_image_temp = $_FILES['image']['tmp_name'];
        $post_content = $_POST['content'];
        $post_tags = $_POST['tags'];
        move_uploaded_file($post_image_temp,"../images/$post_image");
        if(empty($post_image)){
            $query = "SELECT * FROM posts WHERE post_id = $the_post_id";
            $select_image = mysqli_query($connection,$query);
            while($row = mysqli_fetch_assoc($select_image)){
                $post_image = $row['post_image'];
            }
        }

        $query = "UPDATE posts SET ";
        $query .= "post_title = '$post_title', ";
        $query .= "post_category_id = '$post_category_id', ";
        $query .= "post_author = '$post_author', ";
        $query .= "post_status = '$post_status', ";
        $query .= "post_image = '$post_image', ";
        $query .= "post_content = '$post_content', ";
        $query .= "post_tags = '$post_tags' ";
        $query .= "WHERE post_id = '$the_post_id'";

        $update_query = mysqli_query($connection,$query);
        if(!$update_query){
            die ("fuccckckckckcckkckckc");
        }

        header("location: posts.php");
    }
?>
<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="title">Post Title</label>
        <input value="<?php echo $post_title; ?>" class="form-control" type="text" name="title">
    </div>

    <div class="form-group">
        <label for="category_id">Post Category</label>
        <select name="post_category" class="form-control">
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
                echo "<option value='$cat_id' ";
                if($cat_id == $post_category_id){
                    echo "selected";
                }
                echo ">$cat_title</option>";
            }
        ?>
        
        </select>
    </div>

    <div class="form-group">
        <label for="author">Post Author</label>
        <input value="<?php echo $post_author; ?>" class="form-control" type="text" name="author">
    </div>

    <div class="form-group">
        <label for="status">Post Status</label>
        <input value="<?php echo $post_status; ?>" class="form-control" type="text" name="status">
    </div>
    
    
    <div class="form-group">
        <label for="image" style="display: block;">Post Image</label>
        <img class="img-rounded" width="200px" src="../images/<?php echo "$post_image"; ?>" alt="No Picture">
        <br><br>
        <input class="" type="file" name="image">
        
    </div>

    <div class="form-group">
        <label for="tags">Post Tags</label>
        <input value="<?php echo $post_tags; ?>" class="form-control" type="text" name="tags">
    </div>

    <div class="form-group">
        <label for="content">Post Content</label>
        <textarea class="form-control" name="content" id="" cols="30" rows="10"><?php echo $post_content; ?></textarea>
    </div>
    
    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="update_submit" value="Update Post">
    </div>
    
</form>