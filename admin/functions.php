<?php
    function confirmQuery($result){
        global $connection;
        if(!$result){
            die(mysqli_error($connection));
        }
    }

    function addCategories(){
        global $connection;
        if(isset($_POST['submit'])){
            $cat_title = $_POST['cat_title'];
            if(empty($cat_title)){
                echo "<h5 style='color: red;'>This field cannot be empty</h5>";
            }else{
                $query = "INSERT INTO categories (cat_title) ";
                $query .= "VALUES('$cat_title')";
                $createCategoryQuery = mysqli_query($connection, $query);
                if(!$createCategoryQuery){
                    die(mysqli_error($connection));
                }
                header("location: categories.php");
            }
        }
    }

    function findAllCategories(){
        global $connection;
        $query = "SELECT * FROM categories ORDER BY cat_id"; //FIND ALL CATEGORIES
        $selectCategorisSidebar = mysqli_query($connection,$query);
        while($row = mysqli_fetch_assoc($selectCategorisSidebar)){
            $cat_id = $row['cat_id'];
            $cat_title = $row['cat_title'];
            
            echo "<tr>";
            echo "<td>{$cat_id}</td>";
            echo "<td>{$cat_title}</td>";
            echo "<td><a href='categories.php?delete={$cat_id}' >Delete</a></td>";
            echo "<td><a href='categories.php?edit={$cat_id}' >Edit</a></td>";
            echo "</tr>";
        }
    }

    function deleteCategory(){
        global $connection;
        if(isset($_GET['delete'])){
            $cat_id = $_GET['delete'];
            $query = "DELETE FROM categories WHERE cat_id = '$cat_id'";
            $delete_query = mysqli_query($connection,$query);
            header("location: categories.php");
        } 
    }

    
?>