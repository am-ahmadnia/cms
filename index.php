<?php
    include "includes/db.php";
    include "includes/header.php";
?>
    <!-- Navigation -->
<?php include "includes/navigation.php"; ?>
    

    <!-- Page Content -->
    <div class="container">
        <h1 class="page-header">
            Home
        </h1>
        
        <?php
            if(isset($_GET['login_failed'])){
                echo "<h5 class='text-danger'>Entered Username or Password is incorrect</h5>";
            }
        ?>
        
        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">
                <?php
                    if(isset($_GET['p_id'])){
                        $the_post_id = $_GET['p_id'];
                        $query = "SELECT * FROM posts WHERE post_id = $the_post_id";
                    }else{
                        $query = "SELECT * FROM posts WHERE post_status = 'published' ORDER BY post_id DESC";
                    }
                    
                    $selectAllPostsQuery = mysqli_query($connection,$query);

                    while($row = mysqli_fetch_assoc($selectAllPostsQuery)){
                        $post_id = $row['post_id'];
                        $post_title = $row['post_title'];
                        $post_author = $row['post_author'];
                        $post_date = $row['post_date'];
                        $post_image = $row['post_image'];
                        $post_content = substr($row['post_content'],0,100);
                        $post_status = $row['post_status'];
                        
                        if($post_status !== 'published'){
                            echo "<h1 class='display-1 text-danger text-center'>No POST SORRY</h1>";
                        }else{
                            // ??????????????????????????????????????????????????????????????????????????????
                ?>

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

                <?php } }?>
                <!-- ///////////////////////////////////////
                //////////////////////////////////////////////////////////////////////// -->
                 <!-- Blog Comments -->

                <!-- Comments Form -->
                <div class="well">
                    <h4>Leave a Comment:</h4>
                    <form role="form">
                        <div class="form-group">
                            <textarea class="form-control" rows="3"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>

                <hr>

                <!-- Posted Comments -->

                <!-- Comment -->
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading">Start Bootstrap
                            <small>August 25, 2014 at 9:30 PM</small>
                        </h4>
                        Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                    </div>
                </div>

                <!-- Comment -->
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading">Start Bootstrap
                            <small>August 25, 2014 at 9:30 PM</small>
                        </h4>
                        Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                        <!-- Nested Comment -->
                        <div class="media">
                            <a class="pull-left" href="#">
                                <img class="media-object" src="http://placehold.it/64x64" alt="">
                            </a>
                            <div class="media-body">
                                <h4 class="media-heading">Nested Start Bootstrap
                                    <small>August 25, 2014 at 9:30 PM</small>
                                </h4>
                                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                            </div>
                        </div>
                        <!-- End Nested Comment -->
                    </div>
                </div>

                          

                

            </div>

            <!-- Blog Sidebar Widgets Column -->
            <?php include "includes/sidebar.php"; ?>

        </div>

<?php
    include "includes/footer.php";
?>
        