<?php
    include "includes/admin_header.php";
?>
    <div id="wrapper">

        <!-- Navigation -->
        <?php include "includes/admin_navigation.php" ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome to admin
                            
                        </h1>
                        <div class="col-xs-6">
                            <?php
                               addCategories();
                            ?>
                            
                            
                            <form action="" method="post">
                                <div class="formGroup">
                                    <label for="cat_title">Add Category</label>
                                    <input class="form-control" type="text" name="cat_title" tabindex="1">
                                </div>
                                <br>
                                <div class="formGroup">
                                    <input class="btn btn-primary" type="submit" name="submit" value="Add Category">
                                </div>
                            </form>
                            <br> 

                            <?php ///////////////////////////UPDATE AND INCLUDE QUERY
                                if(isset($_GET['edit'])){
                                    $cat_id = $_GET['edit'];
                                    include "includes/update_categories.php";
                                }
                            ?>

                        </div><!--Add Category-->

                    <div class="col-xs-6">
                        
                        <table class="table table-bordered table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Category Title</th>
                                </tr>
                            </thead>
                            <tboby>
                                
                                <?php
                                    /////////////////////////FIND ALL CATEGORIES
                                    findAllCategories();
                                ?>

                                <?php //DELETE QUERY
                                    deleteCategory();
                                ?>
                            </tboby>
                        </table>
                    </div>
                </div>
            
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
