<?php include "db.php" ?>
<?php session_start() ?>
<?php
    if(isset($_POST['submit_login'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
        $username = mysqli_real_escape_string($connection,$username);
        $password = mysqli_real_escape_string($connection,$password);
        
        $query = "SELECT * FROM users WHERE username = '$username' ";
        $select_user_data_query = mysqli_query($connection,$query);
        if($select_user_data_query){
            echo "its working";
        }

        while($row = mysqli_fetch_assoc($select_user_data_query)){
            // the names are different because of an unknown error. used to be like db_username
            //SELECTED data FROM DB
            $the_user_id = $row['user_id'];
            $the_username = $row['username'];
            $user_password = $row['user_password'];
            $user_firstname = $row['user_firstname'];
            $user_lastname = $row['user_lastname'];
            $user_email = $row['user_email'];
            $user_role = $row['user_role'];
        }

        if($username !== $the_username || $password !== $user_password){
            header("location: ../index.php?login_failed");
        }else if($username === $the_username && $password === $user_password){
            $_SESSION['username'] = $the_username;
            $_SESSION['password'] = $user_password;
            $_SESSION['firstname'] = $user_firstname;
            $_SESSION['lastname'] = $user_lastname;
            $_SESSION['email'] = $user_email;
            $_SESSION['role'] = $user_role;
            header("location: ../admin/index.php?logged_in");
        }
    }
    
?>