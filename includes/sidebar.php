        <!-- Blog Sidebar Widgets Column -->
            <div class="col-md-4">

                <div class="well">
                    <h4>Blog Search</h4>
                    <form action="search.php" method="post">
                    <div class="input-group">
                        <input name="search" type="text" class="form-control">
                        <span class="input-group-btn">
                            <button name="submit" class="btn btn-default" type="submit">
                                <span class="glyphicon glyphicon-search"></span>
                        </button>
                        </span>
                    </div>
                    </form> <!-- serach form-->
                </div>

                <!-- LOGIN -->
                <div class="well">
                    <h4>Login</h4>
                    <?php
                        if(isset($_GET['login_failed'])){
                            echo "<h5 class='text-danger'>Entered Username or Password is incorrect</h5>";
                        }
                    ?>
                    <form action="includes/login.php" method="post">
                    <div class="form-group">
                        <input name="username" type="text" class="form-control" placeholder="Username...">
                    </div>

                    <div class="input-group">
                        <input name="password" type="password" class="form-control" placeholder="Password...">
                        <span class="input-group-btn">
                            <button name="submit_login" class="btn btn-primary btn-default" type="submit">Submit</button>
                        </span>
                    </div>
                    </form> <!-- search form-->
                </div>


                <!-- Blog Categories Well -->
                <div class="well">

                    <?php
                        $query = "SELECT * FROM categories";
                        $selectCategorisSidebar = mysqli_query($connection,$query);
                    ?>

                    <h4>Blog Categories</h4>
                    <div class="row">
                        <div class="col-lg-12">
                            <ul class="list-unstyled">
                                
                                <?php
                                    while($row = mysqli_fetch_assoc($selectCategorisSidebar)){
                                        $cat_id = $row['cat_id'];
                                        $cat_title = $row['cat_title'];
                                        
                                        echo "<li><a href='category.php?category=$cat_id'>{$cat_title}</a></li>";
            
                                    }
                                ?>

                            </ul>
                        </div>
                    </div>
                    <!-- /.row -->
                </div>

                <!-- Side Widget Well -->
                <?php include "widget.php" ?>
                

            </div>
