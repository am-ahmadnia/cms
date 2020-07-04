<?php include "db.php" ?>
<?php session_start() ?>
<?php
    if(isset($_POST['submit_login'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
        $username = mysqli_real_escape_string($connection,$username);
        $password = mysqli_real_escape_string($connection,$password);
        
        $query = "SELECT * FROM users WHERE username = '$username' ";
        $select_users_query = mysqli_query($connection,$query);
        if(!$select_users_query){
            die("SELECTING USER FOR LOGIN FAILED".mysqli_error($connection));
        }

        while($row = mysqli_fetch_assoc($select_users_query)){
            var_dump($row);
            // IMPORTED FROM DB:::::::::::::::::::))))))))))))))))))))
            $the_user_name = $row['username'];
            $user_password = $row['user_password'];
            $user_firstname = $row['user_firstname'];
            $user_lastname = $row['user_lastname'];
            $user_email = $row['user_email'];
            $user_image = $row['user_image'];
            $user_role = $row['user_role'];
        }

        if($username === $the_user_name && $password === $user_password){
            $_SESSION['username'] = $the_user_name;
            $_SESSION['password'] = $user_password;
            $_SESSION['firstname'] = $user_firstname;
            $_SESSION['lastname'] = $user_lastname;
            $_SESSION['role'] = $user_role;

            header("location: ../admin/");
        }else {
            header("location: ../index.php");
        }
    }
    
?>