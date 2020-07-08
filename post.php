<?php
    include "includes/db.php";
    include "includes/header.php";
?>
    <!-- Navigation -->
<?php include "includes/navigation.php"; ?>
    

    <!-- Page Content -->
    <div class="container">

        <div class="row">
        
            <!-- Blog Entries Column -->
            <div class="col-md-8">
                <?php
                    if(isset($_GET['p_id'])){
                        $the_post_id = $_GET['p_id'];
                        $query = "SELECT * FROM posts WHERE post_id = $the_post_id";
                    }else{
                        $query = "SELECT * FROM posts";
                    }
                    
                    $selectAllPostsQuery = mysqli_query($connection,$query);

                    while($row = mysqli_fetch_assoc($selectAllPostsQuery)){
                        $post_id = $row['post_id'];
                        $post_title = $row['post_title'];
                        $post_author = $row['post_author'];
                        $post_date = $row['post_date'];
                        $post_image = $row['post_image'];
                        $post_content = $row['post_content'];
                ?>


                <h1 class="page-header">
                    Page Heading
                    <small>Secondary Text</small>
                </h1>

                <!-- First Blog Post -->
                <h2>
                    <a href="post.php?p_id=<?php echo $post_id; ?>"><?php echo $post_title ?></a>
                </h2>
                <p class="lead">
                    by <a href="index.php"><?php echo $post_author ?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $post_date ?></p>
                <hr>
                
                
                



            <div class="col-lg-12 col-md-4 col-sm-6 col-xs-12">
                 
                    <div class="hovereffect">
                    <img class="img-responsive" src="images/<?php echo $post_image ?>" alt="">
                            <div class="overlay">
                                <h2><?php echo $post_title ?></h2>
                                <a class="info" href="post.php?p_id=<?php echo $post_id; ?>">View Post</a>
                            </div>
                    </div>
            </div>




                <hr>
                <p><?php echo $post_content ?></p>
                <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr> 

                <?php } ?>
                <!-- ///////////////////////////////////////
                //////////////////////////////////////////////////////////////////////// -->
                 <!-- Blog Comments---------------------------------------------------------------------------------------------- -->
                <?php
                    if(isset($_POST['submit_comment'])){
                        $the_post_id = $_GET['p_id'];
                        $comment_author = $_POST['comment_author'];
                        $comment_email = $_POST['comment_email'];
                        $comment_content = $_POST['comment_content'];
                        
                        if(!empty($comment_author) && !empty($comment_email) && !empty($comment_content)){
                            $query = "INSERT INTO comments(comment_post_id, comment_author, comment_email, comment_content, comment_status, comment_date) ";
                            $query .= "VALUES($the_post_id, '$comment_author', '$comment_email', '$comment_content', 'unapproved', now())";
                            $insert_comment_query = mysqli_query($connection, $query);
                            if(!$insert_comment_query){
                                die("INSERT COMMENT QUERY FAILED".mysqli_error($connection));
                            }

                            $query = "UPDATE posts SET post_comment_count = post_comment_count + 1 WHERE post_id = $the_post_id";
                            $update_comment_count = mysqli_query($connection, $query);
                            if(!$update_comment_count){
                                die("INCREASING POST COMMENT COUNT QUERY FAILED".mysqli_error($connection));
                            }
                        }else{
                            echo "<script>alert('Please fill out comments fields')</script>";
                        }

                    }
                ?>
                <!-- Comments Form -->
                <div class="well">
                    <h4>Leave a Comment:</h4>
                    <form role="form" method="post" action="">
                        <div class="form-group">
                            <label for="comment_author">Author</label>
                            <input type="text" class="form-control" name="comment_author">
                        </div>
                        <div class="form-group">
                            <label for="comment_email">Email</label>
                            <input type="email" class="form-control" name="comment_email">
                        </div>
                        <div class="form-group">
                            <label for="comment_author">Comment</label>
                            <textarea class="form-control" rows="3" name="comment_content"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary" name="submit_comment">Submit</button>
                    </form>
                </div>

                <hr>

                <!-- """""""""""""""""""""""""""""""""""""Posted Comments""""""""""""""""""""""""""""""""""""" -->
                
                <?php ///////////SELECTING COMMENTS FROM Database
                    $the_post_id = $_GET['p_id'];
                    $query = "SELECT * FROM comments WHERE comment_post_id = $the_post_id ";
                    $query .= "AND comment_status = 'approved' ";
                    $query .= "ORDER BY comment_id DESC";
                    $select_comments = mysqli_query($connection,$query);
                    if(!$select_comments){
                        die("SELECTINH COMMENT QUERY FAILED".mysqli_error($connection));
                    }

                    while($row = mysqli_fetch_assoc($select_comments)){
                        $comment_date = $row['comment_date'];
                        $comment_author = $row['comment_author'];
                        $comment_content = $row['comment_content'];
                ?>

                        <!-- Comment -->
                        <div class="media">
                            <a class="pull-left" href="#">
                                <img class="media-object" src="http://placehold.it/64x64" alt="">
                            </a>
                            <div class="media-body">
                                <h4 class="media-heading"><?php echo $comment_author ?>
                                    <small><?php echo $comment_date ?></small>
                                </h4>
                                <?php echo $comment_content ?>

                                <!-- Nested Comment -->
                                                            <!-- <div class="media">
                                                                <a class="pull-left" href="#">
                                                                    <img class="media-object" src="http://placehold.it/64x64" alt="">
                                                                </a>
                                                                <div class="media-body">
                                                                    <h4 class="media-heading">Nested Start Bootstrap
                                                                        <small>August 25, 2014 at 9:30 PM</small>
                                                                    </h4>
                                                                    Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                                                                </div>
                                                            </div> -->
                                <!-- End Nested Comment -->
                            </div>
                        </div>

                <?php } ?>

            </div>

            <!-- Blog Sidebar Widgets Column -->
            <?php include "includes/sidebar.php"; ?>

        </div>

<?php
    include "includes/footer.php";
?>
        