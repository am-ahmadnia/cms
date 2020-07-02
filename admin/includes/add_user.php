<?php
    if(isset($_POST['submit_user'])){
        $user_firstname = $_POST['firstname'];
        $user_lastname = $_POST['lastname'];
        $user_email = $_POST['email'];
        $username = $_POST['username'];
        $user_password = $_POST['password'];
        $user_role = $_POST['role'];
        $user_image = $_FILES['image']['name'];
        $user_image_temp = $_FILES['image']['tmp_name'];
        move_uploaded_file($user_image_temp,"images/$user_image");

        $query = "INSERT INTO users(username, user_password, user_firstname, user_lastname, user_email, user_role, user_date) ";
        $query .= "VALUES('$username', '$user_password', '$user_firstname', '$user_lastname', '$user_email', '$user_role', now()) ";
        $add_user_query = mysqli_query($connection,$query);
        if(!$add_user_query){
            die("ADDING USER FAILED".mysqli_error($connection));
        }else{
            echo "<h1 class='text-danger'>User Added</h1>";
        }
    }
?>
<h1 class="display-1">
    Add User
</h1>
<hr>
<form action="" class="needs-validation" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="title">Firstname</label>
        <input class="form-control" type="text" name="firstname" >
    </div>
    ffff    
    <div class="form-group">
        <label for="title">Lastname</label>
        <input class="form-control" type="text" name="lastname" >
    </div>

    <div class="form-group">
        <label for="title">Email</label>
        <input class="form-control" type="text" name="email" >
    </div>

    <div class="form-group">
        <label for="title">Username</label>
        <input class="form-control" type="text" name="username" >
    </div>

    <div class="form-group">
        <label for="title">Password</label>
        <input class="form-control" type="text" name="password">
    </div>


    <div class="form-group">
        <label for="image">Profile Picture</label>
        <input class="" type="file" name="image">
    </div>

    <div class="form-group">
        <select name="role" class="form-control">
            <option value="subscriber">Select Options...</option>
            <option value="admin">Admin</option>
            <option value="subscriber">Subscriber</option>
        </select>
    </div>

    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="submit_user" value="Add User">
    </div>
    
</form>