        <!-- Blog Sidebar Widgets Column -->
            <div class="col-md-4">

               

                <!-- LOGIN -->
                <div class="well">
                    <h4>Login</h4>
                    <form action="includes/login.php" method="post">
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
