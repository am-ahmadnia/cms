<!-- fffGIT SHIT -->

<?php
    include "includes/admin_header.php";
?>
    <div id="wrapper">
        <?php
            if(isset($_SESSION['username'])){
                $username = $_SESSION['username'];
                $query = "SELECT * FROM  users WHERE username = '$username'";
                $select_user_profile_query = mysqli_query($connection,$query);
                while($row = mysqli_fetch_array($select_user_profile_query)){
                    $user_id = $row['user_id'];
                    $user_name_db = $row['username'];
                    $user_password = $row['user_password'];
                    $user_firstname = $row['user_firstname'];
                    $user_lastname = $row['user_lastname'];
                    $user_email = $row['user_email'];
                    $user_image = $row['user_image'];
                    $user_role = $row['user_role'];
                    $user_date = $row['user_date'];
                }
            }

            if(isset($_POST['update_profile'])){
                $new_user_firstname = $_POST['firstname'];
                $new_user_lastname = $_POST['lastname'];
                $new_user_name = $_POST['username'];
                $new_user_password = $_POST['password'];
                $new_user_email = $_POST['email'];
                $new_user_role = $_POST['role'];

                $query = "UPDATE users SET ";
                $query .= "username = '$new_user_name', ";
                $query .= "user_password = '$new_user_password', ";
                $query .= "user_firstname = '$new_user_firstname', ";
                $query .= "user_lastname = '$new_user_lastname', ";
                $query .= "user_email = '$new_user_email', ";
                $query .= "user_role = '$new_user_role' ";
                $query .= "WHERE username = '$username'";

                $update_profile_query = mysqli_query($connection,$query);
                if(!$update_profile_query){
                    die("UPDATING PROFILE FAILED<br>".mysqli_error($connection));
                }else{
                    header("location: index.php?profile_updated");
                }
            }
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
            <label for="image" style="display: block;">Profile Picture</label>
            <img class='img-responsive' style='width:50px;' src='images/profile_pics/<?php echo $user_image ?>' alt='No Picture'>
            <br><br>
            <input class="" type="file" name="image">
            
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
            <input class="btn btn-primary" type="submit" name="update_profile" value="Update Profile">
        </div>
        
    </form>
        <!-- Navigation -->
        <?php include "includes/admin_navigation.php" ?>

        <div id="page-wrapper">

            <div class="container-fluid">
                <?php
                    if(isset($_GET['user_added'])){
                        echo "<h3 class='text-danger'>User Added</h3>";
                    }
                ?>   
                <!-- Page Heading -->
                <div class="col-lg-12">

               
                    
                </div>
            
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
