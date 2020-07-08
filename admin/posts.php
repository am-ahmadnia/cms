<?php
    include "includes/admin_header.php";
?>
    <div id="wrapper">
    <script src="js/script.js"></script>
        <!-- Navigation -->
        <?php include "includes/admin_navigation.php" ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="col-lg-12"  style="padding: 0px;">
                    
                <?php
                    if(isset($_GET['source'])){
                        $source = $_GET['source'];
                    }else{
                        $source = '';
                        
                    }

                    switch($source){
                        case 'add_post':
                            include "includes/add_post.php";
                        break;

                        case 'edit_post':
                            include "includes/edit_post.php";
                        break;

                        default:
                            include "includes/view_all_posts.php";
                    }
                ?>
                    
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
    <script src="js/script.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
