<h1 class="display-1">
    Posts
</h1>
<hr>
<form action="">
    <table class="table table-striped">
        <div id="bulkOptionsContainer" class="col-xs-4">
           <select name="action" class="form-control " id="">
            <option value="">Select Action</option>
            <option value="">Publish</option>
            <option value="">Draft</option>
            <option value="">Delete</option>
           </select> 
        </div>
        <thead>
            <tr>
                <th>ID</th>
                <th>Author</th>
                <th>Title</th>
                <th>Category</th>
                <th>Status</th>
                <th>Image</th>
                <th>Tags</th>
                <th>Comments</th>
                <th>Date</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $query = "SELECT * FROM posts ORDER BY post_id DESC"; //FIND ALL CATEGORIES
                $select_posts = mysqli_query($connection,$query);
                confirmQuery($select_posts);
                while($row = mysqli_fetch_assoc($select_posts)){
                    $post_id = $row['post_id'];
                    $post_category_id = $row['post_category_id'];
                    $post_title = $row['post_title'];
                    $post_author = $row['post_author'];
                    $post_date = $row['post_date'];
                    $post_image = $row['post_image'];
                    $post_status = $row['post_status'];
                    $post_contecnt = $row['post_content'];
                    $post_tags = $row['post_tags'];
                    $post_comment_count = $row['post_comment_count'];
                    $post_user = $row['post_user'];

                    echo "<tr>";
                    echo "<td>$post_id</td>";
                    echo "<td>$post_author</td>";
                    echo "<td>$post_title</td>";
                    
                    $query = "SELECT * FROM categories WHERE cat_id = '$post_category_id'"; //FIND ALL CATEGORIES
                    $selectCategoriesID = mysqli_query($connection,$query);
                    
                    while($row = mysqli_fetch_assoc($selectCategoriesID)){
                            $cat_id = $row['cat_id'];
                            $cat_title = $row['cat_title']; 
                            echo "<td>$cat_title</td>";
                    }
                    echo "<td>$post_status</td>";
                    echo "<td><img class='img-responsive' style='width:50px;' src='../images/$post_image' alt='No Picture'></td>";
                    echo "<td>$post_tags</td>";
                    echo "<td>$post_comment_count</td>";
                    echo "<td>$post_date</td>";
                    echo "<td><a  class='text-info' href='posts.php?source=edit_post&p_id=$post_id'>Edit</a></td>";
                    echo "<td><a class='text-danger' href='posts.php?delete_post=$post_id'>Delete</a></td>";
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
        if(isset($_GET['delete_post'])){
            $the_post_id = $_GET['delete_post'];
            $query = "DELETE FROM posts WHERE post_id = $the_post_id";
            $deleteQuery = mysqli_query($connection,$query);
            confirmQuery($deleteQuery);
            header("location: posts.php");
        } 
    ?>
</form>