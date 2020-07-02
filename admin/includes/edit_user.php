<h1 class="display-1">
    Edit Users
</h1>
<?php
    if(isset($_GET['user_id'])){
        $the_user_id = $_GET['user_id'];
    }

    $query = "SELECT * FROM users WHERE user_id = $the_user_id";
    $select_user_by_id = mysqli_query($connection,$query);
    confirmQuery($select_user_by_id);
    while($row = mysqli_fetch_assoc($select_user_by_id)){
        $username = $row['username'];
        $user_password = $row['user_password'];
        $user_firstname = $row['user_firstname'];
        $user_lastname = $row['user_lastname'];
        $user_email = $row['user_email'];
        $user_role = $row['user_role'];
        
    }
    

    // if(isset($_POST['update_submit'])){
    //     $post_author = $_POST['author'];
    //     $post_title = $_POST['title'];
    //     $post_category_id = $_POST['post_category'];
    //     $post_status = $_POST['status'];
    //     $post_image = $_FILES['image']['name'];
    //     $post_image_temp = $_FILES['image']['tmp_name'];
    //     $post_content = $_POST['content'];
    //     $post_tags = $_POST['tags'];
    //     move_uploaded_file($post_image_temp,"../images/$post_image");
    //     if(empty($post_image)){
    //         $query = "SELECT * FROM posts WHERE post_id = $the_post_id";
    //         $select_image = mysqli_query($connection,$query);
    //         while($row = mysqli_fetch_assoc($select_image)){
    //             $post_image = $row['post_image'];
    //         }
    //     }

    //     $query = "UPDATE posts SET ";
    //     $query .= "post_title = '$post_title', ";
    //     $query .= "post_category_id = '$post_category_id', ";
    //     $query .= "post_author = '$post_author', ";
    //     $query .= "post_status = '$post_status', ";
    //     $query .= "post_image = '$post_image', ";
    //     $query .= "post_content = '$post_content', ";
    //     $query .= "post_tags = '$post_tags' ";
    //     $query .= "WHERE post_id = '$the_post_id'";

    //     $update_query = mysqli_query($connection,$query);
    //     if(!$update_query){
    //         die ("fuccckckckckcckkckckc");
    //     }

    //     header("location: posts.php");
    // }
?>
<form action="" method="post" enctype="multipart/form-data">
    
    <div class="form-group">
        <label for="title">Firstname</label>
        <input value="<?php echo $user_firstname; ?>" class="form-control" type="text" name="firstname">
    </div>
    
    <div class="form-group">
        <label for="title">Lastname</label>
        <input value="<?php echo $user_lastname; ?>" class="form-control" type="text" name="lastname">
    </div>
    
    <div class="form-group">
        <label for="title">Email</label>
        <input value="<?php echo $user_email; ?>" class="form-control" type="email" name="email">
    </div>
    
    <div class="form-group">
        <label for="title">Username</label>
        <input value="<?php echo $username; ?>" class="form-control" type="text" name="username">
    </div>
    
    <div class="form-group">
        <label for="title">Password</label>
        <input value="<?php echo $user_password; ?>" class="form-control" type="password" name="password">
    </div>

    <div class="form-group">
        <select name="role" class="form-control">
            <?php
                if($user_role == 'admin'){
                    echo "<option value='admin'>Admin</option>";
                }else{
                    echo "<option value='subscriber'>Subsciber</option>";
                }
            ?>         
            
        </select>
    </div>
    
    
    
    <!-- <div class="form-group">
        <label for="image" style="display: block;">Post Image</label>
        <img class="img-rounded" width="200px" src="../images/<?php //echo "$post_image"; ?>" alt="No Picture">
        <br><br>
        <input class="" type="file" name="image">
        
    </div> -->

    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="update_submit" value="Update Post">
    </div>
    
</form>