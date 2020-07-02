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
    

    if(isset($_POST['update_submit'])){
        $username = $_POST['username'];
        $user_password = $_POST['password'];
        $user_firstname = $_POST['firstname'];
        $user_lastname = $_POST['lastname'];
        $user_email = $_POST['email'];
        $user_role = $_POST['role'];
        
        $query = "UPDATE users SET ";
        $query .= "user_firstname = '$user_firstname', ";
        $query .= "user_lastname = '$user_lastname', ";
        $query .= "username = '$username', ";
        $query .= "user_password = '$user_password', ";
        $query .= "user_email = '$user_email', ";
        $query .= "user_role = '$user_role' ";
        $query .= "WHERE user_id = '$the_user_id'";

        $edit_user_query = mysqli_query($connection,$query);
        if(!$edit_user_query){
            die ("fuccckckckckcckkckckc");
        }else{
            echo "<h3 class='text-danger'>User Edited</h3>";            
        }
    }


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
                    echo "<option value='subscriber'>Subsciber</option>";
                }else{
                    echo "<option value='subscriber'>Subsciber</option>";
                    echo "<option value='admin'>Admin</option>";
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