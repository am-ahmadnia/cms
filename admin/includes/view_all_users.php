
<h1 class="display-1">
    Users
</h1>
<hr>
<table class="table table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Firstname</th>
            <th>Lastname</th>
            <th>Email</th>
            <th>Picture</th>
            <th>Role</th>
            <th>Date</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
        <?php
            $query = "SELECT * FROM users ORDER BY user_id ASC"; //FIND ALL CATEGORIES
            $select_users = mysqli_query($connection,$query);
            confirmQuery($select_users);
            while($row = mysqli_fetch_assoc($select_users)){
                $user_id = $row['user_id'];
                $user_name = $row['username'];
                $user_password = $row['user_password'];
                $user_firstname = $row['user_firstname'];
                $user_lastname = $row['user_lastname'];
                $user_email = $row['user_email'];
                $user_image = $row['user_image'];
                $user_role = $row['user_role'];
                $user_date = $row['user_date'];

                echo "<tr>";
                echo "<td>$user_id</td>";
                echo "<td>$user_name</td>";
                echo "<td>$user_firstname</td>";
                echo "<td>$user_lastname</td>";
                echo "<td>$user_email</td>";
                // echo "<td><img width='50px' src='images/$user_image'></td>";
                echo "<td><img class='img-responsive' style='width:50px;' src='images/profile_pics/$user_image' alt='No Picture'></td>";
                echo "<td>$user_role</td>";
                echo "<td>$user_date</td>";
                echo "<td><a class='text-danger' href='users.php?source=edit_user&user_id=$user_id'>Edit</a></td>";
                echo "<td><a class='text-danger' href='users.php?delete_user=$user_id'>Delete</a></td>";
                echo "</tr>";
                
            }
            if (!empty($row)) {
                // COMMENT list is empty.
                echo "<tr>";
                echo "<td colspan='10'>No posts found</td>";
                echo "</tr>";
           }
        ?>
            
    </tbody>
</table>

<?php
    if(isset($_GET['delete_user'])){
        $the_user_id = $_GET['delete_user'];
        $query = "DELETE FROM users WHERE user_id = $the_user_id";
        $deleteQuery = mysqli_query($connection,$query);
        confirmQuery($deleteQuery);
        header("location: users.php");
    } 
?>