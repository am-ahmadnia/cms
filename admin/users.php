<!-- fffGIT SHIT -->

<?php
    include "includes/admin_header.php";
?>
    <div id="wrapper">

        <!-- Navigation -->
        <?php include "includes/admin_navigation.php" ?>

        <div id="page-wrapper">

            <div class="container-fluid">
                <?php
                    if(isset($_GET['user_added'])){
                        echo "<h3 class='text-danger'>User Added</h3>";
                    }
                ?>   
                <!-- Page Heading -->
                <div class="col-lg-12">

                <?php
                    if(isset($_GET['source'])){
                        $source = $_GET['source'];
                    }else{
                        $source = '';
                        
                    }

                    switch($source){
                        case 'add_user':
                            include "includes/add_user.php";
                        break;

                        case 'edit_user':
                            include "includes/edit_user.php";
                        break;

                        default:
                            include "includes/view_all_users.php";
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

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
