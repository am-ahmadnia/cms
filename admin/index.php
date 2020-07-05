<?php 
    // ------------------------------------ADMIN INDEX---------------------------------------------------------------------
?>
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
                            <?php 
                               echo $_SESSION['firstname'].'<br>';

                               if (isset($_GET['profile_updated'])) {
                                    echo "<small class='text-danger'>Profile Updated</small>";
                                }else if(isset($_GET['logged_in'])){
                                    echo "<small class='text-danger'>WELCOME TO SICKO MODE!</small>";
                            
                               }
                            ?>
                            
                        </h1>
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
